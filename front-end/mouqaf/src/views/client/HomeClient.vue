<template>
  <SideBar />
  <div class="post__main" :style="{ 'margin-left': sidebarWidth }">
    <ClientHeader name="Home" />
    <SearchBar/>
    <AllPosts/>
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
import SearchBar from "../../components/clients/SearchBar.vue";
import AllPosts from "../../components/clients/AllPosts.vue";
export default {
  name: "PostView",
  components: {
    SideBar,
    ClientHeader,
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
