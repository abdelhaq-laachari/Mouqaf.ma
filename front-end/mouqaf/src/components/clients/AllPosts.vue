<template>
  <div class="all__posts">
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
      <div class="post_img">
        <img src="" alt="" />
      </div>
      <div class="post__topic">
        <p>
          {{ poste.description }}
        </p>
      </div>
      <ButtonComponent name="Read Comment" to="/comment" />
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
      posts: [],
      post: [
        { idClient: "", idCategory: "", city: "", title: "", description: "" },
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
