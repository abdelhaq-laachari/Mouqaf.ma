<template>
  <SideBar />
  <div class="create__post" :style="{ 'margin-left': sidebarWidth }">
  <ClientHeader name="Create Poste"/>
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
    ClientHeader
},
  setup() {
    return { collapsed, toggleSidebar, sidebarWidth };
  },
};
</script>

<style scoped>
.create__post {
  padding: 1rem 1rem;
  transition: 0.2s ease;
  height: 100vh;
}

</style>
