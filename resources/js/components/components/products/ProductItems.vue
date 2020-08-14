<template>
    <div class="product__margin">

        <div class="product__right__border">
            <img class="product__image " src="../../../../images/gallery.svg"/>

            <div class="product__padding">
                <div class="product__title" v-text="item.name"></div>
                <div class="product__description" v-text="item.description"></div>
            </div>
        </div>

        <div class="product__bar">
            <div class="product_add">
                <button class="input__icon minus" @click.prevent="removeFromCart(item)">-</button>
                <div>
                    <input class="type__number"
                           :min="0"
                           :max="50"
                           @change="validateQuantity()"
                           v-model="item.quantity">
                </div>
                <button class="input__icon plus" :disabled="item.quantity > 49" @click="addToCart(item)">+</button>
                <div class="product__price">{{ item.price.toFixed(2) }}$</div>
                <img
                    width="24"
                    height="24"
                    @click="cleanCart(item)"
                    class="input__trash"
                    src="../../../../images/trash.svg">
            </div>
        </div>

    </div>

</template>

<script>
    export default {
        name: "ProductItems",
        props: {
            item: Object
        },
        methods: {
            addToCart(item) {
                this.$store.commit('addToCart', item);
            },
            removeFromCart(item) {
                this.$store.commit('removeFromCart', item);
            },
            cleanCart(item) {
                this.$store.commit('cleanCart', item);
            },
            validateQuantity() {
                if (this.item.quantity > 49) {
                    this.$store.commit('validateQuantity', this.item.id)
                }

            },
        },
    }
</script>

