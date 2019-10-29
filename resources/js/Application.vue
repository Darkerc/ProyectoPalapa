<template>
<div>
    <v-app>
        <navigation>
            <options v-if="$auth.check()" class="mt-3 mb-3"></options>
            <v-container>
                <transition name="default">
                    <router-view></router-view>
                </transition>
            </v-container>
            <footerpage></footerpage>
        </navigation>
    </v-app>
</div>
</template>

<script>
import options from './components/Administrador/OptionsAdmin.vue'
import footerpage from './components/FooterPage.vue';
import navigation from './components/Navigation.vue';


export default {
    components: {
        options,
        footerpage,
        navigation
    }
}
</script>
