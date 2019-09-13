<template>
  <router-view></router-view>
</template>
<script>
export default {
  beforeCreate() {
    console.log("beforeCreate");
    this.$store.dispatch("set_ajax_headers");

    this.axios.interceptors.response.use(
      function(response) {
        window.toastr["success"]("Success!");
        return response;
      },
      function(error) {
        console.log({ erro: error });
        if ((error.response.status = "401")) {
          window.toastr["error"]("Not authorized. Please, log in again.");
          vm.$store.dispatch("logout");
        }
      }
    );
  },
  beforeUpdate() {
    this.$store.dispatch("get_data").then(response => {
      if (this.$route.meta.requiresAuth) {
        // Caso não seja  pagina de não autorizado, sendo o usuário autorizado, passa
        if (
          this.$route.name != "unauthorized" &&
          !this.$store.getters.isAuthorized
        ) {
          this.$router.push({
            name: "unauthorized"
          });
        }

        // Se a pagina for de administrador, e o usuário não for administrador, não passa
        console.log({
          validations:
            this.$route.name != "unauthorized" &&
            (this.$route.matched.some(record => record.meta.isAdmin) &&
              !this.$store.getters.isAdmin)
        });
        if (
          this.$route.name != "unauthorized" &&
          (this.$route.matched.some(record => record.meta.isAdmin) &&
            !this.$store.getters.isAdmin)
        ) {
          this.$router.push({
            name: "unauthorized"
          });
        }
      }
    });
  }
};
</script>