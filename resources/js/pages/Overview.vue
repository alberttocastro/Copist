<template>
  <standard-layout>
    <addresses-view></addresses-view>
    <cards-without-macro-region-view></cards-without-macro-region-view>
    <addresses-without-card-view></addresses-without-card-view>
  </standard-layout>
</template>

<script>
import StandardLayout from "@/js/layouts/StandardLayout.vue";
export default {
  components: {
    StandardLayout
  }
};
</script>

<style>
</style>