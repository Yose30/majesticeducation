<template>
    <div>
        <b-row>
            <b-col sm="6">
                <div>
                    <b-button v-b-modal.modal-2><i class="fa fa-plus"></i> Nueva unidad</b-button>
                    <b-modal id="modal-2" title="Nueva unidad">
                        <b-form @submit.prevent="submitNewUnidad">
                            <label for="input-nombre-unidad">Nombre de la unidad</label>
                            <b-form-input v-model="unidad.nombre" id="input-nombre-unidad"></b-form-input>
                            <hr>
                            <div class="d-block text-right">
                                <b-button v-if="unidad.nombre.length > 6" type="submit" variant="success"><i class="fa fa-check"></i> Crear</b-button>
                            </div>
                        </b-form>
                    </b-modal>
                </div>
            </b-col>
            <b-col sm="6">
                <recursos-component></recursos-component>
            </b-col>
        </b-row>
        <b-tabs pills card vertical>
            <b-tab title="Inicio" active>
                <b-card-text></b-card-text>
            </b-tab>
            <b-tab v-for="seccion in secciones" :key="`dyn-tab-${seccion.slug}`" :title="`${seccion.seccion}`">
                <b-card-text>
                    {{ seccion.seccion }}
                </b-card-text>
            </b-tab>
        </b-tabs>
    </div>
</template>

<script>
    export default {
        name: 'app',
        props: ['secciones', 'clase_id'],
        data() {
            return {
               unidad: {
                   clase_id: this.clase_id,
                   nombre: '' 
               }
            }
        },
        methods: {
            submitNewUnidad(){
                console.log(this.unidad);
                axios.post('/profesor/nueva_unidad', this.unidad).then(response => {
                    console.log(response);
                })
                .catch(error => {
                    console.log(error.response)
                });
            }
        }
    }
</script>

<style>
    
</style>