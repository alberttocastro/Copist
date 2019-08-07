<template>
  <div class="container">
    <div class="row">
      <div class="col s12 m10 offset-m1">
        <h4>
          <b>Nationalities</b>
        </h4>
      </div>
      <div class="row">
        <div class="col s12 m10 offset-m1">
          <div class="row">
            <div v-for="nationality in nationalities" v-bind:key="nationality.id" class="col s12 m6">
              <div class="card">
                <div class="card-content">
                  <h5 style="margin-top: 0;">{{nationlity.name}}</h5>
                </div>
                <div class="card-action">
                  <a class="blue-text text-darken-4" href="#">Edit</a>
                  <a class="red-text text-darken-4" href="#">Delete</a>
                </div>
              </div>
            </div>
          </div>
          <a
            href="#create-nationality"
            class="btn blue accent-4 waves-effect waves-light col s12 center-align modal-trigger"
          >
            <span class="valign-wrapper" style="max-width:fit-content; margin: auto;">
              <i class="material-icons">add_circle_outline</i> Add Nationality
            </span>
          </a>
        </div>
      </div>
    </div>
    <div id="create-nationality" class="modal bottom-sheet">
        <!-- TODO: Colocar rota no formulário -->
      <form action="#" method="post">
        @csrf
        <div class="modal-content">
          <label for="nationality">Nationality name</label>
          <input type="text" name="name" id="name" />
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn-flat green-text">Create Nationality</button>
        </div>
      </form>
    </div>
  </div>
</template>
<script>
export default {
    data(){
        return {
            nationalities: []
        }
    },
    created(){
        this.axios.get(routes.nationalities()).then(response => {
            this.nationalities = response.data.data;
        })
    }
}
</script>

