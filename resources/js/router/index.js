import Vue from 'vue';
import VueRouter from 'vue-router';

Vue.use(VueRouter);

//creo un array di rotte che conterranno path, name e component
const routes = [];

// creo l'istanza del VueRouter 
const router = new VueRouter({
    mode: 'history',
    routes: routes,
});

// esporto l'istanza 
export default router;