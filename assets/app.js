import './styles/app.css';
import './bootstrap';
import Vue from 'vue';
import VueRouter from 'vue-router'
import App from './components/App.vue';
import Tasks from './components/Tasks.vue';
import Users from './components/Users.vue';
import VueAxios from 'vue-axios';
import axios from 'axios';

Vue.use(VueRouter);
Vue.use(VueAxios, axios);

const routes = [
    {
        name: 'Tasks',
        path: '/',
        component: Tasks
    },
    {
        name: 'Users',
        path: '/',
        component: Users
    }
];

const router = new VueRouter({ mode: 'history', routes: routes });

/*new Vue({
    el: "#app",
    components: { App }
})*/

new Vue(Vue.util.extend({ router }, App)).$mount('#app');
