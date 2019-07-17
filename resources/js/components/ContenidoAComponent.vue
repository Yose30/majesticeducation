<template>
    <div>
        <b-tabs pills card vertical nav-wrapper-class="w-25">
            <b-tab title="Inicio" active>
                
            </b-tab>
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
            </b-tab>
        </b-tabs>
        <b-modal size="xl" v-model="modaldoc" :title="`${vArchivo.titulo}`">
            <embed :src="`${vArchivo.url}`" type="application/pdf" width="100%" height="450px" />
            <div slot="modal-footer"></div>
        </b-modal>
        <b-modal v-model="modalaud" :title="`${vArchivo.titulo}`">
            <audio controls :src="`${vArchivo.url}`"></audio>
            <div slot="modal-footer"></div>
        </b-modal>
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
            }
        },
        methods: {
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
            }
        }
    }
</script>