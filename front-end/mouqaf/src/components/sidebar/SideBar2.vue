<template>
  <div class="sidebar" :style="{ width: sidebarWidth }">
    <h1>
      <div v-if="collapsed">
        <FIcons icon="home" class="icon" />
      </div>
      <h3 v-else @click="toggleSidebar">MOUQAF</h3>
    </h1>

    <SidebarLink2 to="/" icon="home">Home</SidebarLink2>

    <SidebarLink2 to="/dashboard"  icon="home" >Dashboard</SidebarLink2>
    <SidebarLink2 to="/postview" icon="chart-bar">Posts</SidebarLink2>
    <SidebarLink2 to="/friends" icon="users">Friends</SidebarLink2>
    <SidebarLink2 to="/profile" icon="image">Images</SidebarLink2>

    <span
      class="collapse-icon"
      :class="{ 'rotate-180': collapsed }"
      @click="toggleSidebar"
    >
      <FIcons class="icon" icon="angle-double-left" />
    </span>
  </div>
</template>


<script>
import SidebarLink2 from "./SidebarLink2";
import { collapsed, toggleSidebar, sidebarWidth } from "./state";

export default {
  props: {},
  components: { SidebarLink2 },
  setup() {
    return { collapsed, toggleSidebar, sidebarWidth };
  },
};
</script>


// css style 

<style>
:root {
  --sidebar-bg-color: #4700d8;
  --sidebar-item-hover: #9900f0;
  --sidebar-item-active: #0c5df4;
}
</style>

<style scoped>
.sidebar {
  color: white;
  background-color: var(--sidebar-bg-color);

  float: left;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  bottom: 0;
  padding: 0.5em;

  transition: 0.3s ease;

  display: flex;
  flex-direction: column;
}

.sidebar h1 {
  height: 2.5em;
}

.collapse-icon {
  position: absolute;
  bottom: 0;
  padding: 0.75em;

  color: rgba(255, 255, 255, 0.7);

  transition: 0.2s linear;
}

.rotate-180 {
  transform: rotate(180deg);
  transition: 0.2s linear;
}
</style>
