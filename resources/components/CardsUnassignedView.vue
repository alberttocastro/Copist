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
                <a class="modal-trigger" :href="'#assign-card-modal-' + uid" @click="card_id = card.id">Assign</a>
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
    <assignment-new-modal v-bind:card_id="card_id" v-bind:modal_id="uid"></assignment-new-modal>    
  </div>
</template>
<script>
import AssignmentNewModal from "./AssignmentNewModal.vue";
export default {
  components:{
    AssignmentNewModal
  },
  data() {
    var vm = this;
    return {
      unassigned: [],
      users: [],
      card_id: 0,
      uid: vm._uid
    };
  },
  created() {
    this.update_unassigned_cards();
  },
  updated() {
    $("select").formSelect();
  },
  mounted(){
    var vm = this;
    this.$root.$on('assignmentUpdate', () => {
      vm.update_unassigned_cards();
    });
  },
  watch: {
    card_id: function(new_card_id, old_card_id) {
      let users = "/api/v1/users/available/" + new_card_id;
      this.axios.get(users).then(response => {
        this.users = response.data.data;
      });
    }
  },
  methods: {
    submit_and_update: function() {
      var vm = this;
      $("#assign-card-modal form").submit(function(target) {
        target.preventDefault();

        $.ajax({
          url: $(this).prop("action"),
          method: "POST",
          data: $(this).serialize(),
          success: function(data) {
            vm.update_unassigned_cards();
            try {
              vm.$root.$emit('assignmentUpdate');
            } catch (error) {
              console.log(error);
            }
          }
        });
      });
    },
    update_unassigned_cards: function() {
      let uri = "/api/v1/assignments";
      this.axios.get(uri).then(response => {
        this.unassigned = response.data.data.unassigned;
      });

      let users_uri = "/api/v1/users";
      this.axios.get(users_uri).then(response => {
        this.users = response.data.data;
      });
    }
  }
};
</script>
