<template>
  <div>
    <div id="macro-region" v-if="unassigned">
      <div v-bind:key="macro_region.id" v-for="macro_region in unassigned">
        <blockquote>
          <h4>{{macro_region.name}}</h4>
        </blockquote>
        <ul
          class="collection with-header z-depth-3 card"
          v-bind:key="card.id"
          v-for="card in macro_region.assignment_cards"
        >
          <li class="collection-header card-header">
            <div class="card-header-flex">
              <div class="card-header-name">{{card.name}}</div>
              <div class="card-header-btn">
                <a class="modal-trigger" href="#assign-card-modal" @click="card_id = card.id">Assign</a>
              </div>
            </div>
          </li>
          <li
            class="collection-item"
            v-bind:class="address.is_visitable == 1 ? '' : 'address-not-visitable'"
            v-bind:key="address.id"
            v-for="address in card.addresses"
          >({{address.neighborhood}}) {{address.street}}</li>
        </ul>
      </div>
    </div>
    <div id="macro-region" v-else>
      <!--  Caso não tenha uma macro-região cadastrada -->
      <div class="valign-wrapper">
        <div>
          <h2 class="center-align">There aren't macro-regions yet.</h2>
          <h5 class="center-align">Please, go to the database to create one.</h5>
        </div>
      </div>
    </div>

    <div id="assign-card-modal" class="modal bottom-sheet">
      <form action="/api/v1/assignment" method="post">
        <div class="modal-content">
          <input type="hidden" name="card_id" v-bind:value="card_id" />
          <div class="input-field">
            <select multiple name="publishers[]" id="publishers" size="3">
              <option v-for="user in users" v-bind:key="user.id" :value="user.id">{{user.name}}</option>
            </select>
            <label for="publisher">Select the publishers</label>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn-flat waves-effect waves-green modal-close">Send</button>
        </div>
      </form>
    </div>
  </div>
</template>
<script>
export default {
  data() {
    return {
      unassigned: [],
      users: [],
      card_id: 0
    };
  },
  created() {
    let uri = "/api/v1/assignments";
    this.axios.get(uri).then(response => {
      this.unassigned = response.data.data.unassigned;
    });

    let users_uri = "/api/v1/users";
    this.axios.get(users_uri).then(response => {
      this.users = response.data.data;
    });
  },
  updated() {
    var select = $("select").formSelect();
    select.isMultiple = true;
  },
  watch: {
    card_id: function(new_card_id, old_card_id) {
      console.log("updated");
      let users = "/api/v1/users/available/" + card_id;
      this.axios.get(users).then(response => {
        this.users = response.data.data;
      });
    }
  }
};
</script>
