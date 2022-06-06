<template>
  <div v-if="typeof this.id !== 'undefined'">
    <SideBar />
    <div class="post__main" :style="{ 'margin-left': sidebarWidth }">
      <AdminHeader title="Posts" />
      <div class="post__table">
        <CategoryTable />
        <PostsTable />
      </div>
    </div>
  </div>
  <div v-else>
    {{ this.$router.push({ name: "home" }) }}
  </div>
</template>

<script>
import SideBar from "../../components/admin/SideBar.vue";
import AdminHeader from "../../components/admin/AdminHeader.vue";
import PostsTable from "../../components/admin/PostsTable.vue";
import CategoryTable from "../../components/admin/CategoryTable.vue";
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
    PostsTable,
    CategoryTable,
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
.post__table {
  width: 95%;
  margin: 2rem auto;
}
</style>
