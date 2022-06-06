<template>
  <div class="client" v-if="categories.length > 0">
    <div class="title__btn">
      <h3 class="title">All Categories</h3>
      <ButtonComponent
        name="Add Category"
        to=""
        data-bs-toggle="modal"
        data-bs-target="#exampleModal"
      />
    </div>
    <div class="table-responsive table__width">
      <table class="table table-hover table-borderless">
        <thead class="table__bar">
          <tr>
            <th scope="col">#</th>
            <th scope="col">Category Name</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="category in categories" :key="category.id">
            <th scope="row">{{ category.id }}</th>
            <td>{{ category.name }}</td>
            <td class="icons__table">
              <input type="hidden" v-model="category.id" />
              <FIcons
                :icon="['fas', 'trash']"
                class="btn btn-outline-danger"
                @click="DeleteCategory(category.id)"
              />
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
  <div v-else>
    <EmptyTable message="there is no category for now." />
  </div>
  <!-- report modal -->
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
            <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
              aria-label="Close"
            ></button>
          </div>
          <form v-on:submit.prevent="AddCategory()">
            <div class="modal-body">
              <div class="form-group">
                <label class="mb-2">Category Name</label>
                <input
                  type="text"
                  class="form-control"
                  id="exampleInputPassword1"
                  v-model="CategoryName"
                  required
                />
              </div>
            </div>
            <div class="modal-footer">
              <button
                type="button"
                class="btn btn-secondary"
                data-bs-dismiss="modal"
              >
                Close
              </button>
              <button
                type="submit"
                class="btn btn-primary"
                data-bs-dismiss="modal"
              >
                Submit
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";
import Swal from "sweetalert2";
import ButtonComponent from "../button/ButtonComponent.vue";
import EmptyTable from "../empty/EmptyTable.vue";
export default {
  name: "UsersTable",
  components: {
    ButtonComponent,
    EmptyTable,
  },
  data() {
    return {
      categories: [],
      workers: [],
      SuccessMessage: "",
      CategoryName: "",
    };
  },
  methods: {
    // Get category from database
    GetCategory() {
      axios
        .get(`http://localhost/youcode/mouqaf/admin/GetCategory`)
        .then((res) => {
          console.log(res.data);
          this.categories = res.data;
        })
        .catch((err) => {
          console.log(err);
        });
    },
    // delete client
    DeleteCategory(idCategory) {
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
              `http://localhost/youcode/mouqaf/admin/DeleteCategory/${idCategory}`
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
    // Create post
    AddCategory() {
      const formData = new FormData();
      formData.append("name", this.CategoryName);
      // show alert message with three button save, don't save and cancel
      Swal.fire({
        title: "Do you want to save the changes?",
        showDenyButton: true,
        showCancelButton: true,
        confirmButtonText: "Save",
        denyButtonText: `Don't save`,
      }).then((result) => {
        // if click on save button then save the changes
        if (result.isConfirmed) {
          axios
            .post("http://localhost/youcode/mouqaf/admin/AddCategory", formData)
            .then((Response) => {
              console.log(Response.status);
              console.log(Response.data);
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
            })
            .catch((e) => {
              console.log(e.response.status);
              console.log(e.response);
              console.log(e.response.data.message);
              this.ExtensionError = e.response.data.message;
              // console.log("error");
              Swal.fire(this.ExtensionError, "", "error");
            });
        }
        // if click on don't save button then don't save the changes
        else if (result.isDenied) {
          Swal.fire("Changes are not saved", "", "info");
        }
      });
    },
  },
  // get category when the page is loaded
  mounted() {
    this.GetCategory();
  },
};
</script>

<style scoped>
.title__btn {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin: 3rem 0rem 1rem 0rem;
}
.title {
  font-size: 1.4rem;
  font-weight: 600;
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
.table__width {
  width: 100%;
  height: 300px;
  margin: auto;
  position: relative;
  overflow: auto;
}
td,
th {
  overflow: hidden;
  white-space: nowrap;
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
