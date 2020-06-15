<template>
    <div>
    <v-dialog v-model="dialog" max-width="80%" max-height="80%" scrollable dark persistent>
        <v-card color="dark">
            <v-card-title>
                Introduzca los datos nesesarios para el cambio de contraseña
            </v-card-title>
            <v-card-text class="m-0 p-0 overflow-x-hidden scroll-info">
                <v-form>
                    <v-row class="p-3">
                        <v-col cols="12" md="10">
                            <v-text-field label="Contraseña actual" outlined persistent-hint v-model="contraActual">
                            </v-text-field>
                            <v-text-field label="Contraseña nueva" v-model="contraNueva" outlined>
                            </v-text-field>
                        </v-col>
                    </v-row>
                </v-form>
            </v-card-text>
            <v-card-actions>
                <v-btn color="white--text" text @click="actualizarContraseña()">
                    Cambiar contraseña
                </v-btn>
            </v-card-actions>
            <v-card-actions>
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
    data(){
        return{
            contraNueva:"",
            contraActual:""
        }
    },
    props:{
        dialog:Boolean
    },
    methods:{
        closeDialog() {
            this.$emit("CloseDialog", false);
        },
        async actualizarContraseña(){
            try {
                let contraData = new FormData();
                contraData.append("id",this.$auth.watch.data.data.id);
                contraData.append("ContraNueva",this.contraNueva);
                contraData.append("ContraActual",this.contraActual);
                let {data} = await axios.post("/api/usuarios/Contraseña/Actualizar",contraData)
                console.log(data)
                this.$auth.logout({
                makeRequest: false
            });
            } catch (error) {
                console.log(error) 
                this.$toasted.error("Error al intentar cambiar la contraseña, verifique sus datos", {
                    type: "error",
                    theme: "outline",
                    position: "top-right",
                    duration: 5000
                });            
            }
        }
    }
}
</script>