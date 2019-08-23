<template>
  <login-layout>
    <div class="row">
      <div class="col s10 offset-s1 m8 offset-m2 l6 offset-l3">
        <div class="container">
          <h3>Log in</h3>
          <form method="POST" action="/">
            <div class="row">
              <div class="col s12">
                <div class="field">
                  <label for="email">Email</label>
                  <br />
                  <input
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
  components: {
    LoginLayout
  }
};
</script>

<style>
</style>