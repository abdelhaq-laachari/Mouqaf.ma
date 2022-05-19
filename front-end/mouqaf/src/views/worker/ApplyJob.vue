<template>
  <div v-if="typeof this.idWorker !== 'undefined'">
    <SideBar />
    <div class="post__main" :style="{ 'margin-left': sidebarWidth }">
      <HeaderWorker name="Apply Job" />
      <div class="apply__main shadow p-3 mb-5 mt-5 bg-white rounded">
        <div class="post__header title">
          <h3>I need a electrician</h3>
          <span class="text-muted">6 weeks ago</span>
        </div>
        <div class="post__content">
          <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquam in
            ipsa reprehenderit exercitationem explicabo blanditiis eum cum
            repudiandae pariatur corrupti reiciendis qui aperiam voluptate iste
            est culpa earum, laborum mollitia?
          </p>
        </div>
        <div class="about__client">
          <div class="title">
            <h3>About Employer</h3>
          </div>
          <div class="client__name">
            <span class="text-muted">Eric Parker</span>
            <span class="text-muted"
              ><FIcons
                :icon="['fas', 'map-marker-alt']"
                class="b-icon face"
              />&nbsp; Safi
            </span>
          </div>
        </div>
        <hr />
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
    };
  },
  setup() {
    return { collapsed, toggleSidebar, sidebarWidth };
  },
};
</script>

<style scoped>
.post__main {
  padding: 1rem 1rem;
  transition: 0.2s ease;
}
.apply__main {
  display: flex;
  flex-direction: column;
}
.post__header {
  display: flex;
  align-items: center;
  gap: 1rem;
}
.title h3 {
  margin-bottom: 0 !important;
  font-size: 1.8rem;
  font-family: serif;
  font-weight: 600;
}
.post__content {
  font-size: 1rem;
  font-family: serif;
  padding: 1rem 0;
  padding-left: 1rem;
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
@media (max-width: 750px) {
  .apply__form {
    padding: 0;
    width: 100%;
  }
  .post__content {
    padding-left: 0;
    font-size: 0.8rem;
  }
  .post__header {
    flex-direction: column;
    align-items: flex-start;
  }
  .title h3 {
    font-size: 1.5rem;
    margin: 0;
  }
}
</style>
