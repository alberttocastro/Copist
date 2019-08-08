<template>
  <div id="report-new" class="modal">
    <form action="#">
      <div class="modal-content">
        <input type="hidden" name="address_id" v-bind:value="address_id">
        <div class="input-field">
          <input type="text" name="date" id="date">
          <label for="date">Visit date</label>
        </div>
        <div class="input-field">
          <textarea id="report" name="report" class="materialize-textarea"></textarea>
          <label for="report">Your report</label>
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-flat">Send</button>
      </div>
    </form>
  </div>
</template>
<script>
export default {
  props: {
    address_id: Number
  }
};
</script>
