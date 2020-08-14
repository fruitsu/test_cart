<template>
    <products-list></products-list>
</template>

<script>
    import ProductsList from "../../components/products/ProductsList";
    export default {
        components: {ProductsList},
        methods: {
            addToCart(item) {
                this.$store.commit('addToCart', item);
            },
            removeFromCart(item) {
                this.$store.commit('removeFromCart', item);
            }
        },
        computed: {
            totalPrice() {
                let total = 0;
                for (let item of this.$store.state.carts) {
                    total += item.totalPrice;
                }
                return total.toFixed(2);
            }
        },
        data() {
            return {
                items: [],
            };
        },
    }
</script>

