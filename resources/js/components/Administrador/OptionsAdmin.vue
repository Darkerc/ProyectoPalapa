<template>
<div>
    <v-bottom-navigation :value="activeBtn" color="white" grow background-color="green lighten-2" dark>
        <v-btn tile :to="{ name:'adminPanel' }">
            <span class="title">Paquetes</span>
            <v-icon>mdi-shopping</v-icon>
        </v-btn>

        <v-btn>
            <span class="title">Fechas</span>
            <v-icon>mdi-calendar-clock</v-icon>
        </v-btn>

        <v-btn @click.prevent="$auth.logout()">
            <span class="title">Cerrar sesion</span>
            <v-icon>mdi-account-off</v-icon>
        </v-btn>
    </v-bottom-navigation>
</div>
</template>

<script>
export default {
    data() {
        return {
            activeBtn: 0,
        }
    }
}
</script>
