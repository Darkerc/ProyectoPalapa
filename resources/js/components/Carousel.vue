<template>
    <v-carousel cycle>
        <v-carousel-item
        v-for="(dato, i) in datosCarousel"
        :key="i"
        :src="dato.src">

        <v-sheet
        height="100%"
        color="rgba(0,0,0,.2)">
            <v-row
            class="fill-height"
            align="end"
            justify="center">
            <div class="display-1 pb-5 mb-5 text-center"> {{ dato.descripcion }} </div>
            </v-row>
        </v-sheet>

        </v-carousel-item>
    </v-carousel>
</template>

<script>
export default {
    name:"carousel",
    data() {
        return {
            datosCarousel: [
                { src: "/images/carousel1.jpeg" , descripcion:"Lugar espacioso" },
                { src: "/images/carousel2.jpeg" , descripcion:"Eventos personalisados"},
                { src: "/images/carousel3.jpeg" , descripcion:"Decoracion opcional"},
                { src: "/images/carousel4.jpeg" , descripcion:"Eventos noctunos"},
                { src: "/images/carousel5.jpeg" , descripcion:"Servicios de comida"}
            ]
        }
    }
}
</script>

<style lang="scss">

</style>
