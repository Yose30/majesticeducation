<template>
    <div>
        <div class="text-right">
            <b-button variant="success" @click="formPregunta = true"><i class="fa fa-plus"> Agregar pregunta</i></b-button>
        </div>
        <div v-if="!formPregunta">
            <b-row>
                <b-col>
                    <b-list-group flush v-for="(question, i) in questions" v-bind:key="i">
                        <b-list-group-item><b-link @click="pRespuestar(question)">{{ question.pregunta }}</b-link></b-list-group-item>
                    </b-list-group>
                </b-col>
                <b-col>
                    <b-list-group flush v-for="(respuesta, i) in respuestas" v-bind:key="i">
                        <b-list-group-item>{{ respuesta.respuesta }}</b-list-group-item>
                    </b-list-group>
                </b-col>
            </b-row>
        </div>
        <diV v-if="formPregunta">
            <hr>
            <div>
                <label for="input-pregunta">Pregunta</label>
                <b-row>
                    <b-col>
                        <b-form-input v-model="formP.pregunta" :disabled="processing" id="input-pregunta" required></b-form-input>
                    </b-col>
                    <b-col>
                        <b-button 
                            variant="outline-info" 
                            v-if="formP.pregunta.length > 6 && !mostrarRespuestas" 
                            @click="mostrarRespuestas = true">
                            Continuar
                        </b-button>
                    </b-col>
                </b-row>
                <hr>
                <div v-if="mostrarRespuestas">
                    <b-row>
                        <b-col v-if="mostrarForm">
                            <b-form-group label-cols="5" label-cols-lg="2" label="Respuesta" label-for="input-respuesta">
                                <b-form-input v-model="formR.respuesta" :disabled="processing" id="input-respuesta" required></b-form-input>
                            </b-form-group>
                            <b-form-group label-cols="5" label-cols-lg="2" label="Valor" label-for="input-valor">
                                <b-form-select v-model="formR.valor" :options="options" :disabled="processing"></b-form-select>
                            </b-form-group>
                            <div class="d-block text-right">
                                <b-button 
                                    variant="success"
                                    :disabled="processing" 
                                    v-if="formR.respuesta.length > 3 && formR.valor != null" 
                                    @click="agregarRespuesta">
                                    <i class="fa fa-check"></i> Guardar respuesta
                                </b-button>
                            </div>
                        </b-col>
                        <b-col>
                            <b-list-group flush v-for="(respuesta, i) in formRespuestas" v-bind:key="i">
                                <b-list-group-item>
                                    <b-row>
                                        <b-col>{{ respuesta.respuesta }}</b-col>
                                        <b-col>
                                            <strong v-if="respuesta.valor == 'Correcto'" style="color: green;">{{ respuesta.valor }}</strong>
                                            <strong v-if="respuesta.valor == 'Incorrecto'" style="color: red;">{{ respuesta.valor }}</strong>
                                        </b-col>
                                    </b-row>
                                </b-list-group-item>
                            </b-list-group>
                        </b-col>
                    </b-row>
                </div>
                <hr>
                <div class="d-block text-right">
                    <b-button :disabled="processing" @click="submitPregunta" v-if="formRespuestas.length > 0" variant="success">
                        <i class="fa fa-check"></i> {{ !processing ? 'Guardar' : 'Guardando' }} <b-spinner small v-if="processing"></b-spinner>
                    </b-button>
                </div>
            </div>
        </diV>
    </div>
</template>

<script>
    export default {
        name: 'app',
        props: ['preguntas'],
        data() {
            return {
                options: [
                    { value: null, text: 'Porfavor selecciona una opción' },
                    { value: 'Correcto', text: 'Correcto' },
                    { value: 'Incorrecto', text: 'Incorrecto' },
                ],
                questions: this.preguntas,
                mostrarRespuestas: false,
                formPregunta: false,
                formRespuestas: [],
                processing: false,
                formR: {
                    respuesta: '',
                    valor: null,
                },
                formP: {
                    pregunta: '',
                    respuestas: []
                },  
                mostrarForm: true,
                respuestas: [],
                correcta: 0,
            }
        },
        methods: {
            submitPregunta(){
                this.processing = true;
                this.mostrarForm = false;
                this.formP.respuestas = this.formRespuestas;
                axios.post('/profesor/nueva_pregunta', this.formP).then(response => {
                    this.processing = false;
                    this.formP = { pregunta: '', respuestas: [] }
                    this.mostrarRespuestas = false;
                    this.formPregunta = false;
                    this.mostrarForm = true;
                    this.questions.push(response.data);
                })
                .catch(error => {
                    this.processing = false;
                    this.$bvToast.toast('Ocurrio un problema, vuelve a intentarlo', {
                        title: "Error",
                        variant: 'danger',
                        solid: true
                    })
                });
            },
            agregarRespuesta(){
                if(this.formR.valor == 'Correcto'){
                    if(this.correcta == 0){
                        this.correcta = 1;
                        this.formRespuestas.push(this.formR);
                        this.formR = { respuesta: '', valor: null, };
                    }
                    else{
                       this.$bvToast.toast('Ya existe una respuesta correcta', {
                            title: "Error",
                            variant: 'warning',
                            solid: true
                        }) 
                    }                    
                }
                else{
                    this.formRespuestas.push(this.formR);
                    this.formR = { respuesta: '', valor: null, };
                }
            },
            pRespuestar(question){
                this.respuestas = [];
                this.respuestas = question.respuestas;
            }
        }
    }
</script>