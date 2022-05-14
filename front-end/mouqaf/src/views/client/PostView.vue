<template>
  <SideBar />
  <div class="post__main" :style="{ 'margin-left': sidebarWidth }">
    <ClientHeader name="Posts" />
    <div class="create__post shadow p-3 mb-5 bg-white rounded">
      <div class="title">
        <h3>My Posts</h3>
      </div>
      <button class="btn btn-primary">Create Post</button>
    </div>
    <AllPosts />
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
import AllPosts from "@/components/clients/AllPosts.vue";
export default {
  name: "PostView",
  components: {
    SideBar,
    ClientHeader,
    AllPosts,
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
.create__post{
  width: 100%;
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-top: 0.8rem;
}
.title h3{
  font-size: 1.5rem;
  font-family: serif;
  font-weight: 600;
  margin-bottom: 0 !important;
}
</style>
