<template>
  <div class="container">
    <div class="row">
      <div class="col s12 m10 offset-m1">
        <h4>
          <b>Address Types</b>
        </h4>
      </div>
      <div class="row">
        <div class="col s12 m10 offset-m1">
          <div class="row">
            <div
              v-for="address_type in address_types"
              v-bind:key="address_type.id"
              class="col s12 m6"
            >
              <div class="card">
                <div class="card-content">
                  <h5 style="margin-top: 0;">{{address_type.name}}</h5>
                </div>
                <!-- TODO: Botões de editar e deletar -->
              </div>
            </div>
          </div>
          <a
            href="#address-type-new"
            class="btn blue accent-4 waves-effect waves-light col s12 center-align modal-trigger"
          >
            <span class="valign-wrapper" style="max-width:fit-content; margin: auto;">
              <i class="material-icons">add_circle_outline</i> Add Address Type
            </span>
          </a>
        </div>
      </div>
    </div>
    <div class="modal bottom-sheet" id="address-type-new">
      <form id="address-type-create" :action="this.$root.routes.address_types()" method="post">
        <div class="modal-content">
          <label for="name">New address type:</label>
          <input type="text" name="name" id="name" />
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn-flat green-text" @click="submit()">Create Address Type</button>
        </div>
      </form>
    </div>
  </div>
</template>
<script>
export default {
  data() {
    return {
      address_types: []
    };
  },
  created() {
    this.update();
  },
  methods: {
    submit() {
      let vm = this;
      let form_object = $("form#address-type-create");
      form_object.submit(function(target) {
        target.preventDefault();
      });

      $.ajax({
        url: form_object.prop("action"),
        method: "POST",
        data: form_object.serialize(),
        success: function() {
          form_object.parent(".modal").modal("close");
          $("input[name='name']").val("");
          window.toastr["success"]("Address type successfully created");
          vm.update();
        }
      });
    },
    update() {
      this.axios.get(routes.address_types()).then(response => {
        this.address_types = response.data.data;
      });
    }
  }
};
</script>
