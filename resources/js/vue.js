window.routes = {
    PREFIX_V1: "/api/v1",
    addresses: function (id = null) {
        return id == null ? `${this.PREFIX_V1}/addresses` : `${this.PREFIX_V1}/addresses/${id}`
    },
    address_suggestions: function (id = null) {
        return id == null ? `${this.PREFIX_V1}/addresses/suggested` : `${this.PREFIX_V1}/addresses/suggested/${id}`
    },
    card_users_available: function (card_id) {
        return `${this.PREFIX_V1}/cards/${card_id}/users`;
    },
    assignments: function () {
        return `${this.PREFIX_V1}/assignments`
    },
    assignment_finish: function (assignment_id) {
        return `${this.PREFIX_V1}/assignments/${assignment_id}`
    },
    assignments_card_finish: function (card_id) {
        return `${this.PREFIX_V1}/cards/${card_id}/assignments`
    },
    user_assignments: function (user_id) {
        return `${this.PREFIX_V1}/assignments/user/${user_id}`
    },
    users: function () {
        return `${this.PREFIX_V1}/users`;
    },
    publishers: function () {
        return `${this.PREFIX_V1}/publishers`
    },
    macro_regions: function () {
        return `${this.PREFIX_V1}/macroregions`
    },
    cards: function () {
        return `${this.PREFIX_V1}/cards`
    },
    address_types: function () {
        return `${this.PREFIX_V1}/addresstypes`
    },
    idioms: function () {
        return `${this.PREFIX_V1}/idioms`
    },
    nationalities: function () {
        return `${this.PREFIX_V1}/nationalities`
    },
    permissions: function () {
        return `${this.PREFIX_V1}/permissions`
    }
};

window.forms = {
    /**
     * 
     * Este método tem por função criar um objecto JSON da maneira correta para ser enviado junto com uma requisição 
     */
    serialize: function (object) {
        let final_object = {};
        $.each($(object).find("input"), function (idx, el) {
            let obj = $(el);
            if (obj.prop('type') == "checkbox") {
                final_object[$(el).prop('name')] = $(el).prop('checked')
            } else if (obj.prop('type') == "text") {
                if (obj.parent().find('select').length > 0) {
                    if (obj.parent().find('select').val() != null && obj.parent().find('select').val() != "0") {
                        final_object[obj.parent().find('select').prop('name')] = obj.parent().find('select').val();
                    }
                } else {
                    final_object[obj.prop('name')] = obj.val()
                }
            } else {
                final_object[obj.prop('name')] = obj.val()
            }
        });
        return final_object;
    }
}

/**
 * Vue será usado para fazer componentes reativos consumindo banco de dados
 */
window.Vue = require('vue');

import Vue from 'vue'
import axios from 'axios'
import VueAxios from 'vue-axios'
import VueRouter from 'vue-router'

import App from '@/js/views/App.vue';

import {
    store
} from '@/js/stores/index'

Vue.use(VueAxios, axios)
Vue.use(VueRouter)

require('./components.js');

import router from '@/js/router.js'

var routes = {
    data: function () {
        return {
            routes: window.routes
        }
    }
}

var forms = {
    data: function () {
        return {
            forms: window.forms
        }
    }
}

window.vm = new Vue({
    el: "#vue",
    router,
    store,
    render: h => h(App),
    mixins: [
        routes, forms
    ],
    beforeCreate() {
        if (this.$store.getters.isLoggedIn) {
            this.axios.defaults.headers.common = {
                Authorization: "Bearer " + this.$store.state.access_token,
                "Content-Type": "application/json",
                Accept: "application/json"
            };
        }
    }
});
