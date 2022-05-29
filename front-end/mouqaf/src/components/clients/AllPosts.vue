<template>
  <div class="all__posts">
    <div
      class="post shadow p-3 mb-5 bg-white rounded"
      v-for="poste in posts"
      :key="poste.id"
    >
      <div class="post__text">
        <div class="post__header">
          <h3>{{ poste.post_title }}</h3>
          <div class="time">
            <span class="text-muted">6 weeks ago</span>
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
        <div class="post__button">
          <input type="hidden" v-model="poste.idPost" />
          <ButtonComponent
            @click="StoreIdPost(poste.idPost)"
            v-if="idClient == poste.idClient"
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
</template>

<script>
import ButtonComponent from "../button/ButtonComponent.vue";
import axios from "axios";
export default {
  name: "AllPosts",
  components: { ButtonComponent },
  data() {
    return {
      // seen: false,
      no: null,
      idClient: localStorage["id"],
      posts: [],
      post: [
        {
          idPost: "",
          idClient: "",
          idCategory: "",
          city: "",
          title: "",
          description: "",
        },
      ],
    };
  },
  methods: {
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
  },
  // get posts when the page is loaded
  mounted() {
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
  margin-bottom: 1rem;
}
.post_img img {
  width: 100%;
  height: 100%;
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
</style>
