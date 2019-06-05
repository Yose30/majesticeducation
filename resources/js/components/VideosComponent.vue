<template>
    <div>
        <table class="table">
            <tbody>
                <tr v-for="video in videos">
                    <td>{{ video.titulo }}</td>
                    <td align="center">
                        <b-button 
                            :style="{'background-color': '#7d4f9d'}" 
                            v-on:click="datos(video)" 
                            v-b-modal.modal-vid 
                            v-b-tooltip.hover 
                            title="Reproducir video">
                                <i class="fa fa-eye"></i>
                        </b-button>
                    </td>
                </tr>
            </tbody>
        </table>
        <div>
            <b-modal id="modal-vid" size="xl" :title="video.titulo" centered hide-footer>
                <iframe 
                    width="100%" 
                    height="75%" 
                    :src="video.url" 
                    frameborder="0" 
                    allowfullscreen>
                </iframe>
            </b-modal>
        </div>
  
    </div>
</template>


<script>
    export default {
        name: 'app',
        props: ['videos'],
        data() {
            return {
                video: '',
            }
        },
        methods: {
            datos(video) {
                console.log(video);
                this.video = video;
            }
        }
    }
</script>
