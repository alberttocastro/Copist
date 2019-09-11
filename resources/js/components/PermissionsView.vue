<template>
  <div class="container">
    <form
      id="update-permissions-form"
      v-bind:action="this.$root.routes.permissions()"
      method="post"
    >
      <input type="hidden" name="_method" value="put" />
      <div class="row" v-if="users">
        <transition-group appear>
          <div class="col s12 m12" v-for="user in users" v-bind:key="user.id">
            <div class="card white z-depth-3">
              <div class="card-content black-text">
                <span class="card-title">{{user.email}} - {{user.name}}</span>
                <div>
                  <select :name="`permissions[${user.id}]`" :id="user.id">
                    <option value="0" v-bind:selected="user.publisher_id == 0">Access denied</option>
                    <option
                      @select="ensure_unique_selection(publisher.id)"
                      v-for="publisher in publishers"
                      v-bind:key="publisher.id"
                      v-bind:value="publisher.id"
                      v-bind:selected="user.publisher_id == publisher.id"
                    >{{publisher.name}}</option>
                  </select>
                </div>
              </div>
            </div>
          </div>
        </transition-group>
      </div>
      <div class="row" v-else>
        <transition-group appear>
          <div class="valign-wrapper">
            <div style="width: 100%">
              <h2 class="center-align">Ooops</h2>
              <h5 class="center-align">No users to manage permission</h5>
              <p class="center-align">Encourage the brothers from your congregation to use it!</p>
            </div>
          </div>
        </transition-group>
      </div>
      <div class="fixed-action-btn">
        <button type="submit" class="btn-floating btn-large purple darken-2" @click="submit()">
          <i class="material-icons Large">send</i>
        </button>
      </div>
    </form>
  </div>
</template>
<script>
export default {
  data() {
    return {
      users: [],
      publishers: []
    };
  },
  created() {
    this.axios.get(routes.users()).then(response => {
      this.users = response.data.data;
    });

    this.axios.get(routes.publishers()).then(response => {
      this.publishers = response.data.data;
    });
  },
  updated() {
    this.make_materialize_select();
  },
  methods: {
    ensure_unique_selection: function(publisher_id) {
      // TODO: Make sure that no more than one user gets the same publisher
    },
    make_materialize_select: function() {
      $("select").formSelect();
    },
    submit: function() {
      let form_object = $("#update-permissions-form");
      form_object.submit(function(target) {
        target.preventDefault();
      });

      this.axios
        .put(form_object.prop("action"), form_object.serialize())
        .then(response => {
          window.toastr["success"]("Successfully updated");
        });
    }
  }
};
</script>
