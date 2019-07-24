<template>
  <div>
    <div class="container" v-if="unassigned">
      <div v-bind:key="macro_region.id" v-for="macro_region in unassigned">
        <blockquote>
          <h4>{{macro_region.name}}</h4>
        </blockquote>
        <ul
          class="collection with-header z-depth-3"
          v-bind:key="card.id"
          v-for="card in macro_region.assignment_cards"
        >
          <li class="collection-header">
            <div class="row valign-wrapper" style="margin-bottom: 0;">
              <div class="col s8">
                <h4>{{card.name}}</h4>
              </div>
              <div class="col s4">
                <a
                  :id="card.id"
                  class="waves-effect waves-teal btn-flat modal-trigger add-publisher-button"
                  href="#modal-assign-territory"
                >Assign</a>
              </div>
            </div>
          </li>
          <li
            class="collection-item"
            v-bind:key="address.id"
            v-for="address in card.addresses"
          >{{address.street}}</li>
        </ul>
      </div>
    </div>
    <div v-else>
      <!--  Caso não tenha uma macro-região cadastrada -->
      <div class="valign-wrapper">
        <div>
          <h2 class="center-align">There aren't macro-regions yet.</h2>
          <h5 class="center-align">Please, go to the database to create one.</h5>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  data() {
    return {
      unassigned: []
    };
  },
  created() {
    let uri = "/api/v1/assignments";
    this.axios.get(uri).then(response => {
      this.unassigned = response.data.data.unassigned;
    });
  }
};
</script>
