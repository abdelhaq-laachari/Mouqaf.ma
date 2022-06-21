<template>
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
          <img src="../../assets/svg/post.svg" alt="" />
        </div>
        <div class="par">
          <p>
            Posting a job is simple and free. Simply provide a title,
            description, and budget, and you'll receive competitive offers in
            minutes.
          </p>
        </div>
      </div>
      <div class="card">
        <div class="title">
          <h4>Choose handymen</h4>
        </div>
        <div class="img-card">
          <img src="../../assets/svg/search.svg" alt="" />
        </div>
        <div class="par">
          <p>
            No job is too big or too small. We've got handyman's for jobs of any
            size or budget. No job is too complex. We can get it done!
          </p>
        </div>
      </div>
      <div class="card">
        <div class="title">
          <h4>We’re here to help</h4>
        </div>
        <div class="img-card">
          <img src="../../assets/svg/chat.svg" alt="" />
        </div>
        <div class="par">
          <p>
            Our customer service team would be pleased to assist you and respond
            to your questions.
          </p>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "CardText",
};
</script>

<style scoped>
.second {
  background-color: #fff;
  width: 100%;
  margin: 0 auto;
  display: flex;
  flex-direction: column;
  justify-content: center;
  padding: 2rem;
}
.top {
  margin-top: 1.4rem;
}
.second .top h3 {
  color: #3347a3;
  font-family: "poppins";
  font-size: 2rem;
}
.bottom {
  width: 100%;
  height: auto;
  padding: 10px 20px 10px 20px;
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  grid-row-gap: 2rem;
  grid-column-gap: 2rem;
}
.card {
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
.title h4 {
  color: #3347a3;
  font-family: "poppins";
  font-size: 1.5rem;
}
.img-card {
  width: 200px;
}
.img-card img {
  width: 100%;
}
.par p {
  font-size: 1rem;
  font-family: "poppins";
  text-align: center;
}
@media (min-width: 2000px) {
  .second .top h3 {
    font-size: 3rem;
  }
  .title h4 {
    font-size: 2.2rem;
  }
  .img-card {
    width: 300px;
  }
  .par p {
    font-size: 1.5rem;
  }
}
@media (min-width: 1400px) and (max-width: 2000px) {
  .second .top h3 {
    font-size: 2.6rem;
  }
  .title h4 {
    font-size: 2.2rem;
  }
  .img-card {
    width: 250px;
  }
  .par p {
    font-size: 1.3rem;
  }
}
@media (max-width: 900px) {
  .img-card {
    width: 150px;
  }
  .par p {
    font-size: 0.9rem;
  }
  .title h4 {
    font-size: 1.3rem;
  }
}
@media (max-width: 800px) {
  .img-card {
    width: 120px;
  }
  .par p {
    font-size: 0.7rem;
  }
  .title h4 {
    font-size: 1rem;
  }
  .second .top h3 {
    font-size: 1.5rem;
  }
}
@media (max-width: 700px) {
  .bottom {
    grid-template-columns: repeat(2, 1fr);
  }
}
@media (max-width: 600px) {
  .bottom {
    grid-template-columns: repeat(1, 1fr);
  }
  .img-card {
    width: 200px;
  }
  .par p {
    font-size: 1rem;
  }
  .title h4 {
    font-size: 1.3rem;
  }
  .second .top h3 {
    font-size: 1.8rem;
  }
}
@media (max-width: 400px) {
  .bottom {
    grid-template-columns: repeat(1, 1fr);
  }
  .img-card {
    width: 120px;
  }
  .par p {
    font-size: 0.8rem;
  }
  .title h4 {
    font-size: 1.1rem;
  }
  .second .top h3 {
    font-size: 1.4rem;
  }
}
</style>
