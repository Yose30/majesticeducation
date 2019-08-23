<template>
    <div>
        <div class="text-right">
            <b-button variant="success" v-b-modal.modal-pregunta @click="newPregunta">
                <i class="fa fa-plus"> Crear pregunta</i>
            </b-button>
        </div>
        <!-- MOSTRAR TABLA DE PREGUNTAS CON SUS RESPUESTAS -->
        <b-table 
            :fields="fieldsP" 
            :items="preguntas" 
            :current-page="currentPage"
            :per-page="perPage"
            id="my-questions">
            <template slot="respuestas" slot-scope="row">
                <b-button variant="info" @click="row.toggleDetails"> 
                    {{ row.detailsShowing ? 'Ocultar' : 'Mostrar'}}
                </b-button>
            </template>
            <template slot="row-details" slot-scope="row">
                <b-table :items="row.item.respuestas" :fields="fieldsR">
                    <template slot="valor" slot-scope="row">
                        <strong v-if="row.item.valor == 'Correcto'" style="color: green;">
                            <i class="fa fa-check"></i> Correcto
                        </strong>
                        <strong v-else style="color: red;">
                            <i class="fa fa-close"></i> Incorrecto
                        </strong>
                    </template>
                </b-table>
            </template>
            <template slot="editar" slot-scope="row">
                <b-button 
                    variant="warning" 
                    v-b-modal.modal-pregunta 
                    @click="editarPregunta(row.item, row.index)"
                    style="color: white;">
                    <i class="fa fa-edit"></i> Editar
                </b-button>
            </template>
            <template slot="eliminar" slot-scope="row">
                <!-- <b-button variant="danger"><i class="fa fa-minus-circle"></i> Eliminar</b-button> -->
            </template>
        </b-table>
        <b-pagination
            v-model="currentPage"
            :total-rows="preguntas.length"
            :per-page="perPage"
            class="my-questions">
        </b-pagination>

        <!-- MODALS -->
        <b-modal v-model="show" title="">
            <p><b><i class="fa fa-exclamation-triangle"></i> No se guardara ningún cambio</b></p>
            <div slot="modal-footer">
                <b-button @click="func_cancelar_cambios">OK</b-button>
            </div>
        </b-modal>  

        <b-modal id="modal-pregunta" size="lg" :title="`${ editar ? 'Editar' : 'Crear' } pregunta`">
            <form-pregunta-component 
                :formP="formP" 
                :editar="editar"
                @updatePreguntas="actPreguntas">
            </form-pregunta-component>
            <div slot="modal-footer"></div>
        </b-modal>
    </div>
</template>

<script>
    export default {
        name: 'app',
        props: ['preguntas'],
        data() {
            return {
                fieldsP: ['pregunta', 'respuestas', 'editar', { key: 'eliminar', label: '' }],
                fieldsR: ['respuesta', 'valor'],
                questions: this.preguntas,
                formPregunta: false,
                formP: {
                    pregunta: '',
                    respuestas: []
                },  
                respuestas: [],
                currentPage: 1,
                show: false,
                perPage: 5,
                editar: false,
                posicion: 0,
            }
        },
        methods: {
            newPregunta(){
                this.formP = { pregunta: '', respuestas: [] };
                this.editar = false;
            },
            editarPregunta(pregunta, i){
                this.formP = { pregunta: '', respuestas: [] };
                this.formP = pregunta;
                this.editar = true;
                this.posicion = i;
            },
            func_cancelar_cambios(){
                this.formP = { pregunta: '', respuestas: [] };
                this.formPregunta = false;
                this.respuestas = [];
                this.show = false;
            },
            actPreguntas(pregunta){
                if(!this.editar){
                    this.questions.push(pregunta);
                }
                else{
                    this.questions[this.posicion] = pregunta;
                }
                this.$bvModal.hide('modal-pregunta');
                this.func_cancelar_cambios();
            }
        }
    }
</script>
 
 <style>
    #btnClose{
        background-color: transparent;
        color: red;
        border: none;
        font-size: 20px;
    }
 </style>
 