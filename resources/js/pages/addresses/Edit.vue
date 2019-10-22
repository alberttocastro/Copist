<template>
  <standard-layout>
    <address-edit :address_id=" Number($route.params.id)"></address-edit>
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