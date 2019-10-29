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
            datosPaquetes: null
        }
    },
    beforeMount() {
        this.loadPackage()
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
        async loadMap() {
            try {
                let { coords } = await this.getPosition()
                let gmm = new GoogleMapsManager("mapa", {
                    zoom: 10,
                    center: new google.maps.LatLng(coords.latitude,coords.longitude)
                })

                gmm.drawMark(coords.latitude,coords.longitude, "Tu ubicacion")
                gmm.drawMark(this.palapaPosition.lat, this.palapaPosition.lng, "Palapa Quetzal")
                gmm.drawRoute({
                    lat: coords.latitude,
                    lng: coords.longitude
                },
                {
                    lat: this.palapaPosition.lat,
                    lng: this.palapaPosition.lng
                },
                "DRIVING")
            } catch (err) {
                console.error(err)
            }


        },
        async loadPackage(){
            try{
                let { data } = await axios.post("/api/paquetes")
                this.datosPaquetes = data
                console.log(data)
            }catch(err){
                console.error(err)
                this.$toasted.success("A ocurrido un problema al cargar los paquetes", {
                    type:"error",
                    theme: "outline",
                    position: "top-right",
                    duration: 5000
                })
            }
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
