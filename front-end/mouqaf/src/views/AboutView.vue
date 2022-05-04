<template>
  <div class="about">
    <HomeHeader />
    <div class="custom-shape-divider-bottom-1651707686">
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
  </div>
  <div class="second">
    <h1>second</h1>
  </div>
</template>

<script>
import HomeHeader from "@/components/HomeHeader.vue";
export default {
  name: "AboutView",
  components: { HomeHeader },
};
</script>

<style scoped>
.about {
  height: 100vh;
  /* background: rgb(30, 25, 126);
  background: linear-gradient(
    90deg,
    rgba(30, 25, 126, 1) 0%,
    rgba(58, 56, 167, 1) 31%,
    rgba(53, 53, 210, 1) 57%,
    rgba(0, 103, 243, 1) 100%
  ); */
  background-color: #4700d8;
}
.second {
  height: 100vh;
}
.custom-shape-divider-bottom-1651707686 {
  position: absolute;
  bottom: 0;
  left: 0;
  width: 100%;
  overflow: hidden;
  line-height: 0;
  transform: rotate(180deg);
}

.custom-shape-divider-bottom-1651707686 svg {
  position: relative;
  display: block;
  width: calc(201% + 1.3px);
  height: 152px;
  transform: rotateY(180deg);
}

.custom-shape-divider-bottom-1651707686 .shape-fill {
  fill: #ffffff;
}
</style>
