<template>
  <!-- Colocar rota de setar cartão -->
  <!-- Modal - Escolher mapa -->
  <div id="choose-card" class="modal bottom-sheet">
    <form v-bind:action="this.$parent.$parent.routes.addresses(address_id)" method="post">
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
  watch: {
    address_id: function(new_address_id, old_address_id) {
      this.axios.get(routes.cards()).then(response => {
        this.cards = response.data.data;
      });
    }
  },
  updated() {
    $("select").formSelect();
  },
  methods: {
    submit: function() {
      var vm = this;
      var form_object = $("#choose-card form");
      form_object.submit(function(target) {
        target.preventDefault();
      });

      $.ajax({
        url: form_object.prop("action"),
        method: "PUT",
        data: form_object.serialize(),
        success: function(data) {
          vm.$root.$emit("addressCardUpdated");
        }
      });
    }
  }
};
</script>
