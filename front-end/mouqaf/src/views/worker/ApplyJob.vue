<template>
  <div v-if="typeof this.idWorker !== 'undefined'">
    <SideBar />
    <div class="post__main" :style="{ 'margin-left': sidebarWidth }">
      <HeaderWorker name="Apply Job" />
      <div class="apply__main shadow p-3 mb-5 mt-5 bg-white rounded">
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
              <div class="post__button">
                <input type="hidden" v-model="poste.idPost" />
                <!-- <DangerButton @click="DeleteMyPost()" name="Delete" to="" /> -->
              </div>
            </div>
            <div class="post_img" v-if="poste.images">
              <img v-bind:src="'../uploads/PostImage/' + poste.images" alt="" />
            </div>
          </div>
        </div>
        <!-- <hr /> -->
        <div class="title">
          <h3>Offer to work on this job now!</h3>
        </div>
        <div class="apply__form">
          <form action="">
            <div class="form-group">
              <label class="mb-2">Phone Number</label>
              <input
                type="text"
                class="form-control mb-2"
                id="exampleInputPassword1"
                placeholder="All morocco"
              />
            </div>
            <div class="form-group">
              <label class="mb-2">Describe your proposal</label>
              <textarea
                class="form-control"
                id="exampleFormControlTextarea1"
                rows="3"
              ></textarea>
            </div>
            <button class="btn btn-primary mt-2">Apply</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <div v-else>
    {{ this.$router.push({ name: "SignInWorker" }) }}
  </div>
</template>

<script>
import HeaderWorker from "@/components/worker/HeaderWorker.vue";
import SideBar from "../../components/worker/SideBar.vue";
import axios from "axios";
import {
  collapsed,
  toggleSidebar,
  sidebarWidth,
} from "../../components/sidebar/state";
export default {
  name: "PostView",
  components: {
    SideBar,
    HeaderWorker,
  },
  data() {
    return {
      idWorker: localStorage["idWorker"],
      idPost: localStorage["idPost"],
      posts: [],
    };
  },
  methods: {
    // get post by id that is in localStorage
    SinglePost() {
      axios
        .get(`http://localhost/youcode/mouqaf/worker/SinglePost/${this.idPost}`)
        .then((res) => {
          console.log(res.data);
          this.posts = res.data;
        })
        .catch((err) => {
          console.log(err);
        });
    },
  },
  setup() {
    return { collapsed, toggleSidebar, sidebarWidth };
  },
  mounted() {
    this.SinglePost();
  },
};
</script>

<style scoped>
.post__main {
  padding: 1rem 1rem;
  transition: 0.2s ease;
}
.about__client {
  display: flex;
  flex-direction: column;
  gap: 1rem;
}
.client__name {
  display: flex;
  align-items: center;
  gap: 2rem;
  padding-left: 1rem;
}
.apply__form {
  width: 80%;
  padding-left: 1rem;
  display: flex;
  flex-direction: column;
}
.apply__form button {
  width: 150px;
}
.all__posts {
  width: 100%;
  display: flex;
  flex-direction: column;
  margin: 1.2rem 0;
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
  width: 400px;
  height: fit-content;
  margin-bottom: 1rem;
}
.post_img img {
  width: 100%;
  height: 100%;
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
@media (max-width: 750px) {
  .post_img {
    width: 300px;
  }
  .post__header h3 {
    font-size: 1rem;
  }
  .time span,
  .post__topic p {
    font-size: 0.7rem;
  }
  .comment__btn2 {
    display: block;
  }
  .comment__btn {
    display: none;
  }
  .worker__info {
    align-items: flex-start;
  }
  .comment__info {
    flex-direction: column;
    align-items: flex-start;
    gap: 0.2rem;
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
@media (max-width: 750px) {
  .apply__form {
    padding: 0;
    width: 100%;
  }
  .title h3 {
    font-size: 1.5rem;
    margin: 0;
  }
}
</style>
