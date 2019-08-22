<template>
  <div>
    <div class="row">
      <div class="col s12 m10 offset-m1">
        <h4>
          <b>Macro Regions</b>
        </h4>
      </div>
      <div class="row">
        <div class="col s12 m10 offset-m1">
          <div class="row">
            <div
              v-bind:key="macro_region.id"
              v-for="macro_region in macro_regions"
              class="col s12 m6"
            >
              <div class="card">
                <div class="card-content">
                  <h5 style="margin-top: 0;">{{macro_region.name}}</h5>
                </div>
                <!-- TODO: Botão de editar -->
              </div>
            </div>
          </div>
          <a
            href="#macro-region-new"
            class="btn blue accent-4 waves-effect waves-light col s12 center-align modal-trigger"
          >
            <span class="valign-wrapper" style="max-width:fit-content; margin: auto;">
              <i class="material-icons">add_circle_outline</i> Add Macro Region
            </span>
          </a>
        </div>
      </div>
    </div>
    <div id="macro-region-new" class="modal bottom-sheet">
      <form id="macro-region-create" :action="this.$root.routes.macro_regions()" method="post">
        <div class="modal-content">
          <label for="name">Macro Region name</label>
          <input type="text" name="name" id="name" />
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn-flat green-text" @click="submit()">Create Macro-Region</button>
        </div>
      </form>
    </div>
  </div>
</template>
<script>
export default {
  data() {
    return {
      macro_regions: []
    };
  },
  created() {
    this.update();
  },
  methods: {
    submit() {
      let vm = this;
      let form_object = $("form#macro-region-create");
      form_object.submit(function(target) {
        target.preventDefault();
      });

      $.ajax({
        url: form_object.prop("action"),
        method: "POST",
        data: form_object.serialize(),
        success: function() {
          form_object.parent(".modal").modal("close");
          $("input").val("");

          window.toastr["success"]("Macro Region successfully created");

          vm.update();
        }
      });
    },
    update() {
      this.axios.get(routes.macro_regions()).then(response => {
        this.macro_regions = response.data.data;
      });
    }
  }
};
</script>
