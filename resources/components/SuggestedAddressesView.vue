<template>
  <div class="row" v-if="suggestions">
    <div class="col s12">
      <div
        class="card grey lighten-5 z-depth-2"
        v-bind:key="suggested_address.id"
        v-for="suggested_address in suggestions"
      >
        <div class="card-content indigo-text text-darken-4">
          <p>
            <b>Street:</b>
            <span class="street" :id="suggested_address.id">{{suggested_address.street}}</span>
          </p>
          <p>
            <b>Neighborhood:</b>
            <span class="neighborhood" :id="suggested_address.id">{{suggested_address.neighborhood}}</span>
          </p>
          <p>
            <b>Name:</b>
            <span class="name" :id="suggested_address.id">{{suggested_address.name}}</span>
          </p>
          <p>
            <b>Comments:</b>
            <span class="comments" :id="suggested_address.id">{{suggested_address.comments}}</span>
          </p>
        </div>
        <div class="card-action">
            <!-- TODO: Ações de aceitar ou rejeitar -->
            <a href="#">Accept</a>
            <a href="#">Reject</a>
        </div>
      </div>
    </div>
  </div>
  <div v-else>
    <div class="valign-wrapper">
      <div style="width: 100%">
        <h2 class="center-align">Well done!</h2>
        <h5 class="center-align">All new addresses are managed</h5>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  data() {
    return {
      suggestions: []
    };
  },
  created() {
    let uri = "/api/v1/suggestedaddresses";
    this.axios.get(uri).then(response => {
      this.suggestions = response.data.data;
    });
  }
};
</script>
