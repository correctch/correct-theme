<template>
  <div class="row mx-0 px-0 justify-content-center">
    <div class="col-10 col-xs-5 col-sm-5 col-md-4 col-lg-3 col-xl-2 col-xxl-2 p-2 "
         v-for="(template, index) in templates" :key="'template'+template.id">
      <div class="doc-wrapper" @click="openModal(index)">
        <div class="doc-image">
          <img :src="asset">
        </div>
        <div class="doc-info">
          <p class="doc-title mb-0">{{ template.title }}</p>
          <p class="doc-type">Thema: {{ template.topic.title }}</p>
        </div>
        <button class="btn btn-primary btn-block mb-2" @click="openModal(index)">Mehr erfahren</button>
      </div>
    </div>
    <landing-create-doc-modal :modal_name="modal_name" :template="tempTemp"
                              :create_route="create_route"></landing-create-doc-modal>
  </div>
</template>

<script>
import LandingCreateDocModal from "./create_doc_modal";

export default {
  name: "most-used-templates.vue",
  components: {LandingCreateDocModal},
  data() {
    return {
      create_route: '',
      asset: '',
      templates: [],
      tempTemp: {
        title: '',
        explanation: '',
        id: -1,
      },
      modal_name: 'templateModal',
      new_doc: {
        name: '',
        case_number: '',
      },
      errors: {},
    }
  },
  mounted() {
   this.getData();
  },
  methods: {
    async getData(){
      let prefix =  'https://app.dokumentengenerator';
      await axios.post(prefix+'/api/templates/favourites', {})
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
      $('#' + this.modal_name).modal('show');
    },
  },
}
</script>
