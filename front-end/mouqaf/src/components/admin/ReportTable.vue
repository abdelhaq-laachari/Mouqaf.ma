<template>
  <div class="client" v-if="reports.length > 0">
    <h3 class="title">All Reports</h3>
    <div class="table-responsive col-lg-12">
      <table class="table table-hover table__width table-borderless">
        <thead class="table__bar">
          <tr>
            <th scope="col">#</th>
            <th scope="col">Report's Subject</th>
            <th scope="col">Comment Id</th>
            <th scope="col">reported comment</th>
            <th scope="col">Worker Id</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="report in reports" :key="report.id">
            <th scope="row">{{ report.idReport }}</th>
            <td>{{ report.topic }}</td>
            <th scope="row">{{ report.idComment }}</th>
            <td>{{ report.proposal }}</td>
            <th scope="row">{{ report.idWorker }}</th>
            <td class="icons__table">
              <input type="hidden" v-model="report.idComment" />
              <FIcons
                :icon="['fas', 'trash']"
                class="btn btn-outline-danger"
                @click="DeleteComment(report.idComment)"
              />
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
  <div v-else>
    <EmptyTable message="there is no report for now." />
  </div>
</template>

<script>
import Swal from "sweetalert2";
import axios from "axios";
import EmptyTable from "../empty/EmptyTable.vue";
export default {
  name: "ReportTable",
  components: {
    EmptyTable,
  },
  data() {
    return {
      reports: [],
      OneReports: [],
      idReport: localStorage["idReport"],
    };
  },
  methods: {
    // Get Clients from database
    GetAllReports() {
      axios
        .get(`http://localhost/youcode/mouqaf/admin/GetAllReports`)
        .then((res) => {
          console.log(res.data);
          this.reports = res.data;
        })
        .catch((err) => {
          console.log(err);
        });
    },
    // Get Workers from database
    GetOneReport() {
      axios
        .get(
          `http://localhost/youcode/mouqaf/admin/GetOneReport/${this.idReport}`
        )
        .then((res) => {
          this.OneReports = res.data;
          console.log(this.OneReports);
        })
        .catch((err) => {
          console.log(err);
        });
    },

    // delete comment

    DeleteComment(idComment) {
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
            .post(
              `http://localhost/youcode/mouqaf/admin/DeleteComment/${idComment}`
            )
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
  // get All reports when the page is loaded
  mounted() {
    this.GetAllReports();
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
