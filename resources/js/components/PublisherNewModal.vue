<template>
  <div id="new-publisher" class="modal bottom-sheet modal-fixed-footer">
    <!-- Colocar ação do formulário -->
    <form v-bind:action="this.$root.routes.publishers()" method="POST">
      <div class="modal-content">
        <div class="input-field">
          <label for="name">Name</label>
          <input type="text" name="name" id="name" />
        </div>
        <div class="input-field">
          <label for="email">Email</label>
          <input type="email" name="email" id="email" />
        </div>
        <div class="input-field">
          <label for="phone">Phone</label>
          <input type="tel" name="phone" id="phone" />
        </div>
        <div class="input-field">
          <label for="neighborhood">Neighborhood</label>
          <input type="text" name="neighborhood" id="neighborhood" />
        </div>
        <div class="input-field">
          <select name="macro_region_id" id="macro_region_id">
            <option value disabled selected>Select a Macro-Region</option>
            <option
              v-for="macro_region in macro_regions"
              v-bind:key="macro_region.id"
              :value="macro_region.id"
            >{{macro_region.name}}</option>
          </select>
          <label>Macro Region</label>
        </div>
      </div>
      <div class="modal-footer">
        <button class="btn-flat green-text" @click="submit()">Create publisher</button>
      </div>
    </form>
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
  updated() {
    $("#new-publisher select").formSelect({
      dropdownOptions: {
        container: $(".modal-over-modal-container")[0],
        constrainWidth: false
      }
    });
  },
  methods: {
    submit() {
      var vm = this;
      var jquery_form_object = $("#new-publisher form");
      jquery_form_object.submit(function(target) {
        target.preventDefault();
      });

      this.axios
        .post(jquery_form_object.prop("action"), jquery_form_object.serialize())
        .then(response => {
          vm.$root.$emit("createPublisher");

          $("#new-publisher").modal("close");
          $("#new-publisher input").val("");
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
