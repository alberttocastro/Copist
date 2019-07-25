<template>
  <div class="container">
    <div class="row">
      <div class="col s12 m10 offset-m1">
        <h4>
          <b>Idioms</b>
        </h4>
      </div>
      <div class="row">
        <div class="col s12 m10 offset-m1">
          <div class="row">
            <div v-for="idiom in idioms" v-bind:key="idiom.id" class="col s12 m6">
              <div class="card">
                <div class="card-content">
                  <h5 style="margin-top: 0;">{{idiom.name}}</h5>
                </div>
                <div class="card-action">
                  <a class="blue-text text-darken-4" href="#">Edit</a>
                  <a class="red-text text-darken-4" href="#">Delete</a>
                </div>
              </div>
            </div>
          </div>
          <a
            href="#create-idiom"
            class="btn blue accent-4 waves-effect waves-light col s12 center-align modal-trigger"
          >
            <span class="valign-wrapper" style="max-width:fit-content; margin: auto;">
              <i class="material-icons">add_circle_outline</i> Add Idiom
            </span>
          </a>
        </div>
      </div>
    </div>
    <div id="create-idiom" class="modal">
        <!-- TODO: Adicionar rota de criar idioma -->
      <form action="#" method="post">
        @csrf
        <div class="modal-content">
          <label for="idiom">Idiom name</label>
          <input type="text" name="name" id="name" />
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn-flat modal-close green-text">Create idiom</button>
        </div>
      </form>
    </div>
  </div>
</template>
<script>
export default {
  data(){
    return {
      idioms: []
    }
  },
  created(){
    let uri = "/api/v1/idioms";
    this.axios.get(uri).then(response => {
      this.idioms = response.data.data;
    })
  }
};
</script>
