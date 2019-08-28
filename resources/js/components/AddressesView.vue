<template>
  <div>
    <h4 class="session-title">Macro Region and Addresses</h4>
    <div class="macro-region" v-bind:key="macro_region.id" v-for="macro_region in macro_regions">
      <blockquote class="macro-region-title">
        <h5>{{macro_region.name}}</h5>
        <span>{{macro_region.amount}}</span>
      </blockquote>

      <ul class="collapsible popout macro-region-card">
        <li v-bind:key="card.id" v-for="card in macro_region.cards">
          <div class="collapsible-header macro-region-card-title">
            <i class="material-icons">place</i>
            <span class="macro-region-card-title-name">{{card.name}}</span>
          </div>
          <div class="collapsible-body macro-region-card-content">
            <ul class="collection">
              <li
                class="collection-item"
                v-bind:class="address.is_visitable == 1 ? '' : 'address-not-visitable'"
                v-bind:key="address.id"
                v-for="address in card.addresses"
              >
                <div class="macro-region-card-content-info">
                  <div class="macro-region-card-content-info-text">
                    <div class="neighborhood">{{address.neighborhood}}</div>
                    <div class="street">{{address.street}}</div>
                    <div class="name" v-if="address.name">{{address.name}}</div>
                  </div>
                  <div class="macro-region-card-content-info-btn">
                    <a
                      v-bind:href="$root.routes.addresses(address.id)"
                      class="waves-effect waves-light btn"
                    >Edit</a>
                  </div>
                </div>
              </li>
            </ul>
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
      macro_regions: []
    };
  },
  created() {
    console.log(
      this.axios
        .get(routes.addresses())
        .then(response => {
          this.macro_regions = response.data.data;
        })
        .catch(reason => {
          console.log(reason);
        })
    );
  },
  updated() {
    $(".collapsible").collapsible();
  }
};
</script>

