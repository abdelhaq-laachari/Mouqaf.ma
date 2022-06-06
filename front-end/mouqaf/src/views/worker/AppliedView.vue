<template>
  <div v-if="typeof this.idWorker !== 'undefined'">
    <SideBar />
    <div class="post__main" :style="{ 'margin-left': sidebarWidth }">
      <HeaderWorker title="Applied" />
      <div class="client" v-if="AppliedJob.length > 0">
        <h3 class="title">All Applied Jobs</h3>
        <div class="table-responsive table__width">
          <table class="table table-hover table-borderless">
            <thead class="table__bar">
              <tr>
                <th scope="col">Post Title</th>
                <th scope="col">Description</th>
                <th scope="col">City</th>
                <th scope="col">Image</th>
                <th scope="col">Your Proposal</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="Applied in AppliedJob" :key="Applied.id">
                <td>{{ Applied.post_title }}</td>
                <td>{{ Applied.description }}</td>
                <td>{{ Applied.city }}</td>
                <td>
                  <img
                    v-bind:src="'../uploads/PostImage/' + Applied.images"
                    border="0.1"
                    height="50"
                    alt=""
                  />
                </td>
                <td>{{ Applied.proposal }}</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <div id="message" v-else>
        <EmptyTable message="You haven't applied for any jobs." />
        <h1 class="get__job" >Get your first job now</h1>
        <ButtonComponent name="Get Your Work" to="/HomeWorker" />
      </div>
    </div>
  </div>
  <div v-else>
    {{ this.$router.push({ name: "SignInWorker" }) }}
  </div>
</template>

<script>
import HeaderWorker from "@/components/worker/HeaderWorker.vue";
import SideBar from "../../components/worker/SideBar.vue";
import EmptyTable from "../../components/empty/EmptyTable.vue";
import ButtonComponent from "../../components/button/ButtonComponent.vue";
import {
  collapsed,
  toggleSidebar,
  sidebarWidth,
} from "../../components/sidebar/state";
import axios from "axios";
export default {
  name: "PostView",
  components: {
    SideBar,
    HeaderWorker,
    EmptyTable,
    ButtonComponent,
  },
  data() {
    return {
      idWorker: localStorage["idWorker"],
      AppliedJob: [],
    };
  },
  methods: {
    // select one comment to report
    Applied() {
      axios
        .get(`http://localhost/youcode/mouqaf/worker/applied/${this.idWorker}`)
        .then((res) => {
          console.log(res.data);
          this.AppliedJob = res.data;
        })
        .catch((err) => {
          console.log(err);
        });
    },
  },
  // get comment when the page is loaded
  mounted() {
    this.Applied();
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
  /* height: 100vh; */
}
.title {
  font-size: 1.4rem;
  font-weight: 600;
  margin: 3.5rem 0rem 1rem 0rem;
  font-family: "poppins";
}
.table__width {
  width: 90%;
  height: 300px;
  margin: auto;
  position: relative;
  overflow: auto;
}
.table__bar {
  background-color: #4e73df;
  color: #f5f5f5;
}
td {
  height: 50px;
}
td,
th {
  overflow: hidden;
  white-space: nowrap;
}
#message {
  margin-top: 8rem;
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: 1rem;
}
.get__job{
  font-size: 1.6rem;
  color: #333333;
  font-family: "Bitter", serif;
  font-weight: normal;
  line-height: 10px;
  margin: 0 0 2rem;
  text-align: center;
  text-transform: capitalize;
}
</style>
