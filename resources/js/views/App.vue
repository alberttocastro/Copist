<template>
  <router-view></router-view>
</template>
<script>
export default {
  mounted() {
    if (this.$store.getters.isLoggedIn) {
      const qs = require("querystring");
      this.axios.defaults.headers.common = qs.stringify({
        Authorization: "Bearer " + this.$store.state.access_token
      });
    }
  }
};
</script>