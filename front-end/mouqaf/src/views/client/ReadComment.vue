<template>
  <div v-if="typeof this.idClient !== 'undefined'">
    <SideBar />
    <div class="post__main" :style="{ 'margin-left': sidebarWidth }">
      <ClientHeader title="Comments" />
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
            <div class="post__button" v-if=" poste.images">
              <input type="hidden" v-model="poste.idPost" />
              <DangerButton @click="DeleteMyPost()" name="Delete" to="" />
            </div>
            <div class="post__btn" v-if=" !poste.images">
              <input type="hidden" v-model="poste.idPost" />
              <DangerButton @click="DeleteMyPost()" name="Delete" to="" />
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
      <div class="main__comment">
        <div class="number__comment">
          <h3 v-if="this.TotalComment > 1">
            {{ TotalComment }} Comments on this job
          </h3>
          <h3 v-if="this.TotalComment == 1">
            {{ TotalComment }} Comment on this job
          </h3>
          <h3 v-if="this.TotalComment == 0">No Comment on this job</h3>
        </div>
        <div
          class="comment__card shadow p-3 mb-5 bg-white rounded"
          v-for="comment in comments"
          :key="comment.id"
        >
          <div class="comment__header">
            <div class="worker__info">
              <div class="worker__img">
                <img
                  v-bind:src="'../uploads/ClientProfile/' + comment.avatar"
                  alt=""
                />
              </div>
              <div class="worker">
                <div class="name">
                  <!-- <h3>Eric Parker</h3> -->
                  <h3>{{ comment.first_name }} {{ comment.last_name }}</h3>
                </div>
                <div class="comment__info">
                  <div class="comment">
                    <FIcons :icon="['fas', 'phone']" class="b-icon" />&nbsp;
                    <span class="text-muted">{{ comment.phone }}</span>
                  </div>
                  <div class="comment">
                    <FIcons
                      :icon="['fas', 'map-marker-alt']"
                      class="b-icon"
                    />&nbsp;
                    <span class="text-muted">{{ comment.from }}</span>
                  </div>
                  <div class="comment">
                    <FIcons
                      :icon="['fas', 'clock']"
                      class="b-icon text-muted"
                    />&nbsp;
                    <span class="text-muted">6 Week ago</span>
                  </div>
                </div>
              </div>
            </div>
            <div class="comment__btn">
              <DangerButton name="Report" to="" />
            </div>
          </div>
          <div class="comment__topic">
            <p>
              {{ comment.proposal }}
            </p>
          </div>
          <div class="comment__btn2">
            <button class="btn btn-danger">Report</button>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div v-else>
    {{ this.$router.push({ name: "SignInClient" }) }}
  </div>
</template>

<script>
import Swal from "sweetalert2";
import SideBar from "../../components/sidebar/SideBar.vue";
import {
  collapsed,
  toggleSidebar,
  sidebarWidth,
} from "../../components/sidebar/state";
import ClientHeader from "@/components/clients/ClientHeader.vue";
import DangerButton from "@/components/button/DangerButton.vue";
import axios from "axios";
export default {
  name: "PostView",
  components: {
    SideBar,
    ClientHeader,
    DangerButton,
  },

  data() {
    return {
      idClient: localStorage["id"],
      idPost: localStorage["idPost"],
      posts: [],
      comments: [],
      TotalComment: "",
    };
  },
  methods: {
    // button to delete post

    //  get comments by id from database
    GetComments() {
      axios
        .get(
          `http://localhost/youcode/mouqaf/client/GetComments/${this.idPost}`
        )
        .then((res) => {
          console.log(res.data);
          this.comments = res.data;
        })
        .catch((err) => {
          console.log(err);
        });
    },

    // get post by id that is in localStorage
    MySinglePost() {
      axios
        .get(
          `http://localhost/youcode/mouqaf/client/MySinglePost/${this.idPost}`
        )
        .then((res) => {
          console.log(res.data);
          this.posts = res.data;
        })
        .catch((err) => {
          console.log(err);
        });
    },

    // get total of comments
    TotalComments() {
      axios
        .get(
          `http://localhost/youcode/mouqaf/client/TotalComments/${this.idPost}`
        )
        .then((res) => {
          console.log(res.data);
          this.TotalComment = res.data;
        })
        .catch((err) => {
          console.log(err);
        });
    },

    // delete my post

    DeleteMyPost() {
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
              `http://localhost/youcode/mouqaf/client/DeleteMyPost/${this.idPost}`
            )
            .then((Response) => {
              if (Response.status === 200) {
                Swal.fire({
                  title: "Your file has been deleted.",
                  icon: "success",
                  showCancelButton: false,
                  confirmButtonText: "Ok",
                }).then((result) => {
                  if (result.isConfirmed) {
                    this.$router.push({ name: "post" });
                  }
                });
              }
            });
        }
      });
    },
  },
  setup() {
    return { collapsed, toggleSidebar, sidebarWidth };
  },
  mounted() {
    this.GetComments();
    this.MySinglePost();
    this.TotalComments();
  },
};
</script>

<style scoped>
.post__main {
  padding: 1rem 1rem;
  transition: 0.2s ease;
}
.comment__card {
  display: flex;
  flex-direction: column;
  width: 100%;
}
.comment__header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-bottom: 1rem;
}
.worker__info {
  display: flex;
  gap: 2rem;
  align-items: center;
}
.worker__img {
  width: 80px;
}
.worker__img img {
  width: 100%;
  border-radius: 50%;
}
.comment__info {
  display: flex;
  gap: 2rem;
}
.worker .name h3 {
  font-size: 1.2rem;
  font-family: serif;
  font-weight: 600;
}
.comment__info .comment span {
  font-size: 0.7rem;
  font-family: "poppins";
}
.b-icon {
  font-size: 0.8rem;
}
.comment__topic {
  font-size: 1rem;
  font-family: "serif";
}
.comment__btn2 {
  display: none;
}

.image_description {
  display: flex;
  flex-direction: column;
  /* background-color: red; */
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
</style>
