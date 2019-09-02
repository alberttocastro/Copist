<template>
  <login-layout>
    <div class="row">
      <div class="col s10 offset-s1 m8 offset-m2 l6 offset-l3">
        <h3>{{ "Registrar"}}</h3>

        <form
          id="user-register-form"
          method="POST"
          :action="$root.routes.users()"
          @submit.prevent="register"
        >
          <label for="name" class="col-md-4 col-form-label text-md-right">{{ 'nome' }}</label>

          <input
            id="name"
            type="text"
            class="form-control is-invalid"
            name="name"
            required
            autocomplete="name"
            autofocus
          />

          <label for="email" class="col-md-4 col-form-label text-md-right">{{ 'Email' }}</label>

          <input
            id="email"
            type="email"
            class="form-control @error('email') is-invalid @enderror"
            name="email"
            required
            autocomplete="email"
          />

          <label for="password" class="col-md-4 col-form-label text-md-right">{{ 'Senha' }}</label>

          <input
            id="password"
            type="password"
            class="form-control"
            name="password"
            required
            autocomplete="new-password"
          />
          <label
            for="password-confirm"
            class="col-md-4 col-form-label text-md-right"
          >{{ 'confirm password' }}</label>

          <input
            id="password-confirm"
            type="password"
            class="form-control"
            name="password_confirmation"
            required
            autocomplete="new-password"
          />

          <button type="submit" class="btn btn-primary">{{'Register'}}</button>
        </form>
      </div>
    </div>
  </login-layout>
</template>

<script>
import LoginLayout from "@/js/layouts/LoginLayout.vue";
export default {
  components: {
    LoginLayout
  },
  methods: {
    register() {
      let form_object = $("form#user-register-form");

      this.axios
        .post(form_object.prop("action"), form_object.serialize())
        .then(response => {
          window.toastr["success"]("User was created successfully");
          this.$router.push({ name: "login" });
        })
        .catch(motive => {
          window.toastr["error"]("User could not be created");
        });
    }
  }
};
</script>

<style>
</style>