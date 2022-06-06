<template>
  <div class="client" v-if="clients.length > 0">
    <h3 class="title">All Clients</h3>
    <div class="table-responsive col-lg-12 table__width">
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
          <tr v-for="client in clients" :key="client.id">
            <th scope="row">{{ client.id }}</th>
            <td>{{ client.first_name }}</td>
            <td>{{ client.last_name }}</td>
            <td>{{ client.email }}</td>
            <td>{{ client.phone }}</td>
            <td>{{ client.city }}</td>
            <td class="icons__table">
              <input type="hidden" v-model="client.id" />
              <FIcons
                :icon="['fas', 'trash']"
                class="btn btn-outline-danger"
                @click="DeleteUser(client.id)"
              />
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
  <div v-else>
    <EmptyTable message="there is no users for now." />
  </div>
</template>

<script>
import axios from "axios";
import Swal from "sweetalert2";
import EmptyTable from "../empty/EmptyTable.vue";
export default {
  name: "UsersTable",
  components: {
    EmptyTable,
  },
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

    // delete client

    DeleteUser(idUser) {
      Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!",
      }).then((result) => {
        if (result.isConfirmed) {
          axios
            .post(`http://localhost/youcode/mouqaf/admin/DeleteUser/${idUser}`)
            .then((Response) => {
              this.SuccessMessage = Response.data.message;
              if (Response.status === 200) {
                Swal.fire({
                  title: this.SuccessMessage,
                  icon: "success",
                  showCancelButton: false,
                  confirmButtonText: "Ok",
                }).then((result) => {
                  if (result.isConfirmed) {
                    // reload page
                    window.location.reload();
                  }
                });
              }
            });
        }
      });
    },
  },
  // get posts when the page is loaded
  mounted() {
    this.GetClients();
    // this.GetWorkers();
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
.icons__table {
  display: flex;
  gap: 1rem;
}
.table__bar {
  background-color: #4e73df;
  color: #f5f5f5;
}
td,
th {
  overflow: hidden;
  white-space: nowrap;
}
.table__width {
  width: 100%;
  height: 300px;
  margin: auto;
  position: relative;
  overflow: auto;
}
.message {
  font-size: 1.6rem;
  color: #333333;
  font-family: "Bitter", serif;
  font-weight: normal;
  line-height: 10px;
  margin: 0 0 2rem;
  text-align: center;
  margin-top: 10rem;
  text-transform: capitalize;
}
</style>
