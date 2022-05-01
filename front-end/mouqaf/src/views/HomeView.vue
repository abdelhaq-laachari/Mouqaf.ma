<template>
  <div class="home">
    <HomeHeader />
    <div class="first">
      <div class="left">
        <TypedText />
        <div class="bott">
          <button class="btn btn-info">Explore</button>
          <button class="btn btn-light">Join</button>
        </div>
      </div>
      <div class="right">
        <img src="../assets/svg/first.svg" alt="" />
      </div>
    </div>
    <CardText />
    <BrowseText />
    <!-- <div class="slide">
      <div class="carousel-title">
        <h3>Most popular services.</h3>
      </div>
      <SlideHome />
    </div> -->
    <MenHome/>
    <MouqafApp/>
  </div>
</template>

<script>
import HomeHeader from "@/components/HomeHeader.vue";
import TypedText from "../components/home/TypedText.vue";
import CardText from "../components/home/CardText.vue";
import BrowseText from "../components/home/BrowseText.vue";
import MenHome from "@/components/home/MenHome.vue";
import MouqafApp from "../components/home/MouqafApp.vue";
// import SlideHome from "../components/home/SlideHome.vue";
// @ is an alias to /src

export default {
  name: "HomeView",
  components: {
    HomeHeader,
    TypedText,
    CardText,
    BrowseText,
    MenHome,
    MouqafApp
},
};
</script>

<style scoped>
.home {
  background: rgb(30, 25, 126);
  background: linear-gradient(
    90deg,
    rgba(30, 25, 126, 1) 0%,
    rgba(58, 56, 167, 1) 31%,
    rgba(53, 53, 210, 1) 57%,
    rgba(0, 103, 243, 1) 100%
  );
}
.first {
  width: 90%;
  height: 85vh;
  margin: 0 auto;
  display: flex;
  align-items: center;
  /* justify-content: center; */
}

.left {
  width: 50%;
  display: flex;
  flex-direction: column;
}

.bott {
  width: 100%;
  display: flex;
  gap: 1rem;
}
.bott > button {
  width: 100px;
}
.right {
  width: 50%;
}
.right img {
  width: 100%;
}
</style>
