<template>
  <div class="client">
    <h3 class="title">All Reports</h3>
    <div class="table-responsive col-lg-12">
      <table class="table table-hover table-borderless">
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
              <FIcons :icon="['fas', 'trash']" class="btn btn-outline-danger" />
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>

  <div class="popup__modal">
    <!-- Modal -->
    <div
      class="modal fade"
      id="exampleModal"
      tabindex="-1"
      aria-labelledby="exampleModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">
              Post & Worker info
            </h5>
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
              aria-label="Close"
            ></button>
          </div>
          <div
            class="modal-body"
            v-for="OneReport in OneReports"
            :key="OneReport.idReport"
          >
            <span>Post Title : {{ OneReport.post_title }} </span> <br />
            <span>Post Title : {{ OneReport.idReport }} </span> <br />
            <span>Description : {{ OneReport.description }} </span>
          </div>
          <div class="modal-footer">
            <button
              type="button"
              class="btn btn-secondary"
              data-bs-dismiss="modal"
            >
              Close
            </button>
            <button type="button" class="btn btn-primary">Save changes</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";
export default {
  name: "ReportTable",
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

    DeleteComment() {
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
              `http://localhost/youcode/mouqaf/admin/DeleteComment/${this.idComment}`
            )
            .then((Response) => {
              if (Response.status === 200) {
                Swal.fire({
                  title: "Your file has been deleted.",
                  icon: "success",
                  showCancelButton: false,
                  confirmButtonText: "Ok",
                }).then((result) => {
                  if (result.isConfirmed) {
                    this.$router.push({ name: "post" });
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
</style>
