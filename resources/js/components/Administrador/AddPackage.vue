<template>
<div>

    <v-tooltip bottom>
        <template v-slot:activator="{ on }">
            <v-sheet class="pa-3 mt-5" color="grey lighten-3" elevation="12">
                <v-btn icon v-on="on" @click="dialog = true">
                    <v-icon size="40px">mdi-transfer-up</v-icon>
                </v-btn>
            </v-sheet>
        </template>
        <span>Añadir Paquete</span>
    </v-tooltip>

    <v-dialog v-model="dialog" max-width="80%" max-height="80%" scrollable dark>
        <v-card color="">
            <v-card-title class="headline titleStyle"></v-card-title>
            <v-divider class="pt-3"></v-divider>
            <v-card-text class="scroll-info m-0 p-0">
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
    data() {
        return {
            dialog: false
        }
    },
    methods: {
        emitir() {
            this.$emit("reload", true);
        }
    }
}
</script>
