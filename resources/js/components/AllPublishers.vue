<template>
  <div>
    <div class="col s12 m10 offset-m1">
      <h4>
        <b>Publishers</b>
      </h4>
    </div>
    <div class="row">
      <div v-bind:key="publisher.id" v-for="publisher in publishers" class="col s12 m6">
        <div class="card">
          <div class="card-content">
            <h5 style="margin-top: 0;">{{publisher.name}}</h5>
            <span>
              <b>Email</b>
              {{publisher.email}}
            </span>
            <br />
            <span>
              <b>Phone</b>
              {{publisher.phone}}
            </span>
            <br />
            <span v-if="publisher.neighborhood">
              <b>Neighborhood</b>
              {{publisher.neighborhood}}
            </span>
            <br />
            <span>
              <b>Neighborhood</b>
              <i class="red-text">Unknown</i>
            </span>
            <br />
            <span v-if="publisher.macro_region">
              <b>Macro Region</b>
              {{publisher.macro_region.name}}
            </span>
            <span v-else>
              <b>Macro Region</b>
              <i class="red-text">Unknown</i>
            </span>
            <br />
          </div>
          <!-- TODO: Botão de editar -->
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col s12 m10 offset-m1">
        <a
          href="#create-publisher"
          class="btn blue accent-4 waves-effect waves-light col s12 center-align modal-trigger"
        >
          <span class="valign-wrapper" style="max-width:fit-content; margin: auto;">
            <i class="material-icons">add_circle_outline</i> Add Publisher
          </span>
        </a>
      </div>
    </div>

    <div id="create-publisher" class="modal">
        <!-- Colocar ação do formulário -->
        <form action="#" method="post">
            @csrf
            <div class="modal-content">
                <label for="name">Name</label>
                <input type="text" name="name" id="name">
                <label for="email">Email</label>
                <input type="email" name="email" id="email">
                <label for="phone">Phone</label>
                <input type="tel" name="phone" id="phone">
                <label for="neighborhood">Neighborhood</label>
                <input type="text" name="neighborhood" id="neighborhood">
                <label for="macro-region">Macro Region</label>
                <select name="macro_region" id="macro_region">
                    <option value="0">Select a Macro-Region</option>
                    <option v-for="macro_region in macro_regions" v-bind:key="macro_region.id" :value="macro_region.id">{{macro_region.name}}</option>
                </select>

            </div>
            <div class="modal-footer">
                <button type="submit" class="btn-flat green-text">Create Publisher</button>
            </div>
        </form>
    </div>
  </div>
</template>
<script>
export default {
  data() {
    return {
      publishers: [],
      macro_regions: []
    };
  },
  created() {
    let uri = "/api/v1/publishers";
    this.axios.get(uri).then(response => {
      this.publishers = response.data.data;
    });

    let macro_regions_uri = "/api/v1/macroregions"
    this.axios.get(uri).then(response => {
      this.macro_regions = response.data.data;
    });
  }
};
</script>
