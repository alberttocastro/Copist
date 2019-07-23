<template>
  <div class="container">
    <h4>Macro Region and Addresses</h4>
    <div v-bind:key="macro_region.id" v-for="macro_region in macro_regions">
      <blockquote>
        <h5>{{macro_region.name}}</h5>
        <span>{{macro_region.amount}}</span>
      </blockquote>

      <ul class="collapsible popout">
        <li v-bind:key="card.id" v-for="card in macro_region.cards">
          <div class="collapsible-header">
            <i class="material-icons">place</i>
            {{card.name}}
          </div>
          <div class="collapsible-body">
            <div
              class="card blue-grey darken-1"
              v-bind:key="address.id"
              v-for="address in card.addresses"
            >
              <div class="card-content white-text">
                <span class="card-title">{{address.neighborhood}}</span>
                <div class="row">
                  <div class="col s8">
                    <p>
                      <b>{{address.name}}</b>
                    </p>
                    <p>{{address.street}}</p>
                  </div>
                  <div class="s4">
                    <a :href="links.address.edit + '/'+ address.id" class="waves-effect waves-light btn right">Edit</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </li>
      </ul>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      macro_regions: [],
      links: []
    };
  },
  created() {
    let uri = "/api/v1/territorries";
    this.axios.get(uri).then(response => {
      console.log(response);
      this.macro_regions = response.data.data;
      this.links = response.data.meta.links;
    });
  },
  updated(){
    $('.collapsible').collapsible();
  }
};
</script>
