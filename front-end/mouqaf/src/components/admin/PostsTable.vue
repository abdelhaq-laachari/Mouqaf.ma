<template>
  <div class="client" v-if="posts.length > 0">
    <h3 class="title">All Posts</h3>
    <div class="table-responsive col-lg-12 table__width">
      <table class="table table-hover table-borderless">
        <thead class="table__bar">
          <tr>
            <th scope="col">#</th>
            <th scope="col">Post Title</th>
            <th scope="col">Description</th>
            <th scope="col">City</th>
            <th scope="col">image</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="poste in posts" :key="poste.id">
            <th scope="row">{{ poste.idPost }}</th>
            <td>{{ poste.post_title }}</td>
            <td id="desc">{{ poste.description }}</td>
            <td>{{ poste.city }}</td>
            <td>
              <img
                v-bind:src="'../uploads/PostImage/' + poste.images"
                border="0.1"
                height="50"
                alt=""
              />
            </td>
            <td>
              <div class="icons__table">
                <input type="hidden" v-model="poste.idPost" />
                <!-- <FIcons
                  :icon="['fas', 'circle-info']"
                  class="btn btn-outline-info"
                /> -->
                <FIcons
                  :icon="['fas', 'trash']"
                  class="btn btn-outline-danger"
                  @click="DeleteUserPost(poste.idPost)"
                />
              </div>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
  <div v-else>
    <EmptyTable message="there is no post for now." />
  </div>
</template>

<script>
import axios from "axios";
import Swal from "sweetalert2";
import EmptyTable from "../empty/EmptyTable.vue";
export default {
  name: "PostsTable",
  components: {
    EmptyTable,
  },
  data() {
    return {
      posts: [],
    };
  },
  methods: {
    // Get Workers from database
    GetAllPosts() {
      axios
        .get(`http://localhost/youcode/mouqaf/admin/GetAllPosts`)
        .then((res) => {
          console.log(res.data);
          this.posts = res.data;
        })
        .catch((err) => {
          console.log(err);
        });
    },

    // delete post

    DeleteUserPost(idPost) {
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
              `http://localhost/youcode/mouqaf/admin/DeleteUserPost/${idPost}`
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
  // get posts when the page is loaded
  mounted() {
    this.GetAllPosts();
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
td {
  height: 50px;
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
@media (max-width: 1000px) {
  td,
  th {
    overflow: hidden;
    white-space: nowrap;
  }
}
</style>
