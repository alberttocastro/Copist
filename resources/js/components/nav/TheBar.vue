<template>
  <div>
    <ul id="nav-mobile" class="right hide-on-med-and-down">
      <li>
        <router-link :to="{name: 'index'}">My Assignments</router-link>
      </li>
      <li>
        <router-link :to="{name: 'overview'}">Overview</router-link>
      </li>
      <li>
        <a href="/">Help</a>
      </li>
      <li>
        <a class="dropdown-trigger" href="#!" data-target="admin-dropdown">
          Administration
          <i class="material-icons right">arrow_drop_down</i>
        </a>
      </li>
      <li class="valign-wrapper">
        <a href="#!" class="dropdown-trigger" data-target="user">
          <span class="material-icons">account_circle</span>
          <span class="material-icons">arrow_drop_down</span>
        </a>
      </li>
    </ul>
    <ul id="user" class="dropdown-content">
      <li>
        <router-link :to="{name: 'index'}">Logout</router-link>
      </li>
    </ul>
    <ul id="admin-dropdown" class="dropdown-content">
      <li>
        <router-link :to="{name: 'assignments'}">Assignments</router-link>
      </li>
      <li>
        <router-link :to="{name: 'management'}">Management</router-link>
      </li>
      <li class="divider"></li>
      <li>
        <router-link :to="{name: 'permissions'}">Permissions</router-link>
      </li>
      <li class="divider">DB</li>
      <li>
        <router-link :to="{name: 'database-service'}">Database - Service</router-link>
      </li>
      <li>
        <router-link :to="{name: 'database-public'}">Database - Public</router-link>
      </li>
    </ul>
  </div>
</template>

<script>
export default {};
</script>

<style>
</style>