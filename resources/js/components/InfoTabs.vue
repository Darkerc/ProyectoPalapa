<template>
  <div>
    <v-card color="basil">
      <v-card-title class="text-center justify-center py-6">
        <h1 class="font-weight-bold display-1 basil--text">Caracteristicas de la Palapa Quetzal</h1>
      </v-card-title>

      <v-tabs
        v-model="tab"
        background-color="transparent"
        color="basil"
        grow
        centered
        center-active
        show-arrows
      >
        <v-tab v-for="(item,i) in items" :key="i">{{ item.Nombre }}</v-tab>
      </v-tabs>

      <v-tabs-items v-model="tab">
        <v-tab-item v-for="(item,i) in items" :key="i">
          <div class="descripcion">{{ item.Descripcion }}</div>
          <v-row class="container_cols">
            <v-col cols="12" md="6" xl="4" v-for="(image, i) in item.ImgUrl" :key="i">
              <v-img
                :src="`/images/Informacion/${image}`"
                class="white--text align-end img_decoration"
                gradient="to bottom, rgba(0,0,0,.1), rgba(0,0,0,.5)"
                position="0 0"
                height="325px"
                @click="openDialogImage(`/images/Informacion/${image}`)"
              >
                <template v-slot:placeholder>
                  <v-row class="fill-height ma-0" align="center" justify="center">
                    <v-progress-circular indeterminate color="info"></v-progress-circular>
                  </v-row>
                </template>
              </v-img>
            </v-col>
          </v-row>
        </v-tab-item>
      </v-tabs-items>
    </v-card>
    <v-dialog v-model="dialog" width="90%" min-height="75%" dark>
      <v-card>
        <v-img
          :src="imageDialog"
          class="white--text align-end img_decoration"
          gradient="to bottom, rgba(0,0,0,.1), rgba(0,0,0,.5)"
          position="0 0"
          height="325px"
        >
          <template v-slot:placeholder>
            <v-row class="fill-height ma-0" align="center" justify="center">
              <v-progress-circular indeterminate color="info"></v-progress-circular>
            </v-row>
          </template>
          <div class="descripcion">Vista previa</div>
        </v-img>
        <v-divider></v-divider>
        <v-card-actions>
          <v-spacer></v-spacer>
          <v-btn color="white" text @click="dialog = false">Cerrar</v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>
  </div>
</template>

<script>
export default {
  data() {
    return {
      dialog: false,
      imageDialog:'',
      tab: null,
      items: [
        {
          Nombre: "Alberca y Chapoteadero",
          ImgUrl: [
            "Alberca_Chapoteadero/Alberca_Chapoteadero1.jpg",
            "Alberca_Chapoteadero/Alberca_Chapoteadero2.jpg",
            "Alberca_Chapoteadero/Alberca_Chapoteadero3.jpg"
          ],
          Descripcion: "Alberca para su uso recreativo"
        },
        {
          Nombre: "Baños",
          ImgUrl: ["Baños/Baños1.jpg", "Baños/Baños2.jpg"],
          Descripcion: "Disponibilidad de baños"
        },
        {
          Nombre: "Enfriador",
          ImgUrl: ["Enfriador/Enfriador1.jpg"],
          Descripcion: "Enfriador para productos varios"
        },

        {
          Nombre: "Estacionamiento",
          ImgUrl: [
            "Estacionamiento_Espacioso/Estacionamiento_Espacioso1.jpg",
            "Estacionamiento_Espacioso/Estacionamiento_Espacioso2.jpg",
            "Estacionamiento_Espacioso/Estacionamiento_Espacioso3.jpg",
            "Estacionamiento_Espacioso/Estacionamiento_Espacioso4.jpg"
          ],
          Descripcion: "Estacionamiento particular espacioso"
        },
        {
          Nombre: "Luces para Disco",
          ImgUrl: [
            "Luces_para_Disco/Luces_para_Disco1.jpg",
            "Luces_para_Disco/Luces_para_Disco2.jpg"
          ],
          Descripcion: "Luces de colores de ambientacion"
        },
        {
          Nombre: "Mesas",
          ImgUrl: ["Mesas/Mesas1.jpg"],
          Descripcion: "Mesas disponibles"
        },
        {
          Nombre: "Sillas",
          ImgUrl: ["Sillas/Sillas1.jpg"],
          Descripcion: "Sillas incluidas"
        },
        {
          Nombre: "Television",
          ImgUrl: ["Television/Television1.jpg"],
          Descripcion: "Televicion para recreacion"
        }
      ]
    };
  },
  methods: {
    openDialogImage(urlImage){
      this.imageDialog = urlImage
      this.dialog = true
    }
  },
};
</script>

<style lang="scss">
.basil {
  background-color: #fffbe6 !important;
}
.basil--text {
  color: #356859 !important;
}

.container_cols {
  box-sizing: border-box !important;
  padding: 5px;

  .img_decoration {
    border-radius: 5%;
    position: relative;
    transition: all 250ms ease-in-out;
    cursor: pointer;
    $shadowColor: rgb(100, 180, 255, 5);

    &:hover {
      transform: scale(1.1);
      box-shadow: 5px 5px 10px $shadowColor, 5px -5px 10px $shadowColor,
        -5px 5px 10px $shadowColor, -5px -5px 10px $shadowColor;

      z-index: 15;
      &:before {
        width: 100%;
      }

      &:after {
        width: 100%;
      }
    }

    &:before,
    &:after {
      content: "";
      position: absolute;
      transition: all 250ms ease-in-out;
      width: 0%;
      height: 5%;
      background-color: $shadowColor;
    }

    &:before {
      bottom: 5%;
      left: 0%;
    }

    &:after {
      top: 5%;
      right: 0%;
    }
  }
}

.descripcion {
  text-align: center;
  font-size: 25px;
  font-family: "comic sans ms", "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
  margin-top: 10px;
  margin-bottom: 10px;
  background-color: rgba(0,0,0,.25) !important;
}
</style>