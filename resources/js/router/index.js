import Vue from 'vue';
import VueRouter from 'vue-router';

Vue.use(VueRouter);

// importo il componente che userò per la rotta 
import Posts from '../pages/Posts.index.vue';
import Contact from '../pages/Contact.vue';
import ShowPost from '../pages/Posts.show.vue';
import PageNotFound from '../pages/404.vue';
//creo un array di rotte che conterranno path, name e component
const routes = [
    {
        path: '/posts',
        name: 'posts.index',
        component: Posts,
    },
    {
        path: '/contact',
        name: 'contact',
        component: Contact,
    },
    {
        path: '/posts/:slug',  //path con parametro, in questo caso slug
        name: 'posts.show',
        component: ShowPost,
    },
    {
        path: '/*',  //recupera tutte le rotte diverse da quelle non definite
        component: PageNotFound,
    }
];

// creo l'istanza del VueRouter 
const router = new VueRouter({
    mode: 'history',
    routes: routes,
});

// esporto l'istanza 
export default router;