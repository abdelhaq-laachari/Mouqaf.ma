<template>
  <div class="main__header">
    <div class="header__title">
      <h3> {{name}} </h3>
    </div>
    <div class="user__info">
        <div class="user__image">
            <img src=" {{src}} " width="50px" alt="">
        </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "ClientHeader",
  props: {
    name: { type: String, required: true },
    icon: { type: String, required: true },
    src: { type: String, required: true },
  },
};
</script>
