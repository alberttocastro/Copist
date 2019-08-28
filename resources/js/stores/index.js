import Vue from 'vue'
import Vuex from 'vuex'
import axios from 'axios'

Vue.use(Vuex);

export const store = new Vuex.Store({
    state: {
        //TODO: Armazenar tokens num lugar mais seguro.
        access_token: window.localStorage.getItem('access_token') || '',
        refresh_token: window.localStorage.getItem('refresh_token') || '',
        expire_at: window.localStorage.getItem('expire_at') || '',
        user: {
            name: '',
            email: '',
        }
    },
    mutations: {
        save_credentials(state, payload) {
            state.access_token = payload.access_token;
            state.refresh_token = payload.refresh_token;
            state.expire_at = new Date(Date.now() + payload.expires_in);

            window.localStorage.setItem(
                "refresh_token",
                payload.refresh_token
            );
            window.localStorage.setItem(
                "access_token",
                payload.access_token
            );
            window.localStorage.setItem(
                "token_expire_time",
                new Date(Date.now() + payload.expires_in)
            );
        },
        delete_credentials(state, payload) {
            state.access_token = '';
            state.refresh_token = '';
            state.expire_at = '';

            window.localStorage.removeItem('access_token');
            window.localStorage.removeItem('refresh_token');
            window.localStorage.removeItem('expire_at');
        }
    },
    actions: {
        api_authenticate(state, payload) {
            const qs = require("querystring");
            const instance = axios.create();

            let data = {
                grant_type: "password",
                client_id: 3,
                client_secret: "27bwUgA0jBYAc9zDSy4urDXtYLYitoW8Wd1psw9v",
                username: payload.email,
                password: payload.password
            };

            return instance
                .post(payload.url, qs.stringify(data), {
                    headers: {
                        "Content-Type": "application/x-www-form-urlencoded",
                    }
                })
                .then(response => {
                    this.commit('save_credentials', response.data);

                    return response;
                })
        },
        logout(state) {
            this.commit('delete_credentials');
        }
    },
    getters: {
        isLoggedIn(state) {
            return state.access_token != '' || (state.expire_at != '' && Date.now() > state.expire_at)
        }
    }
})
