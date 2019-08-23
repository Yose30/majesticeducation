<template>
    <div>
        <div align="right">
            <b-button v-b-modal.modal-agregarRecurso id="btnAgregarRec"><i class="fa fa-plus"></i> Agregar recurso</b-button>
        </div>
        <hr>
        <b-card no-body>
            <b-tabs pills card vertical>
                <b-tab title="Archivos" active>
                    <b-card-text>
                        <b-table :items="archivos" :fields="fieldsA">
                            <template slot="index" slot-scope="row">
                                {{ row.index + 1 }}
                            </template>
                            <template slot="size" slot-scope="row">
                                {{ kiloToMega(row.item.size) }}
                            </template>
                            <template slot="accion" slot-scope="row">
                                <b-button 
                                    variant="warning" 
                                    v-b-modal.modal-editarRecurso 
                                    @click="editarRecurso(row.item, row.index)">
                                    <i class="fa fa-edit"></i>
                                </b-button>
                                <b-button 
                                    variant="danger" 
                                    v-b-modal.modal-confirmDestroyA 
                                    @click="confirmDestroy(row.item, row.index)">
                                    <i class="fa fa-trash">
                                </i></b-button>
                            </template>
                        </b-table>
                    </b-card-text>
                </b-tab>
                <b-tab title="Enlaces">
                    <b-card-text>
                        <b-table :items="enlaces" :fields="fieldsE">
                            <template slot="index" slot-scope="row">
                                {{ row.index + 1 }}
                            </template>
                            <template slot="categoria_id" slot-scope="row">
                                <b-badge variant="light" v-if="row.item.categoria_id == 1">Archivo</b-badge>
                                <b-badge variant="light" v-if="row.item.categoria_id == 2">Audio</b-badge>
                                <b-badge variant="light" v-if="row.item.categoria_id == 3">Video</b-badge>
                                <b-badge variant="light" v-if="row.item.categoria_id == 4">Sitio web</b-badge>
                            </template>
                            <template slot="accion" slot-scope="row">
                                <b-button 
                                    variant="warning" 
                                    v-b-modal.modal-editarRecurso 
                                    @click="editarEnlace(row.item, row.index)">
                                    <i class="fa fa-edit"></i>
                                </b-button>
                                <b-button 
                                    variant="danger" 
                                    v-b-modal.modal-confirmDestroyE 
                                    @click="confirmEnlace(row.item, row.index)">
                                    <i class="fa fa-trash">
                                </i></b-button>
                            </template>
                        </b-table>
                    </b-card-text>
                </b-tab>
            </b-tabs>
        </b-card>

        <!-- MODALS -->
        <!-- Agregar recurso -->
        <b-modal id="modal-agregarRecurso" size="xl" title="Agregar recurso">
            <recursos-component @updateArchivos="updateA" @updateEnlaces="updateE"></recursos-component>
            <div slot="modal-footer"></div>
        </b-modal>
        <!-- Editar recurso -->
        <b-modal id="modal-editarRecurso" title="Editar recurso">
            <!-- @updateEnlace="updateDatosE" -->
            <form-component 
                :archivo="archivo" 
                :enlace="enlace" 
                @updateArchivo="updateDatosA"
                @updateEnlace="updateDatosE">
            </form-component>
            <div slot="modal-footer"></div>
        </b-modal>
        <!-- Eliminar recurso -->
        <b-modal id="modal-confirmDestroyA" title="Eliminar recurso">
            <p>¿Estas seguro de eliminar el archivo?</p>
            <p><i class="fa fa-warning"></i> Al eliminar el archivo, tambien será eliminado de las unidades en las que se subio</p>
            <div class="d-block text-right" slot="modal-footer">
                 <b-button variant="danger" @click="destroyArchivo" :disabled="processing">
                    <i class="fa fa-trash" v-if="!processing"></i> 
                    <b-spinner v-else small type="grow"></b-spinner>
                    {{ !processing ? 'Eliminar' : 'Eliminando' }} 
                </b-button>
            </div>
        </b-modal>
        <!-- Eliminar enlace -->
        <b-modal id="modal-confirmDestroyE" title="Eliminar enlace">
            <p>¿Estas seguro de eliminar el enlace?</p>
            <p><i class="fa fa-warning"></i> Al eliminar el enlace, tambien será eliminado de las unidades en las que se subio</p>
            <div class="d-block text-right" slot="modal-footer">
                 <b-button variant="danger" @click="destroyEnlace" :disabled="processing">
                    <i class="fa fa-trash" v-if="!processing"></i> 
                    <b-spinner v-else small type="grow"></b-spinner>
                    {{ !processing ? 'Eliminar' : 'Eliminando' }} 
                </b-button>
            </div>
        </b-modal>
    </div>
