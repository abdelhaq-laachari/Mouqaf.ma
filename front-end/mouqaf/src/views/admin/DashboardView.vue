<template>
  <div v-if="typeof this.id !== 'undefined'">
    <SideBar />
    <div class="post__main" :style="{ 'margin-left': sidebarWidth }">
      <AdminHeader title="Dashboard" />
      <!-- cards start here -->
      <DashboardCards />
      <!-- cards end here -->
      <!-- chart start here -->
      <div class="all__chart">
        <ChartView />
        <CircleChart />
      </div>
      <!-- chart end here -->
    </div>
  </div>
  <div v-else>
    {{ this.$router.push({ name: "home" }) }}
  </div>
</template>

<script>
import SideBar from "../../components/admin/SideBar.vue";
import ChartView from "../../components/admin/UsersChart.vue";
import AdminHeader from "../../components/admin/AdminHeader.vue";
import {
  collapsed,
  toggleSidebar,
  sidebarWidth,
} from "../../components/sidebar/state";
import CircleChart from "@/components/admin/CircleChart.vue";
import DashboardCards from "@/components/admin/DashboardCards.vue";
export default {
  name: "PostView",
  components: {
    SideBar,
    AdminHeader,
    ChartView,
    CircleChart,
    DashboardCards,
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
.all__chart {
  padding: 1rem 1rem;
  transition: 0.2s ease;
  display: flex;
  align-items: center;
  width: 100%;
  justify-content: space-around;
}

@media (max-width: 750px) {
  .all__chart {
    flex-direction: column;
    gap: 1rem;
  }
}
</style>
