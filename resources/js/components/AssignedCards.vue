<template>
  <div>
    <div v-if="assigned">
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
            <span v-if="false">{{assignment.user.name}}</span>
            <span v-else>Unknown</span>
            <div class="right">
              <b>{{assignment.created_at}}</b>
            </div>
          </li>
          <li class="collection-item center" style="padding: 0">
            <a
              href="#modal-assign-territory"
              class="btn-flat waves-effect waves-light modal-trigger add-publisher-button"
            >
              <span :id="card.id">+ Add publisher</span>
            </a>
          </li>
        </ul>
      </div>
    </div>
    <div v-else>
      <div class="valign-wrapper">
        <div style="width: 100%">
          <h2 class="center-align">Oh no!</h2>
          <h5 class="center-align">No cards at work.</h5>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  data() {
    return {
      assigned: [],
      card_id: 0
    };
  },
  created() {
    this.update_assigned_cards();
  },
  methods: {
    update_assigned_cards: function() {
      let uri = "/api/v1/assignments";
      this.axios.get(uri).then(response => {
        this.assigned = response.data.data.assigned;
      });
    },
    submit_and_update: function (card_id){
      var vm = this;
      let uri = "/api/v1/assignment/receive/" + card_id;
      $.ajax({
        url: uri,
        method: "POST",
        data: {
          card_id: card_id
        },
        success: function(data){
          console.log('Data successfully sent');
          console.log(data);

          vm.update_assigned_cards();
        }
      });
    }
  }
};
</script>
