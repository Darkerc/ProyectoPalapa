<template>
<v-sheet class="pa-1" color="grey lighten-3" elevation="12">
    <v-list two-line>
        <v-list-item v-for="(paquete , i) in datosPaquetes" :key="i">

            <v-list-item-icon>
                <v-icon color="indigo">mdi-shopping</v-icon>
            </v-list-item-icon>

            <v-list-item-content>
                <v-list-item-title>{{ paquete.NombrePaquete }}</v-list-item-title>
                <v-list-item-subtitle>{{ paquete.Precio }}</v-list-item-subtitle>
            </v-list-item-content>

            <v-list-item-icon>
                <v-tooltip bottom>
                    <template v-slot:activator="{ on }">
                        <v-btn icon class="update" v-on="on">
                            <v-icon size="40px" color="indigo darken-1">mdi-autorenew</v-icon>
                        </v-btn>
                    </template>
                    <span>Actualizar</span>
                </v-tooltip>
            </v-list-item-icon>

            <v-list-item-icon>
                <v-tooltip bottom>
                    <template v-slot:activator="{ on }">
                        <v-btn icon class="delete" v-on="on" @click="eliminarPaquete(paquete)">
                            <v-icon size="40px" color="red lighten-1">mdi-alpha-x-circle</v-icon>
                        </v-btn>
                    </template>
                    <span>Eliminar</span>
                </v-tooltip>
            </v-list-item-icon>

        </v-list-item>
    </v-list>
</v-sheet>
</template>

<script>
import axios from 'axios'

export default {
    props: {
        datosPaquetes: Array
    },
    methods: {
        eliminarPaquete(paquete) {
            let Vue = this;
            let dataForm = new FormData();
            dataForm.append("idPaquete", paquete.id)

            axios.post("/api/paquetes/eliminar", dataForm)
                .then(res => {
                    console.log(res)

                    //Permite obtener la row y eliminarla del dom de manera que
                    //se aprecie que se a eliminado un registro
                    const idx = Vue.datosPaquetes.indexOf(paquete)
                    this.datosPaquetes.splice(idx, 1)

                    this.$toasted.success("Eliminado con exito", {
                        theme: "outline",
                        position: "top-right",
                        duration: 5000
                    });
                })
                .catch(err => {
                    console.error(err)

                    this.$toasted.error("A ocurrido un problema al eliminar", {
                        theme: "bubble",
                        position: "top-right",
                        duration: 5000
                    });
                })
        }
    },
}
</script>

<style lang="scss" scoped>
.delete {
    transition: all 250ms ease-in-out;
    outline: none;

    &:hover {
        transform: scale(1.2);
    }
}

.update {
    outline: none;

    &:hover {
        animation: 2s linear infinite girar;
        transform: scale(1.2);
    }
}

@keyframes girar {
    to {
        transform: rotate(0deg);
    }

    from {
        transform: rotate(-360deg);
    }
}
</style>
