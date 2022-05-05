<template>
  <div class="service">
    <HomeHeader />
    <div class="custom-shape-divider-bottom-1651750855">
      <svg
        data-name="Layer 1"
        xmlns="http://www.w3.org/2000/svg"
        viewBox="0 0 1200 120"
        preserveAspectRatio="none"
      >
        <path
          d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z"
          class="shape-fill"
        ></path>
      </svg>
    </div>
    <div class="first">
      <div class="left">
        <img src="../assets/img/men.png" alt="" />
      </div>
      <div class="right">
        <div class="right__title">
          <h3>We Provide Quality Service</h3>
          <span>We work 24 hours a day</span>
          <p>
            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Doloremque
            commodi at sequi explicabo error accusamus. Alias omnis maxime sunt
            quasi magnam non nulla cupiditate aperiam, sit obcaecati cumque
            rerum sapiente!
          </p>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import HomeHeader from "../components/HomeHeader.vue";
export default {
  name: "ServiceView",
  components: {
    HomeHeader,
  },
};
</script>

<style scoped>
.service {
  width: 100%;
  height: 100vh;
  background-color: #4700d8;
}
.custom-shape-divider-bottom-1651750855 {
  position: absolute;
  bottom: 0;
  left: 0;
  width: 100%;
  overflow: hidden;
  line-height: 0;
  transform: rotate(180deg);
}

.custom-shape-divider-bottom-1651750855 svg {
  position: relative;
  display: block;
  width: calc(146% + 1.3px);
  height: 167px;
  transform: rotateY(180deg);
}

.custom-shape-divider-bottom-1651750855 .shape-fill {
  fill: #ffffff;
}
.first{
    width: 100%;
    display: flex;
}
.left {
  width: 50%;
  /* background-color: #fff; */
}
.left img {
  width: 70%;
}

.right {
  width: 50%;
}
</style>
