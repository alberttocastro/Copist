<template>
  <component v-bind:is="layout"></component>
</template>

<script>
import StandardLayout from "@/js/layouts/StandardLayout.vue";
import TextLayout from "@/js/layouts/TextLayout.vue";
export default {
  computed: {
    layout() {
      return this.$store.getters.layout;
    }
  },
  components: {
    StandardLayout,
    TextLayout
  }
};
</script>

<style>
</style>