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
                <recursos-component :seccion_id="seccion_id" @updateArchivos="updateA" @updateEnlaces="updateE"></recursos-component>
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
                    <b-list-group flush v-for="(archivo, i) in archivos" v-bind:key="i">
                        <b-list-group-item v-if="archivo.categoria_id == 1">
                            <b-row>
                                <b-col><a href="">{{ archivo.titulo }}</a></b-col>
                                <b-col class="text-right">
                                    <div class="d-block text-right">
                                        <a class="btn btn-outline-primary" :href="'/descargar_archivo/' + seccion_id + '/' + archivo.id">
                                            <i class="fa fa-download"></i>
                                        </a>
                                        <b-button variant="outline-warning" @click="editarRecurso(archivo)">
                                            <i class="fa fa-pencil"></i>
                                        </b-button>
                                        <b-button variant="outline-danger" @click="destroyArchivo(archivo, i)">
                                            <i class="fa fa-remove"></i>
                                        </b-button>
                                    </div>
                                </b-col>
                            </b-row>
                        </b-list-group-item>
                    </b-list-group>
                </b-card>
                <hr>
                <b-card no-body header="Audio">
                    <b-list-group flush v-for="(archivo, i) in archivos" v-bind:key="i">
                        <b-list-group-item v-if="archivo.categoria_id == 2">
                            <b-row>
                                <b-col><a href="">{{ archivo.titulo }}</a></b-col>
                                <b-col class="text-right">
                                    <div class="d-block text-right">
                                        <a class="btn btn-outline-primary" :href="'/descargar_archivo/' + seccion_id + '/' + archivo.id">
                                            <i class="fa fa-download"></i>
                                        </a>
                                        <b-button variant="outline-warning">
                                            <i class="fa fa-pencil"></i>
                                        </b-button>
                                        <b-button variant="outline-danger" @click="destroyArchivo(archivo, i)">
                                            <i class="fa fa-remove"></i>
                                        </b-button>
                                    </div>
                                </b-col>
                            </b-row>
                        </b-list-group-item>
                    </b-list-group>
                </b-card>
                <hr>
                <b-card no-body header="Videos">
                    <b-list-group flush v-for="(enlace, i) in enlaces" v-bind:key="i">
                        <b-list-group-item v-if="enlace.categoria_id == 3">
                            <b-row>
                                <b-col><a href="">{{ enlace.titulo }}</a></b-col>
                                <b-col class="text-right">
                                    <div class="d-block text-right">
                                        <b-button variant="outline-warning">
                                            <i class="fa fa-pencil"></i>
                                        </b-button>
                                        <b-button variant="outline-danger" @click="destroyEnlace(enlace, i)">
                                            <i class="fa fa-remove"></i>
                                        </b-button>
                                    </div>
                                </b-col>
                            </b-row>
                        </b-list-group-item>
                    </b-list-group>
                </b-card>
                <hr>
                <b-card no-body header="Enlaces">
                    <b-list-group flush v-for="(enlace, i) in enlaces" v-bind:key="i">
                        <b-list-group-item v-if="enlace.categoria_id == 4">
                            <b-row>
                                <b-col><a href="">{{ enlace.titulo }}</a></b-col>
                                <b-col class="text-right">
                                    <div class="d-block text-right">
                                        <b-button variant="outline-warning">
                                            <i class="fa fa-pencil"></i>
                                        </b-button>
                                        <b-button variant="outline-danger" @click="destroyEnlace(enlace, i)">
                                            <i class="fa fa-remove"></i>
                                        </b-button>
                                    </div>
                                </b-col>
                            </b-row>
                        </b-list-group-item>
                    </b-list-group>
                </b-card>
            </b-tab>
        </b-tabs>

        <b-modal id="modal-edit" title="Editar recurso">
            
        </b-modal>

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
               enlaces: [],
               show: false,
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
                this.seccion_id = null;
                this.archivos = [];
                this.enlaces = [];
                this.seccion_id = unidad.id;
                if(unidad.archivos != undefined){
                    this.archivos = unidad.archivos;
                }
                if(unidad.enlaces != undefined){
                    this.enlaces = unidad.enlaces;
                }
            },
            updateA(newArchivo){
                this.archivos.push(newArchivo);
                console.log(this.archivos);
            },
            updateE(newEnlace){
                this.enlaces.push(newEnlace);
                console.log(this.enlaces);
            },
            destroyArchivo(archivo, i){
                axios.delete('/profesor/borrar_archivo', {params: {seccion_id: this.seccion_id, id: archivo.id}}).then(response => {
                    this.archivos.splice(i, 1);
                });
            },
            destroyEnlace(enlace, i){
                axios.delete('/profesor/borrar_enlace', {params: {seccion_id: this.seccion_id, id: enlace.id}}).then(response => {
                    this.enlaces.splice(i, 1);
                });
            },
            editarRecurso(archivo){
                // $bvModal.show('modal-edit')
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