<template>
  <div>
    <div class="col s12 m10 offset-m1">
      <h4>
        <b>Publishers</b>
      </h4>
    </div>
    <div class="row">
      <div v-bind:key="publisher.id" v-for="publisher in publishers" class="col s12 m6">
        <div class="card publisher-card">
          <div class="card-content">
            <span class="publisher-name">{{publisher.name}}</span>
            <div class="publisher-card-item">
              <span class="publisher-card-item-title">Email</span>
              <span class="publisher-card-item-info">{{publisher.email}}</span>
            </div>
            <div class="publisher-card-item">
              <span class="publisher-card-item-title">Phone</span>
              <span class="publisher-card-item-info">{{publisher.phone}}</span>
            </div>
            <div class="publisher-card-item">
              <span class="publisher-card-item-title">Neighborhood</span>
              <span
                v-if="publisher.neighborhood"
                class="publisher-card-item-info"
              >{{publisher.neighborhood}}</span>
              <span v-else class="publisher-card-item-info red-text">Unknown</span>
            </div>
            <div class="publisher-card-item">
              <span class="publisher-card-item-title">Macro Region</span>
              <span
                v-if="publisher.macro_region"
                class="publisher-card-item-info"
              >{{publisher.macro_region.name}}</span>
              <span v-else class="publisher-card-item-info red-text">Unknown</span>
            </div>
          </div>
          <!-- TODO: Botão de editar -->
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col s12 m10 offset-m1">
        <a
          href="#new-publisher"
          class="btn blue accent-4 waves-effect waves-light col s12 center-align modal-trigger"
        >
          <span class="valign-wrapper" style="max-width:fit-content; margin: auto;">
            <i class="material-icons">add_circle_outline</i> Add Publisher
          </span>
        </a>
      </div>
    </div>
    <new-publisher></new-publisher>
  </div>
</template>
<script>
import NewPublisher from "./NewPublisher.vue";
export default {
  components: {
    NewPublisher
  },
  data() {
    return {
      publishers: []
    };
  },
  created() {
    this.update_publishers();
  },
  mounted() {
    var vm = this;
    vm.$root.$on("createPublisher", () => {
      vm.update_publishers();
    });
  },
  methods: {
    update_publishers: function() {
      let uri = "/api/v1/publishers";
      this.axios.get(uri).then(response => {
        this.publishers = response.data.data;
      });
    }
  }
};
</script>
