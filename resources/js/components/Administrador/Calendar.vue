<template>
  <div class="p-3">
    <v-sheet height="64">
      <v-toolbar flat color="white" class="d-flex justify-content-around">
        <v-btn outlined class="mr-4" @click="setToday">Dia actual</v-btn>
        <v-btn fab text @click="prev">
          <v-icon large>mdi-chevron-left</v-icon>
        </v-btn>
        <v-btn fab text @click="next">
          <v-icon large>mdi-chevron-right</v-icon>
        </v-btn>
        <v-toolbar-title>{{ title.toUpperCase() }}</v-toolbar-title>
        <div class="flex-grow-1"></div>
      </v-toolbar>
    </v-sheet>
    <v-sheet height="500">
      <v-calendar
        ref="calendar"
        v-model="focus"
        color="primary"
        :event-margin-bottom="3"
        :now="today"
        type="month"
        @click:more="viewDay"
        @change="updateRange"
        @click:date="viewDay"
        :events="events"
        :event-color="getEventColor"
        :event-height="40"
      ></v-calendar>
      <v-menu
        v-model="selectedOpen"
        :close-on-content-click="false"
        :activator="selectedElement"
        offset-x
      >
        <v-card color="grey lighten-4" min-width="350px" flat>
          <v-toolbar :color="selectedEvent.color" dark>
            <v-btn icon>
              <v-icon>mdi-pencil</v-icon>
            </v-btn>
            <v-toolbar-title v-html="selectedEvent.name"></v-toolbar-title>
            <div class="flex-grow-1"></div>
            <v-btn icon>
              <v-icon>mdi-heart</v-icon>
            </v-btn>
            <v-btn icon>
              <v-icon>mdi-dots-vertical</v-icon>
            </v-btn>
          </v-toolbar>
          <v-card-text>
            <span v-html="selectedEvent.details"></span>
          </v-card-text>
          <v-card-actions>
            <v-btn text color="secondary" @click="selectedOpen = false">Cancel</v-btn>
          </v-card-actions>
        </v-card>
      </v-menu>
    </v-sheet>
    <CalendarOptions
      :Event="EventFound"
      :DateData="formFields"
      :dialogForm="dialogForm"
      @CloseDialog="resetDialog"
      @DeleteEvent="DeleteEvent"
      @CreateEvent="AddEvent"
    ></CalendarOptions>
  </div>
</template>

<script>
import axios from "axios";
import CalendarOptions from "./CalendarOptions.vue";

export default {
  data: () => ({
    today: "",
    focus: "",
    type: "month",
    events: [],
    typeToLabel: {
      month: "Month",
      week: "Week",
      day: "Day",
      "4day": "4 Days"
    },
    start: null,
    end: null,
    selectedEvent: {},
    selectedElement: null,
    selectedOpen: false,
    formFields: {},
    dialogForm: false,
    EventFound: null
  }),
  components: {
    CalendarOptions
  },
  computed: {
    title() {
      const { start, end } = this;
      if (!start || !end) {
        return "";
      }

      const startMonth = this.monthFormatter(start);
      const endMonth = this.monthFormatter(end);
      const suffixMonth = startMonth === endMonth ? "" : endMonth;

      const startYear = start.year;
      const endYear = end.year;
      const suffixYear = startYear === endYear ? "" : endYear;

      const startDay = start.day + this.nth(start.day);
      const endDay = end.day + this.nth(end.day);

      switch (this.type) {
        case "month":
          return `${startMonth} ${startYear}`;
        case "week":
        case "4day":
          return `${startMonth} ${startDay} ${startYear} - ${suffixMonth} ${endDay} ${suffixYear}`;
        case "day":
          return `${startMonth} ${startDay} ${startYear}`;
      }
      return "";
    },
    monthFormatter() {
      return this.$refs.calendar.getFormatter({
        timeZone: "UTC",
        month: "long"
      });
    }
  },
  mounted() {
    this.$refs.calendar.checkChange();
  },
  beforeMount() {
    this.getCurrentDate();
    this.loadEvents();
  },
  methods: {
    getEventColor(event) {
      return event.color;
    },
    setToday() {
      this.focus = this.today;
    },
    prev() {
      this.$refs.calendar.prev();
    },
    next() {
      this.$refs.calendar.next();
    },
    updateRange({ start, end }) {
      // You could load events from an outside source (like database) now that we have the start and end dates on the calendar
      this.start = start;
      this.end = end;
    },
    nth(d) {
      return d > 3 && d < 21
        ? "th"
        : ["th", "st", "nd", "rd", "th", "th", "th", "th", "th", "th"][d % 10];
    },
    viewDay(day) {
      this.focus = day.date;
      this.formFields = day;
      this.events.forEach(evento => {
        if (day.date == evento.start) {
          this.EventFound = evento;
          console.log(evento);
        }
      });
      this.dialogForm = true;
    },
    getCurrentDate() {
      var today = new Date();
      var dd = String(today.getDate()).padStart(2, "0");
      var mm = String(today.getMonth() + 1).padStart(2, "0"); //January is 0!
      var yyyy = today.getFullYear();

      today = `${yyyy}-${mm}-${dd}`;
      this.today = today;
      this.focus = today;

      return today;
    },
    async loadEvents() {
      try {
        let { data } = await axios.post("/api/eventos");
        data.forEach(evento => {
          this.events.push({
            id: evento.id,
            name: evento.Nombre_del_evento,
            start: evento.Fecha_De_Inicio,
            Arrendatario: evento.Arrendatario,
            Anticipo: evento.Anticipo,
            color: this.colorEventDate(evento.Fecha_De_Inicio)
          });
        });
      } catch (error) {
        console.error(error);
        this.$toasted.error("A ocurrido un al obtener los eventos", {
          type: "error",
          theme: "outline",
          position: "top-right",
          duration: 5000
        });
      }
    },
    resetDialog() {
      this.dialogForm = !this.dialogForm;
      this.EventFound = null;
    },
    DeleteEvent(index) {
      let eventIndex = this.events.indexOf(index);
      this.events.splice(eventIndex, 1);
    },
    AddEvent(evento) {
      console.log(evento);
      this.events.push({
        id: evento.id,
        name: evento.Nombre_del_evento,
        start: evento.Fecha_De_Inicio,
        Arrendatario: evento.Arrendatario,
        Anticipo: evento.Anticipo,
        color: this.colorEventDate(evento.Fecha_De_Inicio)
      });
    },
    colorEventDate(date) {
      let fechaActual = new Date();
      let fechaEvento = new Date(date);
      fechaEvento.setDate(fechaEvento.getDate()+1)

      if (fechaActual <= fechaEvento) {
        return "blue lighten-1";
      } else {
        return "red lighten-1";
      } 
    }
  }
};
</script>

<style lang="scss">
.v-calendar-weekly__day {
  position: relative;
  display: flex;
  flex-direction: column;

  .v-calendar-weekly__day-label {
    margin: 0 !important;
    min-width: 100%;
    min-height: 40%;
    display: flex;
    justify-content: center;
    align-items: center;
    cursor: initial !important;

    .v-btn__content {
      min-width: 100% !important;
      font-size: 25px;
    }
  }

  .v-event {
    margin: 0 0 auto 0 !important;
    min-width: 100%;
    min-height: 60%;

    .pl-1 {
      width: 100%;
      height: 100%;
      font-size: 1.5em !important;
      text-align: center;
      white-space: normal !important;
      padding: 0 !important;
      // margin:auto 0 !important;
    }
  }
}
</style>
