/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
require('./bootstrap');

import vue from 'vue';

window.Vue = vue;

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))


Vue.component('animal-list-component', require('./components/AnimalsListComponent.vue').default);
Vue.component('animal-show-component', require('./components/AnimalsShowComponent').default);
Vue.component('animal-edit-component', require('./components/AnimalsEditComponent').default);
Vue.component('species-show-component', require('./components/SpeciesShowComponent').default);
Vue.component('species-list-component', require('./components/SpeciesListComponent').default);
Vue.component('species-edit-component', require('./components/SpeciesEditComponent').default);
Vue.component('query-message', require('./components/base/QueryMessage.vue').default);
Vue.component('animals-search-component', require('./components/AnimalsSearchComponent').default);

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('query-message', require('./components/base/QueryMessage.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});
