<template>
  <standard-layout>
    <template v-slot:header>
      <ul class="tabs tabs-transparent">
        <li class="tab">
          <a href="#publishers" class="active">Publishers</a>
        </li>
        <li class="tab">
          <a href="#macroregions">Macro Region</a>
        </li>
        <li class="tab">
          <a href="#cards">Cards</a>
        </li>
        <li class="tab">
          <a href="#addresstype">Address Types</a>
        </li>
      </ul>
    </template>
    <div id="publishers" class="col s12">
      <div id="vue">
        <publishers-view></publishers-view>
      </div>
    </div>
    <div id="macroregions" class="col s12">
      <div id="vue2">
        <macro-regions-view></macro-regions-view>
      </div>
    </div>
    <div id="cards" class="col s12">
      <div id="vue3">
        <cards-view></cards-view>
      </div>
    </div>
    <div id="addresstype" class="col s12">
      <div id="vue4">
        <address-types-view></address-types-view>
      </div>
    </div>
  </standard-layout>
</template>

<script>
import StandardLayout from "@/js/layouts/StandardLayout.vue";
export default {
  components: {
    StandardLayout
  },
  mounted() {
    $(".tabs").tabs();
  }
};
</script>

<style>
</style>