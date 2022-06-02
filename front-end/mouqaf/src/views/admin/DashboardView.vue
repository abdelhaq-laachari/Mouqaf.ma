<template>
  <div v-if="typeof this.id !== 'undefined'">
    <SideBar />
    <div class="post__main" :style="{ 'margin-left': sidebarWidth }">
      <AdminHeader title="Dashboard" />
      <!-- cards start here -->
      <div class="row pt-3">
        <!-- card start here -->
        <div class="col-xl-3 col-md-6 mb-4">
          <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div
                    class="text-xs font-weight-bold text-primary text-uppercase mb-1"
                  >
                    Total Users
                  </div>
                  <div class="h5 mb-0 font-weight-bold text-gray-800">
                    $40,000
                  </div>
                </div>
                <div class="col-auto">
                  <FIcons :icon="['fas', 'users']" class="icon" />
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- card end here -->
        <!-- card start here -->
        <div class="col-xl-3 col-md-6 mb-4">
          <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div
                    class="text-xs font-weight-bold text-success text-uppercase mb-1"
                  >
                    Total Posts
                  </div>
                  <div class="h5 mb-0 font-weight-bold text-gray-800">
                    $215,000
                  </div>
                </div>
                <div class="col-auto">
                  <FIcons :icon="['fas', 'clipboard-list']" class="icon" />
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- card end here -->
        <!-- card start here -->
        <div class="col-xl-3 col-md-6 mb-4">
          <div class="card border-left-danger shadow h-100 py-2">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div
                    class="text-xs font-weight-bold text-danger text-uppercase mb-1"
                  >
                    Total Reports
                  </div>
                  <div class="h5 mb-0 font-weight-bold text-gray-800">
                    $40,000
                  </div>
                </div>
                <div class="col-auto">
                  <FIcons :icon="['fas', 'triangle-exclamation']" class="icon" />
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- card end here -->
        <!-- card start here -->
        <div class="col-xl-3 col-md-6 mb-4">
          <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div
                    class="text-xs font-weight-bold text-warning text-uppercase mb-1"
                  >
                    All Category's
                  </div>
                  <div class="h5 mb-0 font-weight-bold text-gray-800">
                    $40,000
                  </div>
                </div>
                <div class="col-auto">
                  <FIcons :icon="['fas', 'list-ul']" class="icon" />
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- card end here -->
      </div>
      <!-- cards end here -->
      <!-- chart start here -->
      <ChartView/>
      <!-- chart end here -->
    </div>
  </div>
  <div v-else>
    {{ this.$router.push({ name: "home" }) }}
  </div>
</template>

<script>
import SideBar from "../../components/admin/SideBar.vue";
import ChartView from "../../components/admin/ChartView.vue";
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
    ChartView,
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
.border-left-primary {
  border-left: 0.25rem solid #4e73df !important;
}
.border-left-success {
  border-left: 0.25rem solid #1cc88a !important;
}
.border-left-danger {
  border-left: 0.25rem solid #c81c47 !important;
}
.border-left-warning {
  border-left: 0.25rem solid #f6c23e !important;
}
.text-xs {
  font-size: 0.9rem;
}
.text-primary {
  color: #4e73df !important;
}
.text-success {
  color: #1cc88a !important;
}
.text-danger {
  color: #c81c47 !important;
}
.text-warning {
  color: #f6c23e !important;
}
.icon{
  color: #dddfeb!important;
  font-weight: 900;
  font-size: 2em;
}
</style>
