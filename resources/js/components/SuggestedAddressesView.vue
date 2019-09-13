<template>
  <div class="row" v-if="suggestions">
    <div class="col s12">
      <transition-group appear>
        <div
          class="card grey lighten-5 z-depth-2"
          v-bind:key="suggested_address.id"
          v-for="suggested_address in suggestions"
        >
          <div class="card-content indigo-text text-darken-4">
            <p>
              <b>Street:</b>
              <span class="street" :id="suggested_address.id">{{suggested_address.street}}</span>
            </p>
            <p>
              <b>Neighborhood:</b>
              <span
                class="neighborhood"
                :id="suggested_address.id"
              >{{suggested_address.neighborhood}}</span>
            </p>
            <p>
              <b>Name:</b>
              <span class="name" :id="suggested_address.id">{{suggested_address.name}}</span>
            </p>
            <p>
              <b>Comments:</b>
              <span class="comments" :id="suggested_address.id">{{suggested_address.comments}}</span>
            </p>
          </div>
          <div class="card-action">
            <!-- TODO: Ações de aceitar ou rejeitar -->
            <a href="#" @click.prevent="accept(suggested_address)">Accept</a>
            <a href="#" @click.prevent="reject(suggested_address.id)">Reject</a>
          </div>
        </div>
      </transition-group>
    </div>
    <suggested-address-accept v-bind:address="address"></suggested-address-accept>
  </div>
  <div v-else>
    <div class="valign-wrapper">
      <div style="width: 100%">
        <h2 class="center-align">Well done!</h2>
        <h5 class="center-align">All new addresses are managed</h5>
      </div>
    </div>
  </div>
</template>
<script>
import SuggestedAddressAccept from "@/js/components/SuggestedAddressAccept.vue";
export default {
  components: {
    SuggestedAddressAccept
  },
  data() {
    return {
      suggestions: [],
      address: {}
    };
  },
  created() {
    this.update_data();
  },
  methods: {
    reject(suggested_address_id) {
      let vm = this;
      this.axios
        .delete(this.$root.routes.address_suggestions(suggested_address_id))
        .then(response => {
          vm.update_data();
        });
    },
    update_data() {
      this.axios
        .get(routes.addresses(), { params: { suggested: true } })
        .then(response => {
          this.suggestions = response.data.data;
        });
    },
    accept(suggested_address) {
      this.address = suggested_address;
    }
  }
};
</script>
