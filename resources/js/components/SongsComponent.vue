<template>
    <div>
        <table class="table">
            <tbody>
                <tr v-for="song in songs">
                    <td>{{ song.titulo }}</td>
                    <td>
                        <b-button 
                            :style="{'background-color': '#7d4f9d'}" 
                            v-on:click="datos(song)" 
                            v-b-modal.modal-aud 
                            v-b-tooltip.hover 
                            title="Reproducir audio">
                                <i class="fa fa-volume-up"></i>
                        </b-button>
                    </td>
                    <td>
                        <a 
                            class="btn" 
                            :href="audioDescargar+song.url" 
                            :style="{'background-color': '#7d4f9d', 'color': '#ffffff'}" 
                            v-b-tooltip.hover 
                            title="Descargar audio">
                            <i class="fa fa-download"></i>
                        </a>
                    </td>
                    <td></td>
                </tr>
            </tbody>
        </table>
        <div>
            <b-modal id="modal-aud" :title="audioTitulo" centered hide-footer>
                <audio controls :src="audioUrl"></audio>
            </b-modal>
        </div>

    </div>
</template>


<script>
    export default {
        name: 'app',
        props: ['songs'],
        data() {
            return {
                audioUrl: '',
                audioTitulo: '',
                audioDescargar: 'https://drive.google.com/uc?export=download&id='
            }
        },
        methods: {
            datos(song) {
                console.log("https://drive.google.com/uc?id="+song.url);
                this.audioUrl = "https://drive.google.com/uc?id="+song.url;
                this.audioTitulo = song.titulo;
            },
        }
    }
</script>
