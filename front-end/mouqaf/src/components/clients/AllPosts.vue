<template>
  <div v-if="SePosts.length == 0" class="all__posts">
    <div
      class="post shadow p-3 mb-5 bg-white rounded"
      v-for="poste in posts"
      :key="poste.id"
    >
      <div class="post__header">
        <h3>{{ poste.post_title }}</h3>
        <span> {{ post.title }} </span>
        <div class="time">
          <span class="text-muted">6 weeks ago</span>
          <span class="text-muted">
            <FIcons
              :icon="['fas', 'map-marker-alt']"
              class="b-icon face"
            />&nbsp; {{ poste.city }}
          </span>
        </div>
      </div>
      <div class="image_description">
        <div class="post__topic">
          <p>
            {{ poste.description }}
          </p>
          <div class="post_img" v-if="poste.images">
            <img v-bind:src="'../uploads/PostImage/' + poste.images" alt="" />
          </div>
        </div>
      </div>
      <div>
        <input type="hidden" v-model="poste.idPost" />
        <ButtonComponent
          @click="StoreIdPost(poste.idPost)"
          v-if="idClient == poste.idClient"
          name="Read Comment"
          to=""
        />
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
      SePosts: [],
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
  flex-direction: column;
}
.post__header {
  display: flex;
  align-items: center;
  gap: 1rem;
  margin-bottom: 0.6rem;
}
.post__header h3 {
  font-size: 1.6rem;
  font-family: "poppins";
  margin-bottom: 0 !important;
  font-weight: 600;
}
.time {
  display: flex;
  gap: 1rem;
}
.time span {
  font-size: 1rem;
  font-family: serif;
}
.post__topic {
  font-size: 1rem;
  font-family: "serif";
}
.image_description {
  display: flex;
  flex-direction: column;
  /* background-color: red; */
}
.post_img {
  /* width: 300px; */
  width: 40%;
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
