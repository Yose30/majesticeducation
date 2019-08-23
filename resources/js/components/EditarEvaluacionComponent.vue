<template>
    <div>
        <b-row>
            <b-col sm="9">
                <b-form-group label-cols="1" label-cols-lg="2" label="Titulo de la evaluación" label-for="input-titulo-evaluacion">
                    <b-form-input v-model="evaluacion.titulo" :state="state" :disabled="processing" id="input-titulo-evaluacion"></b-form-input>
                </b-form-group>
            </b-col>
            <b-col sm="3">
                <b-button variant="success" @click="func_guardarCambios" :disabled="processing">
                    <b-spinner v-if="processing" small type="grow"></b-spinner> 
                    <i class="fa fa-check" v-if="!processing"></i>
                    {{ !processing ? 'Guardar cambios' : 'Guardando' }}
                </b-button>
            </b-col>
        </b-row>
        <b-button variant="primary" :disabled="processing" v-b-modal.modal-seleccionar><i class="fa fa-plus"></i> Seleccionar preguntas</b-button>
        <b-table :fields="fields" :items="evaluacion.preguntas">
            <template slot="index" slot-scope="row">
                {{ row.index + 1 }}
            </template>
            <template slot="eliminar" slot-scope="row">
                <b-button variant="secondary" :disabled="processing" @click="eliminarPregunta(row.item, row.index)">
                    <i class="fa fa-minus-circle"></i>
                </b-button>
            </template>
        </b-table>
        <b-modal id="modal-seleccionar" size="lg" title="Seleccionar preguntas">
            <div align="right">
                <b-button 
                    variant="success" 
                    @click="agregarSeleccionadas">
                    <i class="fa fa-check"></i> Agregar preguntas
                </b-button>
            </div>
            <hr>
            <b-table
                ref="selectableTable"
                selectable
                :select-mode="selectMode"
                selected-variant="success"
                :items="preguntas"
                :fields="fieldsP"
                @row-selected="onRowSelected"
                responsive="sm">
                <template slot="index" slot-scope="row">
                    {{ row.index + 1 }}
                </template>
                <template slot="[selected]" slot-scope="{ rowSelected }">
                    <template v-if="rowSelected">
                        <span aria-hidden="true">&check;</span>
                        <span class="sr-only">Selected</span>
                    </template>
                </template>
            </b-table>
           <div slot="modal-footer"></div>
        </b-modal>
    </div>
</template>

<script>
    export default {
        name: 'app',
        props: ['evaluacion', 'preguntas'],
        data() {
            return {
                fields: [{key: 'index', label: 'N.'}, 'pregunta', 'eliminar'],
                fieldsP: [{key: 'index', label: 'N.'}, 'pregunta',{key: 'selected', label: ''}],
                selectMode: 'multi',
                processing: false,
                selected: [],
                eliminados: [],
                nuevos: [],
                form: {
                    id: 0,
                    titulo: '',
                    nuevos: [],
                    eliminados: []
                },
                posiciones: [],
                state: null,
            }
        },
        methods: {
            agregarSeleccionadas(){
                if(this.selected.length > 0){
                    this.selected.forEach(select => {
                        this.nuevos.push(select);
                        this.evaluacion.preguntas.push(select);
                    });
                    this.selected = [];
                    this.$bvModal.hide('modal-seleccionar');
                }
                else{
                    this.makeToast('warning', 'Mensaje', 'Seleccionar preguntas')
                }
            },
            eliminarPregunta(pregunta, i){
                this.eliminados.push(pregunta);
                this.evaluacion.preguntas.splice(i, 1);
            },
            func_guardarCambios(){
                if(this.evaluacion.titulo.length > 5){
                    this.state = null;
                    if(this.evaluacion.preguntas.length > 0){
                        this.form = {
                            id: this.evaluacion.id,
                            titulo: this.evaluacion.titulo,
                            nuevos: this.nuevos,
                            eliminados: this.eliminados
                        };
                        this.processing = true;
                        axios.put('/profesor/actualizar_evaluacion', this.form).then(response => {
                            this.processing = false;
                            this.$emit('cambiosEvaluacion', response.data);
                        })
                        .catch(error => {
                            this.processing = false;
                            this.makeToast('danger', 'Error', 'Ocurrio un problema, vuelve a intentar');
                        });
                    }
                    else{
                        this.makeToast('warning', 'Mensaje', 'Seleccionar preguntas');
                    }
                }
                else{
                    this.state = false;
                    this.makeToast('warning', 'Mensaje', 'El titulo debe ser mayor a 5 caracteres');
                }
            },
            onRowSelected(items) {
                this.selected = items;
            },
            makeToast(variante, titulo, descripcion){
                this.$bvToast.toast(descripcion, {
                    title: titulo,
                    variant: variante,
                    solid: true
                });
            },

            // mostrarGuardados(){
            //     this.estado = false;
            //     this.evaluacion.preguntas.forEach(element => {
            //         this.preguntas.forEach((pregunta, i) => { 
            //             if(element.id == pregunta.id){
            //                 this.$refs.selectableTable.selectRow(i)
            //             }
                        
            //         });
            //     });
                
            // },
        }
    }
</script>
