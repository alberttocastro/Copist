<template>
  <div>
    <div id="macro-region" v-if="unassigned">
      <div v-bind:key="macro_region.id" v-for="macro_region in unassigned">
        <blockquote>
          <h4>{{macro_region.name}}</h4>
        </blockquote>
        <ul
          class="collection with-header z-depth-3 card"
          v-bind:key="card.id"
          v-for="card in macro_region.assignment_cards"
        >
          <li class="collection-header card-header">
            <div class="card-header-flex">
              <div class="card-header-name">
                {{card.name}}
              </div>
              <div class="card-header-btn">
                <a href="#">Editar</a>
              </div>
            </div>
          </li>
          <li
            class="collection-item" v-bind:class="address.is_visitable == 1 ? '' : 'address-not-visitable'"
            v-bind:key="address.id"
            v-for="address in card.addresses"
          >({{address.neighborhood}}) {{address.street}}</li>
        </ul>
      </div>
    </div>
    <div id="macro-region" v-else>
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
