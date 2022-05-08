<template>
  <SideBar />
  <div class="post__main" :style="{ 'margin-left': sidebarWidth }">
    <h1>Post view</h1>
  </div>
</template>

<script>
import SideBar from "../components/sidebar/SideBar.vue";
import {
  collapsed,
  toggleSidebar,
  sidebarWidth,
} from "../components/sidebar/state";
export default {
  name: "PostView",
  components: {
    SideBar,
  },
  setup() {
    return { collapsed, toggleSidebar, sidebarWidth };
  },
};
</script>

<style scoped>
.post__main {
  width: calc(100% - 180px);
  padding: 2rem;
  transition: 0.2s ease;
  height: 100vh;
}
</style>
