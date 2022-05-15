<template>
  <SideBar />
  <div class="post__main" :style="{ 'margin-left': sidebarWidth }">
    <ClientHeader name="Posts" />
    <div class="my__post shadow p-3 mb-5 bg-white rounded">
      <div class="post__title">
        <h3>Post Title</h3>
        <span class="text-muted">6 weeks ago</span>
        <span class="text-muted">
          <FIcons :icon="['fas', 'map-marker-alt']" />&nbsp;
          Safi
        </span>
      </div>
      <div class="post__topic">
        <p>
          Lorem, ipsum dolor sit amet consectetur adipisicing elit. Blanditiis
          quas debitis saepe repudiandae doloremque maiores, earum at vel, fuga
          excepturi suscipit id dolore placeat! Exercitationem assumenda fuga
          nemo fugiat. Laboriosam.
        </p>
      </div>
      <DangerButton name="Delete" to="" />
    </div>
    <div class="main__comment">
      <div class="number__comment">
        <h3>34 Comment on this jop</h3>
      </div>
      <div class="comment__card shadow p-3 mb-5 bg-white rounded">
        <div class="comment__header">
          <div class="worker__info">
            <div class="worker__img">
              <img src="../../assets/avatar/a3.jpg" alt="" />
            </div>
            <div class="worker">
              <div class="name">
                <h3>Eric Parker</h3>
              </div>
              <div class="comment__info">
                <div class="comment">
                  <FIcons :icon="['fas', 'phone']" class="b-icon" />&nbsp;
                  <span class="text-muted">0612345678</span>
                </div>
                <div class="comment">
                  <FIcons
                    :icon="['fas', 'map-marker-alt']"
                    class="b-icon"
                  />&nbsp;
                  <span class="text-muted">Safi</span>
                </div>
                <div class="comment">
                  <FIcons :icon="['fas', 'clock']" class="b-icon" />&nbsp;
                  <span class="text-muted">6 Week ago</span>
                </div>
              </div>
            </div>
          </div>
          <div class="comment__btn">
            <DangerButton name="Report" to="" />
          </div>
        </div>
        <div class="comment__topic">
          <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Assumenda
            nam asperiores sit hic, placeat, qui quibusdam est aut aperiam vitae
            perspiciatis iste impedit dicta labore minus a nemo magnam commodi.
          </p>
        </div>
        <div class="comment__btn2">
            <button class="btn btn-danger">Report</button>
          </div>
      </div>
    </div>
  </div>
</template>

<script>
import SideBar from "../../components/sidebar/SideBar.vue";
import {
  collapsed,
  toggleSidebar,
  sidebarWidth,
} from "../../components/sidebar/state";
import ClientHeader from "@/components/clients/ClientHeader.vue";
import DangerButton from "@/components/button/DangerButton.vue";
export default {
  name: "PostView",
  components: {
    SideBar,
    ClientHeader,
    DangerButton
},
  methods: {
    CreatePost() {
      this.$router.push("/CreatePost");
    },
  },
  setup() {
    return { collapsed, toggleSidebar, sidebarWidth };
  },
};
</script>

<style scoped>
.post__main {
  padding: 1rem 1rem;
  transition: 0.2s ease;
}
.my__post {
  width: 100%;
  margin: 1.2rem 0;
  display: flex;
  flex-direction: column;
  gap: 1rem;
}
.post__title {
  display: flex;
  align-items: center;
  gap: 1rem;
}
.post__title h3 {
  font-size: 1.6rem;
  font-family: "poppins";
  margin-bottom: 0 !important;
  font-weight: 600;
}
.post__title span {
  font-size: 1rem;
  font-family: serif;
}
.post__topic {
  font-size: 1rem;
  font-family: "serif";
}
.post__btn {
  width: 150px;
}
.comment__card {
  display: flex;
  flex-direction: column;
  width: 100%;
}
.comment__header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-bottom: 1rem;
}
.worker__info {
  display: flex;
  gap: 2rem;
  align-items: center;
}
.worker__img {
  width: 80px;
}
.worker__img img {
  width: 100%;
  border-radius: 50%;
}
.comment__info{
    display: flex;
    gap: 2rem;
}
.worker .name h3{
    font-size: 1.2rem;
    font-family: serif;
    font-weight: 600;
}
.comment__info .comment span{
    font-size: 0.7rem;
    font-family: 'poppins';
}
.b-icon{
    font-size: 0.8rem;
}
.comment__topic {
  font-size: 1rem;
  font-family: "serif";
}
.comment__btn2{
    display: none;
}
@media (max-width: 700px){
    .post__title{
        gap: 0.4rem;
    }
    .comment__btn2{
        display: block;
    }
    .comment__btn{
        display: none;
    }
    .worker__info{
        align-items: flex-start;
    }
    .comment__info{
        flex-direction: column;
        align-items: flex-start;
        gap: 0.2rem;
    }
}
</style>
