<template>

  <div v-if="posts.length > 0 " class="all__posts">
    <div
      class="post shadow p-3 mb-5 bg-white rounded"
      v-for="poste in posts"
      :key="poste.idPost"
    >
      <div class="post__header">
        <h3>{{ poste.post_title }}</h3>
        <div class="time">
          <div>
            <FIcons :icon="['fas', 'clock']" class="b-icon text-muted" />&nbsp;
            <span class="text-muted">6 weeks ago</span>
          </div>
          <span class="text-muted">
            <FIcons
              :icon="['fas', 'map-marker-alt']"
              class="b-icon face"
            />&nbsp; {{ poste.city }}
          </span>
        </div>
      </div>
      <div class="image_description" >
        <div class="post__topic">
          <p>
            {{ poste.description }} 
          </p>
        <div class="post_img" v-if="poste.images" >
          <img v-bind:src="'../uploads/PostImage/' + poste.images" alt="" />
        </div>
        </div>
      </div>
      <ButtonComponent
        @click="StoreIdPost(poste.idPost)"
        v-if="idClient == poste.idClient"
        name="Read Comment"
        to=""
      />
    </div>
  </div>
  <div class="no__post" v-else >
    <h3>You have no post for now</h3>
  </div>
</template>

<script>
import ButtonComponent from "../button/ButtonComponent.vue";
import axios from "axios";
export default {
  name: "MyPosts",
  components: { ButtonComponent },
  data() {
    return {
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
          images: "",
        },
      ],
    };
  },
  methods: {
    //  get posts by id from database
    GetMyPosts() {
      axios
        .get(`http://localhost/youcode/mouqaf/client/MyPosts/${this.idClient}`)
        .then((res) => {
          console.log(res.data);
          this.posts = res.data;
          console.log(this.posts.length);
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
    this.GetMyPosts();
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
  gap: 1.5rem;
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
.image_description{
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
.no__post{
  width: 100%;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
}
.no__post h3{
  font-size: 1.6rem;
  font-family: "poppins";
  margin-bottom: 0 !important;
  font-weight: 600;
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
