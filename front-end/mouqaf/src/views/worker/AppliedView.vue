<template>
  <div v-if = " typeof this.idWorker !== 'undefined' " >
    <SideBar />
    <div class="post__main" :style="{ 'margin-left': sidebarWidth }">
      <HeaderWorker name="Home" />
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
  /* height: 100vh; */
}
</style>
