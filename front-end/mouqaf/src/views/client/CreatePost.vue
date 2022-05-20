<template>
  <div v-if="typeof this.idClient !== 'undefined'">
    <SideBar />
    <div class="create__post" :style="{ 'margin-left': sidebarWidth }">
      <ClientHeader name="Create Poste" />
      <div class="title">
        <h4>Tell us what you need done</h4>
      </div>
      <div class="create__form shadow p-3 mb-5 bg-white rounded">
        <form action="">
          <input type="hidden" name="idClient" v-model="idClient" >
          <div class="select__cat">
            <label for="">Choose a category</label>
            <select
              class="form-select form-select-m"
              aria-label=".form-select-sm example"
              v-model="tester"
            >
            <option value="" disabled>Select category</option>
              <option v-for="category in cates" :key="category.id" :value="category.name" >
                {{ category.name }}
              </option>
            </select>
          </div>
          <div class="form-group">
            <label for="">Choose a city</label>
            <input
              type="text"
              class="form-control"
              id="exampleInputPassword1"
              placeholder="Safi, Casablanca . . ."
            />
          </div>
          <div class="form-group">
            <label for="">Tell us more about your project</label>
            <textarea
              class="form-control"
              id="exampleFormControlTextarea1"
              rows="3"
            ></textarea>
          </div>
          <button type="submit" class="btn btn-primary">Post</button>
        </form>
      </div>
    </div>
  </div>
  <div v-else>
    {{ this.$router.push({ name: "SignInClient" }) }}
  </div>
</template>

<script>
import SideBar from "../../components/sidebar/SideBar.vue";
import axios from "axios";
import {
  collapsed,
  toggleSidebar,
  sidebarWidth,
} from "../../components/sidebar/state";
import ClientHeader from "@/components/clients/ClientHeader.vue";
export default {
  name: "PostView",
  components: {
    SideBar,
    ClientHeader,
  },
  data() {
    return {
      idClient: localStorage["id"],
      tester: "",
      cate: [
        { id: '', name: '' },
      ],
      cates: [],
    };
  },
  methods: {
    GetCategory() {
      axios
        .get(`http://localhost/youcode/mouqaf/client/getcategory`)
        .then((res) => {
          this.cates = res.data;
          // console.log(Response.status);
          // console.log(Response.data);
        });
    },
  },
  mounted() {
    this.GetCategory();
  },
  setup() {
    return { collapsed, toggleSidebar, sidebarWidth };
  },
};
</script>

<style scoped>
.create__post {
  padding: 1rem 1rem;
  transition: 0.2s ease;
  height: 100vh;
}
.title h4 {
  font-size: 1.5rem;
  font-family: "poppins";
  font-weight: 600;
  text-align: center;
  margin: 2rem 0;
}
.create__form {
  padding: 2rem !important;
}
.create__form form {
  display: flex;
  flex-direction: column;
  gap: 2rem;
}
@media (max-width: 600px) {
  .create__form {
    padding: 1rem !important;
  }
  .title h4 {
    font-size: 1.2rem;
    margin: 2rem 0;
  }
}
</style>
