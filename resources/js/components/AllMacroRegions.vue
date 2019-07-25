<template>
  <div>
    <div class="row">
      <div class="col s12 m10 offset-m1">
        <h4>
          <b>Macro Regions</b>
        </h4>
      </div>
      <div class="row">
        <div class="col s12 m10 offset-m1">
          <div class="row">
            <div
              v-bind:key="macro_region.id"
              v-for="macro_region in macro_regions"
              class="col s12 m6"
            >
              <div class="card">
                <div class="card-content">
                  <h5 style="margin-top: 0;">{{macro_region.name}}</h5>
                </div>
                <!-- TODO: Botão de editar -->
              </div>
            </div>
          </div>
          <a
            href="#create-macro-region"
            class="btn blue accent-4 waves-effect waves-light col s12 center-align modal-trigger"
          >
            <span class="valign-wrapper" style="max-width:fit-content; margin: auto;">
              <i class="material-icons">add_circle_outline</i> Add Macro Region
            </span>
          </a>
        </div>
      </div>
    </div>
    <div id="create-macro-region" class="modal">
        <!-- TODO: Colocar rota de formulário -->
      <form action="#" method="post">
        @csrf
        <div class="modal-content">
          <label for="name">Macro Region name</label>
          <input type="text" name="name" id="name" />
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn-flat green-text">Create Macro-Region</button>
        </div>
      </form>
    </div>
  </div>
</template>
<script>
export default {
    data(){
        return {
            macro_regions: []
        }
    },
    created(){
        let uri = "/api/v1/macroregions";
        this.axios.get(uri).then(response=>{
            this.macro_regions = response.data.data;
        })
    }
};
</script>
