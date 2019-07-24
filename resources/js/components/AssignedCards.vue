<template>
  <div>
    <div v-if="assigned">
      <div v-bind:key="macro_region.id" v-for="macro_region in assigned">
        <blockquote>
          <h4>{{macro_region.name}}</h4>
        </blockquote>
        <ul class="collection with-header z-depth-3" v-bind:key="card.id" v-for="card in macro_region.assignment_cards">
            <li class="collection-header">
                <div class="row mb-0 valign-wrapper">
                    <div class="col s9">
                        <h4>
                            {{card.name}}
                        </h4>
                    </div>
                    <div class="col s3">
                        <!-- TODO: Colocar formulário de recebimento  -->
                        <a href="#">Received</a>
                    </div>
                </div>
            </li>
            <li class="collection-item" v-bind:key="assignment.id" v-for="assignment in card.assignments">
                <span v-if="publisher">{{assignment.user.name}}</span>
                <span v-else>Unknown</span>
                <div class="right">
                    <b>{{assignment.created_at}}</b>
                </div>
            </li>
            <li class="collection-item center" style="padding: 0">
                <a href="#modal-assign-territory" class="btn-flat waves-effect waves-light modal-trigger add-publisher-button">
                    <span :id="card.id"> + Add publisher</span>
                </a>
            </li>
        </ul>
      </div>
    </div>
    <div v-else>
      <div class="valign-wrapper">
        <div style="width: 100%">
          <h2 class="center-align">Oh no!</h2>
          <h5 class="center-align">No cards at work.</h5>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
    data(){
        return {
            assigned: []
        }
    },
    created(){
        let uri = "/api/v1/assignments";
        this.axios.get(uri).then(response => {
            this.assigned = response.data.data.assigned;
        })
    }
};
</script>
