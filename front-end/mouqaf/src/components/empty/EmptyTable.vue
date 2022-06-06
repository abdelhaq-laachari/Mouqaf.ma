<template>
<!-- message for empty table -->
  <h3 class="message">{{ message }}</h3>
</template>

<script>
export default {
  name: "EmptyTable",
  props: {
    message: { type: String, required: true },
  },
};
</script>

<style scoped>
.message {
  font-size: 1.6rem;
  color: #333333;
  font-family: "Bitter", serif;
  font-weight: normal;
  line-height: 10px;
  margin: 0 0 2rem;
  text-align: center;
  margin-top: 3rem;
  text-transform: capitalize;
}
</style>
