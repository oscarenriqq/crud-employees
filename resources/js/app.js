import './bootstrap'
import '../css/app.css'
import 'primeicons/primeicons.css'
import { createWebHistory, createRouter } from 'vue-router';

import { createApp } from 'vue';

import App from './App.vue';
import HomePage from './pages/HomePage.vue';
import AddEmployeePage from './pages/AddEmployeePage.vue';
import EditEmployeePage from './pages/EditEmployeePage.vue';
import DeleteEmployeePage from './pages/DeleteEmployeePage.vue';

const routes = [
    { path: '/', component: HomePage },
    { path: '/add', component: AddEmployeePage, name: 'add' },
    { path: '/edit/:id', component: EditEmployeePage, name: 'edit' },
    { path: '/delete/:id', component: DeleteEmployeePage, name: 'delete' },
]

const router = createRouter({
    history: createWebHistory(),
    routes
})

const app = createApp(App);
app.use(router)
app.mount('#app')