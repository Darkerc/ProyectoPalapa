<template>
<div>
    <v-app>
        <navigation>
            <v-container>
                <router-view></router-view>
            </v-container>
            <footerpage></footerpage>
        </navigation>
    </v-app>
</div>
</template>

<script>
import footerpage from './components/FooterPage.vue';
import navigation from './components/Navigation.vue';

export default {
    components: {
        footerpage,
        navigation
    }
}
</script>
