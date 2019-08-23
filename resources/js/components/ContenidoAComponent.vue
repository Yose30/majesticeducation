<template>
    <div>
        <!-- <div v-if="!viewContenido">
            <i class="fa fa-home"></i>
            <b-link @click="viewContenido = true; viewEvaluacion = false;">Inicio</b-link>/Evaluación
        </div> -->
        <div v-if="viewContenido">
            <b-tabs pills card vertical nav-wrapper-class="w-25">
                <b-tab title="Inicio" active></b-tab>
                <b-tab 
                    v-for="(unidad, i) in unidades" 
                    v-bind:key="i" 
                    :title="`${unidad.seccion}`"
                    @click="getContenido(unidad)">
                    <b-card v-if="seccion.documentos > 0" no-body>
                        <hr>
                        <b-card-header header-tag="header">
                            <b-row>
                                <b-col>Archivos</b-col>
                                <b-col align="right">
                                    <b-button v-b-toggle.collapse-arch variant="light"><i class="fa fa-sort-down"></i></b-button>
                                </b-col>
                            </b-row>
                        </b-card-header>
                        <b-collapse visible id="collapse-arch">
                            <b-list-group flush v-for="(archivo, i) in archivos" v-bind:key="i">
                                <b-list-group-item v-if="archivo.categoria_id == 1">
                                    <datos-component 
                                        :archivo="archivo"
                                        :unidad="unidad"
                                        @mostrarModal="viewMArchivo">
                                    </datos-component>
                                </b-list-group-item>
                            </b-list-group>
                        </b-collapse>
                    </b-card>
                    <b-card v-if="seccion.audios > 0" no-body>
                        <hr>
                        <b-card-header header-tag="header">
                            <b-row>
                                <b-col>Audios</b-col>
                                <b-col align="right">
                                    <b-button v-b-toggle.collapse-aud variant="light"><i class="fa fa-sort-down"></i></b-button>
                                </b-col>
                            </b-row>
                        </b-card-header>
                        <b-collapse visible id="collapse-aud">
                            <b-list-group flush v-for="(archivo, i) in archivos" v-bind:key="i">
                                <b-list-group-item v-if="archivo.categoria_id == 2">
                                    <datos-component 
                                        :archivo="archivo"
                                        :unidad="unidad"
                                        @mostrarModal="viewMArchivo">
                                    </datos-component>
                                </b-list-group-item>
                            </b-list-group>
                        </b-collapse>
                    </b-card>
                    <b-card v-if="seccion.videos > 0" no-body>
                        <hr>
                        <b-card-header header-tag="header">
                            <b-row>
                                <b-col>Videos</b-col>
                                <b-col align="right">
                                    <b-button v-b-toggle.collapse-vid variant="light"><i class="fa fa-sort-down"></i></b-button>
                                </b-col>
                            </b-row>
                        </b-card-header>
                        <b-collapse visible id="collapse-vid">
                            <b-list-group flush v-for="(archivo, i) in archivos" v-bind:key="i">
                                <b-list-group-item v-if="archivo.categoria_id == 3">
                                    <datos-component 
                                        :archivo="archivo"
                                        :unidad="unidad"
                                        @mostrarModal="viewMArchivo">
                                    </datos-component>
                                </b-list-group-item>
                            </b-list-group>
                        </b-collapse>
                    </b-card>
                    <b-card v-if="enlaces.length > 0" no-body>
                        <hr>
                        <b-card-header header-tag="header">
                            <b-row>
                                <b-col>Enlaces</b-col>
                                <b-col align="right">
                                    <b-button v-b-toggle.collapse-enl variant="light"><i class="fa fa-sort-down"></i></b-button>
                                </b-col>
                            </b-row>
                        </b-card-header>
                        <b-collapse visible id="collapse-enl">
                            <b-list-group flush v-for="(enlace, i) in enlaces" v-bind:key="i">
                                <b-list-group-item>
                                    <b-row>
                                        <b-col><a href="">{{ enlace.titulo }}</a></b-col>
                                    </b-row>
                                </b-list-group-item>
                            </b-list-group>
                        </b-collapse>
                    </b-card>
                    <b-card v-if="evaluacione.titulo" no-body>
                        <hr>
                        <b-card-header header-tag="header">
                            <b-row>
                                <b-col>Evaluaciones</b-col>
                                <b-col align="right">
                                    <b-button v-b-toggle.collapse-enl variant="light"><i class="fa fa-sort-down"></i></b-button>
                                </b-col>
                            </b-row>
                        </b-card-header>
                        <b-collapse visible id="collapse-enl">
                            <b-list-group flush>
                                <b-list-group-item>
                                    <b-row>
                                        <b-col>{{ evaluacione.titulo }}</b-col>
                                        <b-col align="right">
                                            <b-button v-if="evaluacione.resultados.length == 0" variant="primary" @click="contestarEvaluacion">
                                                Contestar evaluación
                                            </b-button>
                                            <b-button v-else variant="info" v-b-modal.modal-infoEvaluacion @click="informacionEvaluacion">Mostrar calificación</b-button>
                                        </b-col>
                                    </b-row>
                                </b-list-group-item>
                            </b-list-group>
                        </b-collapse>
                    </b-card>
                </b-tab>
            </b-tabs>
        </div>
        <div v-if="viewEvaluacion">
            <hr>
            <b-row>
                <b-col>
                    <h4>{{ evaluacione.titulo }}</h4>
                </b-col>
                <b-col align="right">
                    <b-badge v-if="calificacion != null" variant="light">Calificación obtenida: {{ calificacion }}</b-badge>
                    <b-button 
                        v-if="calificacion == null" 
                        variant="success" 
                        :disabled="load" 
                        @click="guardarEvaluacion"><i class="fa fa-check"></i> Concluir
                    </b-button>
                </b-col>
            </b-row>
            <hr>
            <b-list-group flush v-for="(pregunta, j) in evaluacione.preguntas" v-bind:key="j">
                <b-list-group-item>
                    {{ pregunta.pregunta }}
                    <hr>
                    <b-form-radio-group 
                        v-for="(respuesta, i) in pregunta.respuestas" 
                        v-bind:key="i" 
                        v-model="pregunta.respuesta_base" 
                        :name="`respuesta_${respuesta.id}`"
                        :disabled="load"
                        :state="estado(pregunta.respuesta_base, respuesta.valor)">
                        <b-form-radio :value="`${respuesta.valor}`">{{ respuesta.respuesta }}</b-form-radio>
                    </b-form-radio-group>
                </b-list-group-item>
            </b-list-group>
        </div>
        <!-- MODALS -->
        <!-- Ver documentos -->
        <b-modal size="xl" v-model="modaldoc" :title="`${vArchivo.titulo}`">
            <embed :src="`${vArchivo.url}`" type="application/pdf" width="100%" height="450px" />
            <div slot="modal-footer"></div>
        </b-modal>
        <!-- Escuchar audio -->
        <b-modal v-model="modalaud" :title="`${vArchivo.titulo}`">
            <audio controls :src="`${vArchivo.url}`"></audio>
            <div slot="modal-footer"></div>
        </b-modal>
        <!-- Ver videos -->
        <b-modal size="xl" v-model="modalvid" :title="`${vArchivo.titulo}`">
            <iframe 
                width="100%" 
                height="450px" 
                :src="`${vArchivo.url}`" 
                frameborder="0" 
                allowfullscreen>
            </iframe>
            <div slot="modal-footer"></div>
        </b-modal>
        <!-- Ver información de evaluacion -->
        <b-modal id="modal-infoEvaluacion" :title="`${evaluacione.titulo}`">
            <p><b>Calificación</b>: {{ calificacion }}</p>
            <p><b>Fecha</b>: {{ fecha | moment }}</p>
        </b-modal>
    </div>
