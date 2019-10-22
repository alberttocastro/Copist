<template>
  <standard-layout>
    <address-view :address_id=" Number($route.params.id)"></address-view>
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