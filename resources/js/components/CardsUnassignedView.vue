<template>
  <div>
    <div id="macro-region" v-if="unassigned">
      <div v-bind:key="macro_region.id" v-for="macro_region in unassigned">
        <blockquote>
          <h4>{{macro_region.name}}</h4>
        </blockquote>
        <transition-group appear>
          <ul
            class="collection with-header z-depth-3 card"
            v-bind:key="card.id"
            v-for="card in macro_region.assignment_cards"
          >
            <li class="collection-header card-header">
              <div class="card-header-flex">
                <div class="card-header-name">{{card.name}}</div>
                <div class="card-header-btn">
                  <a href="#" @click.prevent="open_modal(card.id)">Assign</a>
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
        </transition-group>
      </div>
    </div>
    <div id="macro-region" v-else>
      <!--  Caso não tenha uma macro-região cadastrada -->
      <transition-group appear>
        <div class="valign-wrapper">
          <div>
            <h2 class="center-align">There aren't macro-regions yet.</h2>
            <h5 class="center-align">Please, go to the database to create one.</h5>
          </div>
        </div>
      </transition-group>
    </div>
    <assignment-new-modal v-bind:card_id="card_id"></assignment-new-modal>
  </div>
</template>
<script>
import AssignmentNewModal from "./AssignmentNewModal.vue";
export default {
  components: {
    AssignmentNewModal
  },
  data() {
    return {
      unassigned: [],
      users: [],
      card_id: 0
    };
  },
  created() {
    this.update_unassigned_cards();
  },
  mounted() {
    var vm = this;
    this.$root.$on("assignment-update", () => {
      vm.update_unassigned_cards();
    });
  },
  watch: {
    card_id: function(new_card_id, old_card_id) {
      this.axios
        .get(routes.card_users_available(new_card_id))
        .then(response => {
          this.users = response.data.data;
        });
    }
  },
  methods: {
    submit_and_update: function() {
      let vm = this;
      let form_object = $("#assign-card-modal form");
      form_object.submit(function(target) {
        target.preventDefault();
      });
      this.axios
        .post(form_object.prop("action"), form_object.serialize())
        .then(response => {
          vm.update_unassigned_cards();
          try {
            vm.$root.$emit("assignment-update");
          } catch (error) {
            console.log(error);
          }
        });
    },
    update_unassigned_cards: function() {
      this.axios.get(routes.assignments()).then(response => {
        this.unassigned = response.data.data.unassigned;
      });

      this.axios.get(routes.users()).then(response => {
        this.users = response.data.data;
      });
    },
    open_modal(card_id) {
      console.log(card_id);
      this.card_id = card_id;
      this.$root.$emit("open-assignment-new-modal");
    }
  }
};
</script>
