<template>
  <standard-layout>
    <template v-slot:header>
      <ul class="tabs tabs-transparent">
        <li class="tab">
          <a href="#nationalities" class="active">Nationalities</a>
        </li>
        <li class="tab">
          <a href="#idioms">Idioms</a>
        </li>
      </ul>
    </template>
    <div id="idioms" class="col s12">
      <div id="vue">
        <idioms-view></idioms-view>
      </div>
    </div>
    <div id="nationalities" class="col s12">
      <div id="vue2">
        <nationalities-view></nationalities-view>
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