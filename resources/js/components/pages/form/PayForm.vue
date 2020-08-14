<template>
    <div class="container">
        <home></home>
        <form id="app">

            <div class="shipping__form">

                <div class="shipping__field">
                    <label>Name<span class="input__required">*</span></label>
                    <input type="text" v-model="name" placeholder="Jon Doe"/>
                </div>
                <div>
                    <span class="input__error" v-if="error.name && click">{{error.name}}</span>
                </div>

                <div class="shipping__field">
                    <label>Address<span class="input__required">*</span></label>
                    <input type="text" v-model="address" placeholder="Lansstraße-81"/>
                </div>
                <div>
                    <span class="input__error" v-if="error.address && click">{{error.address}}</span>
                </div>

                <div class="shipping__field">
                    <label>Phone</label>
                    <input type="tel" v-model="phone" placeholder="+48"/>
                </div>

                <div class="shipping__field">
                    <label>E-mail</label>
                    <input v-model="email" placeholder="example@test.com"/>
                </div>
                <div>
                    <span class="input__error" v-if="error.email">{{error.email}}</span>
                </div>

                <div class="shipping__field">
                    <label>Shipping options</label>
                    <select v-model="price">
                        <option v-for="(shippingType, index) in shippingTypes"
                                :value="shippingType.price"
                                :key="index">
                            {{shippingType.name}}
                        </option>
                    </select>
                </div>

                <div class="button__align__right">
                    <button
                        type="submit"
                        class="submit__button"
                        value="Submit"
                        :disabled="isDisabled"
                        @click.prevent="openModal"
                        :class="isDisabled ? 'disabledButton' : 'activeButton' "
                    >PAY
                    </button>
                    <modal v-if="modal" @closeModal="closeModal"></modal>
                </div>

            </div>

        </form>
    </div>
</template>

<script>
    import axios from 'axios';
    import Modal from "../../components/modal/Modal";
    import Home from "../../components/routes/Home";

    export default {
        components: {
            Home,
            Modal
        },
        data() {
            return {
                name: null,
                address: null,
                phone: null,
                email: null,
                price: 0,
                click: false,
                shippingTypes: [],
                error: {
                    name: '',
                    address: '',
                    email: ''
                },
                modal: false,
            }
        },
        watch: {
            name(value) {
                this.validateName(value);
            },
            address(value) {
                this.validateAddress(value);
            },
            email(value) {
                this.validateEmail(value);
            }
        },
        methods: {
            closeModal() {
                this.modal = false;
            },
            openModal() {
                this.modal = true;
            },
            setPrice() {
                axios.get('/api/prices')
                    .then((data) => {
                        this.freeShipping(data.data.data)
                    })
            },
            checkForm() {
                if (this.name && this.address) {
                    return true;
                }

                if (!this.name) {
                    this.error.name = 'Please enter your name.';
                }

                if (!this.address) {
                    this.error.address = 'Please enter your address.';
                }
            },
            validateName() {
                let valid = true;
                if (!/^[a-zA-Z ]*$/.test(this.name)) {
                    this.error.name = 'Please enter valid name';

                } else {
                    if (this.name) {
                        this.error.name = '';
                        valid = false;
                    } else {
                        this.error.name = 'Please enter valid name';
                    }
                }

                return valid;
            },
            validateAddress() {
                let valid = true;
                if (this.address) {
                    this.error.address = '';
                    valid = false;
                } else {
                    this.error.address = 'Please enter valid address';
                }
                return valid;
            },
            validateEmail() {
                let valid = true;
                if (!this.email || /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(this.email)) {
                    this.error.email = '';
                    valid = false;
                } else {
                    this.error.email = 'Invalid Email Address';
                }
                return valid;
            },
            freeShipping(data) {
                if (this.$store.state.cartCount >= 300) {
                    this.shippingTypes = [data[0]];
                } else {
                    this.shippingTypes = data;
                }
            }
        },
        created() {
            this.setPrice()
        },
        computed: {
            isDisabled() {
                if (!this.validateName() && !this.validateAddress() && !this.validateEmail()) {
                    return false;
                }
                return true;
            }
        },
    }
</script>
