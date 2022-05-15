<template>
  <SideBar />
  <div class="post__main" :style="{ 'margin-left': sidebarWidth }">
    <HeaderWorker name="Home" />
    <SearchBar/>
    <AllPosts/>
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
import SearchBar from "../../components/clients/SearchBar.vue";
import AllPosts from "../../components/worker/AllPosts.vue";
export default {
  name: "PostView",
  components: {
    SideBar,
    HeaderWorker,
    SearchBar,
    AllPosts
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
  /* height: 100vh; */
}

</style>
