<template>
  <div class="third">
    <div class="title text-center">
      <h3>What's great about it?</h3>
    </div>
    <div class="third-bot">
      <div class="brow">
        <div class="brow-top">
          <div class="brow-img">
            <img src="../../assets/svg/portfolio.svg" alt="" />
          </div>
          <h4>Browse Portfolio</h4>
        </div>
        <div class="brow-bot">
          <p>
            Find professionals you can trust by browsing their samples of
            previous work and reading their profile reviews.
          </p>
        </div>
      </div>
      <div class="brow">
        <div class="brow-top">
          <div class="brow-img">
            <img src="../../assets/svg/bids.svg" alt="" />
          </div>
          <h4>Fast Bids</h4>
        </div>
        <div class="brow-bot">
          <p>
            Receive obligation free quotes from our talented freelancers fast.
            85% of projects get bid on within one minute.
          </p>
        </div>
      </div>
      <div class="brow">
        <div class="brow-top">
          <div class="brow-img" id="img">
            <img src="../../assets/svg/quality.svg" alt="" />
          </div>
          <h4>Quality Work</h4>
        </div>
        <div class="brow-bot">
          <p>
            By far the largest pool of qualified handymen is found on Mouqaf.ma
          </p>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "BrowseText",
};
</script>

<style scoped>
.third {
  width: 100%;
  padding: 4rem 2rem 4rem 2rem;
  /* height: 100vh; */
  display: flex;
  flex-direction: column;
  background-color: #fff;
  /* align-items: center; */
  justify-content: center;
}
.title h3 {
  color: #3347a3;
  font-family: "poppins";
  font-size: 2rem;
}
.third-bot {
  width: 100%;
  height: auto;
  display: flex;
  padding: 1rem;
  justify-content: space-around;
}
.brow {
  width: 30%;
  padding-top: 1rem;
  display: flex;
  flex-direction: column;
}
.brow-top {
  display: flex;
  width: 100%;
  height: 100px;
  justify-content: space-around;
  align-items: center;
  padding-bottom: 1rem;
}
.brow-img {
  width: 70px;
}
#img {
  width: 50px !important;
}
.brow-img img {
  width: 100%;
}
.brow-top h4 {
  color: #3347a3;
  font-family: "poppins";
  font-size: 1.5rem;
}
P {
  font-size: 1.3rem;
}

@media (min-width: 2000px) {
  .title h3 {
    color: #3347a3;
    font-family: "poppins";
    font-size: 3rem;
    padding-bottom: 2rem;
  }
  .brow-img {
    width: 100px;
  }
  #img {
    width: 80px !important;
  }
  .brow-top h4 {
    font-size: 2.3rem;
  }
  P {
    font-size: 1.9rem;
  }
}

@media (min-width: 1400px) and (max-width: 2000px) {
  .title h3 {
    font-size: 2.5rem;
    padding-bottom: 2rem;
  }
  .brow-img {
    width: 90px;
  }
  #img {
    width: 70px !important;
  }
  .brow-top h4 {
    font-size: 2rem;
  }
  P {
    font-size: 1.5rem;
  }
}
@media (max-width: 900px) {
  .brow-img {
    width: 50px;
  }
  #img {
    width: 40px !important;
  }
  .brow-top h4 {
    font-size: 1.3rem;
  }
  P {
    font-size: 1rem;
  }
}
@media (max-width: 800px) {
  .brow-img {
    width: 45px;
  }
  #img {
    width: 35px !important;
  }
  .brow-top h4 {
    font-size: 1.1rem;
  }
  P {
    font-size: 0.9rem;
  }
}
@media (max-width: 600px) {
  .third {
    /* height: 120vh; */
  }
  .third-bot {
    flex-direction: column;
  }
  .brow {
    width: 100%;
  }
  .brow-top {
    justify-content: flex-start;
    gap: 1rem;
  }
  .brow-img {
    width: 70px;
  }
  #img {
    width: 60px !important;
  }
  .brow-top h4 {
    font-size: 1.4rem;
  }
  P {
    font-size: 1.2rem;
  }
}
@media (max-width: 500px) {
  .brow-top {
    justify-content: flex-start;
    gap: 1rem;
  }
  .brow-img {
    width: 60px;
  }
  #img {
    width: 50px !important;
  }
  .brow-top h4 {
    font-size: 1.2rem;
  }
  P {
    font-size: 1rem;
  }
}
@media (max-width: 380px) {
  .brow-top {
    justify-content: flex-start;
    gap: 1rem;
  }
  .brow-img {
    width: 55px;
  }
  #img {
    width: 50px !important;
  }
  .brow-top h4 {
    font-size: 1.2rem;
  }
  P {
    font-size: 1rem;
  }
}
</style>
