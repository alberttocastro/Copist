<template>
  <div class="container">
    <div class="row">
      <div class="col s12 m10 offset-m1">
        <h4>
          <b>Nationalities</b>
        </h4>
      </div>
      <div class="row">
        <div class="col s12 m10 offset-m1">
          <div class="row">
            <div
              v-for="nationality in nationalities"
              v-bind:key="nationality.id"
              class="col s12 m6"
            >
              <div class="card">
                <div class="card-content">
                  <h5 style="margin-top: 0;">{{nationality.name}}</h5>
                </div>
              </div>
            </div>
          </div>
          <a
            href="#create-nationality"
            class="btn blue accent-4 waves-effect waves-light col s12 center-align modal-trigger"
          >
            <span class="valign-wrapper" style="max-width:fit-content; margin: auto;">
              <i class="material-icons">add_circle_outline</i> Add Nationality
            </span>
          </a>
        </div>
      </div>
    </div>
    <div id="create-nationality" class="modal bottom-sheet">
      <form id="nationality-new" :action="this.$parent.routes.nationalities()" method="post">
        <div class="modal-content">
          <label for="nationality">Nationality name</label>
          <input type="text" name="name" id="name" />
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn-flat green-text" @click="submit()">Create Nationality</button>
        </div>
      </form>
    </div>
  </div>
</template>
<script>
export default {
  data() {
    return {
      nationalities: []
    };
  },
  created() {
    this.update();
  },
  methods: {
    submit() {
      let vm = this;
      let form_object = $("form#nationality-new");

      form_object.submit(function(target) {
        target.preventDefault();
      });

      $.ajax({
        url: form_object.prop("action"),
        method: "POST",
        data: form_object.serialize(),
        success: function() {
          form_object.parent().modal("close");
          vm.update();
          $("input[name='name']").val("");
        }
      });
    },
    update() {
      this.axios.get(routes.nationalities()).then(response => {
        this.nationalities = response.data.data;
      });
    }
  }
};
</script>

