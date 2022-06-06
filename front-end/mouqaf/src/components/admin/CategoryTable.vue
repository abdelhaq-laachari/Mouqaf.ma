<template>
  <div class="client">
    <div class="title__btn">
      <h3 class="title">All Categories</h3>
      <ButtonComponent
        name="Add Category"
        to=""
        class="btn"
        @click="AddCategory"
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
</template>

<script>
import axios from "axios";
import Swal from "sweetalert2";
import ButtonComponent from "../button/ButtonComponent.vue";
export default {
  name: "UsersTable",
  data() {
    return {
      categories: [],
      workers: [],
      SuccessMessage: "",
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
  },
  // get category when the page is loaded
  mounted() {
    this.GetCategory();
  },
  components: { ButtonComponent },
};
</script>

<style scoped>
.title__btn{
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
  margin: auto;
}
</style>
