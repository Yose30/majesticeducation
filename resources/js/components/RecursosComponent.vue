<template>
    <div>
        <div class="d-block text-right">
            <b-button v-b-modal.modal-1 variant="light"><i class="fa fa-plus"></i> Agregar recurso</b-button>
        </div>

        <b-modal id="modal-1" size="xl" title="Agregar recurso">
            <b-container class="bv-example-row">
                <b-row>
                    <b-col sm="4">
                        <b-form-group label="Elegir recurso">
                            <b-form-radio v-model="selected" name="actividad" value="1">Actividad</b-form-radio>
                            <b-form-radio v-model="selected" name="archivo" value="2">Archivo</b-form-radio>
                            <b-form-radio v-model="selected" name="audio" value="3">Audio</b-form-radio>
                            <b-form-radio v-model="selected" name="video" value="4">Video</b-form-radio>
                            <b-form-radio v-model="selected" name="link" value="5">url</b-form-radio>
                            <b-form-radio v-model="selected" name="evaluacion" value="6">Evaluación</b-form-radio>
                        </b-form-group>
                        <div class="mt-3">Selected: <strong>{{ selected }}</strong></div>
                    </b-col>
                    <b-col sm="8">
                        <div v-if="selected == 2">
                            <b-form @submit.prevent="submitArchivo">
                                <b-form-group label-cols="4" label-cols-lg="2" label="Titulo" label-for="input-titulo-archivo">
                                    <b-form-input v-model="archivo.titulo" id="input-titulo-archivo"></b-form-input>
                                </b-form-group>
                                <b-form-group label-cols="4" label-cols-lg="2" label="Archivo" label-for="input-archivo">
                                    <b-form-file
                                        id="input-archivo"
                                        v-model="archivo.file"
                                        :state="Boolean(archivo.file)"
                                        placeholder="Elegir archivo..."
                                        drop-placeholder="Colocar archivo aqui..."
                                    ></b-form-file>
                                    <p>Archivos: .pdf, .docx, .pptx, .xlsx</p>
                                </b-form-group>
                                <hr>
                                <div class="d-block text-right">
                                    <b-button v-if="archivo.file != null" type="submit" variant="success"><i class="fa fa-check"></i> Guardar</b-button>
                                </div>
                            </b-form>
                        </div>
                        <div v-if="selected == 3">
                            <b-form>
                                <b-form-group label-cols="4" label-cols-lg="2" label="Titulo" label-for="input-titulo-audio">
                                    <b-form-input v-model="audio.titulo" id="input-titulo-audio"></b-form-input>
                                </b-form-group>
                                <b-form-group label-cols="4" label-cols-lg="2" label="Audio" label-for="input-audio">
                                    <b-form-file
                                        id="input-audio"
                                        v-model="audio.file"
                                        :state="Boolean(audio.file)"
                                        placeholder="Elegir audio..."
                                        drop-placeholder="Colocar audio aqui..."
                                    ></b-form-file>
                                </b-form-group>
                                <hr>
                                <div class="d-block text-right">
                                    <b-button v-if="audio.file != null" type="submit" variant="success"><i class="fa fa-check"></i> Guardar</b-button>
                                </div>
                            </b-form>
                        </div>
                        <div v-if="selected == 4">
                            <b-form>
                                <b-form-group label-cols="4" label-cols-lg="2" label="Titulo" label-for="input-titulo-video">
                                    <b-form-input v-model="video.titulo" id="input-titulo-video"></b-form-input>
                                </b-form-group>
                                <b-form-group label-cols="4" label-cols-lg="2" label="Link del video" label-for="input-video">
                                    <b-form-input v-model="video.url" id="input-video"></b-form-input>
                                </b-form-group>
                                <hr>
                                <div class="d-block text-right">
                                    <b-button v-if="video.url.length > 10" type="submit" variant="success"><i class="fa fa-check"></i> Guardar</b-button>
                                </div>
                            </b-form>
                        </div>
                        <div v-if="selected == 5">
                            <b-form>
                                <b-form-group label-cols="4" label-cols-lg="2" label="Titulo" label-for="input-titulo-url">
                                    <b-form-input v-model="link.titulo" id="input-titulo-url"></b-form-input>
                                </b-form-group>
                                <b-form-group label-cols="4" label-cols-lg="2" label="url a sitio web" label-for="input-url">
                                    <b-form-input v-model="link.url" id="input-url"></b-form-input>
                                </b-form-group>
                                <hr>
                                <div class="d-block text-right">
                                    <b-button v-if="link.url.length > 12" type="submit" variant="success"><i class="fa fa-check"></i> Guardar</b-button>
                                </div>
                            </b-form>
                        </div>
                    </b-col>
                </b-row>
            </b-container>
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
                archivo: {
                    seccione_id: 0,
                    titulo: '',
                    file: null,
                }, //PENDIENTE
                link: {
                    titulo: '',
                    url: 'https://'
                },
                audio: {
                    seccione_id: 0,
                    titulo: '',
                    file: null,
                },
                video: {
                    titulo: '',
                    url: ''
                },
            }
        },
        methods: {
            submitArchivo(){
                console.log(this.form)
                // axios.post('/profesor/subir_archivo', this.file).then(response => {
                //     console.log(response);
                // })
                // .catch(error => {
                //     console.log(error.response)
                // });
            }
        }
    }
</script>