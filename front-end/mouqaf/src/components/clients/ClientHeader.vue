<template>
  <div class="main__header">
    <div class="header__title">
      <h3>{{ name }}</h3>
    </div>
    <div class="user__info">
      <div class="user__image">
        <img src="../../assets/avatar/a1.jpg" alt="" />
      </div>
      <div class="user__name">
        <span>Client</span>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "ClientHeader",
  props: {
    name: { type: String, required: true },
    // icon: { type: String, required: true },
    // src: { type: String, required: true },
  },
};
</script>

<style scoped>
.main__header {
  width: 100%;
  display: flex;
  justify-content: space-between;
  align-items: center;
  background-color: #f9f3ee;
  padding: 0.5rem;
  border-radius: 5px;
}
.header__title h3 {
  color: #000;
  font-size: 1.7rem;
  font-family: "serif";
  font-weight: 600;
}
.user__info {
  width: 20%;
  display: flex;
  align-items: center;
  gap: 1rem;
}
.user__image {
  width: 50px;
}
.user__image img {
  width: 100%;
  border-radius: 50%;
}
.user__name span {
  font-size: 1.6rem;
  font-family: serif;
  font-weight: 550;
}

@media (min-width: 1500px) and (max-width: 2500px) {
  .user__image {
    width: 100px;
  }
  .user__name span {
    font-size: 2rem;
    font-family: "poppins";
  }
  .user__info {
    width: 20%;
    gap: 2rem;
  }
  .header__title h3 {
    font-size: 3rem;
  }
}

@media (max-width: 800px) {
  .user__image img {
    display: none;
  }
  .user__info {
    gap: 2rem;
    justify-content: space-around;
    width: auto ;
  }
  .header__title h3 {
    font-size: 1rem;
  }
  .user__name span {
    font-size: 1rem;
    font-family: "poppins";
  }
}
</style>
