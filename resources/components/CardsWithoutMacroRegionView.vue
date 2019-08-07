<template>
<div>
    <blockquote class="macro-region-title">
        <h5>Cards without Macro-region</h5>
        <span>{{cards.length}}</span>
    </blockquote>
  <ul class="collapsible popout macro-region-card">
    <li v-bind:key="card.id" v-for="card in cards">
      <div class="collapsible-header macro-region-card-title">
        <i class="material-icons">place</i>
        <span class="macro-region-card-title-name">{{card.name}}</span>
      </div>
      <div class="collapsible-body macro-region-card-content">
        <ul class="collection">
          <li class="collection-item" v-bind:class="address.is_visitable == 1 ? '' : 'address-not-visitable'" v-bind:key="address.id" v-for="address in card.addresses">
            <div class="macro-region-card-content-info">
              <div class="macro-region-card-content-info-text">
                <div class="neighborhood">{{address.neighborhood}}</div>
                <div class="street">{{address.street}}</div>
                <div class="name" v-if="address.name">{{address.name}}</div>
              </div>
              <!-- TODO: Colocar link de edição no botão -->
              <div class="macro-region-card-content-info-btn">
                <a
                  :href="'#'"
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
</template>
<script>
export default {
  data() {
    return {
      cards: []
    };
  },
  created() {
    this.axios.get(routes.cards(),{params:{macro_region: false}}).then(response => {
      this.cards = response.data.data;
    });
  }
};
</script>
