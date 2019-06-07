<template>
    <div>
        <table class="table">
            <tbody>
                <tr v-for="link in links">
                    <td>{{ link.titulo }}</td>
                    <td>
                        <b-button 
                            :style="{'background-color': '#7d4f9d'}" 
                            v-on:click="datos(link)" 
                            v-b-modal.modal-aud 
                            v-b-tooltip.hover 
                            title="Abrir link">
                                <i class="fa fa-globe"></i>
                        </b-button>
                    </td>
                </tr>
            </tbody>
        </table>
  
    </div>
</template>


<script>
    export default {
        name: 'app',
        props: ['links'],
        data() {
            return {
                link: '',
            }
        },
        methods: {
            datos(link) {
                console.log(link);
                this.link = link;
            }
        }
    }
</script>
