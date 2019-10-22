<template>
  <div class="container">
    <div class="row">
      <div class="col s12 offset-s1">
        <h2>{{address.street}}</h2>
      </div>
    </div>
    <!-- {{-- Caso a pessoa tenha um instrutor, mostra --}} -->
    <div class="row" v-if="address.is_visited">
      <div class="col s10 offset-s2">
        <div class="card blue darken-2 z-depth-2 center">
          <span class="white-text">
            <p style="font-size: 20px; padding-top: 3%;padding-bottom: 3%;">
              <span style="font-weight: bolder">Instructor</span>
              {{address.publisher.name}}
            </p>
          </span>
        </div>
      </div>
    </div>
    <div class="col">
      <!-- {{-- <%#Nome%> --}} -->
      <div class="row mb-0">
        <div class="col s2 right-align">
          <i class="material-icons small indigo-text text-darken-4">account_box</i>
        </div>
        <div class="col s10">
          <div class="small-title-font indigo-text text-darken-4">Name</div>
        </div>
      </div>
      <div class="row">
        <div class="col s10 offset-s2">
          <div class="left-align description-font">
            {{address.name}}
            <div class="divider"></div>
          </div>
        </div>
      </div>
      <!-- {{-- <%#Nacionalidade%> --}} -->
      <div class="row mb-0">
        <div class="col s2 right-align">
          <i class="material-icons small indigo-text text-darken-4">map</i>
        </div>
        <div class="col s10">
          <div class="small-title-font indigo-text text-darken-4">Nationality</div>
        </div>
      </div>
      <div class="row">
        <div class="col s10 offset-s2">
          <div class="left-align description-font" v-if="address.nationality != null">
            {{ address.nationality.name }}
            <div class="divider"></div>
          </div>
          <div class="left-align description-font">Unknown</div>
        </div>
      </div>
      <!-- {{-- <%#Referência%> --}} -->
      <div class="row mb-0">
        <div class="col s2 right-align">
          <i class="material-icons small indigo-text text-darken-4">location_searching</i>
        </div>
        <div class="col s10">
          <div class="small-title-font indigo-text text-darken-4">Reference</div>
        </div>
      </div>
      <div class="row">
        <div>
          <div class="col s10 offset-s2">
            <div class="left-align description-font">
              <p class="flow-text mt-0 mb-0">{{address.references}}</p>
              <div class="divider"></div>
            </div>
          </div>
        </div>
      </div>
      <!-- {{-- <%#Comentários%> --}} -->
      <div class="row mb-0">
        <div class="col s2">
          <div class="right-align">
            <i class="material-icons small indigo-text text-darken-4">chat_bubble</i>
          </div>
        </div>
        <div class="col s10">
          <div class="small-title-font indigo-text text-darken-4">Comments</div>
        </div>
      </div>
      <div class="row">
        <div class="col s10 offset-s2">
          <div class="left-align description-font">
            <p class="flow-text mt-0 mb-0">{{address.comments }}</p>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col s6 offset-s3">
          <router-link :to="{name: 'address-edit', params: {id: Number(address_id)}}">Edit</router-link>
        </div>
      </div>
    </div>
    <!-- address.visits.count() > 0 -->
    <div v-if="address != []">
      <div class="carousel carousel-slider">
        <div class="row hide-on-small-only">
          <div class="col offset-s1">
            <h3 style="font-weight: 500" class="indigo-text text-darken-4">Visits</h3>
          </div>
        </div>

        <a
          class="carousel-item valign-wrapper"
          v-for="visit in address.visits"
          v-bind:key="visit.id"
        >
          <div class="row mb-0">
            <div class="col s12 m10 offset-m1">
              <div class="card white">
                <div class="card-content black-text">
                  <div class="card-title left-align mb-0" style="font-weight: 400">
                    <div class="row mb-0">
                      <div class="col">
                        <div class="valign-wrapper">
                          <i
                            class="material-icons medium valign-wrapper"
                            style="padding-top: 18%"
                          >account_circle</i>
                        </div>
                      </div>
                      <div class="col">
                        <div class="row mb-0">{{visit.publisher.name}}</div>
                        <div class="row">
                          <h6 class="mt-0" style="font-weight: 300">
                            <span v-if="visit.visit_date != null">{{visit.visit_date}}</span>
                            <span v-else>No date</span>
                          </h6>
                        </div>
                      </div>
                    </div>
                  </div>
                  <p style="font-weight: 300">{{visit.comment}}</p>
                </div>
              </div>
            </div>
          </div>
        </a>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      address: []
    };
  },
  props: {
    address_id: Number
  },
  created() {
    this.axios.get(routes.addresses(this.address_id)).then(response => {
      console.log(response);
      this.address = response.data.data;
    });
  },
  updated() {
    $(".carousel").carousel({
      indicators: true
    });
  }
};
</script>
<style scoped>
.card {
  width: 60vw !important;
}
</style>