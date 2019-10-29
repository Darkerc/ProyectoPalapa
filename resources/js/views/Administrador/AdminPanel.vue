<template>
<div>

    <panelpaquetes
    :datosPaquetes="datosPaquetes"
    ></panelpaquetes>

     <v-tooltip bottom>
        <template v-slot:activator="{ on }">
            <v-sheet class="pa-1 mt-5" color="grey lighten-3" elevation="12">
                <v-btn color="info" class="btn-cont" v-on="on" :to="{ name:'adminNewP' }" block>
                    Añadir un nuevo paquete
                    <div class="create">
                        <v-icon size="40px">mdi-transfer-up</v-icon>
                    </div>
                </v-btn>
            </v-sheet>
        </template>
        <span>Añadir Paquete</span>
    </v-tooltip>

</div>
</template>

<script>
import panelpaquetes from '../../components/Administrador/PanelPaquetes.vue'

export default {
    data() {
        return {
            datosPaquetes: null
        }
    },
    components: {
        panelpaquetes
    },
    beforeMount() {
        this.getPackages()
    },
    methods: {
        async getPackages() {
            try {
                let { data } = await axios.post("/api/paquetes")
                this.datosPaquetes = data
                console.log(data)
            } catch (err) {
                console.error(err)
            }
        }
    },
}
</script>

<style lang="scss">
.btn-cont {
    .create {
        color: white;
        font-size: 1.5em;
        transition: all 250ms ease-in-out;
        margin-left: 1.1em;
    }

    &:hover {
        .create{
            transform: scale(1.2);
        }
    }
}
</style>
