<template>
    <div>
        <b-row>
            <b-col>{{ archivo.titulo }}</b-col>
            <b-col class="text-right">
                <div class="d-block text-right">
                    <a class="btn btn-outline-primary" 
                        :href="'/descargar_archivo/' + unidad.id + '/' + archivo.id">
                        <i class="fa fa-download"></i>
                    </a>
                    <b-button variant="primary"
                        v-if="archivo.extension == 'pdf' || archivo.extension == 'mp4'" 
                        @click="viewM()" >
                        <i class="fa fa-eye"></i>
                    </b-button>
                    <b-button variant="primary"
                        v-if="archivo.extension != 'pdf' && archivo.extension != 'mp4'" 
                        target="_blank" 
                        :href="`${archivo.public_url}`">
                        <i class="fa fa-eye"></i>
                    </b-button>
                </div>
            </b-col>
        </b-row>
    </div>
</template>

<script>
    export default {
        name: 'app',
        props: ['archivo', 'unidad'],
        data() {
            return {
                viewArchivo: {
                    titulo: '',
                    url: '',
                    categoria_id: 0
                },
            }
        },
        methods: {
            viewM(){
                this.viewArchivo = {
                    titulo: this.archivo.titulo,
                    url: this.archivo.public_url,
                    categoria_id: this.archivo.categoria_id
                }
                this.$emit('mostrarModal', this.viewArchivo);
            }
        }
    }
</script>