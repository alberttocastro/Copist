import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex);

export const store = new Vuex.Store({
    state: {
        layout: 'standard-layout'
    },
    mutations: {
        SET_LAYOUT(state, payload) {
            state.layout = payload;
        }
    },
    getters: {
        layout(state) {
            return state.layout;
        }
    }
})
