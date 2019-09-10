<template>
  <div id="report-new" class="modal modal-fixed-footer bottom-sheet">
    <form id="visit-new" method="POST" action="#" @submit.prevent="submit">
      <input type="hidden" name="_method" value="POST" />
      <div class="modal-content">
        <input type="hidden" name="address_id" v-bind:value="address_id" />
        <div class="input-field">
          <input type="text" class="datepicker" name="visit_date" id="visit_date" />
          <label for="date">Visit date</label>
        </div>
        <div class="input-field">
          <textarea id="comment" name="comment" class="materialize-textarea"></textarea>
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
  },
  updated() {
    $(".datepicker").datepicker({
      format: "yyyy/mm/dd",
      container: $(".modal-over-modal-container")[0]
    });
  },
  methods: {
    submit() {
      let url = `api/v1/addresses/${this.address_id}/visit`;
      this.axios
        .post(url, $("form#visit-new").serialize())
        .then(response => {
          console.log(response);
          window.toastr["success"]("Visit successfully reported");
        })
        .catch(motive => {
          console.log(motive);
        });
    }
  }
};
</script>
<style scoped>
#report-new.modal {
  width: 100vw;
  height: 100vh;
}
</style>
