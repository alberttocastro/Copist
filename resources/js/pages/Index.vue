<template>
  <standard-layout>
    <template v-slot:header>
      <ul class="tabs tabs-transparent">
        <li class="tab">
          <a href="#assigned-territories" class="active">Assignments</a>
        </li>
        <li class="tab">
          <a href="#info">Informations</a>
        </li>
      </ul>
    </template>

    <div id="assigned-territories" class="col s12">
      <assignment-user-view></assignment-user-view>
    </div>
    <div id="info" class="col s12 m12 l12">
      <address-not-call></address-not-call>
    </div>

    <suggested-address-new-action></suggested-address-new-action>
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