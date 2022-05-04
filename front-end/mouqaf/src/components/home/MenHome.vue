<template>
  <div class="neighbor">
    <div class="left">
      <img src="../../assets/img/plumber-with-his-arms-crossed.png" alt="" />
    </div>
    <div class="right">
      <div class="title">
        <h3>NEIGHBORLY</h3>
      </div>
      <div class="par">
        <p>
          MOUQAF is a platform that is kind to its neighbors. Painting is only
          one of the many home-improvement options accessible. MOUQAF is
          dedicated to meeting all of your home service requirements.
        </p>
      </div>
      <button class="btn btn-info">Explore</button>
    </div>
  </div>
</template>

<script>
export default {
  name: "MenHome",
};
</script>

<style scoped>
.neighbor {
  display: flex;
  justify-content: space-between;
  align-items: center;
  width: 100%;
  /* background: #fff; */
  background: #0464f1;
}
.left {
  width: 30%;
}
.left img {
  width: 100%;
}
.right {
  width: 70%;
}
.title h3 {
  color: #fff;
  /* color: #000; */
  font-size: 2rem;
  /* font-weight: bold; */
  font-family: "poppins";
}
.par {
  width: 80%;
}
.par p {
  color: #fff;
  /* color: #000; */
  font-size: 1.2rem;
  font-family: "Serif";
}
@media (min-width: 2000px) {
  .title h3 {
    font-size: 3.5rem;
    padding-bottom: 2rem;
  }
  .par p {
    font-size: 2.2rem;
    padding-bottom: 2rem;
  }
}
@media (min-width: 1500px) and (max-width: 2000px) {
  .title h3 {
    font-size: 3rem;
    padding-bottom: 2rem;
  }
  .par p {
    font-size: 1.5rem;
    padding-bottom: 2rem;
  }
}
@media (max-width: 900px) {
  .title h3 {
    font-size: 1.8rem;
  }
  .par p {
    font-size: 1.1rem;
  }
}
@media (max-width: 800px) {
  .title h3 {
    font-size: 1.6rem;
  }
  .par p {
    font-size: 1rem;
  }
}
@media (max-width: 800px) {
  .left {
    display: none;
  }
  .right {
    width: 95%;
    margin: auto;
    padding: 2rem;
  }
  .title h3 {
    font-size: 1.5rem;
  }
  .par {
    width: 100%;
  }
  .par p {
    font-size: 1rem;
  }
}
</style>
