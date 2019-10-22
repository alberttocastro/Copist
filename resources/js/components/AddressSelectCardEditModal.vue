<template>
  <!-- Colocar rota de setar cartão -->
  <!-- Modal - Escolher mapa -->
  <div id="choose-card" class="modal bottom-sheet">
    <form v-bind:action="this.$root.routes.addresses(address_id)" method="post">
      <!-- Conteúdo -->
      <div class="modal-content">
        <input type="hidden" name="_method" value="PUT" />
        <input type="hidden" v-bind:value="address_id" id="address_id" name="address_id" />
        <div class="input-field col s12">
          <div class="input-field">
            <!-- FIXME: Layout do select -->
            <select name="card_id" id="card_id">
              <option
                v-for="card in cards"
                v-bind:key="card.id"
                :value="card.id"
              >{{card.name}} - {{card.number}}</option>
            </select>
            <label for="card_id">Select card</label>
          </div>
        </div>
      </div>
      <!-- Footer -->
      <div class="modal-footer">
        <button
          @click="submit()"
          type="submit"
          class="modal-close waves-effect waves-green btn-flat"
        >Confirm</button>
      </div>
    </form>
  </div>
</template>
<script>
export default {
  props: {
    address_id: Number
  },
  data() {
    return {
      cards: []
    };
  },
  mounted() {
    $("div#choose-card").modal();
    let vm = this;
    this.$root.$on("address_select_card_edit_modal_open", function() {
      vm.open_modal();
    });
  },
  watch: {},
  updated() {
    $("select").formSelect({
      dropdownOptions: {
        container: $(".modal-over-modal-container")[0],
        constrainWidth: false
      }
    });
  },
  methods: {
    submit: function() {
      let vm = this;
      let form_object = $("#choose-card form");
      form_object.submit(function(target) {
        target.preventDefault();
      });

      console.log(form_object.serialize());
      this.axios
        .put(form_object.prop("action"), form_object.serialize())
        .then(response => {
          vm.$parent.update_data();
        });
    },
    open_modal() {
      if (this.cards.length == 0) {
        this.axios.get(routes.cards()).then(response => {
          console.log("Carregados cartões");
          this.cards = response.data.data;
          $("div#choose-card").modal("open");
        });
      } else {
        $("div#choose-card").modal("open");
      }
    }
  }
};
</script>
