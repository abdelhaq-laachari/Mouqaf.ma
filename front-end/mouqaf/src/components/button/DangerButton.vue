<template>
  <router-link :to="to" class="button__hover">
    <!-- <button class="btn btn-danger button__hover">{{ name }}</button> -->
    <button class="button-7" role="button">{{ name }}</button>
  </router-link>
</template>

<script>
export default {
  props: {
    name: { type: String, required: true },
    to: { type: String, required: true },
  },
};
</script>

<style scoped>
.button-7 {
  background-color: #ff003c;
  border: 1px solid transparent;
  border-radius: 3px;
  box-shadow: rgba(255, 255, 255, 0.4) 0 1px 0 0 inset;
  box-sizing: border-box;
  color: #fff;
  cursor: pointer;
  display: inline-block;
  font-family: -apple-system, system-ui, "Segoe UI", "Liberation Sans",
    sans-serif;
  font-size: 13px;
  font-weight: 400;
  line-height: 1.15385;
  margin: 0;
  outline: none;
  padding: 8px 0.8em;
  position: relative;
  text-align: center;
  text-decoration: none;
  user-select: none;
  -webkit-user-select: none;
  touch-action: manipulation;
  vertical-align: baseline;
  white-space: nowrap;
}
.button-7:hover,
.button-7:focus {
  background-color: #e11e1e;
}
.button-7:focus {
  box-shadow: 0 0 0 4px rgba(0, 149, 255, 0.15);
}
.button-7:active {
  background-color: #0064bd;
  box-shadow: none;
}
</style>
