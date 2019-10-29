<template>
<div class="cont-calendar scroll-info">
    <calendar
    @click:date="showModalDate"
    style="min-width: 1000px;"
    />
</div>
</template>

<script>
import calendar from '../../components/Administrador/Calendar.vue'

export default {
    components: {
        calendar
    },
    methods: {
        showModalDate(date) {
            console.log(date)
        },
    },
}
</script>

<style lang="scss">
.cont-calendar{
    $bordeColor : rgb(170, 170, 170);

    margin-top: 100px;
    margin-bottom: 100px;
    overflow-x: auto;
    box-shadow: 5px 5px 5px $bordeColor,
                -5px -5px 5px $bordeColor;
}

</style>
