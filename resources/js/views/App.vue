<template>
  <router-view></router-view>
</template>
<script>
export default {
  beforeCreate() {
    if (this.$store.getters.isLoggedIn) {
      const qs = require("querystring");
      this.axios.defaults.headers.common = {
        Authorization: "Bearer " + this.$store.state.access_token,
        "Content-Type": "application/json",
        Accept: "application/json"
      };
    }
  },
  updated() {
    $(".modal").modal();
  }
};
</script>