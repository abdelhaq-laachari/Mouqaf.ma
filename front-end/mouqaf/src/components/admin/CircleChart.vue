<template>
  <div class="circle__chart">
    <h3>Post's Statistic</h3>
    <canvas id="mChart" width="400" height="400"></canvas>
  </div>
</template>

<script>
import Chart from "chart.js/auto";
import axios from "axios";
export default {
  name: "CircleChart",
  data() {
    return {};
  },
  methods: {},
  async mounted() {
    // // get dates
    const GetTotalPosts = await axios.get(
      `http://localhost/youcode/mouqaf/admin/GetTotalPosts`
    );
    this.posts = GetTotalPosts.data.map((posts) => posts.NumberOfPosts);
    // console.log(this.posts);
    // get users
    const GetTotalComments = await axios.get(
      `http://localhost/youcode/mouqaf/admin/GetTotalComments`
    );
    this.comments = GetTotalComments.data.map(
      (comments) => comments.NumberOfComments
    );
    // console.log(this.comments);
    // get Get Total Reports
    const GetTotalReports = await axios.get(
      `http://localhost/youcode/mouqaf/admin/GetTotalReports`
    );
    this.reports = GetTotalReports.data.map(
      (reports) => reports.NumberOfReports
    );
    console.log(this.reports);

    const ctx = document.getElementById("mChart");
    const data = {
      labels: [ "Posts", "Comments", "Reports"],
      datasets: [
        {
          data: this.posts + this.comments + this.reports,
          backgroundColor: [
            "rgb(255, 99, 132)",
            "rgb(54, 162, 235)",
            "rgb(255, 205, 86)",
          ],
          hoverOffset: 4,
        },
      ],
    };
    const myChart = new Chart(ctx, {
      type: "doughnut",
      data: data,
    });
    myChart;
  },
};
</script>
<style scoped>
.circle__chart {
  width: 400px;
  display: flex;
  flex-direction: column;
  align-items: center;
}
.circle__chart h3 {
  margin-bottom: 1rem;
  text-transform: capitalize;
}
@media (max-width: 900px) {
  .circle__chart{
  width: 320px;
  }
}
@media (max-width: 820px) {
  .circle__chart{
  width: 300px;
  }
}
@media (max-width: 750px) {
  .circle__chart{
  width: 80%;
  }
}
</style>
