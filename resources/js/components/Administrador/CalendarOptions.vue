<template>
<div>
    <v-dialog v-if="Event" v-model="dialogForm" max-width="80%" max-height="80%" scrollable dark persistent>
        <v-card color="dark">
            <v-card-title>
                Datos del evento
            </v-card-title>
            <v-card-text class="m-0 p-0 overflow-x-hidden scroll-info">
                <v-list>
                    <v-list-item-group>
                        <v-list-item>
                            <v-list-item-content>
                                <v-list-item-title class="title">
                                    Nombre del evento
                                </v-list-item-title>
                                <v-list-item-subtitle>
                                    {{ Event.name }}
                                </v-list-item-subtitle>
                            </v-list-item-content>
                        </v-list-item>
                        <v-list-item>
                            <v-list-item-content>
                                <v-list-item-title class="title">
                                    Arrendatario
                                </v-list-item-title>
                                <v-list-item-subtitle>
                                    {{ Event.Arrendatario }}
                                </v-list-item-subtitle>
                            </v-list-item-content>
                        </v-list-item>
                        <v-list-item>
                            <v-list-item-content>
                                <v-list-item-title class="title">
                                    Fecha del evento
                                </v-list-item-title>
                                <v-list-item-subtitle>
                                    {{ Event.start }}
                                </v-list-item-subtitle>
                            </v-list-item-content>
                        </v-list-item>
                        <v-list-item>
                            <v-list-item-content>
                                <v-list-item-title class="title">
                                    Estatus del evento
                                </v-list-item-title>
                                <v-list-item-subtitle>
                                    {{ esFinalizado }}
                                </v-list-item-subtitle>
                            </v-list-item-content>
                        </v-list-item>
                        <v-list-item>
                            <v-list-item-content>
                                <v-list-item-title class="title">
                                    Anticipo pagado
                                </v-list-item-title>
                                <v-list-item-subtitle>
                                    <div v-if="Event.Anticipo == 1">
                                        Si
                                    </div>
                                    <div v-else>
                                        No
                                    </div>
                                </v-list-item-subtitle>
                            </v-list-item-content>
                        </v-list-item>
                    </v-list-item-group>
                </v-list>
            </v-card-text>
            <v-card-actions>
                <div class="flex-grow-1"></div>
                <v-btn color="white--text" text @click="deleteEvent">
                    Eliminar evento
                </v-btn>
                <v-btn color="white--text" text @click="closeDialog">
                    Cerrar
                </v-btn>
            </v-card-actions>
        </v-card>
    </v-dialog>
    <v-dialog v-else v-model="dialogForm" max-width="80%" max-height="80%" scrollable dark persistent>
        <v-card color="dark">
            <v-card-title>
                Rellene los datos nesesarios para agendar un evento
            </v-card-title>
            <v-card-text class="m-0 p-0 overflow-x-hidden scroll-info">
                <v-form>
                    <v-row class="p-3">
                        <v-col cols="12" md="10">
                            <v-text-field label="Nombre del evento" hint="Se recomienda un nombre pequeño y descriptivo" outlined persistent-hint v-model="FormData.Nombre_del_evento">
                            </v-text-field>
                            <v-text-field label="Nombre del arrendatario" outlined v-model="FormData.Arrendatario">
                            </v-text-field>
                            <v-select label="Seleccionar paquete" :items="Packages" outlined v-model="FormData.Nombre_Paquete"></v-select>
                            <div class="scroll-info" style="max-width: 470px; overflow:auto;">
                                <legend>Horas extras del evento</legend>
                                <v-time-picker v-model="FormData.Horas_Extra" color="green lighten-1" header-color="primary" format="24hr" landscape scrollable>
                                </v-time-picker>
                            </div>
                        </v-col>
                        <v-col cols="12" md="2">
                            <v-switch label="Anticipo" color="indigo lighten-3" v-model="FormData.Anticipo">
                            </v-switch>
                        </v-col>
                    </v-row>
                </v-form>
            </v-card-text>
            <v-card-actions>
                <div class="flex-grow-1"></div>
                <v-btn color="white--text" text @click="createEvent">
                    Agendar dia
                </v-btn>
                <v-btn color="white--text" text @click="closeDialog">
                    Cerrar
                </v-btn>
            </v-card-actions>
        </v-card>
    </v-dialog>
</div>
</template>

<script>
import axios from 'axios'

export default {
    props: {
        DateData: Object,
        dialogForm: Boolean,
        Event: Object
    },
    data() {
        return {
            FormData: {
                Nombre_del_evento: "",
                Arrendatario: "",
                Nombre_Paquete: "",
                Anticipo: false,
                Horas_Extra: "00:00"
            },
            Packages: null
        }
    },
    beforeMount() {
        this.loadPackage()
    },
    methods: {
        closeDialog() {
            this.$emit("CloseDialog", false);
        },
        async loadPackage() {
            try {
                let {
                    data
                } = await axios.post("/api/paquetes")

                let PackageName = [];
                data.forEach(paquete => {
                    PackageName.push(paquete.NombrePaquete)
                })
                this.Packages = PackageName
            } catch (err) {
                console.error(err)
                this.$toasted.error("A ocurrido un problema al cargar los paquetes", {
                    type: "error",
                    theme: "outline",
                    position: "top-right",
                    duration: 5000
                })
            }
        },
        async createEvent() {
            try {
                let {
                    data
                } = await axios.post('/api/eventos/Añadir', this.getFormData())

                this.$emit("CreateEvent", data)
                this.closeDialog()
            } catch (error) {
                console.error(error)
                this.$toasted.error("A ocurrido un problema al añadir un nuevo evento", {
                    type: "error",
                    theme: "outline",
                    position: "top-right",
                    duration: 5000
                })
            }
        },
        getFormData() {
            let dataForm = new FormData()
            let dataArray = Object.entries(this.FormData)

            dataForm.append('Fecha_De_Inicio', this.DateData.date)

            dataArray.forEach(data => {

                if (data[1] == false)
                    dataForm.append(data[0], 0);
                else if (data[1] == true)
                    dataForm.append(data[0], 1);
                else
                    dataForm.append(data[0], data[1]);

            })

            return dataForm
        },
        async deleteEvent(){

            try{
                let eventId = new FormData()
                eventId.append('id',this.Event.id)
                let { data } = await axios.post('/api/eventos/Eliminar', eventId)
                this.$emit("DeleteEvent", this.Event)
                this.closeDialog()
            }catch(error){
                console.error(error)
                this.$toasted.error("A ocurrido un problema eliminar el evento", {
                    type: "error",
                    theme: "outline",
                    position: "top-right",
                    duration: 5000
                })
            }

            
        }
    },
    computed: {
        esFinalizado() {
            let fechaActual = new Date()
            let fechaEvento = new Date(this.DateData.date)
            fechaEvento.setDate(fechaEvento.getDate()+1)


            if (fechaEvento > fechaActual) {
                console.log('Fecha Actual', fechaActual)
                console.log('Fecha Evento', fechaEvento)
                return 'El evento esta por realizarce'
            } else {
                return 'El evento a finalizado'
            }
        }
    },

}
</script>
