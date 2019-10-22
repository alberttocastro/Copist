<template>
  <div>
    <div class="fixed-action-btn">
      <a class="btn-floating btn-large blue lighten-2 modal-trigger" href="#address-suggestion-new">
        <i class="material-icons Large">add</i>
      </a>
    </div>
    <suggested-address-new-modal></suggested-address-new-modal>
  </div>
</template>
<script>
import SuggestedAddressNewModal from "./SuggestedAddressNewModal.vue";
export default {
  components: {
    SuggestedAddressNewModal
  }
};
</script>
