<template>
<div>

    <options class="mb-3"></options>

    <panelpaquetes
    :datosPaquetes="datosPaquetes"
    ></panelpaquetes>

    <addpackage></addpackage>


</div>
</template>

<script>
import options from '../../components/Administrador/OptionsAdmin.vue'
import panelpaquetes from '../../components/Administrador/PanelPaquetes.vue'
import addpackage from '../../components/Administrador/AddPackage.vue'

export default {
    data() {
        return {
            datosPaquetes: null
        }
    },
    components: {
        options,
        panelpaquetes,
        addpackage
    },
    beforeMount() {
        this.getPackages()
    },
    methods: {
        getPackages() {
            axios.post("/api/paquetes")
                .then(res => {
                    console.log(res.data.data)
                    this.datosPaquetes = res.data.data
                })
                .catch(err => {
                    console.error(err);
                })
        }
    },
}
</script>
