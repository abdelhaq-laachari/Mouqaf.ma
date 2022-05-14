<template>
  <div class="main__header">
    <div class="header__title">
      <h3> {{name}} </h3>
    </div>
    <div class="user__info">
        <div class="user__image">
            <img src="../../assets/avatar/a1.jpg" alt="">
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
.main__header{
  width: 100%;
  display: flex;
  justify-content: space-between;
  align-items: center;
  background-color: #F9F3EE;
  padding: 0.5rem;
  border-radius: 5px;
}
.header__title h3{
  color: #000;
  font-size: 2rem;
  font-family: 'serif';
  font-weight: 600;
}
.user__info{
  width: 20%;
  display: flex;
  align-items: center;
}
.user__image{
  width: 100px;
}
.user__image img{
  width: 70%;
  border-radius: 50%;
}

</style>