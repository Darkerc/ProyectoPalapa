<template>
<v-footer dark padless class="flex-end">
    <v-card flat tile class="indigo lighten-1 white--text text-center pb-1">
        <v-card-text>
            <v-btn v-for="(items, i)  in socialItems" :key="i" class="mx-4 white--text" icon :href="items.link" target="_blank">
                <v-icon size="24px">{{ items.icon }}</v-icon>
            </v-btn>
        </v-card-text>

        <v-card-text class="white--text pt-0">
            Phasellus feugiat arcu sapien, et iaculis ipsum elementum sit amet. Mauris cursus commodo interdum. Praesent ut risus eget metus luctus accumsan id ultrices nunc. Sed at orci sed massa consectetur dignissim a sit amet dui. Duis commodo vitae velit et faucibus. Morbi vehicula lacinia malesuada. Nulla placerat augue vel ipsum ultrices, cursus iaculis dui sollicitudin. Vestibulum eu ipsum vel diam elementum tempor vel ut orci. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.
        </v-card-text>

        <v-card-text class="white--text">
            {{ new Date().getFullYear() }} — <strong>Palapa Quetzal</strong>
        </v-card-text>
    </v-card>
</v-footer>
</template>

<script>
export default {
    name: "footerpage",
    data: () => ({
        socialItems: [{
                icon: 'fab fa-facebook',
                link: "https://www.facebook.com/palapa.quetzal.9"
            },
            {
                icon: 'fab fa-whatsapp',
                link: "https://api.whatsapp.com/send?phone=9934037098"
            }
        ],
    })
}
</script>

<style>
    .flex-end{
        margin-top:auto;
        justify-self: self-end;
    }
</style>
