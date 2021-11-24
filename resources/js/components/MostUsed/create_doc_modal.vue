<template>
    <div class="modal fade" :id="modal_name" tabindex="-1" role="dialog"
         :aria-labelledby="modal_name+'Label'"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" :id="modal_name+'Label'">{{ template.title }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div style="font-size: 1rem" class="modal-body">
                    <div v-html="template.explanation"></div>
                    <p>Haben Sie die richtige Vorlage gefunden? Starten Sie die smarte Abfrage mit oder ohne
                        Login.</p>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" data-dismiss="modal">weiter suchen</button>
                    <button class="btn btn-primary" @click="createTemp">Abfrage starten</button>
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
        create_route: String,
    },
    methods: {
        async createTemp() {
            var data = {
                template_id: this.template.id,
                without: true,
            };
            await axios.post(this.create_route, data).then(response => {
                window.location.href = response.data.route;
            }).catch(error => {
                this.errors = error.response.data.error;
            });
        },
    }
}
</script>

<style scoped>

</style>
