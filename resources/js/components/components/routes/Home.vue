<template>
    <div class="intro">
        <h1>Shopping cart</h1>

        <router-link :to="{ name: 'home' }">Home</router-link>
        <router-link :to="{ name: 'cart' }">Cart</router-link>

    </div>
</template>

<script>
    export default {
        name: "Home"
    }
</script>

<style scoped>

</style>