</template>

<script>
    export default {
        name: 'app',
        props: ['secciones'],
        data() {
            return {
                unidades: this.secciones,
                seccion: {
                    documentos: 0,
                    audios: 0,
                    videos: 0,
                },
                archivos: [],
                enlaces: [],
                modaldoc: false,
                modalaud: false,
                modalvid: false,
                vArchivo: {
                    titulo: '',
                    url: ''
                },
                viewContenido: true,
                viewEvaluacion: false,
                evaluacione: {
                    id: 0,
                    titulo: '',
                    preguntas: [],
                    resultados: []
                },
                count: 0,
                calificacion: null,
                fecha: '',
                load: false
            }
        },
        filters: {
            moment: function (date) {
                return moment(date).format('DD-MM-YYYY');
            }
        },
        methods: {
            estado(base, valor){
                if(this.calificacion != null){
                    if(valor == 'Incorrecto' && base == valor)
                        return false;
                    if(valor == 'Correcto' && base == valor)
                        return true;
                }
            },
            informacionEvaluacion(){
                axios.get('/alumno/obtener_resultado', {params: {evaluacione_id: this.evaluacione.id}})
                .then(response => {
                    this.calificacion = response.data.calificacion;
                    this.fecha = response.data.created_at;
                })
                .catch(error => {
                    this.makeToast('danger', 'Error', 'Ocurrio un problema, vuelve a intentar');
                });
            },
            getContenido(unidad){
                this.archivos = [];
                this.seccion = { documentos: 0, audios: 0, videos: 0, };
                if(unidad.archivos != undefined){
                    this.archivos = unidad.archivos;
                    this.archivos.forEach(archivo => {
                        if(archivo.categoria_id == 1){
                            this.seccion.documentos ++;
                        }
                        if(archivo.categoria_id == 2){
                            this.seccion.audios ++;
                        }
                        if(archivo.categoria_id == 3){
                            this.seccion.videos ++;
                        }
                    });
                }
                if(unidad.enlaces != undefined){
                    this.enlaces = unidad.enlaces;
                }
                if(unidad.evaluacione != undefined){
                    this.evaluacione.id = unidad.evaluacione.id;
                    this.evaluacione.titulo = unidad.evaluacione.titulo;
                    this.evaluacione.resultados = unidad.evaluacione.resultados;
                }
            },
            viewMArchivo(viewArchivo){
                this.vArchivo = {
                    titulo: viewArchivo.titulo,
                    url: viewArchivo.url
                }
                if(viewArchivo.categoria_id == 1){
                    this.modaldoc = true;
                }
                if(viewArchivo.categoria_id == 2){
                    this.modalaud = true;
                }
                if(viewArchivo.categoria_id == 3){
                    this.modalvid = true;
                }
            },
            contestarEvaluacion(){
                axios.get('/alumno/contenido_evaluacion', {params: {evaluacione_id: this.evaluacione.id}})
                .then(response => {
                    this.evaluacione.preguntas = response.data.preguntas;
                    this.calificacion = null;
                    this.viewContenido = false;
                    this.viewEvaluacion = true;
                })
                .catch(error => {
                    this.makeToast('danger', 'Error', 'Ocurrio un problema, vuelve a intentar');
                });
            },
            guardarEvaluacion(){
                this.count = 0;
                this.evaluacione.preguntas.forEach(pregunta => {
                    if(pregunta.respuesta_base == null){
                        this.count ++;
                    }
                });
                if(this.count > 0){
                    this.makeToast('warning', 'Mensaje', 'Faltan preguntas por responder');
                }
                else{
                    this.load = true;
                    axios.post('/alumno/guardar_resultados', this.evaluacione).then(response => {
                        this.calificacion = response.data.calificacion;
                        this.load = false;
                    })
                    .catch(error => {
                        this.load = false;
                        this.makeToast('danger', 'Error', 'Ocurrio un problema, vuelve a intentar');
                    });
                }
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