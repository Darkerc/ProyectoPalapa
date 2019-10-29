<template>
  <div>
    <InfoTabs></InfoTabs>
    <v-sheet class="pa-4 my-6" color="grey lighten-3" elevation="12">
      <v-card>
        <v-img
          src="/images/Croquis.png"
          aspect-ratio="646x353px"
          class="grey lighten-2"
          width="100%"
          height="350px"
          contain
        ></v-img>
        <v-card-title primary-title class="title_card">Croquis de Palapa Quetzal</v-card-title>
      </v-card>
    </v-sheet>
    <v-alert
      type="info"
      :value="true"
      class="title"
    >Las caracteristicas mostradas pertenecen a todos los paquetes disponibles!</v-alert>
  </div>
</template>

<script>
import InfoTabs from "../components/InfoTabs.vue";

export default {
  components: {
    InfoTabs
  }
};
</script>

<style scoped>
.title,.title_card {
  font-size: 20px !important;
  font-family: "comic sans ms", "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
  font-weight: 100;
  text-align: center;
  margin-top: 10px;
}

.title_card {
  background-color: rgba(0, 0, 0, 0.25);
  margin: 0 !important;
}
</style>
