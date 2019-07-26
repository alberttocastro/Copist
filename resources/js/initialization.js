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

Vue.component('AllAddresses', require('./components/AllAddresses.vue').default);
Vue.component('CardsWithoutMacroRegion', require('./components/CardsWithoutMacroRegion.vue').default);
Vue.component('AllAddressesWithoutMap', require('./components/AllAddressesWithoutMap.vue').default);
Vue.component('UnassignedCards', require('./components/UnassignedCards').default);
Vue.component('TerritorySuggestion', require('./components/TerritorySuggestion.vue').default);
Vue.component('ChooseAddressCard', require('./components/ChooseAddressCard.vue').default);
Vue.component('AssignedCards', require('./components/AssignedCards.vue').default);

Vue.component('AllAddressTypes',require('./components/AllAddressTypes').default);
Vue.component('AllCards',require('./components/AllCards').default);
Vue.component('AllIdioms',require('./components/AllIdioms').default);
Vue.component('AllMacroRegions',require('./components/AllMacroRegions.vue').default);
Vue.component('AllNationalities',require('./components/AllNationalities').default);
Vue.component('AllPublishers',require('./components/AllPublishers').default);

window.vm = new Vue({
    el: "#vue"
});

window.vm2 = new Vue({
    el: "#vue2"
})

window.vm3 = new Vue({
    el: "#vue3"
})

window.vm4 = new Vue({
    el: "#vue4"
})
