<template>
  <div>
    <div v-if="addresses">
      <blockquote>
        <h4>Address without a map</h4>
      </blockquote>

      <div class="row" v-bind:key="address.id" v-for="address in addresses">
        <div class="col s12 m6">
          <div class="card grey lighten-5 z-depth-2">
            <div class="card-content indigo-text text-darken-4">
              <p>
                <b>Street:</b>
                <span>{{ address.street }}</span>
              </p>
              <p>
                <b>Neighborhood:</b>
                <span>{{ address.neighborhood }}</span>
              </p>
              <p v-if="address.reference != ''">
                <b>Reference:</b>
                <span>{{ address.reference }}</span>
              </p>
              <p v-if="address.comments != ''">
                <b>Comments:</b>
                <span>{{ address.comments}}</span>
              </p>
            </div>
            <div class="card-action">
              <a
                :id="address.id"
                href="#choose-map"
                class="modal-trigger add-card-to-address-button"
              >Choose card</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div v-else>
      <div class="valign-wrapper">
        <div style="width: 100%">
          <h2 class="center-align">Nice!</h2>
          <h5 class="center-align">All addresses have their own map.</h5>
          <p class="center-align">That's beautiful!</p>
        </div>
      </div>
    </div>

    <!-- Colocar rota de setar cartão -->
    <form action="#" method="post">
      <!-- Modal - Escolher mapa -->
      <div id="choose-map" class="modal">
        <!-- Conteúdo -->
        <div class="modal-content">
          <input type="hidden" id="address_id" name="address_id" />
          <h4>Choose map</h4>
          <br />
          <div class="input-field col s12">
            <select name="card_id" id="card_id">
              <!-- TODO: Iterar sobre cartões -->
              <!-- <option :value="card.id">{{card.name}} - {{card.number}}</option> -->
              <option value="0">Cartão 1 - 1</option>
            </select>
          </div>
        </div>
        <!-- Footer -->
        <div class="modal-footer">
          <input
            type="submit"
            value="Confirm"
            class="modal-close waves-effect waves-green btn-flat"
          />
        </div>
      </div>
    </form>
  </div>
</template>
<script>
export default {
  data() {
    return {
      addresses: []
    };
  },
  created() {
      let uri = "/api/v1/withoutmap";
      this.axios.get(uri).then(response => {
          this.addresses = response.data.data;
      })
  }
};
</script>
