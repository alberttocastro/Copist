<template>
  <div id="new-publisher" class="modal modal-fixed-footer">
    <!-- Colocar ação do formulário -->
    <form v-bind:action="this.$parent.$parent.routes.publishers()" method="POST">
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
        <input
          type="submit"
          class="btn-flat green-text"
          :value="'Create Publisher'"
          @click="submit()"
        />
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
    this.axios.get(routes.macro_regions()).then(response => {
      this.macro_regions = response.data.data;
    });
  },
  updated() {
    $("select").formSelect();
  },
  methods: {
    submit: function() {
      var vm = this;
      var jquery_form_object = $("#new-publisher form");
      
      jquery_form_object.submit(function(target) {target.preventDefault();});

      $.ajax({
        url: jquery_form_object.prop('action'),
        method: "POST",
        data: jquery_form_object.serialize(),
        success: function (data){
          vm.$root.$emit('createPublisher');
          
          $("#new-publisher").modal('close');
          $("#new-publisher input").val('');
        },
        error: function(data){
          console.log(data);
        }
      })
    }
  }
};
</script>
