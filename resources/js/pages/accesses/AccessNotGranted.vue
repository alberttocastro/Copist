<template>
  <div>
    <header>
      <div class="navbar-fixed">
        <nav class="nav-extended navbar-dark indigo darken-2 z-depth-2">
          <div class="nav-wrapper">
            <a href="/" class="brand-logo">Copist</a>
          </div>
        </nav>
      </div>
    </header>
    <main>
      <div class="row">
        <h2 class="center-align" style="width:100%">Sorry</h2>
        <h5
          class="center-align"
          style="width:100%"
        >You were not yet granted access. Please, contact one of the administrators.</h5>
      </div>
      <a href="#" class="btn btn-block" @click.prevent="logout">Logout</a>
    </main>
  </div>
</template>

<script>
export default {
  methods: {
    logout() {
      this.$store.dispatch("logout").then(response => {
        this.$router.push({ name: "login" });
      });
    }
  }
};
</script>

<style>
</style>