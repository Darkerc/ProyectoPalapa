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
        async loadInfo() {
            try {
                let { data } = await axios.post("/api/paquetes")
                this.datosPaquetes = data
                console.log(data)
            } catch (err) {
                console.error(err)
                 this.$toasted.success("A ocurrido un problemas al cargar los paquetes", {
                    type:"error",
                    theme: "outline",
                    position: "top-right",
                    duration: 5000
                })
            }
        }
    },
}
</script>
