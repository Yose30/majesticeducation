<template>
    <div>
        <div class="text-right">
            <b-button :disabled="processing" @click="guardarPregunta" variant="success">
                <i class="fa fa-check"></i> {{ !processing ? 'Guardar' : 'Guardando' }} <b-spinner small v-if="processing"></b-spinner>
            </b-button>
        </div>
        <label for="input-pregunta">Pregunta</label>
        <b-row>
            <b-col>
                <b-form-input v-model="form.pregunta" :state="stateP" :disabled="processing" id="input-pregunta" required></b-form-input>
            </b-col>
            <b-col>
                <b-form-group label-cols="5" label-cols-lg="2" label="Respuesta" label-for="input-respuesta">
                    <b-form-input v-model="formR.respuesta" :state="stateR" :disabled="processing" id="input-respuesta" required></b-form-input>
                </b-form-group>
                <b-form-group label-cols="5" label-cols-lg="2" label="Valor" label-for="input-valor">
                    <b-form-select v-model="formR.valor" :state="stateO" :options="options" :disabled="processing"></b-form-select>
                </b-form-group>
                <div class="d-block text-right">
                    <b-button 
                        variant="outline-success"
                        :disabled="processing"
                        @click="agregarRespuesta">
                        <i class="fa fa-check"></i> Guardar respuesta
                    </b-button>
                </div>
            </b-col>
        </b-row>
        <hr>
        <div v-if="form.respuestas.length > 0">
            <b-table :fields="fieldsR" :items="form.respuestas">
                <template slot="valor" slot-scope="data">
                    <strong v-if="data.item.valor == 'Correcto'" style="color: green;">
                        <i class="fa fa-check"></i> Correcto
                    </strong>
                    <strong v-else style="color: red;">
                        <i class="fa fa-close"></i> Incorrecto
                    </strong>
                </template>
                <template slot="eliminar" slot-scope="data">
                    <b-button variant="secondary" @click="eliminarRespuesta(data.item, data.index)">
                        <i class="fa fa-minus-circle"></i>
                    </b-button>
                </template>
            </b-table>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'app',
        props: ['formP', 'editar'],
        data() {
            return {
                options: [
                    { value: null, text: 'Porfavor selecciona una opción' },
                    { value: 'Correcto', text: 'Correcto' },
                    { value: 'Incorrecto', text: 'Incorrecto' },
                ],
                fieldsR: ['respuesta', 'valor', 'eliminar'],
                mostrarRespuestas: false, 
                mostrarForm: false,
                processing: false, 
                form: {
                    id: this.formP.id,
                    pregunta: this.formP.pregunta,
                    respuestas: this.formP.respuestas,
                    nuevos: [],
                    eliminados: []
                },
                formR: {
                    respuesta: '',
                    valor: null,
                    tipo: 'Nuevo'
                }, 
                pregunta: {},
                correcta: 0,
                eliminados: [],
                nuevos: [],
                stateP: null,
                stateR: null,
                stateO: null,
            }
        },
        created: function(){
			if(this.editar){
                this.correcta = 1;
            }
		},
        methods: {
            guardarPregunta(){
                if(this.form.pregunta.length > 5){
                    this.stateP = null;
                    if(this.form.respuestas.length > 0){
                        if(this.correcta != 0){
                            this.processing = true;
                            if(this.editar == false){
                                axios.post('/profesor/nueva_pregunta', this.form).then(response => {
                                    this.func_cambios();
                                    this.func_respuesta(response);
                                })
                                .catch(error => {
                                    this.processing = false;
                                    this.makeToast('Ocurrio un problema, vuelve a intentarlo', 'danger', 'Error');
                                });
                            }
                            else{
                                this.form.eliminados = this.eliminados;
                                this.form.nuevos = this.nuevos;
                                axios.post('/profesor/editar_pregunta', this.form).then(response => {
                                    this.func_respuesta(response);
                                })
                                .catch(error => {
                                    this.processing = false;
                                    this.makeToast('Ocurrio un problema, vuelve a intentarlo', 'danger', 'Error');
                                });
                            }
                        }
                        else{
                            this.makeToast('Definir respuesta correcta', 'warning', 'Mensaje');
                        }
                    }
                    else{
                        this.makeToast('Definir respuestas', 'warning', 'Mensaje');
                    }
                }
                else{
                    this.makeToast('La pregunta debe ser mayor a 5 caracteres', 'warning', 'Mensaje');
                    this.stateP = false;
                }
            },
            agregarRespuesta(){
                if(this.formR.respuesta.length > 3){
                    this.stateR = null;
                    if(this.formR.valor != null){
                        this.stateO = null;
                        if(this.formR.valor == 'Correcto'){
                            if(this.correcta == 0){
                                this.correcta = 1;
                                this.func_agregar_respuesta();
                            }
                            else{
                                this.makeToast('Ya existe una respuesta correcta', 'warning', 'Mensaje');
                            }                    
                        }
                        else{
                            this.func_agregar_respuesta();
                        }
                    }
                    else{
                        this.stateO = false;
                        this.makeToast('Seleccionar el valor de la respuesta', 'warning', 'Mensaje');
                    }
                }
                else{
                    this.stateR = false;
                    this.makeToast('La respuesta debe ser mayor a 3 caracteres', 'warning', 'Mensaje');
                }
            },
            func_agregar_respuesta(){
                if(this.editar){
                   this.nuevos.push(this.formR); 
                }
                this.form.respuestas.push(this.formR);
                this.formR = { respuesta: '', valor: null, tipo: ''};
            },
            func_cambios(){
                this.formR = { respuesta: '', valor: null, };
                this.mostrarRespuestas = false;
                this.pregunta = {};
            },
            func_respuesta(response){
                this.processing = false;
                this.pregunta = response.data.pregunta;
                this.pregunta.respuestas = response.data.respuestas;
                this.$emit('updatePreguntas', this.pregunta);
            },
            eliminarRespuesta(respuesta, i){
                if(respuesta.valor == 'Correcto')
                    this.correcta = 0;

                if(this.editar)
                   this.eliminados.push(respuesta);
                    
                this.form.respuestas.splice(i, 1);
            },
            makeToast(mensaje, variante, titulo){
                this.$bvToast.toast(mensaje, {
                    title: titulo,
                    variant: variante,
                    solid: true
                });
            }
        }
    }
</script>

