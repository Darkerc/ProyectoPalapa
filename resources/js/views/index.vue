<template>
<div>

    <carousel></carousel>
    <v-row>
        <v-col sm="12" md="6" v-for="(paquete, i) in datosPaquetes" :key="i">
            <packagecard :paquete="paquete" :index="i">
            </packagecard>
        </v-col>
    </v-row>

    <v-divider></v-divider>

    <v-sheet class="pa-1" color="grey lighten-3" elevation="12">
        <!-- <v-sheet v-if="mapNoLoaded" class="mx-auto" height="500px" width="100%" style="z-index: 10;">
            Error al cargar al mapa
            <v-btn color="success" @click="loadMap">Reintentar</v-btn>
        </v-sheet> -->
        <v-sheet id="mapa" class="mx-auto" height="500px" width="100%"></v-sheet>
    </v-sheet>

    <v-snackbar v-model="cardsNoLoaded" color="red darken-3" class="toastSyle" top right multi-line>
        No se pudieron cargar los paquetes
        <v-btn dark text @click="cardsNoLoaded = false">
            Close
        </v-btn>
    </v-snackbar>
    <v-snackbar v-model="mapNoLoaded" color="red darken-3" class="toastSyle" top right multi-line>
        No se pudo cargar el mapa de google maps
        <v-btn dark text @click="mapNoLoaded = false">
            Close
        </v-btn>
    </v-snackbar>

</div>
</template>

<script>
import carousel from '../components/Carousel.vue';
import packagecard from '../components/PackageCard.vue';
import GoogleMapsManager from '../Plugins/GoogleMapsManager.js'
import axios from 'axios'

export default {
    data() {
        return {
            palapaPosition: {
                lat: 17.8633862,
                lng: -92.9250504
            },
            datosPaquetes: null,
            cardsNoLoaded: false,
            mapNoLoaded: false

        }
    },
    beforeMount() {
        this.loadMap()
    },
    components: {
        carousel,
        packagecard
    },
    methods: {
        getPosition: options => {
            return new Promise(function (resolve, reject) {
                navigator.geolocation.getCurrentPosition(resolve, reject, options);
            });
        },
        loadMap() {
            this.getPosition()
                .then((position) => {
                    let gmm = new GoogleMapsManager("mapa", {
                        zoom: 10,
                        center: new google.maps.LatLng(position.coords.latitude, position.coords.longitude)
                    })

                    gmm.drawMark(position.coords.latitude, position.coords.longitude, "Tu ubicacion")
                    gmm.drawMark(this.palapaPosition.lat, this.palapaPosition.lng, "Palapa Quetzal")
                    gmm.drawRoute({
                            lat: position.coords.latitude,
                            lng: position.coords.longitude
                        }, {
                            lat: this.palapaPosition.lat,
                            lng: this.palapaPosition.lng
                        },
                        "DRIVING")

                    this.mapNoLoaded = false
                })
                .catch((err) => {
                    console.error(err.message);
                    this.mapNoLoaded = true
                });

            axios.post("api/paquetes")
                .then(res => {
                    console.log(res.data.data)
                    this.datosPaquetes = res.data.data
                })
                .catch(err => {
                    console.error(err);
                    this.cardsNoLoaded = true
                })
        }
    }
}
</script>

<style lang="scss" scoped>
.toastSyle {
    font-size: 1.1em;
    font-family: 'comic sans ms', 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
}
</style>
