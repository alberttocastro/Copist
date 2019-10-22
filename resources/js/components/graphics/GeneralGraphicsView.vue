<template>
  <div class="container">
    <h3>
      <b>Charts</b>
    </h3>
    <div class="divider"></div>
    <div class="col"></div>
    <div class="row">
      <div class="col l10 m6">
        <h4>Addresses</h4>
      </div>
      <div class="col l2 m3 offset-m3">
        <span class="right">
          <h4>{{arrSum(nationalities.amount)}} Addresses</h4>
        </span>
      </div>
    </div>
    <div class="divider"></div>
    <h4 class="grey-text text-darken2">By Country</h4>

    <canvas id="foreigners-by-country" width="20rem" height="10rem"></canvas>

    <div class="divider"></div>
  </div>
</template>

<script>
import Chart from "chart.js";
export default {
  data() {
    return {
      nationalities: {
        names: [],
        amount: []
      },
      addresses: {
        amount: 0
      }
    };
  },
  mounted() {
    this.axios.get("api/v1/graphics/nationalities").then(response => {
      this.nationalities.names = response.data.data.names;
      this.nationalities.amount = response.data.data.amount;
    });
  },
  updated() {
    var ctx = document.getElementById("foreigners-by-country");
    var myChart = new Chart(ctx, {
      type: "pie",
      data: {
        labels: this.nationalities.names,
        datasets: [
          {
            label: "# foreigners",
            data: this.nationalities.amount,
            borderWidth: 1,
            backgroundColor: this.backgroundColors(
              this.nationalities.names.length
            )
          }
        ]
      }
    });
  },
  methods: {
    arrSum(array) {
      return array.reduce(function(a, b) {
        return a + b;
      }, 0);
    },
    backgroundColors(quantity) {
      let answer = [];
      for (let i = 0; i < quantity; i++) {
        answer.push("#" + Math.floor(Math.random() * 16777215).toString(16));
      }

      return answer;
    }
  }
};
</script>

<style>
</style>