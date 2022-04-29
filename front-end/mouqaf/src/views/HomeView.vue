<template>
  <div class="home">
    <HomeHeader/>
    <div class="first">
      <div class="left">
        <p>
          Hire the best 
          <span class="typed-text"></span> 
          <span class="cursor">&nbsp;</span>
          <br> for any job, 
          <br> online.
        </p>
        <div class="bott">
          <button class="btn btn-info">Explore</button>
          <button class="btn btn-light">Join</button>
        </div>
      </div>
      <div class="right">
        <img src="../assets/svg/first.svg"  alt="">
      </div>
    </div>
    <div class="second">
      <div class="top text-center">
        <h3>What do we have to offer you?</h3>
      </div>
      <div class="bottom">
        <div class="card">
          <div class="title">
            <h4>Post a job</h4>
          </div>
          <div class="img-card">
            <img src="../assets/svg/post.svg" alt="">
          </div>
          <div class="par">
            <p>Posting a job is simple and free. Simply provide a title, description, and budget, and you'll receive competitive offers in minutes.</p>
          </div>
        </div>
        <div class="card">
          <div class="title">
            <h4>Choose handymen</h4>
          </div>
          <div class="img-card">
            <img src="../assets/svg/search.svg" alt="">
          </div>
          <div class="par">
            <p>No job is too big or too small. We've got handymans for jobs of any size or budget. No job is too complex. We can get it done!</p>
          </div>
        </div>
        <div class="card">
          <div class="title">
            <h4>We’re here to help</h4>
          </div>
          <div class="img-card">
            <img src="../assets/svg/chat.svg" alt="">
          </div>
          <div class="par">
            <p>Our customer service team would be pleased to assist you and respond to your questions.</p>
          </div>
        </div>
      </div>
    </div>
    <div class="third">
      <div class="title text-center">
        <h3>What's great about it?</h3>
      </div>
      <div class="third-bot">
        <div class="brow">
          <div class="brow-top">
            <div class="brow-img">
              <img src="../assets/svg/portfolio.svg" alt="">
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
              <img src="../assets/svg/bids.svg" alt="">
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
              <img src="../assets/svg/quality.svg" alt="">
            </div>
            <h4>Quality Work</h4>
          </div>
          <div class="brow-bot">
            <p>By far the largest pool of qualified handymen is found on Mouqaf.ma</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import HomeHeader from "@/components/HomeHeader.vue";
// @ is an alias to /src


export default {
  name: 'HomeView',
  components: {
    HomeHeader
}
}
</script>

<style scoped>
.home{
  background: rgb(30, 25, 126);
  background: linear-gradient(
    90deg,
    rgba(30, 25, 126, 1) 0%,
    rgba(58, 56, 167, 1) 31%,
    rgba(53, 53, 210, 1) 57%,
    rgba(0, 103, 243, 1) 100%
  );
}
.first{
  width: 90%;
  height: 85vh;
  margin: 0 auto; 
  display: flex;
  align-items: center;
  /* justify-content: center; */
}

.left{
  width: 50%;
  display: flex;
  flex-direction: column;
}
.left > p{
  font-size: 2.5rem;
  color: #fff;
  font-weight: 500;
  font-family: 'poppins';
}
span.typed-text{
  color: #000;
}
span.cursor{
  display: inline-block;
  margin-left: 3px;
  width: 4px;
  background-color: #fff;
}
.bott{
  width: 100%;
  display: flex;
  gap: 1rem;
}
.bott > button{
  width: 100px
}
.right{
  width: 50%;
}
.right img{
  width: 100%;
}
.second{
  background-color: #fff;
  width: 100%;
  height: 100vh;
  margin: 0 auto;
  display: flex;
  flex-direction: column;
  justify-content: center;
  padding: 2rem;
}
.second .top h3{
  color: #3347A3;
  font-family: 'poppins';
  font-size: 2rem;
}
.bottom{
  width: 100%;
  height: auto;
  padding: 10px 20px 10px 20px;
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  grid-row-gap: 2rem;
  grid-column-gap: 2rem;
}
.card{
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: 20px;
  border: 1px solid;
  border-radius: 5px;
  justify-content: space-between;
  padding: 1rem;
  box-shadow: 0px 10px 10px rgba(0, 0, 0, 0.2);
}
.title h3{
  color: #3347A3;
  font-family: 'poppins';
  font-size: 2rem;
}
.img-card{
  width: 200px;
}
.img-card img{
  width: 100%;
}
.par p{
  font-size: 1rem;
  font-family: 'poppins';
  text-align: center;
}

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