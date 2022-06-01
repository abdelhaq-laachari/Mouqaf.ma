<template>
  <div class="client">
    <h3 class="title">All Workers</h3>
    <div class="table-responsive col-lg-12">
      <table class="table table-hover table-borderless">
        <thead class="table-dark">
          <tr>
            <th scope="col">#</th>
            <th scope="col">First Name</th>
            <th scope="col">Last Name</th>
            <th scope="col">Email</th>
            <th scope="col">Phone Number</th>
            <th scope="col">From</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">3</th>
            <td>Larry</td>
            <td>the Bird</td>
            <td>@twitter</td>
            <td>@twitter</td>
            <td>@twitter</td>
            <td>@twitter</td>
          </tr>
          <tr>
            <th scope="row">3</th>
            <td>Larry</td>
            <td>the Bird</td>
            <td>@twitter</td>
            <td>@twitter</td>
            <td>@twitter</td>
            <td>@twitter</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>

<script>
import axios from "axios";
export default {
  name: "WorkersTable",
  data() {
    return {
      clients: [],
      workers: [],
    };
  },
  methods: {
    // Get Workers from database
    GetWorkers() {
      axios
        .get(`http://localhost/youcode/mouqaf/admin/GetWorkers`)
        .then((res) => {
          console.log(res.data);
          this.workers = res.data;
        })
        .catch((err) => {
          console.log(err);
        });
    },
  },
  // get posts when the page is loaded
  mounted() {
    this.GetWorkers();
  },
};
</script>

<style scoped>
.users__table {
  width: 95%;
  margin: 2rem auto;
}
.title {
  font-size: 1.4rem;
  font-weight: 600;
  margin: 3rem 0rem 1rem 0rem;
  font-family: "poppins";
}
</style>
