<template>
  <SideBar />
  <div class="test" :style="{ 'margin-left': sidebarWidth }">
    <h1>Profile View</h1>
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
  name: "ProfileClient",
  components: {
    SideBar,
  },
  setup() {
    return { collapsed, toggleSidebar, sidebarWidth };
  },
};
</script>

<style scoped>
.test {
  width: calc(100% - 180px);
  padding: 2rem;
  transition: 0.2s ease;
}
</style>
