<template>
  <div>
    <div class="row">
      <div class="col s12 m10 offset-m1">
        <h4>
          <b>Cards</b>
        </h4>
      </div>
      <div class="row">
        <div class="col s12 m10 offset-m1">
          <div class="row">
            <transition-group appear>
              <div v-for="card in cards" v-bind:key="card.id" class="col s12 m6">
                <div class="card">
                  <div class="card-content">
                    <h5 style="margin-top: 0;">{{card.name}}</h5>
                    <div v-if="card.addresses">
                      <p v-bind:key="address.id" v-for="address in card.addresses">
                        {{address.street}} |
                        <b>{{address.neighborhood}}</b>
                      </p>
                    </div>
                    <div v-else>
                      <i>No addresses in this card yet.</i>
                    </div>
                  </div>
                  <!-- TODO: Botões de deletar e editar -->
                </div>
              </div>
            </transition-group>
          </div>
          <a
            href="#card-new"
            class="btn blue accent-4 waves-effect waves-light col s12 center-align modal-trigger"
          >
            <span class="valign-wrapper" style="max-width:fit-content; margin: auto;">
              <i class="material-icons">add_circle_outline</i> Add Card
            </span>
          </a>
        </div>
      </div>
    </div>
    <div id="card-new" class="modal bottom-sheet">
      <form id="card-create" :action="this.$root.routes.cards()" method="post">
        <div class="modal-content">
          <label for="name">Card name</label>
          <input type="text" name="name" id="name" />
          <label for="macro_region_id">Macro Region</label>
          <select name="macro_region_id" id="macro_region_id">
            <option value="0">Select Macro Region</option>
            <option
              v-for="macro_region in macro_regions"
              v-bind:key="macro_region.id"
              :value="macro_region.id"
            >{{macro_region.name}}</option>
          </select>
          <label for="number">Choose a number</label>
          <input type="number" name="number" id="number" />
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn-flat green-text" @click="submit()">Create card</button>
        </div>
      </form>
    </div>
  </div>
</template>
<script>
export default {
  data() {
    return {
      cards: [],
      macro_regions: []
    };
  },
  created() {
    this.update();
  },
  updated() {
    $("#card-create select").formSelect({
      dropdownOptions: {
        container: $(".modal-over-modal-container")[0],
        constrainWidth: false
      }
    });
  },
  methods: {
    submit() {
      let vm = this;
      let form_object = $("form#card-create");
      form_object.submit(function(target) {
        target.preventDefault();
      });

      this.axios
        .post(form_object.prop("action"), form_object.serialize())
        .then(response => {
          form_object.parent(".modal").modal("close");
          $("input").val("");
          vm.update();
        });
    },
    update() {
      this.axios.get(routes.cards()).then(response => {
        this.cards = response.data.data;
      });

      this.axios.get(routes.macro_regions()).then(response => {
        this.macro_regions = response.data.data;
      });
    }
  }
};
</script>
