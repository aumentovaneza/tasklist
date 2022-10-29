/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */


require('./bootstrap');

import Vue from 'vue'
import axios from 'axios'
import VueAxios from 'vue-axios'
import VueTailwind from 'vue-tailwind'
import UUID from 'vue-uuid'
import VueSwal from 'vue-swal'
import VueToastr from "vue-toastr";

import { TTable } from 'vue-tailwind/dist/components';

const settings = {
    't-table': {
        component: TTable,
    },
    // ...Rest of the components
}

Vue.use(VueTailwind, settings)
Vue.use(VueAxios, axios)
Vue.use(UUID);
Vue.use(VueSwal);
Vue.use(VueToastr);
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('sign-out-button', require('./components/SignOutButton.vue').default);
Vue.component('generic-button', require('./components/ButtonComponent.vue').default);
Vue.component('task-item-component', require('./components/TaskItemComponent.vue').default);
Vue.component('task-modal-component', require('./components/modals/TaskModal.vue').default);
Vue.component('task-reorder-modal-component', require('./components/modals/TaskReOrderModal.vue').default);
Vue.component('new-status-modal-component', require('./components/modals/NewStatusModal.vue').default);
Vue.component('download-data-modal-component', require('./components/modals/DownloadDataModal.vue').default);
Vue.component('restore-data-modal-component', require('./components/modals/RestoreArchivedTasksModal.vue').default);
Vue.component('task-item-restore-component', require('./components/TaskItemRestoreComponent.vue').default);
Vue.component('tasks-list-component', require('./components/TasksListComponent.vue').default);
Vue.component('statistics-modal-component', require('./components/modals/StatisticsModal.vue').default);
Vue.component('group-modal', require('./components/modals/GroupModal.vue').default);
Vue.component('group-list-component', require('./components/GroupListComponent.vue').default);



/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});
