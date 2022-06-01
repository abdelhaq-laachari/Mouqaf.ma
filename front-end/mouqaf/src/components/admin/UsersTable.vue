<template>
  <div class="client">
    <h3 class="title">All Clients</h3>
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
          <tr v-for="client in clients" :key="client.id">
            <th scope="row">{{ client.id }}</th>
            <td>{{ client.first_name }}</td>
            <td>{{ client.last_name }}</td>
            <td>{{ client.email }}</td>
            <td>{{ client.phone }}</td>
            <td>{{ client.from }}</td>
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
  name: "UsersTable",
  data() {
    return {
      clients: [],
      workers: [],
    };
  },
  methods: {
    // Get Clients from database
    GetClients() {
      axios
        .get(`http://localhost/youcode/mouqaf/admin/GetClients`)
        .then((res) => {
          console.log(res.data);
          this.clients = res.data;
        })
        .catch((err) => {
          console.log(err);
        });
    },
    // Get Workers from database
    GetWorkers() {
      axios
        .get(`http://localhost/youcode/mouqaf/admin/GetWorkers`)
        .then((res) => {
          this.workers = res.data;
        })
        .catch((err) => {
          console.log(err);
        });
    },
  },
  // get posts when the page is loaded
  mounted() {
    this.GetClients();
    this.GetWorkers();
  },
};
</script>

<style scoped>
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
</style>
