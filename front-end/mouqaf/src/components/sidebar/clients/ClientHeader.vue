<template>
  <div class="main__header">
    <div class="header__title">
      <h3> {{name}} </h3>
    </div>
  </div>
</template>

<script>
export default {
  name: "ClientHeader",
  props: {
    name: { type: String, required: true },
    icon: { type: String, required: true },
  },
};
</script>