</template>

<script>
    export default {
        name: 'app',
        data() {
            return {
                fieldsA: [
                    { key: 'index', label: 'N.' },
                    'titulo',
                    { key: 'size', label: 'Tamaño (Megabytes)' },
                    { key: 'extension', label: 'Extensión' },
                    { key: 'accion' , label: 'Editar / Eliminar'}
                ],
                fieldsE: [
                    { key: 'index', label: 'N.' },
                    'titulo',
                    { key: 'categoria_id' , label: 'Tipo'}, 
                    { key: 'accion' , label: 'Editar / Eliminar'}
                ],
                archivo: {},
                enlace: {},
                posicion: null,
                processing: false,
                archivos: [],
                enlaces: []
            }
        },
        created: function(){
            this.obtener_archivos();
		},
        methods: {
            obtener_archivos(){
                axios.get('/profesor/archivos_profesor').then(response => {
                    this.archivos = response.data.archivos;
                    this.enlaces = response.data.enlaces;
                })
                .catch(error => {
                    this.makeToast('danger', 'Error', 'Ocurrio un problema, vuelve a intentar');
                });
            },
            editarRecurso(archivo, i){
                this.ini_1();
                this.archivo = archivo;
                this.posicion = i;
            },
            editarEnlace(enlace, i){
                this.ini_1();
                this.enlace.id = enlace.id;
                this.enlace.titulo = enlace.titulo;
                this.enlace.url = enlace.url;
                this.posicion = i;
            },
            updateA(newArchivo){
                this.archivos.push(newArchivo);
                this.makeToast('success', 'Mensaje', 'El archivo se subio correctamente');
                this.$bvModal.hide('modal-agregarRecurso');
            },
            updateE(newEnlace){
                this.enlaces.push(newEnlace);
                this.makeToast('success', 'Mensaje', 'El archivo se subio correctamente');
                this.$bvModal.hide('modal-agregarRecurso');
            },
            updateDatosA(datos){
                this.archivos[this.posicion].titulo = datos.titulo;
                this.archivos[this.posicion].public_url = datos.public_url;
                this.archivos[this.posicion].size = datos.size;
                this.archivos[this.posicion].extension = datos.extension;
                this.ini_1();
                this.$bvModal.hide('modal-editarRecurso');
            },
            updateDatosE(datos){
                this.enlaces[this.posicion].titulo = datos.titulo;
                this.enlaces[this.posicion].url = datos.url;
                this.ini_1();
                this.$bvModal.hide('modal-editarRecurso');
            },
            confirmDestroy(archivo, i){
                this.archivo = archivo;
                this.posicion = i;
            },
            confirmEnlace(enlace, i){
                this.enlace = enlace;
                this.posicion = i;
            },
            destroyArchivo(){
                this.processing = true;
                axios.delete('/profesor/destroy_archivo', {params: {id: this.archivo.id}}).then(response => {
                    this.archivos.splice(this.posicion, 1);
                    this.makeToast('secondary', 'Mensaje', 'El archivo ha sido eliminado');
                    this.$bvModal.hide('modal-confirmDestroyA');
                    this.processing = false;
                    this.ini_1();
                }).catch(error => {
                    this.makeToast('danger', 'Error', 'Ocurrio un problema, vuelve a intentarlo');
                    this.processing = false;
                });
            },
            destroyEnlace(){
                this.processing = true;
                axios.delete('/profesor/destroy_enlace', {params: {id: this.enlace.id}}).then(response => {
                    this.enlaces.splice(this.posicion, 1);
                    this.makeToast('secondary', 'Mensaje', 'El enlace ha sido eliminado');
                    this.$bvModal.hide('modal-confirmDestroyE');
                    this.processing = false;
                    this.ini_1();
                }).catch(error => {
                    this.makeToast('danger', 'Error', 'Ocurrio un problema, vuelve a intentarlo');
                    this.processing = false;
                });
            },
            ini_1(){
                this.posicion = null;
                this.archivo = {};
                this.enlace = {};
            },
            kiloToMega(size){
                return size / 1000;
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
