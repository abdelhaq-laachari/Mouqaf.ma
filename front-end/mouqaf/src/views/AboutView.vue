<template>
  <div class="about">
    <HomeHeader />
    <div class="custom-shape-divider-bottom-1651707686">
      <svg
        data-name="Layer 1"
        xmlns="http://www.w3.org/2000/svg"
        viewBox="0 0 1200 120"
        preserveAspectRatio="none"
      ></svg>
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
@media (min-width: 1400px) and (max-width: 2500px) {
  .right__title {
    font-size: 3rem;
    font-weight: 600;
  }
  .right__par {
    font-size: 1.4rem;
  }
}

@media (max-width: 800px) {
  .first {
    flex-direction: column;
    justify-content: space-around;
  }
  .left {
    width: 600px;
  }
  .right {
    width: 100%;
    order: 1;
  }
}
@media (max-width: 700px) {
  .left {
    width: 500px;
  }
}
@media (max-width: 600px) {
  .left {
    width: 400px;
  }
}
@media (max-width: 500px) {
  .left {
    width: 350px;
  }
}
@media (max-width: 400px) {
  .left {
    width: 300px;
  }
  .right__title {
    font-size: 1.5rem;
    font-weight: 600;
  }
  .right__par {
    font-size: 0.9rem;
  }
}
</style>
