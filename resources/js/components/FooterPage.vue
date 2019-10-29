<template>
<v-footer dark padless class="container_footer">
    <v-card flat tile class="indigo lighten-1 white--text text-center pb-1 w-100">
        <v-card-text>
            <v-btn v-for="(items, i)  in socialItems" :key="i" class="socialBtn mx-4 white--text bg-white" icon :href="items.link" target="_blank" :color="items.color">
                <v-icon size="40px" :color="items.color">{{ items.icon }}</v-icon>
            </v-btn>
        </v-card-text>

        <v-card-text class="white--text pt-0">
            <div>
                Palapa Quetzal - Visitanos en el Kilómetro carretera Villahermosa-Teapa, Tabasco, México.
            </div>
            <div>
                Para dudas, sugerencias o soporte contactanos al 
                <strong>
                    <a href="mailto:aero999@outlook.es" class="email">aero999@outlook.es</a>
                </strong> 
            </div>
        </v-card-text>

        <v-card-text class="white--text">
            {{ new Date().getFullYear() }} — <strong> Palapa Quetzal</strong>
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
                link: "https://www.facebook.com/palapa.quetzal.9",
                color:"#3b5998"
            },
            {
                icon: 'fab fa-whatsapp',
                link: "https://api.whatsapp.com/send?phone=9934037098",
                color:"#25d366"
            }
        ],
    })
}
</script>

<style lang="scss">
    .container_footer{
        margin-top:auto;
        justify-self: self-end;
        min-width: 100vw;

        .email{
            color: white;
            text-decoration: none;
        }

        .socialBtn{
            &:hover{
                transform: scale(1.3);
                animation-duration: 1s;
                animation-name: vibrar;
            }
        }
    }

    @keyframes vibrar{
        20%{
            transform: rotate(5deg);
        }
        40%{
            transform: rotate(-15deg);
        }
        60%{
            transform: rotate(15deg);
        }
        80%{
            transform: rotate(-15deg);
        }
        100%{
            transform: rotate(5deg);
        }
    }
</style>
