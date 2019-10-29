<template>
  <div>
    <v-form>
      <v-container>
        <v-row>
            <v-col>
                <v-alert type="info" class="display-2 text-center" text>
                    Crear un nuevo paquete!
                </v-alert>

                <v-text-field
                    name="NombrePaquete"
                    id="NombrePaquete"
                    label="Nombre del paquete"
                    v-model="datosFormulario.NombrePaquete"
                ></v-text-field>

                <v-text-field
                    name="Precio"
                    id="Precio"
                    label="Precio del paquete"
                    type="number"
                    v-model="datosFormulario.Precio"
                ></v-text-field>

                <v-alert type="info" text>
                    Color de fondo del paquete
                </v-alert>
                <v-color-picker
                v-model="datosFormulario.Color"
                mode="hexa"
                class="mx-auto"
                hide-mode-switch>
                </v-color-picker>

                <v-alert type="info" text>
                    Imagen de fondo
                </v-alert>
                <v-file-input
                    accept="image/png, image/jpeg, image/bmp"
                    placeholder="Escoge una imgen de fondo para el paquete"
                    prepend-icon="mdi-camera"
                    label="Imagen de fondo"
                    v-model="datosFormulario.URLImagen"
                ></v-file-input>

                <v-text-field
                    name="Mesas"
                    id="Mesas"
                    label="Mesas disponibles"
                    type="number"
                    v-model="caracteristicas_paquetes.Mesas"
                ></v-text-field>

                <v-text-field
                    name="Mesas_Adicionales"
                    id="Mesas_Adicionales"
                    label="Mesas adicionales"
                    type="number"
                    v-model="caracteristicas_paquetes.Mesas_Adicionales"
                ></v-text-field>

                <v-text-field
                    name="Juegos_De_Feria"
                    id="Juegos_De_Feria"
                    label="Juegos de feria disponibles"
                    type="number"
                    v-model="caracteristicas_paquetes.Juegos_De_Feria"
                ></v-text-field>

                <v-alert type="info" text>
                    Duracion maxima del evento (Definido en horas)
                </v-alert>
                <div class="mx.auto d-flex scroll-info" style="min-width: 500px; overflow:auto;">
                    <v-time-picker
                    v-model="caracteristicas_paquetes.Duracion_Del_Evento"
                    color="green lighten-1"
                    header-color="primary"
                    format="24hr"
                    class="mx-auto"
                    landscape
                    scrollable>
                    </v-time-picker>
                </div>

                <v-alert type="info" text>
                    Tiempo previo para organizar el evento (Definido en horas)
                </v-alert>
                <div class="mx.auto d-flex scroll-info" style="min-width: 500px; overflow:auto;">
                    <v-time-picker
                    v-model="caracteristicas_paquetes.Organizacion_Evento"
                    color="green lighten-1"
                    header-color="primary"
                    format="24hr"
                    class="mx-auto"
                    landscape
                    scrollable>
                    </v-time-picker>
                </div>

                <v-row>
                    <v-col cols="12" sm="12" lg="6">
                        <v-switch
                        v-model="caracteristicas_paquetes.Evento_Nocturno">
                            <template v-slot:label>
                            <slot name="label">
                                <div v-if="caracteristicas_paquetes.Evento_Nocturno">
                                    Evento Nocturno : Activado
                                </div>
                                <div v-else>
                                    Evento Nocturno : Desactivado
                                </div>
                            </slot>
                            </template>
                        </v-switch>
                    </v-col>

                    <v-col cols="12" sm="12" lg="6">
                        <v-switch
                        v-model="caracteristicas_paquetes.Manteleria">
                            <template v-slot:label>
                            <slot name="label">
                                <div v-if="caracteristicas_paquetes.Manteleria">
                                    Manteleria : Activado
                                </div>
                                <div v-else>
                                    Manteleria : Desactivado
                                </div>
                            </slot>
                            </template>
                        </v-switch>
                    </v-col>

                    <v-col cols="12" sm="12" lg="6">
                        <v-switch
                        v-model="caracteristicas_paquetes.Bocinas_Bluetooth">
                            <template v-slot:label>
                            <slot name="label">
                                <div v-if="caracteristicas_paquetes.Bocinas_Bluetooth">
                                    Bocinas Bluetooth : Activado
                                </div>
                                <div v-else>
                                    Bocinas Bluetooth : Desactivado
                                </div>
                            </slot>
                            </template>
                        </v-switch>
                    </v-col>

                    <v-col cols="12" sm="12" lg="6">
                        <v-switch
                        v-model="caracteristicas_paquetes.Camara_De_Luces">
                            <template v-slot:label>
                            <slot name="label">
                                <div v-if="caracteristicas_paquetes.Camara_De_Luces">
                                    Camara De Luces : Activado
                                </div>
                                <div v-else>
                                    Camara De Luces : Desactivado
                                </div>
                            </slot>
                            </template>
                        </v-switch>
                    </v-col>

                    <v-col cols="12" sm="12" lg="6">
                        <v-switch
                        v-model="caracteristicas_paquetes.Ayudante">
                            <template v-slot:label>
                            <slot name="label">
                                <div v-if="caracteristicas_paquetes.Ayudante">
                                    Ayudante : Activado
                                </div>
                                <div v-else>
                                    Ayudante : Desactivado
                                </div>
                            </slot>
                            </template>
                        </v-switch>
                    </v-col>

                    <v-col cols="12" sm="12" lg="6">
                        <v-switch
                        v-model="caracteristicas_paquetes.Inflable">
                            <template v-slot:label>
                            <slot name="label">
                                <div v-if="caracteristicas_paquetes.Inflable">
                                    Inflable : Activado
                                </div>
                                <div v-else>
                                    Inflable : Desactivado
                                </div>
                            </slot>
                            </template>
                        </v-switch>
                    </v-col>

                    <v-col cols="12" sm="12" lg="6">
                        <v-switch
                        v-model="caracteristicas_paquetes.Piñata">
                            <template v-slot:label>
                            <slot name="label">
                                <div v-if="caracteristicas_paquetes.Piñata">
                                    Piñata : Activado
                                </div>
                                <div v-else>
                                    Piñata : Desactivado
                                </div>
                            </slot>
                            </template>
                        </v-switch>
                    </v-col>

                    <v-col cols="12" sm="12" lg="6">
                        <v-switch
                        v-model="caracteristicas_paquetes.Pastel_Oblea">
                            <template v-slot:label>
                            <slot name="label">
                                <div v-if="caracteristicas_paquetes.Pastel_Oblea">
                                    Pastel Oblea : Activado
                                </div>
                                <div v-else>
                                    Pastel Oblea : Desactivado
                                </div>
                            </slot>
                            </template>
                        </v-switch>
                    </v-col>
                </v-row>
            </v-col>
        </v-row>
      </v-container>
      <v-btn color="success" block @click="sendDataForm">Crear paquete!</v-btn>
    </v-form>
  </div>
