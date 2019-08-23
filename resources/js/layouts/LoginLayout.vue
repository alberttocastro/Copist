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
                <a class="nav-link" href="/">Login</a>
              </li>
              <li>
                <a class="nav-link" href="/">Register</a>
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
          <a href="/">Login</a>
        </li>
        <li>
          <a href="/">Registrar</a>
        </li>
      </ul>
    </header>
    <main>
      <slot></slot>
    </main>
  </div>
</template>

<script>
export default {};
</script>

<style>
</style>