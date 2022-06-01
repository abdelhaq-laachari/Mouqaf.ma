<template>
  <div v-if="typeof this.idWorker !== 'undefined'">
    <SideBar />
    <div
      v-for="poste in posts"
      :key="poste.id"
      class="post__main"
      :style="{ 'margin-left': sidebarWidth }"
    >
      <HeaderWorker title="Apply Job" />
      <div class="all__posts">
        <div class="post shadow p-3 mb-5 bg-white rounded">
          <div class="post__text">
            <div class="post__header">
              <h3>{{ poste.post_title }}</h3>
              <div class="time">
                <span class="text-muted">6 weeks ago</span>
                <span class="text-muted">
                  <FIcons
                    :icon="['fas', 'map-marker-alt']"
                    class="b-icon face"
                  />&nbsp; Job place: {{ poste.city }}
                </span>
              </div>
              <div class="post__topic">
                <p>
                  {{ poste.description }}
                </p>
              </div>
            </div>
          </div>
          <div class="post_img" v-if="poste.images">
            <img v-bind:src="'../uploads/PostImage/' + poste.images" alt="" />
          </div>
        </div>
      </div>
      <div class="apply__main shadow p-3 mb-5 mt-5 bg-white rounded">
        <div class="about__client">
          <div class="title">
            <h3>About Employer</h3>
          </div>
          <div class="client__name">
            <span class="text-muted">
              <FIcons :icon="['fas', 'user']" />&nbsp; {{ poste.first_name }}
              {{ poste.last_name }}
            </span>
            <span class="text-muted">
              <FIcons
                :icon="['fas', 'map-marker-alt']"
                class="b-icon face"
              />&nbsp; From {{ poste.from }}
            </span>
          </div>
        </div>
        <hr />
        <div class="title ">
          <h3>Offer to work on this job now!</h3>
        </div>
        <div class="apply__form">
          <form v-on:submit.prevent="CreatePost()">
            <input type="hidden" v-model="poste.idPost" />
            <input type="hidden" v-model="this.idWorker" />
            <div class="form-group">
              <label class="mb-2">Describe your proposal</label>
              <textarea
                class="form-control mb-2"
                id="exampleFormControlTextarea1"
                rows="3"
                v-model="proposal"
              ></textarea>
            </div>
            <ButtonHover name="Apply" />
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
import Swal from "sweetalert2";
import {
  collapsed,
  toggleSidebar,
  sidebarWidth,
} from "../../components/sidebar/state";
import ButtonHover from "@/components/button/ButtonHover.vue";
export default {
  name: "PostView",
  components: {
    SideBar,
    HeaderWorker,
    ButtonHover
},
  data() {
    return {
      idWorker: localStorage["idWorker"],
      idPost: localStorage["idPost"],
      posts: [],
      SuccessMessage: "",
      ErrorMessage: "",
      // phone: "",
      proposal: "",
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

    // Apply for job
    CreatePost() {
      const formData = new FormData();
      formData.append("idWorker", this.idWorker);
      formData.append("idPost", this.idPost);
      // formData.append("phone", this.phone);
      formData.append("proposal", this.proposal);
      // show alert message with three button save, don't save and cancel
      Swal.fire({
        title: "Do you want to save the changes?",
        showDenyButton: true,
        showCancelButton: true,
        confirmButtonText: "Save",
        denyButtonText: `Don't save`,
      }).then((result) => {
        // if click on save button then save the changes
        if (result.isConfirmed) {
          axios
            .post("http://localhost/youcode/mouqaf/worker/Apply", formData)
            .then((Response) => {
              console.log(Response.status);
              console.log(Response.data);
              this.SuccessMessage = Response.data.message;
              if (Response.status === 200) {
                Swal.fire({
                  title: this.SuccessMessage,
                  icon: "success",
                  showCancelButton: false,
                  confirmButtonText: "Ok",
                }).then((result) => {
                  if (result.isConfirmed) {
                    this.$router.push({ name: "HomeWorker" });
                  }
                });
              }
            })
            .catch((e) => {
              console.log(e.response.status);
              console.log(e.response);
              console.log(e.response.data.message);
              this.ErrorMessage = e.response.data.message;
              // console.log("error");
              Swal.fire(this.ErrorMessage, "", "error");
            });
        }
        // if click on don't save button then don't save the changes
        else if (result.isDenied) {
          Swal.fire("Changes are not saved", "", "info");
        }
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
  text-transform: capitalize;
}
.client__name span {
  font-size: 0.9rem;
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
.title h3 {
  font-size: 1.4rem;
  font-family: Arial, Helvetica, sans-serif;
  font-weight: 600;
  color: #000;
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
