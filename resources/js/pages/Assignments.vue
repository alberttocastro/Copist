<template>
  <standard-layout>
    <template v-slot:header>
      <ul class="tabs tabs-transparent">
        <li class="tab">
          <a href="#dashboard" class="active">At Work</a>
        </li>
        <li class="tab">
          <a href="#all">Unassigned</a>
        </li>
      </ul>
    </template>
    <div id="all" class="col s12">
      <cards-unassigned-view></cards-unassigned-view>
    </div>
    <div id="dashboard" class="col s12">
      <cards-assigned-view v-on:assignment-change="update_assigned_cards()"></cards-assigned-view>
    </div>
    <assignment-new-modal v-bind:card_id="card_id"></assignment-new-modal>
  </standard-layout>
</template>

<script>
import StandardLayout from "@/js/layouts/StandardLayout.vue";
import AssignmentNewModal from "@/js/components/AssignmentNewModal.vue";
export default {
  components: {
    AssignmentNewModal,
    StandardLayout
  },
  data() {
    return {
      card_id: 0
    };
  },
  mounted() {
    $(".tabs").tabs();
  }
};
</script>

<style>
</style>