<template>
  <div class="first">
    <div class="first__title">
      <h3>Most Popular Services</h3>
    </div>
    <div class="first__card">
      <div class="card__img">
        <img src="../../assets/img/1.jpg" alt="" />
      </div>
      <div class="card__par">
        <h3>Professional Electrician at your service 24 hours</h3>
        <p>
          Lorem ipsum dolor, sit amet consectetur adipisicing elit. Eos dolor,
          obcaecati commodi laborum omnis sit. Minima suscipit aut quam maiores
          ratione veritatis repellendus illum! Laudantium ab tenetur odio
          repellendus illum?
        </p>
      </div>
    </div>
    <div class="first__card">
      <div class="card__img ord">
        <img src="../../assets/img/4.jpg" alt="" />
      </div>
      <div class="card__par">
        <h3>Trained to solve water problem</h3>
        <p>
          Lorem ipsum dolor, sit amet consectetur adipisicing elit. Eos dolor,
          obcaecati commodi laborum omnis sit. Minima suscipit aut quam maiores
          ratione veritatis repellendus illum! Laudantium ab tenetur odio
          repellendus illum?
        </p>
      </div>
    </div>
    <div class="first__card">
      <div class="card__img">
        <img src="../../assets/img/3.jpg" alt="" />
      </div>
      <div class="card__par">
        <h3>Prepard for any emergency</h3>
        <p>
          Lorem ipsum dolor, sit amet consectetur adipisicing elit. Eos dolor,
          obcaecati commodi laborum omnis sit. Minima suscipit aut quam maiores
          ratione veritatis repellendus illum! Laudantium ab tenetur odio
          repellendus illum?
        </p>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "OurService",
};
</script>

<style scoped>
.first {
  width: 100%;
  display: flex;
  flex-direction: column;
  gap: 3rem;
  margin: 2rem 0;
}
.first__title {
  width: 100%;
}
.first__title h3 {
  text-align: center;
  font-size: 2.5rem;
  font-weight: bold;
  font-family: serif;
}

.first__card {
  width: 90%;
  margin: 0 auto;
  display: flex;
  justify-content: space-between;
  align-items: center;
}
.card__img {
  width: 45%;
  border: 1px solid;
  padding: 0.2rem;
  background-color: #f8f8f8;
}
.card__img img {
  width: 100%;
}
.ord{
    order: 1;
}
.card__par {
  width: 50%;
}
.card__par h3 {
  font-size: 2rem;
  font-family: "poppins";
  font-weight: 550;
}
.card__par p {
  font-size: 1rem;
}

@media (min-width: 2000px) {
  .card__par h3 {
    font-size: 3rem;
  }
  .card__par p {
    font-size: 2rem;
  }
}
@media (min-width: 1400px) and (max-width: 2000px) {
  .card__par h3 {
    font-size: 2.5rem;
  }
  .card__par p {
    font-size: 1.2rem;
  }
}
@media (max-width: 900px) {
  .first__card {
    flex-direction: column;
    gap: 2rem;
  }
  .card__par {
    width: 100%;
  }
  .card__img {
    width: 70%;
  }
  .ord{
    order: 0;
}
}
@media (max-width: 600px){
    .first__title h3{
        font-size: 2rem;
    }
  .card__par h3 {
    font-size: 1.6rem;
  }
  .card__par p {
    font-size: 0.8rem;
  }
}
</style>
