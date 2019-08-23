/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
window.moment = require('moment');

import Vue from 'vue'
import BootstrapVue from 'bootstrap-vue'

Vue.use(BootstrapVue)

import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'


/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));
Vue.component('editar-evaluacion-component', require('./components/EditarEvaluacionComponent.vue').default);
Vue.component('new-evaluacion-component', require('./components/NewEvaluacionComponent.vue').default);
Vue.component('lista-recursos-component', require('./components/ListaRecursosComponent.vue').default);
Vue.component('form-pregunta-component', require('./components/FormPreguntaComponent.vue').default);
Vue.component('evaluacion-component', require('./components/EvaluacionComponent.vue').default);
Vue.component('contenidoa-component', require('./components/ContenidoAComponent.vue').default);
Vue.component('contenido-component', require('./components/ContenidoComponent.vue').default);
Vue.component('preguntas-component', require('./components/PreguntasComponent.vue').default);
Vue.component('recursos-component', require('./components/RecursosComponent.vue').default);
Vue.component('datos-component', require('./components/DatosComponent.vue').default);
Vue.component('form-component', require('./components/FormComponent.vue').default);


Vue.component('prueba-component', require('./components/PruebaComponent.vue').default);
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',

    mounted() {
        Echo.channel('prueba').listen('NewRecurso', (e) => {
            console.log(e.recurso);
        })
    }
});
