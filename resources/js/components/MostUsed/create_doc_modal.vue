<template>
  <div class="modal" :class="{'active': show_modal}" :id="modal_name" tabindex="-1" role="dialog"
       :aria-labelledby="modal_name+'Label'"
       :aria-hidden="!show_modal">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h2>{{ template.title }}</h2>
          <a class="close" @click="$emit('update:show_modal', false)">
            <span class="download-modal-close close">&times;</span>
          </a>
        </div>
        <div style="font-size: 1rem" class="modal-body">
          <div v-html="template.explanation"></div>
          <div>Preis pro Dokument: {{template.price < 0.03 ? 'Kostenlos' : template.price+' CHF'}}</div>
          <p>Haben Sie die richtige Vorlage gefunden? Starten Sie die smarte Abfrage <a target="_blank" href="https://app.dokumentengenerator.ch/login">mit Login</a> oder ohne.</p>
        </div>
        <div class="modal-footer">
          <a class="button-secondary" @click="$emit('update:show_modal', false)">weiter suchen</a>
          <a class="button" target="_blank" :href="'https://app.dokumentengenerator.ch/template/'+template.id+'/survey_start'">Abfrage starten</a>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "LandingCreateDocModal",
  props: {
    modal_name: String,
    template: Object,
    show_modal: Boolean,
  },
  methods: {
    async createTemp() {
      var data = {
        template_id: this.template.id,
        without: true,
      };
      await axios.post('https://app.dokumentengenerator.ch/api/document/create', data).then(response => {
        window.location.href = response.data.route;
      }).catch(error => {
        this.errors = error.response.data.error;
      });
    },
  }
}
</script>