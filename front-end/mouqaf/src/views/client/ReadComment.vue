<template>
  <div v-if="typeof this.idClient !== 'undefined'">
    <SideBar />
    <div class="post__main" :style="{ 'margin-left': sidebarWidth }">
      <ClientHeader title="Posts" />
      <div
        class="my__post shadow p-3 mb-5 bg-white rounded"
        v-for="poste in posts"
        :key="poste.idPost"
      >
        <div class="post__title">
          <h3>{{ poste.post_title }}</h3>
          <span class="text-muted">6 weeks ago</span>
          <span class="text-muted">
            <FIcons :icon="['fas', 'map-marker-alt']" />&nbsp;
            {{ poste.city }}
          </span>
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
        <DangerButton @click="DeleteMyPost()" name="Delete" to="" />
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
                <img src="../../assets/avatar/a3.jpg" alt="" />
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
                    <span class="text-muted">{{ comment.city }}</span>
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
      post: [
        {
          idPost: "",
          idClient: "",
          idCategory: "",
          city: "",
          title: "",
          description: "",
          first_name: "",
        },
      ],
      comments: [],
      comment: [
        {
          id: "",
          phone: "",
          proposal: "",
        },
      ],
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

    // get post by id that is in localstorage
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
                    window.location.reload();
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
.my__post {
  width: 100%;
  margin: 1.2rem 0;
  display: flex;
  flex-direction: column;
  gap: 1rem;
}
.post__title {
  display: flex;
  align-items: center;
  gap: 1rem;
}
.post__title h3 {
  font-size: 1.6rem;
  font-family: "poppins";
  margin-bottom: 0 !important;
  font-weight: 600;
}
.post__title span {
  font-size: 1rem;
  font-family: serif;
}
.post__topic {
  font-size: 1rem;
  font-family: "serif";
}
.post__btn {
  width: 150px;
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
  .post__title {
    gap: 0.4rem;
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
</style>
