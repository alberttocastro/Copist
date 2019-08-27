<template>
  <standard-layout>
    <template v-slot:header>
      <ul class="tabs tabs-transparent">
        <li class="tab">
          <a href="#new" class="active">New</a>
        </li>
        <li class="tab">
          <a href="#manage">Manage</a>
        </li>
      </ul>
    </template>
    <div id="new">
      <suggested-addresses-view></suggested-addresses-view>
    </div>
    <!-- <div id="new"> -->

    <!-- Aba para escolher o mapa dos endereços -->
    <div id="manage">
      <address-select-card-view></address-select-card-view>
    </div>
  </standard-layout>
</template>

<script>
import StandardLayout from "@/js/layouts/StandardLayout.vue";
export default {
  components: {
    StandardLayout
  },
  updated() {
    $(".tabs").tabs();
  }
};
</script>

<style>
</style>