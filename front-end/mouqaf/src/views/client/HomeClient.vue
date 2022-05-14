<template>
  <SideBar />
  <div class="post__main" :style="{ 'margin-left': sidebarWidth }">
    <ClientHeader name="Home" />
    <div class="search__form">
      <form action="" class="search__bar">
        <select
          class="form-select form-select-m"
          aria-label=".form-select-sm example"
        >
          <option selected disabled>Open this select menu</option>
          <option value="1">One</option>
          <option value="2">Two</option>
          <option value="3">Three</option>
        </select>
        <div class="form-group">
          <input
            type="text"
            class="form-control"
            id="exampleInputPassword1"
            placeholder="Password"
          />
        </div>
        <button type="submit" class="btn btn-primary">
          <FIcons :icon="['fas', 'search']" class="b-icon face" />
        </button>
      </form>
    </div>
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
    ClientHeader,
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
.search__form {
  width: 100%;
  padding: 1rem;
  margin-top: 0.8rem;
  border-radius: 5px;
  background-color: #f8f8f8;
}
.search__bar {
  width: 50%;
  margin: auto;
  display: flex;
  gap: 2rem;
}
.form-select {
  width: auto;
}
</style>
