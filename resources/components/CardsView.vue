<template>
  <div >
    <div class="row">
      <div class="col s12 m10 offset-m1">
        <h4>
          <b>Cards</b>
        </h4>
      </div>
      <div class="row">
        <div class="col s12 m10 offset-m1">
          <div class="row">
            <div v-for="card in cards" v-bind:key="card.id" class="col s12 m6">
              <div class="card">
                <div class="card-content">
                  <h5 style="margin-top: 0;">{{card.name}}</h5>
                  <div v-if="card.addresses">
                    <p v-bind:key="address.id" v-for="address in card.addresses">
                      {{address.street}} |
                      <b>{{address.neighborhood}}</b>
                    </p>
                  </div>
                  <div v-else>
                    <i>No addresses in this card yet.</i>
                  </div>
                </div>
                <!-- TODO: Botões de deletar e editar -->
              </div>
            </div>
          </div>
          <a
            href="#create-card"
            class="btn blue accent-4 waves-effect waves-light col s12 center-align modal-trigger"
          >
            <span class="valign-wrapper" style="max-width:fit-content; margin: auto;">
              <i class="material-icons">add_circle_outline</i> Add Card
            </span>
          </a>
        </div>
      </div>
    </div>
    <div id="create-card" class="modal">
      <!-- TODO: Colocar ação do formulário -->
      <form action="#" method="post">
        @csrf
        <div class="modal-content">
          <label for="name">name</label>
          <input type="text" name="name" id="name" />
          <label for="macro_region">Macro Region</label>
          <select name="macro_region" id="macro_region">
            <option value="0">Select Macro Region</option>
            <option
              v-for="macro_region in macro_regions"
              v-bind:key="macro_region.id"
              :value="macro_region.id"
            >{{macro_region.name}}</option>
          </select>
          <label for="number"></label>
          <input type="number" name="number" id="number" />
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn-flat green-text">Create card</button>
        </div>
      </form>
    </div>
  </div>
</template>
<script>
export default {
  data() {
    return {
      cards: [],
      macro_regions: []
    };
  },
  created() {
    let uri = "/api/v1/cards";
    this.axios.get(uri).then(response => {
      this.cards = response.data.data;
    });

    let macro_regions_uri = "/api/v1/macroregions";
    this.axios.get(uri).then(response => {
      this.macro_regions = response.data.data;
    });
  }
};
</script>
