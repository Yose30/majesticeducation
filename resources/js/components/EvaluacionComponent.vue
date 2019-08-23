<template>
    <div>
        <b-tabs content-class="mt-3">
            <b-tab title="Evaluaciones" active @click="inicio">
                <!-- LISTADO DE EVALUACIONES -->
                <div v-if="listadoEvaluaciones">
                    <div align="right">
                        <b-button 
                            variant="success" 
                            @click="listadoEvaluaciones = false; crearEvaluacion = true;">
                            <i class="fa fa-plus"></i> Crear evaluación
                        </b-button>
                    </div>
                    <hr>
                    <b-table v-if="evaluaciones.length > 0" :items="evaluaciones" :fields="fields">
                        <template slot="index" slot-scope="row">
                            {{ row.index + 1 }}
                        </template>
                        <template slot="detalles" slot-scope="row">
                            <b-button variant="info" @click="func_viewDetalles(row.item)">
                                Detalles
                            </b-button>
                        </template>
                        <template slot="editar" slot-scope="row">
                            <b-button 
                                variant="warning" 
                                @click="func_editarEvaluacion(row.item, row.index)"
                                style="color: white;">
                                <i class="fa fa-edit"></i> Editar
                            </b-button>
                        </template>
                    </b-table>
                </div>
                <!-- DETALLES DE LA EVALUACIÓN -->
                <div v-if="viewDetalles">
                    <h5>{{ evaluacion.titulo }}</h5>
                    <hr>
                    <b-table :items="evaluacion.preguntas" :fields="fieldsP">
                        <template slot="index" slot-scope="row">
                            {{ row.index + 1 }}
                        </template>
                        <template slot="[show_details]" slot-scope="row">
                            <b-button variant="info" @click="row.toggleDetails">
                                {{ !row.detailsShowing ? 'Mostrar' : 'Ocultar'}}
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
                    </b-table>
                </div>
                <!-- CRAR EVALUACIÓN -->
                <div v-if="crearEvaluacion">
                    <new-evaluacion-component :preguntas="preguntas" @nuevaEvaluacion="func_nueva"></new-evaluacion-component>
                </div>
                <!-- EDITAR EVALUACIÓN -->
                <div v-if="editarEvaluacion">
                    <editar-evaluacion-component 
                        :evaluacion="evaluacion" 
                        :preguntas="preguntas"
                        @cambiosEvaluacion="func_cambios">
                    </editar-evaluacion-component>
                </div>
            </b-tab>

            <b-tab title="Preguntas">
                <preguntas-component :preguntas="preguntas"></preguntas-component>
            </b-tab>
        </b-tabs>
    </div>
</template>

<script>
    export default {
        name: 'app',
        props: ['preguntas'],
        data() {
            return {
                fields: [{key: 'index', label: 'N.'}, 'titulo', {key: 'detalles', label: ''}, 'editar'],
                fieldsP: [
                    {key: 'index', label: 'N.'}, 
                    'pregunta', 
                    {key: 'show_details', label: 'Respuestas'}
                ],
                fieldsR: ['respuesta', 'valor'],
                editarEvaluacion: false,
                viewDetalles: false,
                evaluacion: {},
                crearEvaluacion: false,
                listadoEvaluaciones: true,
                posicion: null,
                evaluaciones: []
            }
        },
        created: function(){
            this.all_evaluaciones();
		},
        methods: {
            all_evaluaciones(){
                axios.get('/profesor/obtener_evaluaciones').then(response => {
                    this.evaluaciones = response.data
                })
                .catch(error => {
                    this.makeToast('danger', 'Error', 'No se pudieron obtener las evaluaciones');
                });
            },
            inicio(){
                this.listadoEvaluaciones = true;
                this.viewDetalles = false;
                this.crearEvaluacion = false;
                this.editarEvaluacion = false;
            },
            func_viewDetalles(evaluacion){
                axios.get('/profesor/detalles_evaluacion', {params: {evaluacion_id: evaluacion.id}})
                .then(response => {
                    this.ini_evaluacion(response.data);
                    this.listadoEvaluaciones = false;
                    this.viewDetalles = true;
                })
                .catch(error => {
                    this.makeToast('danger', 'Error', 'Ocurrio un problema, vuelve a intentar');
                });
            },
            func_nueva(evaluacion){
                this.crearEvaluacion = false;
                this.listadoEvaluaciones = true;
                this.evaluaciones.push(evaluacion);
                this.makeToast('success', 'Mensaje', 'La evaluación se creo correctamente');
            },
            func_editarEvaluacion(evaluacion, i){
                this.posicion = i;
                axios.get('/profesor/detalles_evaluacion', {params: {evaluacion_id: evaluacion.id}})
                .then(response => {
                    this.ini_evaluacion(response.data);
                    this.listadoEvaluaciones = false;
                    this.editarEvaluacion = true;
                })
                .catch(error => {
                    this.makeToast('danger', 'Error', 'Ocurrio un problema, vuelve a intentar');
                });
            },
            func_cambios(evaluacion){
                this.editarEvaluacion = false;
                this.listadoEvaluaciones = true;
                this.evaluaciones[this.posicion].titulo = evaluacion.titulo;
                this.makeToast('success', 'Mensaje', 'La evaluación se modifico correctamente');
            },
            ini_evaluacion(evaluacion){
                this.evaluacion = {};
                this.evaluacion.id = evaluacion.id;
                this.evaluacion.titulo = evaluacion.titulo;
                this.evaluacion.preguntas = evaluacion.preguntas;
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
