<template>
    <div>
        <div v-if="archivo.categoria_id == 1">
            <form @submit="updateArchivo" enctype="multipart/form-data">
                <b-form-group label-cols="4" label-cols-lg="2" label="Titulo" label-for="input-titulo-archivo">
                    <b-form-input v-model="titulo" :disabled="disabled" id="input-titulo-archivo" required></b-form-input>
                    <div v-if="errors && errors.titulo" class="text-danger">{{ errors.titulo[0] }}</div>
                </b-form-group>
                <b-form-group label-cols="4" label-cols-lg="2" label="Archivo" label-for="input-archivo">
                    <p><strong>Archivo</strong>: {{ archivo.name }}</p>
                    <input type="file" id="archivoType" :disabled="disabled" class="custom-file" v-on:change="onArchivoChange">
                    <div v-if="errors && errors.file" class="text-danger">{{ errors.file[0] }}</div>
                    <div v-if="errorExist != ''" class="text-danger">{{ errorExist }}</div>
                    <p>Extensión: .pdf, .doc, .ppt, .xls</p>
                </b-form-group>
                <hr>
                <div class="d-block text-right">
                    <b-button v-if="!processing" type="submit" variant="success"><i class="fa fa-check"></i> Guardar</b-button>
                    <b-spinner v-if="processing" label="Loading..."></b-spinner>
                </div>
            </form>
            <b-alert show dismissible v-if="success">
                <i class="fa fa-check"></i> Archivo actualizado
            </b-alert>
        </div>
        <div v-if="archivo.categoria_id == 2">
            <form @submit="updateAudio" enctype="multipart/form-data">
                <b-form-group label-cols="4" label-cols-lg="2" label="Titulo" label-for="input-titulo-audio">
                    <b-form-input v-model="titulo" :disabled="disabled" id="input-titulo-audio" required></b-form-input>
                    <div v-if="errors && errors.titulo" class="text-danger">{{ errors.titulo[0] }}</div>
                </b-form-group>
                <b-form-group label-cols="4" label-cols-lg="2" label="Audio" label-for="input-audio">
                    <p><strong>Audio</strong>: {{ archivo.name }}</p>
                    <input type="file" id="archivoType" :disabled="disabled" class="custom-file" v-on:change="onArchivoChange">
                    <div v-if="errors && errors.file" class="text-danger">{{ errors.file[0] }}</div>
                    <div v-if="errorExist != ''" class="text-danger">{{ errorExist }}</div>
                    <p>Extensión: .mp3, .mpeg, .aac, .wav</p>
                </b-form-group>
                <hr>
                <div class="d-block text-right">
                    <b-button v-if="!processing" type="submit" variant="success"><i class="fa fa-check"></i> Guardar</b-button>
                    <b-spinner v-if="processing" label="Loading..."></b-spinner>
                </div>
            </form>
            <b-alert show dismissible v-if="success">
                <i class="fa fa-check"></i> Audio actualizado
            </b-alert>
        </div>
        <div v-if="archivo.categoria_id == 3">
            <form @submit="updateVideo" enctype="multipart/form-data">
                <b-form-group label-cols="4" label-cols-lg="2" label="Titulo" label-for="input-titulo-video">
                    <b-form-input v-model="titulo" :disabled="disabled" id="input-titulo-video" required></b-form-input>
                    <div v-if="errors && errors.titulo" class="text-danger">{{ errors.titulo[0] }}</div>
                </b-form-group>
                <b-form-group label-cols="4" label-cols-lg="2" label="Video" label-for="input-video">
                    <p><strong>Video</strong>: {{ archivo.name }}</p>
                    <input type="file" id="archivoType" :disabled="disabled" class="custom-file" v-on:change="onArchivoChange">
                    <div v-if="errors && errors.file" class="text-danger">{{ errors.file[0] }}</div>
                    <div v-if="errorExist != ''" class="text-danger">{{ errorExist }}</div>
                    <p>Extensión: .mp4, .mpeg, .ogg, .webm</p>
                </b-form-group>
                <hr>
                <div class="d-block text-right">
                    <b-button v-if="!processing" type="submit" variant="success"><i class="fa fa-check"></i> Guardar</b-button>
                    <b-spinner v-if="processing" label="Loading..."></b-spinner>
                </div>
            </form>
            <b-alert show dismissible v-if="success">
                <i class="fa fa-check"></i> Video actualizado
            </b-alert>
        </div>
        <div v-if="link.titulo">
            <b-form @submit.prevent="updateEnlace()">
                <b-form-group label-cols="4" label-cols-lg="2" label="Titulo" label-for="input-titulo-video">
                    <b-form-input v-model="link.titulo" :disabled="disabled" id="input-titulo-video"></b-form-input>
                    <div v-if="errors && errors.titulo" class="text-danger">{{ errors.titulo[0] }}</div>
                </b-form-group>
                <b-form-group label-cols="4" label-cols-lg="2" label="Link del video" label-for="input-video">
                    <b-form-input v-model="link.url" :disabled="disabled" id="input-video"></b-form-input>
                    <div v-if="errors && errors.url" class="text-danger">{{ errors.url[0] }}</div>
                </b-form-group>
                <hr>
                <div class="d-block text-right">
                    <b-button v-if="link.url.length > 10 && !processing" type="submit" variant="success"><i class="fa fa-check"></i> Guardar</b-button>
                    <b-spinner v-if="processing" label="Loading..."></b-spinner>
                </div>
            </b-form>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'app',
        props: ['archivo', 'enlace'],
        data() {
            return {
                titulo: this.archivo.titulo,
                file: '',
                errors: {},
                success: false,
                errorExist: '',
                processing: false,
                disabled: false,
                datos: {},
                aud: false,
                link: this.enlace,
            }
        },
        methods: {
            onArchivoChange(e){
                this.file = e.target.files[0];
                this.aud = true;
            },
            updateArchivo(e) {
                this.inicio(e);
                var fileInput = document.getElementById('archivoType');
                axios.post('/profesor/editar_archivo', this.getDatos(), { headers: { 'content-type': 'multipart/form-data' } })
                    .then(response => {
                        this.comprobarError(response, fileInput);
                    })
                    .catch(error => {
                        this.mostrarErrores(error);
                    });
            },
            updateAudio(e) {
                this.inicio(e);
                var fileInput = document.getElementById('archivoType');
                var allowedExtensions = /(\.wav|\.mp3|\.mpeg|\.aac)$/i;
                if(this.aud){
                    if(allowedExtensions.exec(fileInput.value)){
                        this.metodoPostAudio(fileInput);
                    }
                    else{
                        this.errorExist = 'El audio debe ser de tipo: mp3, mpeg, aac ó wav.';
                    }
                }
                else{
                    this.metodoPostAudio(fileInput);
                }
                
            },
            updateVideo(e){
                this.inicio(e);
                var fileInput = document.getElementById('archivoType');
                axios.post('/profesor/editar_video', this.getDatos(), { headers: { 'content-type': 'multipart/form-data' } })
                    .then(response => {
                        this.comprobarError(response, fileInput);
                    })
                    .catch(error => {
                        this.mostrarErrores(error);
                    });
            },
            updateEnlace(){
                this.processing = true;
                this.disabled = true;
                axios.post('/profesor/editar_enlace', this.link).then(response => {
                    this.errors = {};
                    this.$emit('updateEnlace', response.data);
                    this.processing = false;
                    this.disabled = false;
                })
                .catch(error => {
                    this.mostrarErrores(error);
                });
            },
            metodoPostAudio(fileInput){
                axios.post('/profesor/editar_audio', this.getDatos(), { headers: { 'content-type': 'multipart/form-data' } })
                    .then(response => {
                        this.comprobarError(response, fileInput);
                    })
                    .catch(error => {
                        this.mostrarErrores(error);
                    });
            },
            inicio(e){
                e.preventDefault();
                this.processing = true;
                this.disabled = true;
            },
            getDatos(){
                let formData = new FormData();
                formData.append('file', this.file);
                // formData.append('seccione_id', this.seccion_id);
                formData.append('archivo_id', this.archivo.id);
                formData.append('titulo', this.titulo);
                return formData;
            },
            comprobarError(response, fileInput){
                this.errorExist = '';
                this.errors = {};
                if(response.data.status != 422){
                    this.titulo = this.titulo;
                    this.file = '';
                    fileInput.value = null;
                    this.success = true;
                    this.$emit('updateArchivo', response.data);
                }
                else{
                    this.errorExist = response.data.message;
                }
                this.processing = false;
                this.disabled = false;
            },
            mostrarErrores(error){
                this.errorExist = '';
                this.errors = {};
                if (error.response.status === 422) {
                    this.errors = error.response.data.errors || {};
                }
                this.processing = false;
                this.disabled = false;
            },
        }
    }
</script>