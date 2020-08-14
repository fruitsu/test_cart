require('./bootstrap');

import store from './store.js';
import Vue from 'vue';
import App from "./components/App";
import Cart from "./components/pages/cart/Cart";
import PayForm from "./components/pages/form/PayForm";
import ProductsList from "./components/components/products/ProductsList";
import Home from "./components/components/routes/Home";

import VueRouter from 'vue-router';

Vue.use(VueRouter);

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'home',
            component: Home
        },
        {
            path: '/cart',
            name: 'cart',
            component: Cart,
        },
        {
            path: '/shipping',
            name: 'shipping',
            component: PayForm,
        },
    ],
});

const app = new Vue({
    el: '#app',
    store: new Vuex.Store(store),
    components: {App, Cart, PayForm, ProductsList, Home},
    router,
});
