<template>
    <div>
        <b-container class="bv-example-row">
            <b-row>
                <b-col sm="4">
                    <b-form-group label="Elegir recurso" :disabled="disabled">
                        <!-- <b-form-radio v-model="selected" name="actividad" value="1" @change="inicializar">Actividad</b-form-radio> -->
                        <b-form-radio v-model="selected" name="archivo" value="2" @change="inicializar">Archivo</b-form-radio>
                        <b-form-radio v-model="selected" name="audio" value="3" @change="inicializar">Audio</b-form-radio>
                        <b-form-radio v-model="selected" name="video" value="4" @change="inicializar">Video</b-form-radio>
                        <b-form-radio v-model="selected" name="link" value="5" @change="inicializar">Enlace</b-form-radio>
                    </b-form-group>
                </b-col>
                <b-col sm="8">
                    <div v-if="selected == 2">
                        <form @submit="submitArchivo" enctype="multipart/form-data">
                            <b-form-group label-cols="4" label-cols-lg="2" label="Titulo" label-for="input-titulo-archivo">
                                <b-form-input v-model="titulo" :disabled="disabled" id="input-titulo-archivo" required></b-form-input>
                                <div v-if="errors && errors.titulo" class="text-danger">{{ errors.titulo[0] }}</div>
                            </b-form-group>
                            <b-form-group label-cols="4" label-cols-lg="2" label="Archivo" label-for="input-archivo">
                                <input type="file" id="archivoType" :disabled="disabled" class="custom-file" v-on:change="onArchivoChange">
                                <div v-if="errors && errors.file" class="text-danger">{{ errors.file[0] }}</div>
                                <div v-if="errorExist != ''" class="text-danger">{{ errorExist }}</div>
                                <p>Extensión: .pdf, .doc, .ppt, .xls</p>
                            </b-form-group>
                            <hr>
                            <div class="d-block text-right">
                                <b-button v-if="file != '' && !processing" type="submit" variant="success"><i class="fa fa-check"></i> Guardar</b-button>
                                <b-spinner v-if="processing" label="Loading..."></b-spinner>
                            </div>    
                        </form>
                        <b-alert show dismissible v-if="success">
                            <i class="fa fa-check"></i> Archivo agregado
                        </b-alert>
                    </div>
                    <div v-if="selected == 3">
                        <form @submit="submitAudio" enctype="multipart/form-data">
                            <b-form-group label-cols="4" label-cols-lg="2" label="Titulo" label-for="input-titulo-audio">
                                <b-form-input v-model="titulo" :disabled="disabled" id="input-titulo-audio" required></b-form-input>
                                <div v-if="errors && errors.titulo" class="text-danger">{{ errors.titulo[0] }}</div>
                            </b-form-group>
                            <b-form-group label-cols="4" label-cols-lg="2" label="Audio" label-for="input-audio">
                                <input type="file" id="archivoType" :disabled="disabled" class="custom-file" v-on:change="onArchivoChange">
                                <div v-if="errors && errors.file" class="text-danger">{{ errors.file[0] }}</div>
                                <div v-if="errorExist != ''" class="text-danger">{{ errorExist }}</div>
                                <p>Extensión: .mp3, .mpeg, .aac, .wav</p>
                            </b-form-group>
                            <hr>
                            <div class="d-block text-right">
                                <b-button v-if="file != '' && !processing" type="submit" variant="success"><i class="fa fa-check"></i> Guardar</b-button>
                                <b-spinner v-if="processing" label="Loading..."></b-spinner>
                            </div>
                        </form>
                        <b-alert show dismissible v-if="success">
                            <i class="fa fa-check"></i> Audio agregado
                        </b-alert>
                    </div>
                    <div v-if="selected == 4">
                        <b-tabs content-class="mt-3">
                            <b-tab title="Video" active>
                                <form @submit="submitVideo" enctype="multipart/form-data">
                                    <b-form-group label-cols="4" label-cols-lg="2" label="Titulo" label-for="input-titulo-v">
                                        <b-form-input v-model="titulo" :disabled="disabled" id="input-titulo-v" required></b-form-input>
                                        <div v-if="errors && errors.titulo" class="text-danger">{{ errors.titulo[0] }}</div>
                                    </b-form-group>
                                    <b-form-group label-cols="4" label-cols-lg="2" label="Video" label-for="input-v">
                                        <input type="file" id="archivoType" :disabled="disabled" class="custom-file" v-on:change="onArchivoChange">
                                        <div v-if="errors && errors.file" class="text-danger">{{ errors.file[0] }}</div>
                                        <div v-if="errorExist != ''" class="text-danger">{{ errorExist }}</div>
                                        <p>Extensión: .mp4, .mpeg, .ogg, .webm</p>
                                    </b-form-group>
                                    <hr>
                                    <div class="d-block text-right">
                                        <b-button v-if="file != '' && !processing" type="submit" variant="success"><i class="fa fa-check"></i> Guardar</b-button>
                                        <b-spinner v-if="processing" label="Loading..."></b-spinner>
                                    </div>
                                </form>
                            </b-tab>
                            <b-tab title="Link de video">
                                <b-form @submit.prevent="submitEnlace(3)">
                                    <b-form-group label-cols="4" label-cols-lg="2" label="Titulo" label-for="input-titulo-video">
                                        <b-form-input v-model="enlace.titulo" :disabled="disabled" id="input-titulo-video"></b-form-input>
                                        <div v-if="errors && errors.titulo" class="text-danger">{{ errors.titulo[0] }}</div>
                                    </b-form-group>
                                    <b-form-group label-cols="4" label-cols-lg="2" label="Link del video" label-for="input-video">
                                        <b-form-input v-model="enlace.url" :disabled="disabled" id="input-video"></b-form-input>
                                        <div v-if="errors && errors.url" class="text-danger">{{ errors.url[0] }}</div>
                                    </b-form-group>
                                    <hr>
                                    <div class="d-block text-right">
                                        <b-button v-if="enlace.url.length > 10 && !processing" type="submit" variant="success"><i class="fa fa-check"></i> Guardar</b-button>
                                        <b-spinner v-if="processing" label="Loading..."></b-spinner>
                                    </div>
                                </b-form>
                            </b-tab>
                        </b-tabs>
                        <b-alert show dismissible v-if="success">
                            <i class="fa fa-check"></i> Video agregado
                        </b-alert>
                    </div>
                    <div v-if="selected == 5">
                        <b-form @submit.prevent="submitEnlace(4)">
                            <b-form-group label-cols="4" label-cols-lg="2" label="Titulo" label-for="input-titulo-url">
                                <b-form-input v-model="enlace.titulo" :disabled="disabled" id="input-titulo-url"></b-form-input>
                                <div v-if="errors && errors.titulo" class="text-danger">{{ errors.titulo[0] }}</div>
                            </b-form-group>
                            <b-form-group label-cols="4" label-cols-lg="2" label="Url del sitio web" label-for="input-url">
                                <b-form-input v-model="enlace.url" :disabled="disabled" id="input-url"></b-form-input>
                                <div v-if="errors && errors.url" class="text-danger">{{ errors.url[0] }}</div>
                            </b-form-group>
                            <hr>
                            <div class="d-block text-right">
                                <b-button v-if="enlace.url.length > 12 && !processing" type="submit" variant="success"><i class="fa fa-check"></i> Guardar</b-button>
                                <b-spinner v-if="processing" label="Loading..."></b-spinner>
                            </div>
                        </b-form>
                        <b-alert show dismissible v-if="success">
                            <i class="fa fa-check"></i> Enlace agregado a la unidad
                        </b-alert>
                    </div>
                </b-col>
            </b-row>
        </b-container>
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
                errorExist: '',
                processing: false,
                disabled: false
            }
        },
        methods: {
            onArchivoChange(e){
                this.file = e.target.files[0];
            },
            submitArchivo(e) {
                e.preventDefault();
                this.processing = true;
                this.disabled = true;
                var fileInput = document.getElementById('archivoType');
                axios.post('/profesor/subir_archivo', this.getDatos(), { headers: { 'content-type': 'multipart/form-data' } })
                    .then(response => {
                        this.comprobarError(response, fileInput);
                    })
                    .catch(error => {
                        this.mostrarErrores(error);
                    });
            },
            submitAudio(e) {
                e.preventDefault();
                this.processing = true;
                this.disabled = true;
                var fileInput = document.getElementById('archivoType');
                var allowedExtensions = /(\.wav|\.mp3|\.mpeg|\.aac)$/i;
                if(allowedExtensions.exec(fileInput.value)){
                    this.errorExist = '';
                    axios.post('/profesor/subir_audio', this.getDatos(), { headers: { 'content-type': 'multipart/form-data' } })
                        .then(response => {
                            this.comprobarError(response, fileInput);
                        })
                        .catch(error => {
                            this.mostrarErrores(error);
                        });
                } 
                else{
                    this.errorExist = 'El audio debe ser de tipo: mp3, mpeg, aac ó wav.';
                    this.processing = false;
                    this.disabled = false;
                }  
            },
            submitVideo(e){
                e.preventDefault();
                this.processing = true;
                this.disabled = true;
                var fileInput = document.getElementById('archivoType');
                axios.post('/profesor/subir_video', this.getDatos(), { headers: { 'content-type': 'multipart/form-data' } })
                    .then(response => {
                        this.comprobarError(response, fileInput);
                    })
                    .catch(error => {
                        this.mostrarErrores(error);
                    });  
            },
            submitEnlace(categoria){
                this.enlace.seccione_id = this.seccion_id;
                if(this.seccion_id == undefined)
                    this.enlace.seccione_id = 'undefined';
                this.enlace.categoria_id = categoria;
                this.processing = true;
                this.disabled = true;
                axios.post('/profesor/store_enlace', this.enlace).then(response => {
                    this.errors = {};
                    this.success = true;
                    this.enlace = {
                        seccione_id: null,
                        categoria_id: 0,
                        titulo: '',
                        url: 'https://'
                    };
                    this.processing = false;
                    this.disabled = false;
                    this.$emit('updateEnlaces', response.data);
                })
                .catch(error => {
                    this.mostrarErrores(error);
                });
            },
            inicializar(){
                this.titulo = '';
                this.errors = {};
                this.errorExist = '';
                this.success = false;
                this.enlace = {
                    seccione_id: null,
                    categoria_id: 0,
                    titulo: '',
                    url: 'https://'
                };
            },
            getDatos(){
                let formData = new FormData();
                formData.append('file', this.file);
                formData.append('seccione_id', this.seccion_id);
                formData.append('titulo', this.titulo);
                return formData;
            },
            comprobarError(response, fileInput){
                this.errorExist = '';
                this.errors = {};
                if(response.data.status != 422){
                    this.titulo = '';
                    this.file = '';
                    fileInput.value = null;
                    this.success = true;
                    this.$emit('updateArchivos', response.data);
                }
                else{
                    this.errorExist = response.data.message;
                }
                this.processing = false;
                this.disabled = false;
            },
            mostrarErrores(error){
                this.errors = {};
                if (error.response.status === 422) {
                    this.errors = error.response.data.errors || {};
                }
                this.processing = false;
                this.disabled = false;
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