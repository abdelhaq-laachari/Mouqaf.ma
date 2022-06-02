<template>
  <div class="users__chart">
    <h3>new users</h3>
    <canvas id="myChart" width="400" height="400"></canvas>
  </div>
</template>

<script>
import Chart from "chart.js/auto";
import axios from "axios";
export default {
  name: "ChartView",
  data() {
    return {};
  },
  methods: {},
  async mounted() {
    // get dates
    const GetDate = await axios.get(
      `http://localhost/youcode/mouqaf/admin/GetDates`
    );
    this.dates = GetDate.data.map((date) => date.signed_at);
    // get users
    const GetUsers = await axios.get(
      `http://localhost/youcode/mouqaf/admin/GetNewUsers`
    );
    this.users = GetUsers.data.map((user) => user.total);

    const ctx = document.getElementById("myChart");
    const myChart = new Chart(ctx, {
      type: "bar",
      data: {
        labels: this.dates,
        datasets: [
          {
            // data:[1,2,3] ,
            data: this.users,
            backgroundColor: [
              "rgba(255, 99, 132, 0.2)",
              "rgba(54, 162, 235, 0.2)",
              "rgba(255, 206, 86, 0.2)",
              "rgba(75, 192, 192, 0.2)",
              "rgba(153, 102, 255, 0.2)",
              "rgba(255, 159, 64, 0.2)",
            ],
            borderColor: [
              "rgba(255, 99, 132, 1)",
              "rgba(54, 162, 235, 1)",
              "rgba(255, 206, 86, 1)",
              "rgba(75, 192, 192, 1)",
              "rgba(153, 102, 255, 1)",
              "rgba(255, 159, 64, 1)",
            ],
            borderWidth: 1,
          },
        ],
      },
      options: {
        scales: {
          y: {
            beginAtZero: true,
          },
        },
        plugins: {
          legend: {
            display: false,
          },
        },
      },
    });
    myChart;
  },
};
</script>
<style scoped>
.users__chart {
  width: 400px;
  display: flex;
  flex-direction: column;
  align-items: center;
}
.users__chart h3 {
  margin-bottom: 1rem;
  text-transform: capitalize;
}
@media (max-width: 1000px) {
  .users__chart{
    width: 350px;
  }
}
@media (max-width: 900px) {
  .users__chart{
    width: 320px;
  }
}
@media (max-width: 820px) {
  .users__chart{
    width: 300px;
  }
}
@media (max-width: 750px) {
  .users__chart{
    width: 80%;
  }
}
</style>
