<template>
  <div class="row">
    <div class="col s12 m10 l8 xl8 offset-xl2 offset-l2 offset-m1">
      <transition-group appear>
        <div
          v-for="assignment in assignments"
          v-bind:key="assignment.id"
          class="card grey lighten-5 z-depth-2"
        >
          <div class="card-content indigo-text text-darken-4">
            <span class="card-title">
              <div class="row">
                <div class="col s2" style="padding-left: 0%">
                  <i class="material-icons medium">location_on</i>
                </div>
                <div class="col s10" style="vertical-align:middle;">
                  <h4 style="margin-top: 0px">{{ assignment.card.name }}</h4>
                </div>
              </div>
            </span>
            <ul class="collapsible z-depth-0" v-if="assignment.card.addresses">
              <li v-for="address in assignment.card.addresses" v-bind:key="address.id">
                <div class="collapsible-header" :class="address.done ? 'blue lighten-4' : null">
                  <i class="material-icons">contacts</i>
                  {{ address.street }}
                </div>
                <div class="collapsible-body">
                  <div class="row valign-wrapper">
                    <div class="col s9">
                      <p>Name: {{ address.name }}</p>
                      <p v-if="address.nationality != null">
                        Country:
                        {{ address.nationality.name }}
                      </p>
                      <p>Ref: {{ address.references }}</p>
                      <p>Obs: {{ address.comments }}</p>
                      <br />
                    </div>
                    <div class="col s3">
                      <router-link :to="{name: 'address-view', params: {id: address.id}}">View</router-link>
                    </div>
                  </div>
                  <div>
                    <a
                      :id=" address.id"
                      class="waves-effect waves-light btn modal-trigger blue darken-3 report-visit"
                      href="#report-new"
                      @click="address_id = address.id"
                    >Report</a>
                  </div>
                </div>
              </li>
            </ul>
            <h5 v-else class="green-text text-darken-1">This card has no address!</h5>
          </div>
          <form
            id="assignment-finish"
            v-bind:action="assignment_finish_route(assignment.id)"
            method="POST"
          >
            <div class="card-action">
              <button
                class="btn black-text waves-effect waves-teal btn-flat"
                @click="submit_assignment_finish()"
              >
                <b>Done</b>
              </button>
            </div>
          </form>
        </div>
      </transition-group>
    </div>
    <report-new-modal v-bind:address_id="address_id"></report-new-modal>
  </div>
</template>
<script>
import ReportNewModal from "./ReportNewModal.vue";
export default {
  components: {
    ReportNewModal
  },
  data() {
    return {
      assignments: [],
      address_id: 0
    };
  },
  created() {
    this.update_data();
  },
  updated() {
    $(".collapsible").collapsible();
  },
  methods: {
    addresses_route: function(address_id) {
      return routes.addresses(address_id);
    },
    assignment_finish_route: function(card_id) {
      return routes.assignment_finish(card_id);
    },
    submit_assignment_finish: function() {
      console.log("Submit");
      var vm = this;
      var form_object = $("#assignment-finish");
      form_object.submit(function(target) {
        target.preventDefault();
      });

      this.axios.delete(form_object.prop("action")).then(response => {
        vm.update_data();
      });
    },
    update_data: function() {
      var USER_ID = 9;
      this.axios.get(routes.user_assignments(USER_ID)).then(response => {
        this.assignments = response.data.data;
      });
    }
  }
};
</script>
