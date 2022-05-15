<template>

<router-link :to="to" class="button__hover" >
    <button class="btn btn-danger button__hover ">{{ name }}</button>
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
.button__hover{
    width: 150px !important;
}


</style>
