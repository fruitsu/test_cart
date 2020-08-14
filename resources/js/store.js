let store = {
    state: {
        cartCount: cartCount ? parseInt(cartCount) : 0,
        carts: [],
    },
    mutations: {
        updatePrice(state) {
            let totalPrice = 0;
            state.carts.map(cart => {
                totalPrice = totalPrice + cart.price * cart.quantity;
            });
            state.cartCount = totalPrice;
        },
        addToCart(state, item) {
            state.carts.map(carts => {
                if (carts.id === item.id) {
                    if (carts.quantity) {
                        carts.quantity = carts.quantity + 1;
                        carts.totalPrice = carts.quantity * carts.price;
                    } else {
                        carts.quantity = 1;
                        carts.totalPrice = item.price;
                    }
                }
            });
            this.commit('updatePrice');
            this.commit('saveCart');
        },
        removeFromCart(state, item) {
            state.carts.map(carts => {
                if (carts.id === item.id) {
                    carts.quantity = carts.quantity === 0 ? carts.quantity = 0 : carts.quantity - 1;
                }
            });
            this.commit('updatePrice');
            this.commit('saveCart');
        },
        cleanCart(state, item) {
            state.carts.map(carts => {
                if (carts.id === item.id) {
                    carts.quantity = 0;
                }
            });
            this.commit('updatePrice');
            this.commit('saveCart');
        },
        validateQuantity(state, id) {
            state.carts.map(items => {
                if (items.id === id) {
                    items.quantity = 50;
                    this.commit('updatePrice');
                }
            });
        },
        saveCart(state) {
            window.localStorage.setItem('cart', JSON.stringify(state.carts));
            window.localStorage.setItem('cartCount', state.cartCount);
        },
        saveProducts(state, item) {
            item.map(res => {
                res.quantity = 0
                res.totalPrice = null
            });
            state.carts = item;
        },
        clearCart(state) {
            state.carts = [];
            state.cartCount = 0;
        }
    },
};
export default store;

let cart = window.localStorage.getItem('cart');
let cartCount = window.localStorage.getItem('cartCount');

