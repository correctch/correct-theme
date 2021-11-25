<template>
  <div class="doc-group">
    <div class="docs" v-for="(template, index) in templates" :key="'template'+template.id">
      <div class="card card-white doc-wrapper" @click="openModal(index)">
        <div class="image-wrapper doc-image">
          <img :src="asset">
        </div>
        <div class="card-content">
          <p><b>{{ template.title }}</b></p>
          <p>Thema: {{ template.topic.title }}</p>
          <a target="#" class="button card-link" @click="openModal(index)">jetzt Dokument erstellen</a>
        </div>
      </div>
    </div>
    <landing-create-doc-modal :show_modal.sync="showModal"
                              :modal_name="modal_name"
                              :template="tempTemp">
    </landing-create-doc-modal>
  </div>
</template>

<script>
import LandingCreateDocModal from "./create_doc_modal";

export default {
  name: "most-used-templates.vue",
  components: {LandingCreateDocModal},
  props: {
    asset: String,
    limit: String,
  },
  data() {
    return {
      templates: [],
      tempTemp: {
        title: '',
        explanation: '',
        id: -1,
      },
      modal_name: 'templateShowModal',
      new_doc: {
        name: '',
        case_number: '',
      },
      showModal: false,
      errors: {},
    }
  },
  mounted() {
    this.getData();
  },
  methods: {
    async getData() {
      let prefix = 'https://app.dokumentengenerator.ch';
      await axios.post(prefix + '/api/templates/favourites', {limit: this.limit})
          .then(response => {
            this.templates = response.data.templates;
          })
          .catch(error => {
            console.log(error);
          })
    },
    openModal(index) {
      this.tempTemp = null;
      this.tempTemp = this.templates[index];
      this.showModal = true;
    },
  },
}
</script>
