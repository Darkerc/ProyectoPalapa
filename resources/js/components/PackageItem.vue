<template>
<div>
    <v-card class="mx-auto my-12" :id="`${datosProducto.NombrePaquete}`" :color="datosProducto.Color" dark>
        <v-img height="250" :src="datosProducto.URLImagen"></v-img>
        <v-card-title class="text-center white--text">{{ datosProducto.NombrePaquete }}</v-card-title>
        <v-card-actions>
            <v-btn color="accent-4 text--white" text>
                Solicitar
            </v-btn>
            <v-btn color="accent-4 text--white" text @click="dialog = true">
                Mas detalles
            </v-btn>
        </v-card-actions>
    </v-card>
    <v-dialog v-model="dialog" max-width="80%" max-height="80%" scrollable dark>
        <v-card :color="datosProducto.Color">
            <v-card-title class="headline titleStyle">{{ datosProducto.NombrePaquete }}</v-card-title>
            <v-divider class="pt-3"></v-divider>
            <v-card-text class="scroll-info m-0 p-0">
                <v-list class="listStyle">
                    <v-list-item v-for="(producto, i) in getCaracteristicasProducto()" :key="i" v-if="producto[1] != 0 && i > 2">
                        <v-list-item-content>
                            <div class="d-flex">
                                <div class="mr-1">
                                    {{ producto[0].replace(/_/g,' ') }} :
                                </div>
                                <div v-if="producto[1] == 1">
                                     Disponible
                                </div>
                                <div v-else>
                                    {{ producto[1] }}
                                </div>
                            </div>
                        </v-list-item-content>
                    </v-list-item>
                </v-list>
            </v-card-text>

            <v-card-actions>
                <div class="flex-grow-1"></div>

                <v-btn color="white--text" text>
                    Solicitar
                </v-btn>

                <v-btn color="white--text" text @click="dialog = false">
                    Cerrar
                </v-btn>
            </v-card-actions>
        </v-card>
    </v-dialog>
</div>
</template>

<script>
export default {
    props: {
        datosProducto: Object
    },
    data() {
        return {
            dialog: false
        }
    },
    methods: {
        getCaracteristicasProducto() {
            return Object.entries(this.datosProducto.caracteristicas_paquete);
        }
    },
    mounted() {
        console.log(this.getCaracteristicasProducto())
    }
}
</script>

<style lang="scss" scoped>
.titleStyle {
    font-family: 'comic sans ms', 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif important;
    font-size: 2em !important;
}

.listStyle {
    font-family: 'comic sans ms', 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
    font-size: 1.2em;
    color: #000;
}
</style>
