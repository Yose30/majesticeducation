<template>
    <div>
        <ul class="list-group list-group-flush">
            <div v-for="song in songs">
                <li class="list-group-item">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <td>{{ song.titulo }}</td>
                                <td>
                                    <b-button :style="{'background-color': '#7d4f9d'}" v-on:click="datos(song)" v-b-modal.modal-1 v-b-tooltip.hover title="Reproducir audio">
                                        <i class="fa fa-volume-up"></i>
                                    </b-button>
                                </td>
                                <td>
                                    <b-button variant="success" v-b-modal.modal-1 v-b-tooltip.hover title="Descargar audio">
                                        <i class="fa fa-download"></i>
                                    </b-button>
                                </td>
                                <td></td>
                            </tr>
                        </thead>
                    </table>
                </li>
            </div>
        </ul>
        <div>
            <b-modal id="modal-1" :title="audio.titulo" centered hide-footer>
                <audio controls :src="audio.url"></audio>
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
