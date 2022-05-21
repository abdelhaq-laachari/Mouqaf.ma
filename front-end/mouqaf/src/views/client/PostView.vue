<template>
  <div v-if="typeof this.id !== 'undefined' " >
    <SideBar />
    <div class="post__main" :style="{ 'margin-left': sidebarWidth }">
      <ClientHeader name="Posts" />
      <div class="create__post shadow p-3 mb-5 bg-white rounded">
        <div class="title">
          <h3>My Posts</h3>
        </div>
        <ButtonComponent name="Create Post" to="CreatePost" />
      </div>
      <MyPosts />
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
import MyPosts from "@/components/clients/MyPosts.vue";
import ButtonComponent from "@/components/button/ButtonComponent.vue";
export default {
  name: "PostView",
  components: {
    SideBar,
    ClientHeader,
    MyPosts,
    ButtonComponent,
  },
  data() {
    return {
      id: localStorage["id"],
    };
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
  height: 100vh;
}
.create__post {
  width: 100%;
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-top: 0.8rem;
}
.title h3 {
  font-size: 1.5rem;
  font-family: serif;
  font-weight: 600;
  margin-bottom: 0 !important;
}
</style>
