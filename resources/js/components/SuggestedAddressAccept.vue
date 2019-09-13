<template>
  <div id="accept-address" class="modal">
    <form id="address-new" :action="'#'" method="post" @submit.prevent="submit">
      <input type="hidden" name="suggested_address_id" class="hidden-id" :value="address.id" />
      <div class="modal-content">
        <h4>Add a new territory</h4>
        <br />
        <div class="input-field col s12">
          Street
          <br />
          <input
            type="text"
            name="street"
            id="street"
            class="textarea-street"
            v-bind:value="address.street"
          />
        </div>
        <div class="input-field col s12">
          Neighborhood
          <br />
          <input
            type="text"
            name="neighborhood"
            id="neighborhood"
            class="textarea-neighborhood"
            v-bind:value="address.neighborhood"
          />
        </div>
        <div class="input-field col s12">
          Name
          <br />
          <input
            type="text"
            name="name"
            id="name"
            class="textarea-name"
            v-bind:value="address.name"
          />
        </div>
        <div class="input-field col s12">
          Comments
          <br />
          <input
            type="text"
            name="comments"
            id="comments"
            class="textarea-comments"
            v-bind:value="address.comments"
          />
        </div>
        <div class="input-field col s12">
          Type of Address
          <br />
          <select name="address_type_id" id="address_type_id">
            <option value="0" selected>Unknown</option>
            <option
              v-for="address_type in address_types"
              v-bind:key="address_type.id"
              :value="address_type.id"
            >{{address_type.name}}</option>
          </select>
        </div>
        <div class="input-field col s12">
          Macro-Region
          <br />
          <select name="macroregion_id" id="macroregion_id">
            <option value="0" selected>Unknown</option>
            <option
              v-for="macro_region in macro_regions"
              v-bind:key="macro_region.id"
              :value="macro_region.id"
            >{{macro_region.name}}</option>
          </select>
        </div>
        <div class="input-field col s12">
          Card
          <br />
          <select name="card_id" id="card_id">
            <option value="0" selected>No card</option>
            <option
              v-for="card in cards"
              v-bind:key="card.id"
              :value="card.id"
            >{{card.name}} - {{card.number}}</option>
          </select>
        </div>
        <div class="input-field col s12">
          Nationality
          <br />
          <select name="nationality_id" id="nationality_id">
            <option value="0" selected>Unknown</option>
            <option
              v-for="nationality in nationalities"
              v-bind:key="nationality.id"
              :value="nationality.id"
            >{{nationality.name}}</option>
          </select>
        </div>
        <div class="input-field col s12">
          Idiom
          <br />
          <select name="idiom_id" id="idiom_id">
            <option value="0" selected>Unknown</option>
            <option v-for="idiom in idioms" v-bind:key="idiom.id" :value="idiom.id">{{idiom.name}}</option>
          </select>
        </div>
        <div class="col s12">
          <p>
            <label>
              <input type="checkbox" name="is_visitable" />
              <span>Allow us to visit?</span>
            </label>
          </p>
        </div>
      </div>
      <div class="modal-footer">
        <input type="submit" value="Agree" class="modal-close waves-effect waves-green btn-flat" />
      </div>
    </form>
  </div>
</template>

<script>
export default {
  data() {
    return {
      address_types: [],
      macro_regions: [],
      cards: [],
      nationalities: [],
      idioms: [],
      open: false
    };
  },
  props: {
    address: Object
  },
  created() {
    this.axios.get(this.$root.routes.address_types()).then(response => {
      this.address_types = response.data.data;
    });
    this.axios.get(this.$root.routes.macro_regions()).then(response => {
      this.macro_regions = response.data.data;
    });
    this.axios.get(this.$root.routes.cards()).then(response => {
      this.cards = response.data.data;
    });
    this.axios.get(this.$root.routes.idioms()).then(response => {
      this.idioms = response.data.data;
    });
    this.axios.get(this.$root.routes.nationalities()).then(response => {
      this.nationalities = response.data.data;
    });
  },
  mounted() {
    this.open = true;
  },
  watch: {
    address: function(newAddress, oldAddress) {
      let modal = $("#accept-address.modal");
      modal.modal();
      modal.modal("open");
    },
    address_types: function(newAddressTypes, oldAddressTypes) {
      $("select").formSelect({
      dropdownOptions: {
        container: $(".modal-over-modal-container")[0],
        constrainWidth: false
      }
    });
    },
    macro_regions: function(newMacroRegions, oldMacroRegions) {
      $("select").formSelect({
      dropdownOptions: {
        container: $(".modal-over-modal-container")[0],
        constrainWidth: false
      }
    });
    },
    cards: function(newCards, oldCards) {
      $("select").formSelect({
      dropdownOptions: {
        container: $(".modal-over-modal-container")[0],
        constrainWidth: false
      }
    });
    },
    nationalities: function(newNationalities, oldNationalities) {
      $("select").formSelect({
      dropdownOptions: {
        container: $(".modal-over-modal-container")[0],
        constrainWidth: false
      }
    });
    },
    idioms: function(newIdioms, oldIdioms) {
      $("select").formSelect({
      dropdownOptions: {
        container: $(".modal-over-modal-container")[0],
        constrainWidth: false
      }
    });
    }
  },
  methods: {
    submit() {
      let vm = this;
      console.log($("form#address-new").serialize());
      this.axios
        .post(this.$root.routes.addresses(), $("form#address-new").serialize())
        .then(response => {
          vm.$parent.update_data();
          vm.$root.$emit("address_created");
        });
    }
  }
};
</script>

<style>
</style>