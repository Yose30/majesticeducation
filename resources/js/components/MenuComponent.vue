<template>
    <div>
        <b-row>
            <b-col sm="6">
                <b-button v-b-modal.modal-2 id="btnNuevaUnidad"><i class="fa fa-plus"></i> Nueva unidad</b-button>
                <b-modal id="modal-2" title="Nueva unidad">
                    <b-form @submit.prevent="submitNewSeccion">
                        <label for="input-nombre-unidad">Nombre de la unidad</label>
                        <b-form-input v-model="seccion.seccion" id="input-nombre-unidad"></b-form-input>
                        <hr>
                        <div class="d-block text-right">
                            <b-button v-if="seccion.seccion.length > 6" type="submit" variant="success"><i class="fa fa-check"></i> Crear</b-button>
                        </div>
                    </b-form>
                    <div slot="modal-footer">
                        <b-alert show dismissible v-if="respuestaUnidad">
                            <i class="fa fa-check"></i> Unidad creada
                        </b-alert>
                    </div>
                </b-modal>
            </b-col>
            <b-col sm="6">
                <recursos-component :seccion_id="seccion_id" @updateArchivos="update"></recursos-component>
            </b-col>
        </b-row>
        <b-tabs pills card vertical nav-wrapper-class="w-25">
            <b-tab title="Inicio" active @click="seccion_id = null">
                
            </b-tab>
            <b-tab 
                v-for="unidad in unidades" 
                :key="`dyn-tab-${unidad.slug}`" 
                :title="`${unidad.seccion}`" 
                @click="getContenido(unidad)">
                <b-card no-body header="Archivos">
                    <b-list-group flush v-for="archivo in archivos" :key="archivo.id">
                        <b-list-group-item href="#" v-if="archivo.categoria_id == 1">
                            {{ archivo.titulo }}
                        </b-list-group-item>
                    </b-list-group>
                </b-card>
                <hr>
                <b-card no-body header="Audio">
                    <b-list-group flush v-for="archivo in archivos" :key="archivo.id">
                        <b-list-group-item href="#" v-if="archivo.categoria_id == 2">
                            {{ archivo.titulo }}
                        </b-list-group-item>
                    </b-list-group>
                </b-card>
                <hr>
                <b-card no-body header="Enlaces">
                    <b-list-group flush v-for="enlace in unidad.enlaces" :key="enlace.id">
                        <b-list-group-item href="#">
                            {{ enlace.titulo }}
                        </b-list-group-item>
                    </b-list-group>
                </b-card>
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
               seccion: {
                   clase_id: this.clase_id,
                   seccion: '' 
               },
               unidades: this.secciones,
               seccion_id: null,
               respuestaUnidad: false,
               archivos: [],
            }
        },
        methods: {
            submitNewSeccion(){
                axios.post('/profesor/nueva_unidad', this.seccion).then(response => {
                    this.unidades.push(response.data);
                    this.seccion = { clase_id: this.clase_id, seccion: '' };
                    this.respuestaUnidad = true;
                })
                .catch(error => {
                    console.log(error.response)
                });
            },
            getContenido(unidad){
                this.seccion_id = unidad.id;
                this.archivos = unidad.archivos;
            },
            update(newArchivo){
                this.archivos.push(newArchivo);
            }
        }
    }
</script>

<style>
    #btnNuevaUnidad{
        background-color: transparent;
        border: none;
        color: black;
    }
    #btnNuevaUnidad > i {
        color: #229421;
    }
    .nav .nav-link{
        color:#d91c5c;
        font-style:bold;
    }
    .nav .nav-link:hover{
        color:#7d4f9d;
        font-style:bold;
    }
    .nav-pills .nav-link.active,
    .show>.nav-pills .nav-link{
        background: #7d4f9d !important
    }
</style>