</template>

<script>
import axios from 'axios'

export default {
    data() {
        return {
            datosFormulario:{
                NombrePaquete:"",
                Precio:0,
                URLImagen:[],
                Color:"",
            },
            caracteristicas_paquetes:{
                Mesas:0,
                Mesas_Adicionales:0,
                Juegos_De_Feria: 0,
                Duracion_Del_Evento:"07:00",
                Organizacion_Evento:"03:00",
                Evento_Nocturno:false,
                Manteleria:false,
                Bocinas_Bluetooth:false,
                Camara_De_Luces:false,
                Ayudante: false,
                Inflable: false,
                Piñata:false,
                Pastel_Oblea:false
            }

        }
    },
    beforeMount(){

    },
    methods: {
        async sendDataForm(){
            try {
                let { data } = await axios.post("/api/paquetes/crear",this.getFormData())
                this.$toasted.success("Paquete creado con exito", {
                    type:"success",
                    theme: "outline",
                    position: "top-right",
                    duration: 5000
                })
                this.$router.push({
                    name: 'adminPanel'
                })
                console.log(data)
            } catch (error) {
                this.$toasted.success("A ocurrido un error intentelo de nuevo", {
                    type:"error",
                    theme: "outline",
                    position: "top-right",
                    duration: 5000
                })
                console.log(error)
            }
        },
        showData(){
             console.log(this.datosFormulario)
        },
        getFormData(){
            let datosPaquete = Object.entries(this.datosFormulario)
            let caracteriticasPaquete = Object.entries(this.caracteristicas_paquetes)
            let datosForm=new FormData()

            datosPaquete.forEach(dato => {
                datosForm.append(dato[0],dato[1])
            })
            caracteriticasPaquete.forEach(dato => {
                datosForm.append(dato[0],dato[1])
            })
            console.log(datosForm)

            return datosForm;
        }
    }
}
</script>

