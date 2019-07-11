<template>
    <div>
        <div class="d-block text-right" v-if="seccion_id != null">
            <b-button v-b-modal.modal-1 id="btnAgregarRec"><i class="fa fa-plus"></i> Agregar recurso</b-button>
        </div>

        <b-modal id="modal-1" size="xl" title="Agregar recurso">
            <b-container class="bv-example-row">
                <b-row>
                    <b-col sm="4">
                        <b-form-group label="Elegir recurso">
                            <!-- <b-form-radio v-model="selected" name="actividad" value="1" @change="inicializar">Actividad</b-form-radio> -->
                            <b-form-radio v-model="selected" name="archivo" value="2" @change="inicializar">Archivo</b-form-radio>
                            <b-form-radio v-model="selected" name="audio" value="3" @change="inicializar">Audio</b-form-radio>
                            <b-form-radio v-model="selected" name="video" value="4" @change="inicializar">Video</b-form-radio>
                            <b-form-radio v-model="selected" name="link" value="5" @change="inicializar">Enlace</b-form-radio>
                            <!-- <b-form-radio v-model="selected" name="evaluacion" value="6" @change="inicializar">Evaluación</b-form-radio> -->
                        </b-form-group>
                    </b-col>
                    <b-col sm="8">
                        <div v-if="selected == 2">
                            <form @submit="submitArchivo" enctype="multipart/form-data">
                                <b-form-group label-cols="4" label-cols-lg="2" label="Titulo" label-for="input-titulo-archivo">
                                    <b-form-input v-model="titulo" id="input-titulo-archivo" required></b-form-input>
                                    <div v-if="errors && errors.titulo" class="text-danger">{{ errors.titulo[0] }}</div>
                                </b-form-group>
                                <b-form-group label-cols="4" label-cols-lg="2" label="Archivo" label-for="input-archivo">
                                    <input type="file" class="custom-file" v-on:change="onArchivoChange">
                                    <div v-if="errors && errors.file" class="text-danger">{{ errors.file[0] }}</div>
                                    <div v-if="errorExist != ''" class="text-danger">{{ errorExist }}</div>
                                    <p>Extensión: .pdf, .doc, .ppt, .xls</p>
                                </b-form-group>
                                <hr>
                                <div class="d-block text-right">
                                    <b-button v-if="file != ''" type="submit" variant="success"><i class="fa fa-check"></i> Guardar</b-button>
                                </div>
                            </form>
                            <b-alert show dismissible v-if="success">
                                <i class="fa fa-check"></i> Archivo agregado
                            </b-alert>
                        </div>
                        <div v-if="selected == 3">
                            <form @submit="submitAudio" enctype="multipart/form-data">
                                <b-form-group label-cols="4" label-cols-lg="2" label="Titulo" label-for="input-titulo-audio">
                                    <b-form-input v-model="titulo" id="input-titulo-audio" required></b-form-input>
                                    <div v-if="errors && errors.titulo" class="text-danger">{{ errors.titulo[0] }}</div>
                                </b-form-group>
                                <b-form-group label-cols="4" label-cols-lg="2" label="Audio" label-for="input-audio">
                                    <input type="file" id="audioType" class="custom-file" v-on:change="onArchivoChange">
                                    <div v-if="errors && errors.file" class="text-danger">{{ errors.file[0] }}</div>
                                    <div v-if="errorExist != ''" class="text-danger">{{ errorExist }}</div>
                                    <p>Extensión: .mp4, .mpeg, .aac, .wav</p>
                                </b-form-group>
                                <hr>
                                <div class="d-block text-right">
                                    <b-button v-if="file != ''" type="submit" variant="success"><i class="fa fa-check"></i> Guardar</b-button>
                                </div>
                            </form>
                            <b-alert show dismissible v-if="success">
                                <i class="fa fa-check"></i> Audio agregado
                            </b-alert>
                        </div>
                        <div v-if="selected == 4">
                            <b-form @submit.prevent="submitEnlace(3)">
                                <b-form-group label-cols="4" label-cols-lg="2" label="Titulo" label-for="input-titulo-video">
                                    <b-form-input v-model="enlace.titulo" id="input-titulo-video"></b-form-input>
                                    <div v-if="errors && errors.titulo" class="text-danger">{{ errors.titulo[0] }}</div>
                                </b-form-group>
                                <b-form-group label-cols="4" label-cols-lg="2" label="Link del video" label-for="input-video">
                                    <b-form-input v-model="enlace.url" id="input-video"></b-form-input>
                                    <div v-if="errors && errors.url" class="text-danger">{{ errors.url[0] }}</div>
                                </b-form-group>
                                <hr>
                                <div class="d-block text-right">
                                    <b-button v-if="enlace.url.length > 10" type="submit" variant="success"><i class="fa fa-check"></i> Guardar</b-button>
                                </div>
                            </b-form>
                            <b-alert show dismissible v-if="success">
                                <i class="fa fa-check"></i> Link del video agregado
                            </b-alert>
                        </div>
                        <div v-if="selected == 5">
                            <b-form @submit.prevent="submitEnlace(4)">
                                <b-form-group label-cols="4" label-cols-lg="2" label="Titulo" label-for="input-titulo-url">
                                    <b-form-input v-model="enlace.titulo" id="input-titulo-url"></b-form-input>
                                    <div v-if="errors && errors.titulo" class="text-danger">{{ errors.titulo[0] }}</div>
                                </b-form-group>
                                <b-form-group label-cols="4" label-cols-lg="2" label="Url del sitio web" label-for="input-url">
                                    <b-form-input v-model="enlace.url" id="input-url"></b-form-input>
                                    <div v-if="errors && errors.url" class="text-danger">{{ errors.url[0] }}</div>
                                </b-form-group>
                                <hr>
                                <div class="d-block text-right">
                                    <b-button v-if="enlace.url.length > 12" type="submit" variant="success"><i class="fa fa-check"></i> Guardar</b-button>
                                </div>
                            </b-form>
                            <b-alert show dismissible v-if="success">
                                <i class="fa fa-check"></i> Enlace agregado a la unidad
                            </b-alert>
                        </div>
                    </b-col>
                </b-row>
            </b-container>
            <div slot="modal-footer"></div>
        </b-modal>
    </div>
