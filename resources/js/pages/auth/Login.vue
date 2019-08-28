<template>
  <login-layout>
    <div class="row">
      <div class="col s10 offset-s1 m8 offset-m2 l6 offset-l3">
        <div class="container">
          <h3>Log in</h3>
          <form id="login-form" method="POST" action="/oauth/token" @submit.prevent="login">
            <div class="row">
              <div class="col s12">
                <div class="field">
                  <label for="email">Email</label>
                  <br />
                  <input
                    v-model="email"
                    id="email"
                    type="email"
                    class="form-control is-invalid"
                    name="email"
                    required
                    autocomplete="email"
                    autofocus
                  />
                  <span class="invalid-feedback" role="alert">
                    <strong>Mensagem</strong>
                  </span>
                </div>
              </div>
              <div class="col s12">
                <div class="field">
                  <label for="password">Password</label>
                  <br />
                  <input
                    v-model="password"
                    id="password"
                    type="password"
                    class="form-control is-invalid"
                    name="password"
                    required
                    autocomplete="current-password"
                  />
                  <span class="invalid-feedback" role="alert">
                    <strong>Error</strong>
                  </span>
                </div>
              </div>
              <div class="col s12">
                <label for="remember">
                  <input type="checkbox" name="remember" id="remember" />
                  <span>Remember me</span>
                </label>
              </div>
              <div class="col s12" style="margin-top: 2em">
                <div class="actions">
                  <button type="submit" class="btn btn-primary">Login</button>
                </div>
              </div>
              <div class="col s12" style="margin-top: 1em">
                <a href="/">Forgot password?</a>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </login-layout>
</template>

<script>
import LoginLayout from "@/js/layouts/LoginLayout.vue";
export default {
  data() {
    return {
      email: "",
      password: ""
    };
  },
  components: {
    LoginLayout
  },
  methods: {
    login() {
      const { email, password } = this;

      let vm = this;
      this.$store
        .dispatch("api_authenticate", {
          url: $("form#login-form").prop("action"),
          email: email,
          password: password
        })
        .finally(function() {
          console.log(vm.$store.getters.isLoggedIn);
          if (vm.$store.getters.isLoggedIn)
            vm.$root.$router.push({ name: "index" });
        });
    }
  }
};
</script>

<style>
</style>