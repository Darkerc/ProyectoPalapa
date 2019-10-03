<template>
<div>
    <v-row>
        <v-col sm="12" md="6" v-for="(paquete, i) in datosPaquetes" :key="i">
            <paqueteitem :datosProducto="paquete">
            </paqueteitem>
        </v-col>
    </v-row>
</div>
</template>

<script>
import paqueteitem from '../components/PackageItem.vue'
import axios from 'axios'

export default {
    components: {
        paqueteitem
    },
    data() {
        return {
            datosPaquetes: null
        }
    },
    beforeMount() {
        this.loadInfo()
    },
    methods: {
        loadInfo() {
            axios.post("/api/paquetes")
                .then(res => {
                    console.log(res.data.data)
                    this.datosPaquetes = res.data.data
                })
                .catch(err => {
                    console.error(err);
                })
        },
    },
}
</script>
