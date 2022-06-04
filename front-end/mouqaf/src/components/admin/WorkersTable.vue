<template>
  <div class="client">
    <h3 class="title">All Workers</h3>
    <div class="table-responsive col-lg-12">
      <table class="table table-hover table-borderless">
        <thead class="table__bar">
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
          <tr v-for="worker in workers" :key="worker.id">
            <th scope="row">{{ worker.id }}</th>
            <td>{{ worker.first_name }}</td>
            <td>{{ worker.last_name }}</td>
            <td>{{ worker.email }}</td>
            <td>{{ worker.phone }}</td>
            <td>{{ worker.city }}</td>
            <td class="icons__table">
              <FIcons
                :icon="['fas', 'circle-info']"
                class="btn btn-outline-info"
              />
              <FIcons
                :icon="['fas', 'trash']"
                class="btn btn-outline-danger"
              />
            </td>
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
.icons__table{
    display: flex;
    gap: 1rem;
}
.table__bar {
  background-color: #4e73df;
  color: #f5f5f5;
}
</style>
