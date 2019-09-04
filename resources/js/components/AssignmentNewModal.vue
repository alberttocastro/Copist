<template>
  <!-- TODO: Fazer apenas uma implementação do modal -->
  <div v-bind:id="'assign-card-modal-' + modal_id_string" class="modal bottom-sheet">
    <form v-bind:action="this.$root.routes.assignments()" method="post">
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
        <button
          type="submit"
          class="btn-flat waves-effect waves-green modal-close"
          v-on:click="submit()"
        >Send</button>
      </div>
    </form>
  </div>
</template>
<script>
export default {
  data() {
    var vm = this;
    return {
      users: [],
      modal_id_string: vm.modal_id.toString(),
      card_id_watch: vm.card_id
    };
  },
  props: {
    card_id: Number,
    modal_id: Number
  },
  methods: {
    /**
     * Evita que ao submeter o formulário, ele seja enviado para a página, e faz o envio via ajax.
     */
    submit: function() {
      var vm = this;
      var form_object = $("#assign-card-modal-" + vm.modal_id_string + " form");

      form_object.submit(function(target) {
        target.preventDefault();
      });

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
      this.axios
        .get(routes.card_users_available(new_card_id))
        .then(response => {
          console.log(response);
          this.users = response.data.data;
        });
    }
  },
  updated() {
    $(".modal").modal();
    $("select").formSelect();
  }
};
</script>
