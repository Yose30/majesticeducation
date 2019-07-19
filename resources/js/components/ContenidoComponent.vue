<template>
    <div>
        <b-row>
            <b-col sm="3">
                <b-button v-b-modal.modal-2 id="btnNuevaUnidad" @click="nuevaUnidad"><i class="fa fa-plus"></i> Nueva unidad</b-button>
                <b-modal id="modal-2" title="Nueva unidad">
                    <b-form @submit.prevent="submitNewSeccion">
                        <label for="input-nombre-unidad">Nombre de la unidad</label>
                        <b-form-input v-model="seccion.seccion" :disabled="processing" id="input-nombre-unidad"></b-form-input>
                        <div v-if="errors && errors.seccion" class="text-danger">{{ errors.seccion[0] }}</div>
                        <hr>
                        <div class="d-block text-right">
                            <b-button 
                                v-if="seccion.seccion.length > 5" 
                                type="submit" 
                                :disabled="processing"
                                variant="success">
                                <i class="fa fa-check"></i> {{ !processing ? 'Crear' : 'Creando' }} <b-spinner v-if="processing" small type="grow"></b-spinner>
                            </b-button>
                        </div>
                    </b-form>
                    <div slot="modal-footer">
                        <b-alert show dismissible variant="success" v-if="status && respuestaUnidad != '' && !processing">
                            <i class="fa fa-check"></i> {{ respuestaUnidad }}
                        </b-alert>
                        <b-alert show dismissible variant="danger" v-if="!status && respuestaUnidad != '' && !processing">
                            <i class="fa fa-info"></i> {{ respuestaUnidad }}
                        </b-alert>
                    </div>
                </b-modal>
            </b-col>
            <b-col sm="5">
                <recursos-component 
                    :seccion_id="seccion.id" 
                    @updateArchivos="updateA" 
                    @updateEnlaces="updateE">
                </recursos-component>
            </b-col>
            <b-col sm="4" v-if="seccion.id != null" class="text-right">
                <b-button variant="warning" @click="editarU = true"><i class="fa fa-pencil"></i></b-button>
                <b-button variant="danger" @click="eliminarU = true"><i class="fa fa-trash"></i></b-button>
            </b-col>
        </b-row>
        <b-tabs pills card vertical nav-wrapper-class="w-25">
            <b-tab title="Inicio" active @click="seccion.id = null">
                
            </b-tab>
            <b-tab 
                v-for="(unidad, i) in unidades" 
                v-bind:key="i" 
                :title="`${unidad.seccion}`" 
                @click="getContenido(unidad, i)">
                <b-card no-body header="Archivos">
                    <b-list-group flush v-for="(archivo, i) in archivos" v-bind:key="i">
                        <b-list-group-item v-if="archivo.categoria_id == 1">
                            <b-row>
                                <b-col><a>{{ archivo.titulo }}</a></b-col>
                                <b-col class="text-right">
                                    <div class="d-block text-right">
                                        <a 
                                            class="btn btn-outline-primary" 
                                            :href="'/descargar_archivo/' + seccion.id + '/' + archivo.id"
                                            v-if="!processing">
                                            <i class="fa fa-download"></i>
                                        </a>
                                        <b-button :disabled="processing" variant="outline-warning" @click="editarRecurso(archivo, i)">
                                            <i class="fa fa-pencil"></i>
                                        </b-button>
                                        <b-button :disabled="processing" variant="outline-danger" @click="destroyArchivo(archivo, i)">
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
                                <b-col><a>{{ archivo.titulo }}</a></b-col>
                                <b-col class="text-right">
                                    <div class="d-block text-right">
                                        <a 
                                            class="btn btn-outline-primary" 
                                            :href="'/descargar_archivo/' + seccion.id + '/' + archivo.id"
                                            v-if="!processing">
                                            <i class="fa fa-download"></i>
                                        </a>
                                        <b-button :disabled="processing" variant="outline-warning" @click="editarRecurso(archivo, i)">
                                            <i class="fa fa-pencil"></i>
                                        </b-button>
                                        <b-button :disabled="processing" variant="outline-danger" @click="destroyArchivo(archivo, i)">
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
                    <b-list-group flush v-for="(archivo, i) in archivos" v-bind:key="i">
                        <b-list-group-item v-if="archivo.categoria_id == 3">
                            <b-row>
                                <b-col><a>{{ archivo.titulo }}</a></b-col>
                                <b-col class="text-right">
                                    <div class="d-block text-right">
                                        <a 
                                            class="btn btn-outline-primary" 
                                            :href="'/descargar_archivo/' + seccion.id + '/' + archivo.id"
                                            v-if="!processing">
                                            <i class="fa fa-download"></i>
                                        </a>
                                        <b-button :disabled="processing" variant="outline-warning" @click="editarRecurso(archivo, i)">
                                            <i class="fa fa-pencil"></i>
                                        </b-button>
                                        <b-button :disabled="processing" variant="outline-danger" @click="destroyArchivo(archivo, i)">
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
                        <b-list-group-item>
                            <b-row>
                                <b-col>
                                    <b-row>
                                        <b-col sm="3">
                                            <b-badge variant="info" pill v-if="enlace.categoria_id == 3">Video</b-badge>
                                            <b-badge variant="primary" pill v-if="enlace.categoria_id == 4">Sitio web</b-badge>
                                        </b-col>
                                        <b-col sm="9">
                                            <a>{{ enlace.titulo }}</a>
                                        </b-col>
                                    </b-row>
                                </b-col>
                                <b-col class="text-right">
                                    <div class="d-block text-right">
                                        <b-button :disabled="processing" variant="outline-warning">
                                            <i class="fa fa-pencil" @click="editarEnlace(enlace, i)"></i>
                                        </b-button>
                                        <b-button :disabled="processing" variant="outline-danger" @click="destroyEnlace(enlace, i)">
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
        <b-modal v-model="show" title="Editar recurso">
            <form-component 
                :archivo="archivo" 
                :enlace="enlace" 
                :seccion_id="seccion.id" 
                @updateArchivo="updateDatosA"
                @updateEnlace="updateDatosE">
            </form-component>
            <div slot="modal-footer"></div>
        </b-modal>
        <b-modal v-model="editarU" title="Editar unidad">
            <b-form @submit.prevent="updateSeccion">
                <label for="input-nombre-unidad">Nombre de la unidad</label>
                <b-form-input v-model="seccion.seccion" :disabled="processing" id="input-nombre-unidad"></b-form-input>
                <div v-if="errors && errors.seccion" class="text-danger">{{ errors.seccion[0] }}</div>
                <hr>
                <div class="d-block text-right">
                    <b-button 
                        v-if="seccion.seccion.length > 5" 
                        type="submit" 
                        :disabled="processing"
                        variant="success">
                        <i class="fa fa-check"></i> {{ !processing ? 'Actualizar' : 'Actualizando' }} <b-spinner v-if="processing" small type="grow"></b-spinner>
                    </b-button>
                </div>
            </b-form>
            <div slot="modal-footer">
                <b-alert show dismissible variant="success" v-if="status && respuestaUnidad != '' && !processing">
                    <i class="fa fa-check"></i> {{ respuestaUnidad }}
                </b-alert>
                <b-alert show dismissible variant="danger" v-if="!status && respuestaUnidad != '' && !processing">
                    <i class="fa fa-info"></i> {{ respuestaUnidad }}
                </b-alert>
            </div>
        </b-modal>

        <b-modal v-model="eliminarU" title="Elimiar unidad">
            <p>¿Estas seguro de eliminar la unidad?</p>
            <p><i class="fa fa-warning"></i> Todo el contenido de la unidad será eliminado</p>
            <div class="d-block text-right">
                <b-button variant="danger" @click="eliminarSeccion" :disabled="processing">
                    <i class="fa fa-trash"></i> {{ !processing ? 'Eliminar' : 'Eliminando' }} <b-spinner v-if="processing" small type="grow"></b-spinner>
                </b-button>
            </div>
            <div slot="modal-footer">
                <b-alert show dismissible variant="danger" v-if="!status && respuestaUnidad != '' && !processing">
                    <i class="fa fa-info"></i> {{ respuestaUnidad }}
                </b-alert>
            </div>
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
                    posicion: 0,
                    clase_id: this.clase_id,
                    id: null,
                    seccion: '' 
                },
               unidades: this.secciones,
               respuestaUnidad: '',
               archivos: [],
               enlaces: [],
               show: false,
               archivo: {},
               enlace: {},
               file: '',
               disabled: false,
               errors: {},
               processing: false,
               posicion: 0,
               status: false,
               editarU: false,
               eliminarU: false,
            }
        },
        methods: {
            nuevaUnidad(){
                this.respuestaUnidad = '';
                this.seccion = {
                    posicion: 0,
                    clase_id: this.clase_id,
                    id: null,
                    seccion: '' 
                };
            },
            submitNewSeccion(){
                this.ini_unidad();
                axios.post('/profesor/nueva_unidad', this.seccion).then(response => {
                    this.unidades.push(response.data); 
                    this.seccion.seccion = '';
                    this.ini2_unidad('Unidad creada');
                })
                .catch(error => {
                    this.ini3_unidad();
                });
                
            },
            getContenido(unidad, i){
                this.archivos = [];
                this.enlaces = [];
                this.seccion.posicion = i;
                this.seccion.id = unidad.id;
                this.seccion.seccion = unidad.seccion;
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
                this.processing = true;
                axios.delete('/profesor/borrar_archivo', {params: {seccion_id: this.seccion.id, id: archivo.id}}).then(response => {
                    this.archivos.splice(i, 1);
                    this.processing = false;
                });
            },
            destroyEnlace(enlace, i){
                this.processing = true;
                axios.delete('/profesor/borrar_enlace', {params: {seccion_id: this.seccion.id, id: enlace.id}}).then(response => {
                    this.enlaces.splice(i, 1);
                    this.processing = false;
                });
            },
            editarRecurso(archivo, i){
                this.enlace = {};
                this.show = true;
                this.archivo = archivo;
                this.posicion = i;
            },
            editarEnlace(enlace, i){
                this.archivo = {};
                this.show = true;
                this.enlace = enlace;
                this.posicion = i;
            },
            updateDatosA(datos){
                this.archivos[this.posicion] = datos;
                this.posicion = 0;
            },
            updateDatosE(datos){
                this.enlaces[this.posicion] = datos;
                this.posicion = 0;
            },
            updateSeccion(){
                this.ini_unidad();
                axios.post('/profesor/editar_unidad', this.seccion).then(response => {
                    this.ini2_unidad('Unidad actualizada');
                    this.unidades[this.seccion.posicion] = response.data;
                })
                .catch(error => {
                    this.ini3_unidad();
                });
            },
            eliminarSeccion(){
                this.ini_unidad();
                axios.delete('/profesor/eliminar_unidad', {params: {id: this.seccion.id}}).then(response => {
                    this.eliminarU = false;
                    this.ini2_unidad('');
                    this.unidades.splice(this.seccion.posicion, 1);
                })
                .catch(error => {
                    this.ini3_unidad();
                });
            },
            ini_unidad(){
                this.respuestaUnidad = '';
                this.processing = true;
                this.status = false;
                this.errors = {};
            },
            ini2_unidad(msj){
                this.respuestaUnidad = msj;
                this.processing = false;
                this.status = true;
            },
            ini3_unidad(){
                this.respuestaUnidad = 'Ocurrio un problema, intentalo de nuevo';
                this.errors = error.response.data.errors;
                this.processing = false;
                this.status = false;
            },
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