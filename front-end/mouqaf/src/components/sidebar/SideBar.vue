<template>
  <div class="sidebar" :style="{ width: sidebarWidth }">
    <div class="logo__title">
      <span v-if="collapsed">
        <FIcons
          :icon="['fas', 'align-justify']"
          class="b-menu"
          @click="toggleSidebar"
        />
      </span>
      <h3 v-else @click="toggleSidebar">MOUQAF</h3>
    </div>

    <!-- sidebar menu link -->
    <SidebarLink to="/dashboard" icon="home">Home</SidebarLink>
    <SidebarLink to="/postview" icon="file-text">Posts</SidebarLink>
    <SidebarLink to="/profile" icon="user">Profile</SidebarLink>
    <SidebarLink to="/dashboard" icon="sign-out">Sign Out</SidebarLink>




    <!-- collapse button -->
    <span class="collapse-icon" @click="toggleSidebar">
      <FIcons
        :icon="['fas', 'angle-double-left']"
        class="b-icon"
        :class="{ 'rotate-180': !collapsed, 'rotate-0': collapsed }"
      />
    </span>
  </div>
</template>

<script>
import SidebarLink from "./SidebarLink.vue";
import { collapsed, toggleSidebar, sidebarWidth } from "./state";
export default {
  name: "SideBar",
  components: {
    SidebarLink,
  },
  setup() {
    return {
      collapsed,
      toggleSidebar,
      sidebarWidth,
    };
  },
};
</script>
<style>
:root {
  --sidebar-bg-color: #4700d8;
  --sidebar-item-hover: #9900f0;
  --sidebar-item-active: #0c5df4;
}
</style>
<style scoped>
.sidebar {
  color: #fff;
  background-color: var(--sidebar-bg-color);
  float: left;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  bottom: 0;
  padding: 0.5em;
  display: flex;
  flex-direction: column;
  align-items: center;
  transition: 0.3s ease;
}
.collapse-icon {
  position: absolute;
  bottom: 10px;
  left: 10px;
  padding: 0.5em;
  color: #fff;
  transition: 0.2s linear;
  cursor: pointer;
}

.rotate-180 {
  transform: rotate(180deg);
  transition: 0.2s linear;
}
.rotate-0 {
  transform: rotate(0deg);
  transition: 0.2s linear;
}
.logo__title {
  display: flex;
  /* align-items: center; */
  height: 70px;
}
.logo__title h3,
.logo__title span {
  font-size: 1.5rem;
  font-family: serif;
  padding-top: 1rem;
  margin: 0;
  cursor: pointer;
}
.b-menu {
  font-weight: 200;
}

.link__name {
  font-size: 1.3rem;
  margin-left: 1rem;
}

.b-icon {
  font-size: 1.2rem;
}
</style>
