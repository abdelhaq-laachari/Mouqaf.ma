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
    <div class="first">
      <div class="left">
        <img src="../assets/svg/hello.svg" alt="" />
      </div>
      <div class="right">
        <div class="right__title">
          <span>Who We Are</span>
        </div>
        <div class="right__par">
          <p>
            Mouqaf.ma is a platform that connects handymen with customers. Over
            5912 firms and workers from across the country are connected through
            us. Employers may recruit workers for jobs such as plumber,
            electrician, and painter through our marketplace.
          </p>
        </div>
      </div>
    </div>
  </div>
  <HomeFooter />
</template>

<script>
import HomeHeader from "@/components/HomeHeader.vue";
import HomeFooter from "../components/home/HomeFooter.vue";
export default {
  name: "AboutView",
  components: {
    HomeHeader,
    HomeFooter,
  },
};
</script>

<style scoped>
.about {
  height: 100vh;
  margin-bottom: 1rem;
  background-color: #4700d8;
}
.first {
  width: 90%;
  height: 70%;
  margin: 0 auto;
  display: flex;
  align-items: center;

}
.left {
  width: 50%;
  order: 1;
}
.left img {
  width: 100%;
}
.right {
  width: 50%;
}
.right__title {
  font-size: 2rem;
  color: #fff;
  font-family: "poppins";
  font-weight: 600;
}
.right__par {
  font-size: 1rem;
  color: #f8f8f8;
  /* font-weight: 600; */
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