</template>

<script>
    export default {
        name: 'app',
        props: ['seccion_id'],
        data() {
            return {
                selected: '',
                titulo: '',
                file: '',
                enlace: {
                    seccione_id: null,
                    categoria_id: 0,
                    titulo: '',
                    url: 'https://'
                },
                errors: {},
                success: false,
                errorExist: ''
            }
        },
        methods: {
            onArchivoChange(e){
                this.file = e.target.files[0];
                console.log(this.file);
            },
            submitArchivo(e) {
                e.preventDefault();
                const config = { headers: { 'content-type': 'multipart/form-data' } }
                let formData = new FormData();
                formData.append('file', this.file);
                formData.append('seccione_id', this.seccion_id);
                formData.append('titulo', this.titulo);
 
                axios.post('/profesor/subir_archivo', formData, config).then(response => {
                    this.comprobarError(response);
                })
                .catch(error => {
                    this.mostrarErrores(error);
                });
            },
            submitAudio(e) {
                e.preventDefault();
                var fileInput = document.getElementById('audioType');
                var allowedExtensions = /(\.wav|\.mp3|\.mp4|\.aac)$/i;
                if(allowedExtensions.exec(fileInput.value)){
                    const config = { headers: { 'content-type': 'multipart/form-data' } }
                    let formData = new FormData();
                    formData.append('file', this.file);
                    formData.append('seccione_id', this.seccion_id);
                    formData.append('titulo', this.titulo);
    
                    axios.post('/profesor/subir_audio', formData, config).then(response => {
                        this.comprobarError(response);
                    })
                    .catch(error => {
                        this.mostrarErrores(error);
                    });
                }
                else{
                    this.errorExist = 'El audio debe ser de tipo: mp3, mp4, mpeg, aac ó wav.';
                }
                
            },
            submitEnlace(categoria){
                this.enlace.seccione_id = this.seccion_id;
                this.enlace.categoria_id = categoria;
                axios.post('/profesor/store_enlace', this.enlace).then(response => {
                    this.errors = {};
                    this.success = true;
                    this.enlace = {
                        seccione_id: null,
                        categoria_id: 0,
                        titulo: '',
                        url: 'https://'
                    };
                    this.$emit('updateEnlaces', response.data);
                })
                .catch(error => {
                    this.mostrarErrores(error);
                });
            },
            inicializar(){
                this.errors = {};
                this.success = false;
            },

            comprobarError(response){
                if(response.data.status != 422){
                    this.errorExist = '';
                    this.errors = {};
                    this.titulo = '';
                    this.file = '';
                    this.success = true;
                    this.$emit('updateArchivos', response.data);
                }
                else{
                    this.errorExist = response.data.message;
                }
            },
            mostrarErrores(error){
                if (error.response.status === 422) {
                    this.errors = error.response.data.errors || {};
                }
            }
        }
    }
</script>

<style>
    #btnAgregarRec{
        background-color:#f2991f;
        color:#000;
        font-weight: bold; 
        border: 1px solid #f2991f;
    }
    #btnAgregarRec{
        background-color:#f7ca39;
            color:#000;
            font-weight: bold;
    }
</style>