<template>
  <div>
    <header>
      <div class="navbar-fixed">
        <nav class="nav-extended navbar-dark indigo darken-2 z-depth-2">
          <div class="nav-wrapper">
            <router-link :to="{name: 'index'}" class="brand-logo">Copist</router-link>
            <a href="#" data-target="slide-out" class="sidenav-trigger">
              <i class="material-icons">menu</i>
            </a>
            <slot name="bar">
              <the-bar></the-bar>
            </slot>
          </div>
          <div class="nav-content">
            <slot name="header"></slot>
          </div>
        </nav>
      </div>
      <slot name="sidenav">
        <the-side-nav></the-side-nav>
      </slot>
    </header>
    <main>
      <slot></slot>
    </main>
    <footer>
      <slot name="footer"></slot>
    </footer>
  </div>
</template>

<script>
import TheBar from "@/js/components/nav/TheBar.vue";
import TheSideNav from "@/js/components/nav/TheSideNav.vue";
export default {
  components: {
    TheBar,
    TheSideNav
  }
};
</script>

<style>
</style>