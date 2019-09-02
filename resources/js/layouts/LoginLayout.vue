<template>
  <div>
    <header>
      <div class="navbar-fixed">
        <nav class="nav-extended navbar-dark indigo darken-2 z-depth-2">
          <div class="nav-wrapper">
            <a href="/" class="brand-logo">Copist</a>
            <a href="#" data-target="slide-out" class="sidenav-trigger">
              <i class="material-icons">menu</i>
            </a>
            <ul id="nav-mobile" class="right hide-on-med-and-down">
              <li>
                <router-link class="nav-link" :to="{name: 'login'}">Login</router-link>
              </li>
              <li>
                <router-link class="nav-link" :to="{name: 'login'}">Register</router-link>
              </li>
            </ul>
          </div>
        </nav>
      </div>
      <ul id="slide-out" class="sidenav">
        <li>
          <div class="user-view">
            <div class="background">
              <img src="http://via.placeholder.com/300x100" />
            </div>
          </div>
        </li>
        <li>
          <router-link :to="{name: 'login'}">Login</router-link>
        </li>
        <li>
          <router-link :to="{name: 'register'}">Register</router-link>
        </li>
      </ul>
    </header>
    <main>
      <slot></slot>
    </main>
  </div>
</template>

<script>
export default {
  mounted() {
    let sidenav = $(".sidenav");
    sidenav.sidenav();
    $("ul.sidenav a").click(function() {
      sidenav.sidenav("close");
    });
  }
};
</script>

<style>
</style>