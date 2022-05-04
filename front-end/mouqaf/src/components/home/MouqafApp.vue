<template>
  <div class="app">
    <div class="left">
      <img src="../../assets/svg/app.svg" alt="" />
    </div>
    <div class="right">
      <div class="title">
        <h3>The MOUQAF App will be available soon.</h3>
      </div>
      <div class="par">
        <p>
          You may easily search for any service you want with the MOUQAF App.
        </p>
      </div>
      <div class="store">
        <div class="store-img">
          <img src="../../assets/img/google.png" alt="" />
        </div>
        <div class="store-img">
          <img src="../../assets/img/apple.png" alt="" />
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "MouqafApp",
};
</script>

<style scoped>
.app {
  display: flex;
  justify-content: space-between;
  align-items: center;
  width: 100%;
  padding: 6rem 2rem 6rem 2rem;
  /* height: 100vh; */
  /* background: #0464F1; */
  background-color: #fff;
}
.left {
  width: 30%;
}
.left img {
  width: 100%;
}
.right {
  width: 65%;
  display: flex;
  flex-direction: column;
  gap: 2rem;
}
.store {
  width: 50%;
  display: flex;
  justify-content: space-between;
}
.store-img {
  width: 45%;
}
.store-img img {
  width: 100%;
}
.title h3 {
  /* color: #fff; */
  color: #000;
  font-size: 2rem;
  font-weight: bold;
  font-family: "Serif";
}
.par {
  width: 80%;
}
.par p {
  /* color: #fff; */
  color: #000;
  font-size: 1.1rem;
  font-family: "poppins";
}
@media (max-width: 800px) {
  .app {
    flex-direction: column;
    gap: 4rem;
  }
  .left {
    width: 300px;
  }
  .left img {
    width: 100%;
  }
  .right {
    width: 100%;
  }
  .store {
    width: 100%;
    display: flex;
    justify-content: flex-start;
    gap: 1rem;
  }
  .store-img {
    width: 150px !important;
  }
  .title h3 {
    font-size: 2.3rem;
  }
  .par {
    width: 100%;
  }
  .par p {
    font-size: 1.4rem;
  }
}
@media (max-width: 500px) {
  .left {
    width: 240px;
  }
  .left img {
    width: 100%;
  }
  .store-img {
    width: 150px !important;
  }
  .title h3 {
    font-size: 2.1rem;
  }
  .par p {
    font-size: 1.4rem;
  }
}
@media (max-width: 450px) {
  .left {
    width: 200px;
  }
  .left img {
    width: 100%;
  }
  .store-img {
    width: 150px !important;
  }
  .title h3 {
    font-size: 1.8rem;
  }
  .par p {
    font-size: 1rem;
  }
}
</style>
