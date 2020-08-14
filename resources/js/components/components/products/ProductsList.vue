<template>
    <div class="container">
        <home></home>
        <div class="product__container">
            <product-items v-for="item in $store.state.carts" :key="item.id" :item="item"></product-items>
            <div class="product__total">{{ $store.state.cartCount.toFixed(2) }}$</div>

            <div class="button__align__right">
                <router-link class="submit__button" :to="{ name: 'shipping' }">BUY</router-link>
            </div>

        </div>
    </div>
</template>

<script>
    import axios from 'axios';
    import ProductItems from "./ProductItems";
    import Home from "../routes/Home";

    export default {
        components: {ProductItems, Home},
        methods: {
            setItem() {
                axios.get('/api/products')
                    .then((data) => {
                        this.$store.commit('saveProducts', data.data.data)
                    })
            },
        },
        created() {
            this.setItem()
        },
    }
</script>

