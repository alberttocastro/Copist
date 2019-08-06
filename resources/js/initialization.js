window._ = require('lodash');

/**
 * We'll load jQuery and the Bootstrap jQuery plugin which provides support
 * for JavaScript based Bootstrap features such as modals and tabs. This
 * code may be modified to fit the specific needs of your application.
 */

try {
    window.$ = window.jQuery = require('jquery');
    window.materialize = require('./materialize');
} catch (e) {}

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

/**
 * Next we will register the CSRF Token as a common header with Axios so that
 * all outgoing HTTP requests automatically have it attached. This is just
 * a simple convenience so we don't have to attach every token manually.
 */

let token = document.head.querySelector('meta[name="csrf-token"]');

if (token) {
    window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
} else {
    console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
}

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

// import Echo from 'laravel-echo'

// window.Pusher = require('pusher-js');

// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: process.env.MIX_PUSHER_APP_KEY,
//     cluster: process.env.MIX_PUSHER_APP_CLUSTER,
//     encrypted: true
// });

/**
 * Vue será usado para fazer componentes reativos consumindo banco de dados
 */
window.Vue = require('vue');

import Vue from 'vue'
import axios from 'axios'
import VueAxios from 'vue-axios'

Vue.use(VueAxios, axios);

//Territory
Vue.component('AddressesView', require('../components/AddressesView.vue').default);
Vue.component('AddressesWithoutCardView', require('../components/AddressesWithoutCardView.vue').default);
Vue.component('AddressSelectCardView', require('../components/AddressSelectCardView.vue').default);

Vue.component('SuggestedAddressesView', require('../components/SuggestedAddressesView.vue').default);

Vue.component('CardsView',require('../components/CardsView.vue').default);
Vue.component('CardsWithoutMacroRegionView', require('../components/CardsWithoutMacroRegionView.vue').default);

Vue.component('CardsUnassignedView', require('../components/CardsUnassignedView.vue').default);
Vue.component('CardsAssignedView', require('../components/CardsAssignedView.vue').default);

Vue.component('MacroRegionsView',require('../components/MacroRegionsView.vue').default);
Vue.component('AddressTypesView',require('../components/AddressTypesView.vue').default);
Vue.component('IdiomsView',require('../components/IdiomsView.vue').default);
Vue.component('NationalitiesView',require('../components/NationalitiesView.vue').default);
Vue.component('PublishersView',require('../components/PublishersView.vue').default);

var routes = {
    data: function(){
        return {
            routes: window.routes
        }
    }
}

window.vm = new Vue({
    el: "#vue",
    mixins: [routes]
});
