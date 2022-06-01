<template>
  <div v-if="typeof this.id !== 'undefined'">
    <SideBar />
    <div class="post__main" :style="{ 'margin-left': sidebarWidth }">
    <AdminHeader title="Dashboard" />
    </div>
  </div>
  <div v-else>
    {{ this.$router.push({ name: "home" }) }}
  </div>
</template>
 
<script>
import SideBar from "../../components/admin/SideBar.vue";
import AdminHeader from "../../components/admin/AdminHeader.vue";
import {
  collapsed,
  toggleSidebar,
  sidebarWidth,
} from "../../components/sidebar/state";
export default {
  name: "PostView",
  components: {
    SideBar,
    AdminHeader,
  },
  data() {
    return {
      id: localStorage["idAdmin"],
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
}
</style>
