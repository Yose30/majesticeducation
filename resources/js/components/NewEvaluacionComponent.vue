<template>
    <div>
        <b-row>
            <b-col sm="10">
                <b-form-group label-cols="5" label-cols-lg="3" label="Titulo de la evaluación" label-for="input-titulo-evaluacion">
                    <b-form-input 
                        v-model="evaluacion.titulo" 
                        :disabled="processing" 
                        id="input-titulo-evaluacion"
                        :state="state">
                    </b-form-input>
                </b-form-group>
            </b-col>
            <b-col sm="2">
                <b-button 
                    variant="success" 
                    :disabled="processing"
                    @click="submitEvaluacion">
                    <b-spinner v-if="processing" small type="grow"></b-spinner> 
                    <i class="fa fa-check" v-if="!processing"></i>
                    {{ !processing ? 'Guardar' : 'Guardando' }}
                </b-button>
            </b-col>
        </b-row>
        <hr>
        <label>Selecciona las preguntas</label>
        <b-table
            selectable
            :select-mode="selectMode"
            selectedVariant="success" 
            @row-selected="rowSelected"
            :fields="fieldsP" 
            :items="preguntas" >
            <template slot="[selected]" slot-scope="{ rowSelected }">
                <template v-if="rowSelected">
                    <span aria-hidden="true">&check;</span>
                    <span class="sr-only">Selected</span>
                </template>
            </template>
        </b-table>
    </div>
</template>

<script>
    export default {
        name: 'app',
        props: ['preguntas'],
        data() {
            return {
                fieldsP: ['id', 'pregunta',{key: 'selected', label: ''}],
                selectMode: 'multi',
                processing: false,
                evaluacion: {
                    titulo: '',
                    preguntas: []
                },
                selected: [],
                state: null,
            }
        },
        methods: {
            rowSelected(items) {
                this.selected = items;
            },
            submitEvaluacion(){
                if(this.evaluacion.titulo.length > 5){
                    this.state = null;
                    if(this.selected.length > 0){
                        this.evaluacion.preguntas = this.selected;
                        this.processing = true;
                        axios.post('/profesor/nueva_evaluacion', this.evaluacion).then(response => {
                            this.selected = [];
                            this.evaluacion = {titulo: '', preguntas: []};
                            this.processing = false;
                            this.$emit('nuevaEvaluacion', response.data);
                        })
                        .catch(error => {
                            this.processing = false;
                            this.makeToast('danger', 'Error', 'Ocurrio un problema, vuelve a intentar');
                        });
                    }
                    else{
                        this.makeToast('warning', 'Mensaje', 'Seleccionar preguntas');
                    }
                }else{
                    this.state = false;
                    this.makeToast('warning', 'Mensaje', 'El titulo debe ser mayor a 5 caracteres');
                }
            },
            makeToast(variante, titulo, descripcion){
                this.$bvToast.toast(descripcion, {
                    title: titulo,
                    variant: variante,
                    solid: true
                });
            }
        }
    }
</script>