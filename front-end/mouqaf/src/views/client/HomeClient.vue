<template>
  <div v-if="typeof this.id !== 'undefined' " >
    <SideBar />
    <div class="post__main" :style="{ 'margin-left': sidebarWidth }">
      <ClientHeader name="Home" />
      <SearchBar />
      <AllPosts />
    </div>
  </div>
  <div v-else>
    {{ this.$router.push({ name: "SignInClient" }) }}
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
    AllPosts,
  },
  data() {
    return {
      id: localStorage["id"],
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
  /* height: 100vh; */
}
</style>
