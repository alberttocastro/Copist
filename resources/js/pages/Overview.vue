<template>
  <standard-layout>
    <template v-slot:header>
      <ul class="tabs tabs-transparent">
        <li class="tab">
          <a href="#dashboard">Insights</a>
        </li>
        <li class="tab">
          <a href="#all" class="active">Addresses</a>
        </li>
      </ul>
    </template>
    <div id="all" class="col s12">
      <addresses-view></addresses-view>
      <cards-without-macro-region-view></cards-without-macro-region-view>
      <addresses-without-card-view></addresses-without-card-view>
    </div>
    <div id="dashboard" class="col s12">
      <general-graphics-view></general-graphics-view>
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