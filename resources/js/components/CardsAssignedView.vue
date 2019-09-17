<template>
  <div>
    <div v-if="assigned.length != 0">
      <transition-group appear>
        <div v-bind:key="macro_region.id" v-for="macro_region in assigned">
          <blockquote>
            <h4>{{macro_region.name}}</h4>
          </blockquote>
          <ul
            class="collection with-header z-depth-3"
            v-bind:key="card.id"
            v-for="card in macro_region.assignment_cards"
          >
            <li class="collection-header">
              <div class="card-header-flex">
                <div class="card-header-name">{{card.name}}</div>
                <div class="card-header-btn">
                  <a href="#" v-on:click="submit_and_update(card.id)">Received</a>
                </div>
              </div>
            </li>
            <li
              class="collection-item"
              v-bind:key="assignment.id"
              v-for="assignment in card.assignments"
            >
              <span v-if="assignment.user.name != '' ">{{assignment.user.name}}</span>
              <span v-else>Unknown</span>
              <div class="right">
                <b>{{assignment.created_at}}</b>
              </div>
            </li>
            <li class="collection-item center" style="padding: 0">
              <a
                :href="'#assign-card-modal-'+uid"
                class="btn-flat waves-effect waves-light add-publisher-button"
                @click.prevent="open_modal(card.id)"
              >
                <span :id="card.id">+ Add publisher</span>
              </a>
            </li>
          </ul>
        </div>
      </transition-group>
    </div>
    <div v-else>
      <transition-group appear>
        <div class="valign-wrapper">
          <div style="width: 100%">
            <h2 class="center-align">Oh no!</h2>
            <h5 class="center-align">No cards at work.</h5>
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
  data() {
    var vm = this;
    return {
      assigned: [],
      card_id: 0,
      uid: vm._uid
    };
  },
  created() {
    this.update_assigned_cards();
  },
  mounted() {
    var vm = this;
    this.$root.$on("assignment-update", () => {
      vm.update_assigned_cards();
    });
  },
  methods: {
    update_assigned_cards: function() {
      this.axios.get(routes.assignments()).then(response => {
        this.assigned = response.data.data.assigned;
      });
    },
    submit_and_update: function(card_id) {
      var vm = this;
      this.axios
        .delete(routes.assignments_card_finish(card_id))
        .then(response => {
          vm.$root.$emit("assignment-update");
        });
    },
    open_modal(card_id) {
      console.log(card_id);
      this.card_id = card_id;
      this.$root.$emit("open-assignment-new-modal");
    }
  },
  components: {
    AssignmentNewModal
  }
};
</script>
