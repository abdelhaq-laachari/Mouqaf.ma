<template>
  <div class="service">
    <HomeHeader />
    <HomeService/>
  </div>
  <OurService/>
  <HomeFooter/>
</template>

<script>
import HomeHeader from "../components/HomeHeader.vue";
import HomeService from "../components/service/HomeService.vue"
import OurService from "../components/service/OurService.vue"
import HomeFooter from "../components/home/HomeFooter.vue"
export default {
  name: "ServiceView",
  components: {
    HomeHeader,
    HomeService,
    OurService,
    HomeFooter
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
    /* height: 100vh; */
}
</style>
