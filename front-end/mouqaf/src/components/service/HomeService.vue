<template>
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
        <img src="../../assets/svg/eng2.svg" alt="" />
        <!-- <img src="../assets/img/men.png" alt="" /> -->
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
</template>

<script>
export default {
  name: "HomeService",
  components: {
  },
};
</script>

<style scoped>

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
    height: 70%;
    display: flex;
    align-items: center;
}
.left {
  width: 50%;
  display: flex;
  justify-content: center;
  /* background-color: #fff; */
}
.left img {
  width: 80%;
}

.right {
  width: 50%;
  height: 70%;
  display: flex;
  align-items: center;
}
.right__title{
    /* background-color: #000; */
    width: 100%;
    height: 60%;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}

.right__title h3{
    font-size: 2.5rem;
    font-weight: bold;
    color: #fff;
    font-family: 'serif';
}
.right__title span{
    font-size: 1.3rem;
    font-weight: 500;
    color: #DFDFDE;
    font-family: 'poppins';
}
.right__title p{
    font-size: 0.8rem;
    font-weight: 500;
    color: #fff;
    font-family: 'poppins';
}
</style>
