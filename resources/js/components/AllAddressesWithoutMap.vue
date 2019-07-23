<template>
  <div class="container">
    <h4>Others</h4>

    <ul class="collapsible popout">
      <li>
        <div class="collapsible-header">
          <i class="material-icons">place</i>
          Without map
        </div>
        <div class="collapsible-body">
          <div class="card blue-grey darken-1" v-bind:key="address.id" v-for="address in addresses_without_map">
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
                  <a
                    :href="links.address.edit + '/'+ address.id"
                    class="waves-effect waves-light btn right"
                  >Edit</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </li>
    </ul>
  </div>
</template>
<script>
export default {
  data() {
    return {
      addresses_without_map: [],
      links: []
    };
  },
  created() {
    let uri = "/api/v1/withoutmap";
    this.axios.get(uri).then(response => {
      this.addresses_without_map = response.data.data;
      this.links = response.data.meta.links;
    });
  },
  updated() {
    $(".collapsible").collapsible();
  }
};
</script>
