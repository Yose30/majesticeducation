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
                        <b-button 
                            :style="{'background-color': '#7d4f9d'}" 
                            v-b-tooltip.hover 
                            title="Descargar audio">
                                <i class="fa fa-download"></i>
                        </b-button>
                    </td>
                    <td></td>
                </tr>
            </tbody>
        </table>
        <div>
            <b-modal id="modal-aud" :title="audio.titulo" centered hide-footer>
                <audio width="300" height="326" controls :src="audio.url"></audio>
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
                audio: '',
            }
        },
        methods: {
            datos(song) {
                console.log(song);
                this.audio = song;
            }
        }
    }
</script>
