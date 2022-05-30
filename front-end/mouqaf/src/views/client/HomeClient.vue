<template>
  <div v-if="typeof this.id !== 'undefined'">
    <span> {{ id }} </span>
    <SideBar />
    <div class="post__main" :style="{ 'margin-left': sidebarWidth }">
      <ClientHeader title="Home" />
      <AllPosts  />
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
import AllPosts from "../../components/clients/AllPosts.vue";
// import axios from "axios";
export default {
  name: "PostView",
  components: {
    SideBar,
    ClientHeader,
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
