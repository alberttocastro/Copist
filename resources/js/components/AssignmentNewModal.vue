<template>
  <!-- TODO: Fazer apenas uma implementação do modal -->
  <div id="assign-card-modal" class="modal bottom-sheet">
    <form
      id="assign-card-form"
      v-bind:action="this.$root.routes.assignments()"
      method="post"
      @submit.prevent="submit"
    >
      <div class="modal-content">
        <input type="hidden" name="card_id" v-bind:value="card_id" />
        <div class="input-field">
          <select multiple name="publishers[]" id="publishers" size="3">
            <option v-for="user in users" v-bind:key="user.id" :value="user.id">{{user.name}}</option>
          </select>
          <label for="publisher">Select the publishers</label>
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn-flat waves-effect waves-green modal-close">Send</button>
      </div>
    </form>
  </div>
</template>
<script>
export default {
  data() {
    var vm = this;
    return {
      users: []
    };
  },
  props: {
    card_id: Number
  },
  methods: {
    /**
     * Evita que ao submeter o formulário, ele seja enviado para a página, e faz o envio via ajax.
     */
    submit: function() {
      var vm = this;
      var form_object = $("#assign-card-form");
      this.axios
        .post(form_object.prop("action"), form_object.serialize())
        .then(response => {
          try {
            vm.$root.$emit("assignmentUpdate");
          } catch (error) {
            console.log(error);
          }
        });
    }
  },
  watch: {
    card_id: function(new_card_id, old_card_id) {
      $("select#publishers").prop("disabled", true);
      this.axios
        .get(routes.card_users_available(new_card_id))
        .then(response => {
          this.users = response.data.data;
          $("select#publishers").prop("disabled", false);
        });
    }
  },
  mounted() {
    $(".modal").modal();
    this.$root.$on("open-assignment-new-modal", function() {
      $("#assign-card-modal").modal("open");
    });
  },
  updated() {
    $("select").formSelect({
      dropdownOptions: {
        container: $(".modal-over-modal-container")[0],
        constrainWidth: false
      }
    });
  }
};
</script>
