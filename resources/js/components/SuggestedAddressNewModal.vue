<template>
  <div id="address-suggestion-new" class="modal">
    <form v-bind:action="this.$root.routes.address_suggestions()" method="post">
      <div class="modal-content">
        <div class="input-field col s12">
          <input type="text" name="street" id="street" />
          <label for="street">Address</label>
          <span class="helper-text">
            Example: Rua do Meio, 90, Rio
            Vermelho - Salvador
          </span>
        </div>
        <div class="input-field col s12">
          <input type="text" name="neighborhood" />
          <label for="neighborhood">Reference</label>
          <span class="helper-text">
            Example: Close to Hostel Rio
            Vermelho
          </span>
        </div>
        <div class="input-field col s12">
          <input type="text" name="name" />
          <label for="name">
            Name
            <i>(Optional)</i>
          </label>
        </div>
        <div class="input-field col s12">
          <textarea name="comments" class="materialize-textarea"></textarea>
          <label for="comments">Notes</label>
          <span class="helper-text">
            Example: Possibly a foreigner that
            somebody told us while...
          </span>
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-flat" @click="submit()">Submit</button>
      </div>
    </form>
  </div>
</template>
<script>
export default {
  methods: {
    submit: function() {
      var form_object = $("#address-suggestion-new.modal form");
      form_object.submit(function(target) {
        target.preventDefault();
      });

      this.axios
        .post(form_object.prop("action"), form_object.serialize())
        .then(response => {
          $("#address-suggestion-new.modal").modal("close");
          $("#address-suggestion-new.modal input").val("");
        });
    }
  },
  mounted() {
    $(".modal").modal();
  }
};
</script>
