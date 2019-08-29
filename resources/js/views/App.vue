<template>
  <router-view></router-view>
</template>
<script>
export default {
  beforeCreate() {
    let vm = this;
    this.$store.dispatch("set_ajax_headers");

    this.axios.interceptors.response.use(
      function(response) {
        return response;
      },
      function(error) {
        if ((error.response.status = "401")) {
          vm.$store.dispatch("logout");
        }
      }
    );

    this.$store.dispatch("get_data");
  },
  updated() {
    $(".modal").modal();
  }
};
</script>