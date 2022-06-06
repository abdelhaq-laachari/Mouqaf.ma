<template>
  <div class="search__form shadow p-3 mb-5 bg-white rounded">
    <form v-on:submit.prevent="SearchPosts()" class="search__bar">
      <select
        class="form-select form-select-m"
        aria-label=".form-select-sm example"
        v-model="idCategory"
      >
        <option value="" disabled selected>Select category</option>
        <option
          v-for="category in cates"
          :key="category.id"
          :value="category.id"
        >
          {{ category.name }}
        </option>
      </select>
      <div class="form-group">
        <input
          type="text"
          class="form-control"
          id="exampleInputPassword1"
          placeholder="All morocco"
          v-model="city"
        />
      </div>
      <button type="submit" name="submit" class="btn btn-primary">
        <FIcons :icon="['fas', 'search']" class="b-icon face" />
      </button>
    </form>
  </div>
  <div v-if="SePosts.length == 0" class="all__posts">
    <div
      class="post shadow p-3 mb-5 bg-white rounded"
      v-for="poste in posts"
      :key="poste.id"
    >
      <div class="post__text">
        <div class="post__header">
          <h3>{{ poste.post_title }}</h3>
          <div class="time">
            <span class="text-muted">{{ poste.created_at }}</span>
            <span class="text-muted">
              <FIcons
                :icon="['fas', 'map-marker-alt']"
                class="b-icon face"
              />&nbsp; {{ poste.city }}
            </span>
          </div>
          <div class="post__topic">
            <p>
              {{ poste.description }}
            </p>
          </div>
        </div>
        <!-- <div class="image_description"></div> -->
        <div
          class="post__button"
          v-if="idClient == poste.idClient && poste.images"
        >
          <input type="hidden" v-model="poste.idPost" />
          <ButtonComponent
            @click="StoreIdPost(poste.idPost)"
            name="Read Comment"
            to=""
          />
        </div>
        <div
          class="post__btn"
          v-if="idClient == poste.idClient && !poste.images"
        >
          <input type="hidden" v-model="poste.idPost" />
          <ButtonComponent
            @click="StoreIdPost(poste.idPost)"
            name="Read Comment"
            to=""
          />
        </div>
      </div>
      <div class="post_img" v-if="poste.images">
        <img v-bind:src="'../uploads/PostImage/' + poste.images" alt="" />
      </div>
      <!-- <ButtonComponent v-on:click="seen = !seen" name="Read Comment" to="" />
      <div v-if="seen" id="hide">
        <span>test</span>
      </div> -->
    </div>
  </div>
  <div v-if="SePosts.length !== 0" class="all__posts">
    <div
      class="post shadow p-3 mb-5 bg-white rounded"
      v-for="SePoste in SePosts"
      :key="SePoste.id"
    >
      <div class="post__text">
        <div class="post__header">
          <h3>{{ SePoste.post_title }}</h3>
          <div class="time">
            <span class="text-muted">{{ SePoste.created_at }}</span>
            <span class="text-muted">
              <FIcons
                :icon="['fas', 'map-marker-alt']"
                class="b-icon face"
              />&nbsp; {{ SePoste.city }}
            </span>
          </div>
          <div class="post__topic">
            <p>
              {{ SePoste.description }}
            </p>
          </div>
        </div>
        <!-- <div class="image_description"></div> -->
        <div
          class="post__button"
          v-if="idClient == SePoste.idClient && SePoste.images"
        >
          <input type="hidden" v-model="SePoste.idPost" />
          <ButtonComponent
            @click="StoreIdPost(SePoste.idPost)"
            name="Read Comment"
            to=""
          />
        </div>
        <div
          class="post__btn"
          v-if="idClient == SePoste.idClient && !SePoste.images"
        >
          <input type="hidden" v-model="SePoste.idPost" />
          <ButtonComponent
            @click="StoreIdPost(SePoste.idPost)"
            name="Read Comment"
            to=""
          />
        </div>
      </div>
      <div class="post_img" v-if="SePoste.images">
        <img v-bind:src="'../uploads/PostImage/' + SePoste.images" alt="" />
      </div>
    </div>
  </div>
</template>

