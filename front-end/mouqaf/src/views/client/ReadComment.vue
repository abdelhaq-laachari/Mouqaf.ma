<template>
  <SideBar />
  <div class="post__main" :style="{ 'margin-left': sidebarWidth }">
    <ClientHeader name="Posts" />
    <div class="my__post shadow p-3 mb-5 bg-white rounded">
      <div class="post__title">
        <h3>Post Title</h3>
        <span class="text-muted">6 weeks ago</span>
        <span class="text-muted">
          <FIcons :icon="['fas', 'map-marker-alt']" class="b-icon face" />&nbsp;
          Safi
        </span>
      </div>
      <div class="post__topic">
        <p>
          Lorem, ipsum dolor sit amet consectetur adipisicing elit. Blanditiis
          quas debitis saepe repudiandae doloremque maiores, earum at vel, fuga
          excepturi suscipit id dolore placeat! Exercitationem assumenda fuga
          nemo fugiat. Laboriosam.
        </p>
      </div>
      <button class="btn btn-danger post__btn">Delete</button>
    </div>
  </div>
</template>

<script>
import SideBar from "../../components/sidebar/SideBar.vue";
import {
  collapsed,
  toggleSidebar,
  sidebarWidth,
} from "../../components/sidebar/state";
import ClientHeader from "@/components/clients/ClientHeader.vue";
export default {
  name: "PostView",
  components: {
    SideBar,
    ClientHeader,
  },
  methods: {
    CreatePost() {
      this.$router.push("/CreatePost");
    },
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
.post__btn{
    width: 150px;
}
</style>
