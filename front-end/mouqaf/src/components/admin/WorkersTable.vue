<template>
  <div class="client">
    <h3 class="title">All Workers</h3>
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
          <tr v-for="worker in workers" :key="worker.id">
            <th scope="row">{{ worker.id }}</th>
            <td>{{ worker.first_name }}</td>
            <td>{{ worker.last_name }}</td>
            <td>{{ worker.email }}</td>
            <td>{{ worker.phone }}</td>
            <td>{{ worker.city }}</td>
            <td class="icons__table">
              <input type="hidden" v-model="worker.id" />
              <!-- <FIcons
                :icon="['fas', 'circle-info']"
                class="btn btn-outline-info"
              /> -->
              <FIcons
                :icon="['fas', 'trash']"
                class="btn btn-outline-danger"
                @click="DeleteUser(worker.id)"
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
import Swal from "sweetalert2";
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

    // delete worker

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
              if (Response.status === 200) {
                Swal.fire({
                  title: "Your file has been deleted.",
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
.icons__table {
  display: flex;
  gap: 1rem;
}
.table__bar {
  background-color: #4e73df;
  color: #f5f5f5;
}
td, th {
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
</style>
