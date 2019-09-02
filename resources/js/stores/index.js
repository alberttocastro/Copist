import Vue from 'vue'
import Vuex from 'vuex'
import axios from 'axios'

Vue.use(Vuex);

export const store = new Vuex.Store({
    state: {
        //TODO: Armazenar tokens num lugar mais seguro.
        access_token: window.localStorage.getItem('access_token') || null,
        refresh_token: window.localStorage.getItem('refresh_token') || null,
        expire_at: window.localStorage.getItem('expire_at') || null,
        user: {
            name: null,
            email: null,
            publisher_id: null,
            is_admin: false
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
            state.access_token = null;
            state.refresh_token = null;
            state.expire_at = null;

            window.localStorage.removeItem('access_token');
            window.localStorage.removeItem('refresh_token');
            window.localStorage.removeItem('expire_at');
        }
    },
    actions: {
        api_authenticate(context, payload) {
            const qs = require("querystring");
            const instance = axios.create();

            let data = {
                grant_type: "password",
                client_id: 3,
                client_secret: "27bwUgA0jBYAc9zDSy4urDXtYLYitoW8Wd1psw9v",
                username: payload.email,
                password: payload.password
            };

            instance.defaults.headers.common = {
                "Content-Type": "application/json"
            }

            instance
                .post(payload.url, qs.stringify(data))
                .then(response => {
                    this.commit('save_credentials', response.data);
                    context.state.user.email = payload.email;
                }).catch(motive => {
                    console.log(motive);
                });

            this.dispatch('set_ajax_headers');
            this.dispatch('get_data');
        },
        logout(context) {
            this.commit('delete_credentials');
        },
        get_data(context) {
            if (this.getters.isLoggedIn) {
                if (context.state.user.name == null) {
                    axios.get("api/v1/users/current").then(response => {
                        context.state.user.email = response.data.email;
                        context.state.user.name = response.data.name;
                        context.state.user.is_admin = response.data.is_admin;
                        if (response.data.publisher_id != 0)
                            context.state.user.publisher_id = response.data.publisher_id;
                    })
                }
            }

            this.dispatch('set_ajax_headers');

            return context.state.user;
        },
        set_ajax_headers(context) {
            let store = this;
            if (this.getters.isLoggedIn) {
                axios.defaults.headers.common = {
                    Authorization: "Bearer " + store.state.access_token,
                    "Content-Type": "application/json",
                    Accept: "application/json"
                };
            } else {
                axios.defaults.headers.common = {
                    "Content-Type": "application/json",
                    Accept: "application/json"
                }
            }
        },
    },
    getters: {
        isLoggedIn(state) {
            return state.access_token != null || (state.expire_at != null && Date.now() > state.expire_at)
        },
        isAuthorized(state) {
            return state.user.publisher_id != 0
        },
        isAdmin(state) {
            return state.user.is_admin
        }
    }
})
