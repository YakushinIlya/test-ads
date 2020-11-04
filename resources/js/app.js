/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
require('./bootstrap');
window.Vue = require('vue');

import VueRouter from 'vue-router'
Vue.use(VueRouter)

import CKEditor from 'ckeditor4-vue';
Vue.use(CKEditor);


import Profile from './views/Profile'
import ProfileEdit from './views/ProfileEdit'
import MyAds from './views/MyAds'
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
Vue.component('form-component', require('./components/FormComponent.vue').default);
Vue.component('page-component', require('./components/PageComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/profile',
            name: 'profile',
            component: Profile
        },
        {
            path: '/profile/edit',
            name: 'profileEdit',
            component: ProfileEdit
        },
        {
            path: '/profile/myads',
            name: 'myads',
            component: MyAds
        },
    ],
});


Vue.prototype.axios = window.axios;
const app = new Vue({
    el: '#app',
    router,
    editorData: '<p>Привет, я текст...</p>',
    editorConfig: {
        language: 'ru',
    }
});
