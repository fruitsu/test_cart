<template>
    <div class="c_modal">
        <div class="c_modal-wrapper">
            <div class="c_modal-reveal delete-form-wrap opened">
                <div class="c_modal-content">
                    <span class="modal-text">Thank you for your order!</span>
                    <button class="modal-submit-button" @click.prevent="closeModal">Proceed</button>
                    <div class="delete-form-wrap" id="confirm-delete-modal">
                        <slot />
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Modal",
        methods: {
            closeModal() {
                this.$emit('closeModal');
                this.$router.push({path: '/'});
                this.$store.commit('clearCart');
            },
        }
    }
</script>

<style scoped>

</style>