<script>
import ButtonComponent from "../button/ButtonComponent.vue";
import Swal from "sweetalert2";
import axios from "axios";
export default {
  name: "AllPosts",
  components: { ButtonComponent },
  data() {
    return {
      // seen: false,
      idCategory: "",
      city: "",
      ErrorMessage: "",
      no: null,
      idClient: localStorage["id"],
      posts: [],
      SePosts: [],
      cates: [],
    };
  },
  methods: {
    // Get category from database
    GetCategory() {
      axios
        .get(`http://localhost/youcode/mouqaf/client/getcategory`)
        .then((res) => {
          this.cates = res.data;
        })
        .catch((err) => {
          console.log(err);
        });
    },
    // Get posts from database
    GetAllPosts() {
      axios
        .get(`http://localhost/youcode/mouqaf/client/getallposts`)
        .then((res) => {
          console.log(res.data);
          this.posts = res.data;
        })
        .catch((err) => {
          console.log(err);
        });
    },
    // store id post in local storage
    StoreIdPost(idPost) {
      // clear localStorage
      localStorage.removeItem("idPost");
      localStorage.setItem("idPost", idPost);
      this.$router.push({
        name: "comment",
      });
    },
    // Get posts from database by searching
    SearchPosts() {
      const formData = new FormData();
      if (this.idCategory !== "" && this.city !== "") {
        formData.append("idCategory", this.idCategory);
        formData.append("city", this.city);
        axios
          .post(`http://localhost/youcode/mouqaf/client/SearchPosts`, formData)
          .then((res) => {
            this.SePosts = res.data;
          })
          .catch((e) => {
            console.log(e.response.data.message);
            this.ErrorMessage = e.response.data.message;
            Swal.fire(this.ErrorMessage, "", "error");
          });
      } else if (this.idCategory === "" && this.city !== "") {
        formData.append("city", this.city);
        axios
          .post(
            `http://localhost/youcode/mouqaf/client/SearchPostsByCity`,
            formData
          )
          .then((res) => {
            this.SePosts = res.data;
          })
          .catch((e) => {
            console.log(e.response.data.message);
            this.ErrorMessage = e.response.data.message;
            Swal.fire(this.ErrorMessage, "", "error");
          });
      } else if (this.idCategory !== "" && this.city === "") {
        formData.append("idCategory", this.idCategory);
        axios
          .post(
            `http://localhost/youcode/mouqaf/client/SearchPostsByCategory`,
            formData
          )
          .then((res) => {
            this.SePosts = res.data;
          })
          .catch((e) => {
            console.log(e.response.data.message);
            this.ErrorMessage = e.response.data.message;
            Swal.fire(this.ErrorMessage, "", "error");
          });
      }
    },
  },
  // get posts when the page is loaded
  mounted() {
    this.GetCategory();
    this.GetAllPosts();
  },
};
</script>

<style scoped>
.all__posts {
  width: 100%;
  display: flex;
  flex-direction: column;
}
.post {
  width: 90%;
  margin: 0 auto;
  display: flex;
  gap: 1rem;
  /* flex-direction: column; */
}
.post__text {
  order: 1;
  width: 60%;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  /* background-color: red; */
}
.post__header {
  display: flex;
  flex-direction: column;
  /* align-items: center; */
  margin-bottom: 0.6rem;
}
.post__header h3 {
  font-size: 1.3rem;
  font-family: "poppins";
  text-transform: capitalize;
  margin-bottom: 0 !important;
  font-weight: 600;
}
.time {
  display: flex;
  gap: 1rem;
  margin: 0.5rem 0rem 1rem 0rem;
}
.time span {
  font-size: 1rem;
  font-family: serif;
}
.post__topic {
  font-size: 1rem;
  font-family: "serif";
}
.post__button {
  display: flex;
  justify-content: flex-end;
}
.post_img {
  width: 35%;
  height: fit-content;
  margin-bottom: 1rem;
}
.post_img img {
  width: 100%;
  height: 100%;
}
.search__form {
  width: 100%;
  padding: 1rem;
  margin-top: 0.8rem;
  border-radius: 5px;
  background-color: #f8f8f8;
}
.search__bar {
  width: 100%;
  margin: auto;
  display: flex;
  justify-content: center;
  gap: 2rem;
}
.form-select,
.form-control {
  width: auto;
}

@media (min-width: 1500px) and (max-width: 2500px) {
  .form-select,
  .form-control {
    width: 500px;
  }
}

@media (max-width: 800px) {
  .search__bar {
    flex-direction: column;
  }
  .form-select,
  .form-control {
    width: 100%;
  }
}
@media (min-width: 1500px) and (max-width: 2500px) {
  .post_img {
    width: 600px;
  }
  .post__header h3 {
    font-size: 2rem;
  }
}
@media (min-width: 1000px) and (max-width: 1500px) {
  .post_img {
    width: 450px;
  }
}
@media (max-width: 950px) {
  .post_img {
    width: 350px;
  }
  .time span,
  .post__topic p {
    font-size: 0.9rem;
  }
}
@media (max-width: 700px) {
  .post__header h3 {
    font-size: 1.2rem;
  }
  .time span,
  .post__topic p {
    font-size: 0.8rem;
  }
}
@media (max-width: 650px) {
  .post {
    width: 90%;
    margin: 0 auto;
    display: flex;
    gap: 1rem;
    flex-direction: column;
  }
  .post_img {
    order: 1;
  }
  .post__text {
    width: 100%;
  }
}
@media (max-width: 520px) {
  .post_img {
    width: 250px;
  }
}
@media (max-width: 400px) {
  .post_img {
    width: 200px;
  }
}
</style>
