<template>
  <div class="service">
    <HomeHeader />
    <HomeService/>
  </div>
  <div class="first">
      <h1>home</h1>
  </div>
</template>

<script>
import HomeHeader from "../components/HomeHeader.vue";
import HomeService from "../components/service/HomeService.vue"
export default {
  name: "ServiceView",
  components: {
    HomeHeader,
    HomeService
  },
};
</script>

<style scoped>
.service {
  width: 100%;
  height: 100vh;
  background-color: #4700d8;
}
.first{
    height: 100vh;
}
</style>
