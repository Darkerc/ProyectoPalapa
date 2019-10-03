<template>
<div>
<v-card class="mx-auto my-5" :color="paquete.Color">
    <v-img class="white--text" height="200px" :src="paquete.URLImagen">
        <v-card-title class="align-end fill-height p-0" color="rgba(0,0,0,.5)">
            <div class="back">
             Paquete {{ index+1 }}
            </div>
        </v-card-title>
    </v-img>

    <v-card-text>
        <span class="title white--text">{{ paquete.NombrePaquete }}</span><br>
        <span class="white--text">
            <span>Precio ${{ paquete.Precio }}</span>
        </span>
    </v-card-text>

    <v-card-actions>
        <v-btn text color="white" :to="`/Paquetes#${paquete.NombrePaquete}`" block outlined>
            Ver detalles
        </v-btn>
    </v-card-actions>
</v-card>
</div>
</template>

<script>
export default {
    name: "PackageCard",
    props:{
        paquete: Object,
        index: Number
    }
}
</script>

<style scoped>
    .back{
        box-sizing: border-box;
        padding: .8em !important;
        background-color: rgba(0, 0, 0, 0.5);
        width: 100%;
        margin: auto auto 0 auto;
    }
</style>
