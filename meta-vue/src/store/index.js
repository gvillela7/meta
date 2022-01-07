import { createStore } from 'vuex'

export default createStore({
    state: {
        products: []
    },
    mutations: {
        SEARCH_PRODUCTS(state, payload) {
            state.products = payload
        },
        UPDATE_PRODUCTS(state, payload) {
            state.products = payload
        }
    },
    actions: {
        searchProduct(context, payload) {
            const products = context.state.products
            products.push(payload)
            context.commit('SEARCH_PRODUCTS', products)
        },
        updateProducts(context, payload) {
            context.commit('UPDATE_PRODUCTS', payload)
        }
    },
    getters: {
        productsFind: function (state) {
            return state.products[0]
        }
    }
})
