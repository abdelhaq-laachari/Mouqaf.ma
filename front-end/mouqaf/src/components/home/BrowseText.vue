<template>
    <div class="third">
      <div class="title text-center">
        <h3>What's great about it?</h3>
      </div>
      <div class="third-bot">
        <div class="brow">
          <div class="brow-top">
            <div class="brow-img">
              <img src="../../assets/svg/portfolio.svg" alt="">
            </div>
            <h4>Browse Portfolio</h4>
          </div>
          <div class="brow-bot">
            <p>Find professionals you can trust by browsing their samples of previous work and reading their profile reviews.</p>
          </div>
        </div>
        <div class="brow">
          <div class="brow-top">
            <div class="brow-img">
              <img src="../../assets/svg/bids.svg" alt="">
            </div>
            <h4>Fast Bids</h4>
          </div>
          <div class="brow-bot">
            <p>Receive obligation free quotes from our talented freelancers fast. 85% of projects get bid on within one minute.</p>
          </div>
        </div>
        <div class="brow">
          <div class="brow-top">
            <div class="brow-img" id="img">
              <img src="../../assets/svg/quality.svg" alt="">
            </div>
            <h4>Quality Work</h4>
          </div>
          <div class="brow-bot">
            <p>By far the largest pool of qualified handymen is found on Mouqaf.ma</p>
          </div>
        </div>
      </div>
    </div>
</template>

<script>
    export default {
        name: 'BrowseText'
    }
</script>

<style scoped>
    
.third{
  width: 100%;
  height: 100vh;
  padding: 2rem;
  display: flex;
  flex-direction: column;
  background-color: #fff;
  /* align-items: center; */
  justify-content: center;
}
.third-bot{
  width: 100%;
  height: auto;
  display: flex;
  padding: 1rem;
  justify-content: space-around;
}
.brow{
  width: 30%;
  padding-top: 1rem;
  display: flex;
  flex-direction: column;
}
.brow-top{
  display: flex;
  width: 100%;
  height: 100px;
  /* background-color: red; */
  justify-content: space-around;
  align-items: center;
  padding-bottom: 1rem;
}
.brow-img{
  width: 70px;
}
#img{
  width: 50px !important;
}
.brow-img img{
  width: 100%;
}
.brow-top h4{
  color: #3347A3;
  font-family: 'poppins';
  font-size: 1.5rem;
}
</style>