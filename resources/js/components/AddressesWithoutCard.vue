<template>
  <div>
    <blockquote class="macro-region-title">
      <h5>Addresses without map</h5>
    </blockquote>

    <ul class="collapsible popout">
      <li>
        <div class="collapsible-header">
          <i class="material-icons">place</i>
          Without map
        </div>
        <div class="collapsible-body macro-region-card-content">
          <ul class="collection">
            <li class="collection-item" v-bind:class="address.is_visitable == 1 ? '' : 'address-not-visitable'" v-bind:key="address.id" v-for="address in addresses_without_map">
              <div class="macro-region-card-content-info">
                <div class="macro-region-card-content-info-text">
                  <div class="neighborhood">{{address.neighborhood}}</div>
                  <div class="street">{{address.street}}</div>
                  <div class="name">{{address.name}}</div>
                </div>
              </div>
            </li>
          </ul>
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
    let uri = "/api/v1/withoutcard";
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
