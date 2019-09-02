<template>
  <ul id="slide-out" class="sidenav">
    <li>
      <div class="user-view" style="padding-top: 4vh; min-height: 104px; background-color: #303f9f">
        <div style="line-height: 1rem">
          <span class="white-text" style="font-size: x-large">
            <b>Usuário</b>
          </span>
          <br />
          <span class="white-text">({{$store.state.user.name}})</span>
        </div>
        <div style="line-height: 2rem; margin-top: 2vh">
          <span class="white-text">
            <b>{{$store.state.user.email}}</b>
          </span>
        </div>
      </div>
    </li>
    <li>
      <router-link :to="{name: 'index'}">
        <i class="material-icons left">home</i> Home
      </router-link>
    </li>
    <li>
      <router-link :to="{ name: 'overview'}">
        <i class="material-icons left">show_chart</i>Overview
      </router-link>
    </li>
    <li>
      <router-link :to="{name: 'index'}">
        <i class="material-icons left">help</i> Help
      </router-link>
    </li>
    <div class="divider"></div>
    <li>
      <router-link :to="{name: 'assignments'}">
        <i class="material-icons left">assignment</i>Assign
      </router-link>
    </li>
    <li>
      <router-link :to="{name: 'management'}">
        <i class="material-icons left">person_add</i> Management
      </router-link>
    </li>
    <li>
      <router-link :to="{name: 'permissions'}">
        <i class="material-icons left">lock_open</i> Permissions
      </router-link>
    </li>

    <div class="divider"></div>
    <li>
      <router-link :to="{name: 'database-service'}">
        <i class="material-icons left">dvr</i> Database - Service
      </router-link>
    </li>
    <li>
      <router-link :to="{name: 'database-public'}">
        <i class="material-icons left">dvr</i> Database - Public
      </router-link>
    </li>
    <div class="divider"></div>
    <li @click="logout()">
      <router-link :to="{name: 'index'}">
        <i class="material-icons left">exit_to_app</i>
        Logout
      </router-link>
    </li>
  </ul>
</template>

<script>
export default {
  mounted() {
    let sidenav = $(".sidenav");
    sidenav.sidenav();
    $("ul.sidenav a").click(function() {
      sidenav.sidenav("close");
    });
  },
  methods: {
    logout($event) {
      this.$store.dispatch("logout").then(response => {
        this.$router.push({ name: "login" });
      });
    }
  }
};
</script>

<style>
</style>