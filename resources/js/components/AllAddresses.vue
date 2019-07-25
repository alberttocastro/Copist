<template>
  <div>
    <h4 class="session-title">Macro Region and Addresses</h4>
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
            <div v-bind:key="address.id" v-for="address in card.addresses">
              {{address.neighborhood}}
              {{address.name}}
              {{address.street}}
              <div>
                <a
                  :href="links.address.edit + '/'+ address.id"
                  class="waves-effect waves-light btn right"
                >Edit</a>
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
      this.macro_regions = response.data.data;
      this.links = response.data.meta.links;
    });
  },
  updated() {
    $(".collapsible").collapsible();
  }
};
</script>
