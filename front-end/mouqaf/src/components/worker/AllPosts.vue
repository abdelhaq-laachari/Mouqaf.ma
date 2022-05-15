<template>
  <div class="all__posts">
    <div class="post shadow p-3 mb-5 bg-white rounded">
      <div class="post__header">
        <h3>Post Title</h3>
        <div class="time">
          <span class="text-muted">6 weeks ago</span>
          <span class="text-muted">
            <FIcons
              :icon="['fas', 'map-marker-alt']"
              class="b-icon face"
            />&nbsp; Safi
          </span>
        </div>
      </div>
      <div class="post__topic">
        <p>
          Lorem ipsum dolor, sit amet consectetur adipisicing elit. Et iste
          beatae dolorem sed labore nobis error voluptatibus non aspernatur
          dolores? Dolore a accusantium culpa voluptate eius tempore nisi?
          Velit, eum.
        </p>
      </div>
      <button @click="Apply()" class="btn btn-primary">Apply</button>
    </div>
  </div>
</template>

<script>
export default {
  name: "AllPosts",
  methods:{
    Apply(){
      this.$router.push("/apply");
    },
  }
};
</script>

<style scoped>
.all__posts {
  width: 100%;
  display: flex;
  flex-direction: column;
}
.post {
  width: 90%;
  margin: 0 auto;
  display: flex;
  flex-direction: column;
}
.post button {
  width: 200px;
}
.post__header {
  display: flex;
  align-items: center;
  gap: 1rem;
  margin-bottom: 0.6rem;
}
.post__header h3 {
  font-size: 1.6rem;
  font-family: "poppins";
  margin-bottom: 0 !important;
  font-weight: 600;
}
.time {
  display: flex;
  gap: 1rem;
}
.time span {
  font-size: 1rem;
  font-family: serif;
}
.post__topic {
  font-size: 1rem;
  font-family: 'serif';
}
@media (max-width: 700px){
  .post__header h3 {
  font-size: 1.2rem;
}
.time span , .post__topic p {
  font-size: 0.8rem;
}
}
</style>
