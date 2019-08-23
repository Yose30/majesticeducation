<template>
    <div>
        <b-row>
            <b-col sm="3">
                <b-button 
                    v-b-modal.modal-newUnidad 
                    id="btnNuevaUnidad" 
                    @click="nuevaUnidad"><i class="fa fa-plus"></i> Nueva unidad
                </b-button>
            </b-col>
            <b-col>
                <b-button 
                    v-if="seccion.id != null" 
                    v-b-modal.modal-1 id="btnAgregarRec"><i class="fa fa-plus"></i> Agregar recurso
                </b-button>
            </b-col>
            <b-col v-if="seccion.id != null" class="text-right">
                <b-button variant="warning" @click="editarU = true"><i class="fa fa-pencil"></i></b-button>
                <b-button variant="danger" @click="eliminarU = true"><i class="fa fa-trash"></i></b-button>
            </b-col>
        </b-row>
        <b-tabs pills card vertical nav-wrapper-class="w-25">
            <b-tab title="Inicio" active @click="seccion.id = null"></b-tab>
            <b-tab 
                v-for="(unidad, i) in unidades" 
                v-bind:key="i" 
                :title="`${unidad.seccion}`" 
                @click="getContenido(unidad, i)">
                <b-card no-body header="Evaluación">
                    <b-list-group>
                        <b-list-group-item>
                            <b-row v-if="evaluacione.titulo">
                                <b-col><a>{{ evaluacione.titulo }}</a></b-col>
                                <b-col class="text-right">
                                    <b-button :disabled="processing" variant="outline-info">
                                        Ver detalles
                                    </b-button>
                                    <b-button :disabled="processing" variant="outline-warning">
                                        <i class="fa fa-pencil"></i>
                                    </b-button>
                                    <b-button :disabled="processing" variant="outline-danger">
                                        <i class="fa fa-remove"></i>
                                    </b-button>
                                </b-col>
                            </b-row>
                        </b-list-group-item>
                    </b-list-group>
                </b-card>
                <hr>
                <b-card no-body header="Archivos">
                    <b-list-group flush v-for="(archivo, i) in archivos" v-bind:key="i">
                        <b-list-group-item v-if="archivo.categoria_id == 1">
                            <b-row>
                                <b-col><a>{{ archivo.pivot.titulo }}</a></b-col>
                                <b-col class="text-right">
                                    <div class="d-block text-right">
                                        <a 
                                            class="btn btn-outline-primary" 
                                            :href="'/descargar_archivo/' + archivo.id"
                                            v-if="!processing">
                                            <i class="fa fa-download"></i>
                                        </a>
                                        <!-- <b-button :disabled="processing" variant="outline-warning" @click="editarRecurso(archivo, i)">
                                            <i class="fa fa-pencil"></i>
                                        </b-button> -->
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
                                <b-col><a>{{ archivo.pivot.titulo }}</a></b-col>
                                <b-col class="text-right">
                                    <div class="d-block text-right">
                                        <a 
                                            class="btn btn-outline-primary" 
                                            :href="'/descargar_archivo/' + archivo.id"
                                            v-if="!processing">
                                            <i class="fa fa-download"></i>
                                        </a>
                                        <!-- <b-button :disabled="processing" variant="outline-warning" @click="editarRecurso(archivo, i)">
                                            <i class="fa fa-pencil"></i>
                                        </b-button> -->
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
                                <b-col><a>{{ archivo.pivot.titulo }}</a></b-col>
                                <b-col class="text-right">
                                    <div class="d-block text-right">
                                        <a 
                                            class="btn btn-outline-primary" 
                                            :href="'/descargar_archivo/' + archivo.id"
                                            v-if="!processing">
                                            <i class="fa fa-download"></i>
                                        </a>
                                        <!-- <b-button :disabled="processing" variant="outline-warning" @click="editarRecurso(archivo, i)">
                                            <i class="fa fa-pencil"></i>
                                        </b-button> -->
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
                                        <!-- <b-button :disabled="processing" variant="outline-warning">
                                            <i class="fa fa-pencil" @click="editarEnlace(enlace, i)"></i>
                                        </b-button> -->
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
        <!-- MODALS -->
        <!-- Nueva unidad -->
        <b-modal id="modal-newUnidad" title="Nueva unidad">
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
                        <i class="fa fa-check" v-if="!processing"></i> 
                        <b-spinner v-else small type="grow"></b-spinner> 
                        {{ !processing ? 'Crear' : 'Creando' }} 
                    </b-button>
                </div>
            </b-form>
            <div slot="modal-footer"></div>
        </b-modal>
        <!-- Editar unidad -->
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
        <!-- Eliminar unidad -->
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
        <!-- Agregar recurso -->
        <b-modal id="modal-1" size="xl" title="Agregar recurso">
            <b-tabs content-class="mt-6" fill>
                <b-tab title="Elegir archivo" active>
                    <hr>
                    <b-row>
                        <b-col sm="2">
                            <b-form-group label="Elegir recurso" :disabled="disabled">
                                <b-form-radio v-model="option" name="archivo" value="1">Archivo</b-form-radio>
                                <b-form-radio v-model="option" name="link" value="2">Enlace</b-form-radio>
                                <b-form-radio v-if="!evaluacione.titulo" v-model="option" name="evaluacion" value="3">Evaluación</b-form-radio>
                            </b-form-group>
                        </b-col>
                        <b-col sm="10">
                            <div v-if="option == 1">
                                <div align="right">
                                    <b-button variant="success" :disabled="processing" @click="guardarSeleccion">
                                        <i class="fa fa-check" v-if="!processing"></i> 
                                        <b-spinner v-else small type="grow"></b-spinner>
                                         Guardar
                                    </b-button>
                                </div>
                                <hr>
                                <b-table 
                                    :items="darchivos" 
                                    :fields="fieldsA"
                                    ref="selectableTable"
                                    selectable
                                    :select-mode="selectMode"
                                    selected-variant="success"
                                    @row-selected="onRowSelected"
                                    responsive="sm">
                                    <template slot="index" slot-scope="row">{{ row.index + 1 }}</template>
                                    <template slot="[selected]" slot-scope="{ rowSelected }">
                                        <template v-if="rowSelected">
                                            <span aria-hidden="true">&check;</span>
                                        </template>
                                    </template>
                                </b-table>
                            </div>
                            <div v-if="option == 2">
                                <div align="right">
                                    <b-button variant="success" :disabled="processing">
                                        <i class="fa fa-check" v-if="!processing"></i> 
                                        <b-spinner v-else small type="grow"></b-spinner>
                                         Guardar
                                    </b-button>
                                </div>
                                <hr>
                                <b-table 
                                    :items="denlaces" 
                                    :fields="fieldsE"
                                    ref="selectableTable"
                                    selectable
                                    :select-mode="selectMode"
                                    selected-variant="success"
                                    @row-selected="onRowSelected"
                                    responsive="sm">
                                    <template slot="index" slot-scope="row">{{ row.index + 1 }}</template>
                                    <template slot="[selected]" slot-scope="{ rowSelected }">
                                        <template v-if="rowSelected">
                                            <span aria-hidden="true">&check;</span>
                                        </template>
                                    </template>
                                    <template slot="categoria_id" slot-scope="row">
                                        <b-badge variant="light" v-if="row.item.categoria_id == 1">Archivo</b-badge>
                                        <b-badge variant="light" v-if="row.item.categoria_id == 2">Audio</b-badge>
                                        <b-badge variant="light" v-if="row.item.categoria_id == 3">Video</b-badge>
                                        <b-badge variant="light" v-if="row.item.categoria_id == 4">Sitio web</b-badge>
                                    </template>
                                </b-table>
                            </div>
                            <div v-if="option == 3 && !evaluacione.titulo">
                                <div align="right">
                                    <b-button variant="success" :disabled="processing" @click="selecionEvaluacion">
                                        <i class="fa fa-check" v-if="!processing"></i> 
                                        <b-spinner v-else small type="grow"></b-spinner>
                                         Guardar
                                    </b-button>
                                </div>
                                <hr>
                                <b-table 
                                    :items="devaluaciones" 
                                    :fields="fields"
                                    ref="selectableTable"
                                    selectable
                                    :select-mode="selectMode"
                                    selected-variant="success"
                                    @row-selected="onRowSelected"
                                    responsive="sm">
                                    <template slot="index" slot-scope="row">{{ row.index + 1 }}</template>
                                    <template slot="[selected]" slot-scope="{ rowSelected }">
                                        <template v-if="rowSelected">
                                            <span aria-hidden="true">&check;</span>
                                        </template>
                                    </template>
                                </b-table>
                            </div>
                        </b-col>
                    </b-row>
                </b-tab>
                <b-tab title="Subir nuevo archivo">
                    <hr>
                    <recursos-component 
                        :seccion_id="seccion.id" 
                        @updateArchivos="updateA" 
                        @updateEnlaces="updateE">
                    </recursos-component>
                </b-tab>
            </b-tabs>
            <div slot="modal-footer"></div>
        </b-modal>
        <!-- Editar recurso -->
        <b-modal v-model="show" title="Editar recurso">
            <form-component 
                :archivo="archivo" 
                :enlace="enlace"  
                @updateArchivo="updateDatosA"
                @updateEnlace="updateDatosE">
            </form-component>
            <!-- :seccion_id="seccion.id" -->
            <div slot="modal-footer"></div>
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
                fields: [ {key: 'index', label: 'N.'}, 'titulo', { key: 'selected' , label: ''} ],
                fieldsA: [
                    { key: 'index', label: 'N.' },
                    'titulo',
                    { key: 'size', label: 'Tamaño (Megabytes)' },
                    { key: 'extension', label: 'Extensión' },
                    { key: 'selected' , label: ''}
                ],
                fieldsE: [
                    { key: 'index', label: 'N.' },
                    'titulo',
                    { key: 'categoria_id' , label: 'Tipo'}, 
                    { key: 'selected' , label: ''}
                ],
                option: '1',
                unidades: this.secciones,
                respuestaUnidad: '',
                archivos: [],
                enlaces: [],
                evaluacione: {},
                // evaluaciones: [], 
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
                darchivos: [],
                denlaces: [],
                devaluaciones: [],
                selectMode: 'single',
                selected: [],
                form: {
                    seccion_id: null,
                    archivo_id: null
                },
                formEvaluacion:{
                    seccion_id: null,
                    evaluacione_id: null
                }
            }
        },
        created: function(){
            this.obtener_archivos();
		},
        methods: {
            onRowSelected(items) {
                this.selected = [];
                this.selected = items
            },
            obtener_archivos(){
                axios.get('/profesor/recursos_profesor').then(response => {
                    this.darchivos = response.data.archivos;
                    this.denlaces = response.data.enlaces;
                    this.devaluaciones = response.data.evaluaciones;
                })
                .catch(error => {
                    this.makeToast('danger', 'Error', 'Ocurrio un problema, vuelve a intentar');
                });
            },
            selecionEvaluacion(){
                if(this.selected.length > 0){
                    this.formEvaluacion = {
                        seccion_id: this.seccion.id,
                        evaluacione_id: this.selected[0].id
                    }
                    this.processing = true;

                    axios.post('/profesor/save_selected_evaluaciones', this.formEvaluacion).then(response => {
                        this.processing = false;
                        this.evaluacione = response.data;
                        this.$bvModal.hide('modal-1');
                        this.selected = [];
                        this.makeToast('success', 'Mensaje', 'La evaluación se agrego correctamente');
                        
                        // if (response.data.status === 422) {
                        //     this.makeToast('warning', 'Mensaje', response.data.message);
                        // }
                        // else{
                            
                        // }
                    })
                    .catch(error => {
                        this.processing = false;
                        this.makeToast('danger', 'Error', 'Ocurrio un problema, intentalo de nuevo');
                    });
                }
                else{
                    this.makeToast('warning', 'Mensaje', 'Seleccionar evaluación');
                }
            },
            guardarSeleccion(){
                if(this.selected.length > 0){
                    this.form = {
                        seccion_id: this.seccion.id,
                        archivo_id: this.selected[0].id
                    }
                    this.processing = true;
                    axios.post('/profesor/save_selected_archivos', this.form).then(response => {
                        this.processing = false;
                        if (response.data.status === 422) {
                            this.makeToast('warning', 'Mensaje', response.data.message);
                        }
                        else{
                            this.archivos.push(response.data);
                            this.$bvModal.hide('modal-1');
                            this.selected = [];
                            this.makeToast('success', 'Mensaje', 'El archivo se guardo correctamente');
                        }
                    })
                    .catch(error => {
                        this.processing = false;
                        this.makeToast('danger', 'Error', 'Ocurrio un problema, intentalo de nuevo');
                    });
                }
                else{
                    this.makeToast('warning', 'Mensaje', 'Seleccionar archivo');
                }
            },
            nuevaUnidad(){
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
                    this.makeToast('success', 'Mensaje', 'Unidad creada');
                    this.$bvModal.hide('modal-newUnidad');
                    this.seccion.seccion = '';
                    this.ini2_unidad();
                })
                .catch(error => {
                    this.makeToast('danger', 'Error', 'Ocurrio un problema, intentalo de nuevo');
                    this.ini3_unidad();
                });
            },
            getContenido(unidad, i){
                this.archivos = [];
                this.enlaces = [];
                this.evaluacione = {};
                this.seccion.posicion = i;
                this.seccion.id = unidad.id;
                this.seccion.seccion = unidad.seccion;
                if(unidad.archivos != undefined){
                    this.archivos = unidad.archivos;
                }
                if(unidad.enlaces != undefined){
                    this.enlaces = unidad.enlaces;
                }
                if(unidad.evaluacione != undefined){
                    this.evaluacione = unidad.evaluacione;
                }
            },
            updateA(newArchivo){
                this.archivos.push(newArchivo);
                
            },
            updateE(newEnlace){
                this.enlaces.push(newEnlace);
            },
            destroyArchivo(archivo, i){
                this.processing = true;
                axios.delete('/profesor/borrar_archivo', {params: {seccion_id: this.seccion.id, id: archivo.id}}).then(response => {
                    this.archivos.splice(i, 1);
                    this.processing = false;
                }).catch(error => {
                    this.makeToast('danger', 'Error', 'Ocurrio un problema, vuelve a intentarlo');
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
                    console.log(response.data);
                    this.processing = false;
                    // this.eliminarU = false;
                    // this.ini2_unidad('');
                    // this.unidades.splice(this.seccion.posicion, 1);
                })
                .catch(error => {
                    this.processing = false; // ELIMINAR
                    this.ini3_unidad();
                });
            },
            ini_unidad(){
                this.respuestaUnidad = '';
                this.processing = true;
                this.status = false;
                this.errors = {};
            },
            ini2_unidad(){
                this.processing = false;
                this.status = true;
            },
            ini3_unidad(){
                this.errors = error.response.data.errors;
                this.processing = false;
                this.status = false;
            },
            makeToast(variante, titulo, descripcion){
                this.$bvToast.toast(descripcion, {
                    title: titulo,
                    variant: variante,
                    solid: true
                });
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