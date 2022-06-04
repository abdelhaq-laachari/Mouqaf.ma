<template>
  <div class="client">
    <h3 class="title">All Posts</h3>
    <div class="table-responsive col-lg-12">
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
            <td>{{ poste.description }}</td>
            <td>{{ poste.city }}</td>
            <td>
              <img
                v-bind:src="'../uploads/PostImage/' + poste.images"
                border="0.1"
                height="50"
                alt=""
              />
            </td>
            <td >
              <div class="icons__table">
                <FIcons
                  :icon="['fas', 'circle-info']"
                  class="btn btn-outline-info"
                />
                <FIcons
                  :icon="['fas', 'trash']"
                  class="btn btn-outline-danger"
                />
              </div>
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
  name: "PostsTable",
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
</style>
