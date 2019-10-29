<template>
<div>
    <v-card>
        <v-app-bar id="app-bar" color="#43a047" dark shrink-on-scroll prominent src="/images/BannerApp.jpeg" fade-img-on-scroll scroll-target="#scrolling-techniques-5" scroll-threshold="500" :tile="false">
            <template v-slot:img="{ props }">
                <v-img v-bind="props" gradient="to top right, rgba(55,236,186,.7), rgba(25,32,72,.7)"></v-img>
            </template>

            <v-app-bar-nav-icon @click="drawer = !drawer"></v-app-bar-nav-icon>

            <v-toolbar-title class="headline">Palapa Quetzal</v-toolbar-title>

            <div class="flex-grow-1"></div>

            <v-btn v-if="!$auth.check()" icon :to="{ name: 'admin'}">
                <v-icon size="2.5em">mdi-account</v-icon>
            </v-btn>

            <v-btn v-if="$auth.check()" icon :to="{ name:'adminNewUser' }">
                <v-icon size="2.5em">mdi-account-plus</v-icon>
            </v-btn>

            <v-btn v-if="$auth.check()" icon :to="{ name: 'adminPanel'}">
                <v-icon size="2.5em">mdi-database</v-icon>
            </v-btn>

            <!--  -->

        </v-app-bar>
        <v-sheet id="scrolling-techniques-5" class="overflow-y-auto scroll-info overflow-x-overflow-x-hidden">
            <slot></slot>
        </v-sheet>
    </v-card>
    <v-navigation-drawer app temporary dark id="navigation-drawer" v-model="drawer" color="#43a047">
        <v-img :aspect-ratio="16/9" src="/images/logo-pq.jpeg">
        </v-img>
        <v-list two-line class="list-cont remove-underline">
            <v-list-item-group v-model="group" active-class="">
                <v-list-item :to="{ name: 'index'}">
                    <v-list-item-content>
                        <v-list-item-title class="title">
                            Inicio
                        </v-list-item-title>
                    </v-list-item-content>
                </v-list-item>

                <v-divider></v-divider>

                <v-list-item :to="{ name: 'paquetes'}">
                    <v-list-item-content>
                        <v-list-item-title class="title">
                            Paquetes
                        </v-list-item-title>
                    </v-list-item-content>
                </v-list-item>

                <v-divider></v-divider>

                <v-list-item :to="{ name: 'informacion'}">
                    <v-list-item-content>
                        <v-list-item-title class="title">
                            Informacion
                        </v-list-item-title>
                    </v-list-item-content>
                </v-list-item>

                <v-divider></v-divider>
            </v-list-item-group>
        </v-list>
    </v-navigation-drawer>
</div>
</template>

<script>
export default {
    data() {
        return {
            drawer: false,
            group: null
        }
    },
    watch: {
        group() {
            this.drawer = false
        }
    }

}
</script>

<style lang="scss" scoped>
#scrolling-techniques-5 {
    max-height: calc( 100vh - 56px );
    min-height: calc( 100vh - 128px );
    display: flex;
    flex-direction: column;
    max-width: 100vw !important;
    overflow-x: hidden !important;
}

#app-bar {
    z-index: 10;

    .headline {
        font-family: "comic sans ms", 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif !important;
    }
}

#navigation-drawer {
    z-index: 11;

    .title {
        font-family: "comic sans ms", 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif !important;
    }

    .list-cont {
        height: auto;
    }

    .v-navigation-drawer__content{
        display: flex !important;

    }

}

</style>
