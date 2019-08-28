<template>
  <div class="container">
    <div class="row">
      <form
        id="address-edit-form"
        :action="this.$root.routes.addresses(address.id)"
        method="post"
        class="col s12"
      >
        <input type="hidden" name="_method" value="PUT" />
        <div class="row">
          <div class="input-field s12">
            <label for="neighborhood">Neighborhood</label>
            <input type="text" name="neighborhood" id="neighborhood" :value="address.neighborhood" />
          </div>
        </div>
        <div class="row">
          <div class="input-field s12">
            <label for="street">Street</label>
            <input type="text" name="street" id="street" :value="address.street" />
          </div>
        </div>
        <div class="row">
          <div class="input-field s12">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" :value="address.name" />
          </div>
        </div>
        <div class="row">
          <div class="input-field s12">
            <label for="comments">Comments</label>
            <input type="text" name="comments" id="comments" :value="address.comments" />
          </div>
        </div>
        <div class="row">
          <div class="input-field s12">
            <label for="references">References</label>
            <input type="text" name="references" id="references" :value="address.references" />
          </div>
        </div>
        <div class="row">
          <div class="input-field s12">
            Nationality
            <select name="nationality_id" id="nationality_id">
              <option value="0">Choose a nationality</option>
              <option
                v-for="nationality in nationalities"
                v-bind:key="nationality.id"
                :value="nationality.id"
                :selected="nationality.
                id == address.nationality_id"
              >{{nationality.name}}</option>
            </select>
          </div>
        </div>
        <div class="row">
          <div class="input-field s12">
            Idiom
            <select name="idiom_id" id="idiom_id">
              <option value="0">Choose a idiom</option>
              <option
                v-for="idiom in idioms"
                v-bind:key="idiom.id"
                :value="idiom.id"
                :selected="idiom.
                id == address.idiom_id"
              >{{idiom.name}}</option>
            </select>
          </div>
        </div>
        <div class="row">
          <div class="input-field s12">
            Second idiom
            <select name="second_language_id" id="second_lanugage_id">
              <option value="0">Choose a second idiom</option>
              <option
                v-for="idiom in idioms"
                v-bind:key="idiom.id"
                :value="idiom.id"
                :selected="idiom.
                id == address.second_language_id"
              >{{idiom.name}}</option>
            </select>
          </div>
        </div>
        <p>
          <label>
            <input
              id="is_visitable"
              name="is_visitable"
              type="checkbox"
              :checked="address.is_visitable"
            />
            <span>Allow us to visit?</span>
          </label>
        </p>
        <p>
          <label>
            <input id="is_valid" name="is_valid" type="checkbox" :checked="address.is_valid" />
            <span>Teste</span>
          </label>
        </p>
        <div class="row">
          <div class="input-field s12">
            Return Visit
            <select name="publisher_id" id="publisher_id">
              <option value="0">Is not being visited</option>

              <option
                v-for="publisher in publishers"
                v-bind:key="publisher.id"
                :value="publisher.id"
                :selected="publisher.id == address.publisher_id"
              >{{publisher.name}}</option>
            </select>
          </div>
        </div>
        <div class="row">
          <div class="input-field s12">
            Cards
            <select name="card_id" id="card_id">
              <option value="0">No card</option>
              <option
                v-for="card in cards"
                v-bind:key="card.id"
                :value="card.id"
                :selected="card.id == address.card_id"
              >{{card.name}}</option>
            </select>
          </div>
        </div>
        <div class="row">
          <div class="input-field s12">
            Address Type
            <select name="address_type_id" id="address_type_id">
              <option value="0">Undefined</option>
              <option
                v-for="address_type in address_types"
                v-bind:key="address_type.id"
                :value="address_type.id"
                :selected="address.address_type_id == address_type.id"
              >{{address_type.name}}</option>
            </select>
          </div>
        </div>
        <button type="submit" class="btn waves-effect waves-light" @click="submit()">Update</button>
      </form>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    let href = window.location.href.split("/");
    return {
      address: [],
      idioms: [],
      nationalities: [],
      address_types: [],
      publishers: [],
      cards: []
    };
  },
  props: {
    address_id: Number
  },
  created() {
    this.axios.get(routes.idioms()).then(response => {
      this.idioms = response.data.data;
    });
    this.axios.get(routes.nationalities()).then(response => {
      this.nationalities = response.data.data;
    });
    this.axios.get(routes.address_types()).then(response => {
      this.address_types = response.data.data;
    });
    this.axios.get(routes.publishers()).then(response => {
      this.publishers = response.data.data;
    });
    this.axios.get(routes.addresses(this.address_id)).then(response => {
      this.address = response.data.data;
    });
    this.axios.get(routes.cards()).then(response => {
      this.cards = response.data.data;
    });
  },
  updated() {
    $("select").formSelect();
  },
  methods: {
    submit() {
      let vm = this;
      let form_object = $("form#address-edit-form");

      form_object.submit(function(target) {
        target.preventDefault();
      });

      window.setCheckboxInputValue($("input:checkbox"));

      this.axios
        .put(form_object.prop("action"), form_object.serializeArray())
        .then(response => {
          window.toastr["success"]("Address successfully updated");
        })
        .catch(reason => {
          window.toastr["error"]("Address could not be saved");
        });
    }
  }
};
</script>
