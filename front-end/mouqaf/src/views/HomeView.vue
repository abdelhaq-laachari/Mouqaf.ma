<template>
  <div class="home">
    <HomeHeader/>
    <div class="first">
      <div class="left">
        <p>Hire the best handyman <br> for any job, <br> online.</p>
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
  height: 85vh;
  margin: 0 auto;
  display: flex;
  flex-direction: column;
  padding: 2rem;
}
.second .top h3{
  color: #3347A3;
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
.title h4{
  color: #6787FE;
  font-family: 'poppins';
  font-size: 1.5rem;
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
</style>