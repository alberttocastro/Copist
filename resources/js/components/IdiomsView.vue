<template>
  <div class="container">
    <div class="row">
      <div class="col s12 m10 offset-m1">
        <h4>
          <b>Idioms</b>
        </h4>
      </div>
      <div class="row">
        <div class="col s12 m10 offset-m1">
          <div class="row">
            <div v-for="idiom in idioms" v-bind:key="idiom.id" class="col s12 m6">
              <div class="card">
                <div class="card-content">
                  <h5 style="margin-top: 0;">{{idiom.name}}</h5>
                </div>
              </div>
            </div>
          </div>
          <a
            href="#create-idiom"
            class="btn blue accent-4 waves-effect waves-light col s12 center-align modal-trigger"
          >
            <span class="valign-wrapper" style="max-width:fit-content; margin: auto;">
              <i class="material-icons">add_circle_outline</i> Add Idiom
            </span>
          </a>
        </div>
      </div>
    </div>
    <div id="create-idiom" class="modal bottom-sheet">
      <form id="idiom-new" :action="this.$root.routes.idioms()" method="post">
        <div class="modal-content">
          <label for="idiom">Idiom name</label>
          <input type="text" name="name" id="name" />
        </div>
        <div class="modal-footer">
          <button
            type="submit"
            class="btn-flat modal-close green-text"
            @click="submit()"
          >Create idiom</button>
        </div>
      </form>
    </div>
  </div>
</template>
<script>
export default {
  data() {
    return {
      idioms: []
    };
  },
  created() {
    this.update();
  },
  methods: {
    submit() {
      let vm = this;
      let form_object = $("form#idiom-new");

      form_object.submit(function(target) {
        target.preventDefault();
      });

      this.axios
        .post(form_object.prop("action"), form_object.serialize())
        .then(response => {
          form_object.parent().modal("close");
          vm.update();
          $("input[name='name']").val("");
        });
    },
    update() {
      this.axios.get(routes.idioms()).then(response => {
        this.idioms = response.data.data;
      });
    }
  }
};
</script>
