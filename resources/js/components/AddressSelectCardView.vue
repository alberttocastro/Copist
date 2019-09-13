<template>
  <div>
    <div v-if="addresses">
      <blockquote>
        <h4>Address without a card</h4>
      </blockquote>

      <div class="row" v-bind:key="address.id" v-for="address in addresses">
        <div class="col s12 m6">
          <div class="card grey lighten-5 z-depth-2">
            <div class="card-content indigo-text text-darken-4">
              <p>
                <b>Street:</b>
                <span>{{ address.street }}</span>
              </p>
              <p>
                <b>Neighborhood:</b>
                <span>{{ address.neighborhood }}</span>
              </p>
              <p v-if="address.reference != ''">
                <b>Reference:</b>
                <span>{{ address.reference }}</span>
              </p>
              <p v-if="address.comments != ''">
                <b>Comments:</b>
                <span>{{ address.comments}}</span>
              </p>
            </div>
            <div class="card-action">
              <a
                :id="address.id"
                class="add-card-to-address-button"
                @click="open_modal(address)"
              >Choose card</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div v-else>
      <div class="valign-wrapper">
        <div style="width: 100%">
          <h2 class="center-align">Nice!</h2>
          <h5 class="center-align">All addresses have their own map.</h5>
          <p class="center-align">That's beautiful!</p>
        </div>
      </div>
    </div>

    <address-select-card-edit-modal v-bind:address_id="address_id"></address-select-card-edit-modal>
  </div>
</template>
<script>
import AddressSelectCardEditModal from "./AddressSelectCardEditModal.vue";
export default {
  components: {
    AddressSelectCardEditModal
  },
  data() {
    return {
      addresses: [],
      address_id: 0
    };
  },
  created() {
    let vm = this;
    vm.update_data();
    vm.$root.$on("address_created", function() {
      vm.update_data();
    });
  },
  methods: {
    update_data: function() {
      this.axios
        .get(routes.addresses(), { params: { card: false } })
        .then(response => {
          this.addresses = response.data.data;
        });
    },
    open_modal(address) {
      this.address_id = address.id;
      this.$root.$emit("address_select_card_edit_modal_open");
    }
  }
};
</script>
