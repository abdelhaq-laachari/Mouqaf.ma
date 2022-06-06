<template>
  <div v-if="typeof this.idClient !== 'undefined'">
    <SideBar />
    <div class="create__post" :style="{ 'margin-left': sidebarWidth }">
      <ClientHeader title="Create Post" />
      <div class="title">
        <h4>Tell us what you need done</h4>
      </div>
      <div class="create__form shadow p-3 mb-5 bg-white rounded">
        <form v-on:submit.prevent="CreatePost()">
          <input type="hidden" name="idClient" v-model="idClient" />
          <div class="select__cat">
            <label for="">Choose a category</label>
            <select
              class="form-select form-select-m"
              aria-label=".form-select-sm example"
              v-model="idCategory"
              required
            >
              <option value="" disabled id="place">Select category</option>
              <option
                v-for="category in cates"
                :key="category.id"
                :value="category.id"
              >
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
              v-model="city"
              required
            />
          </div>
          <div class="form-group">
            <label for="">Choose a title for your project</label>
            <input
              type="text"
              class="form-control"
              id="exampleInputPassword1"
              placeholder="I need a electrician"
              v-model="title"
              required
            />
          </div>
          <div class="form-group">
            <label for="">Tell us more about your project</label> <br />
            <textarea
              class="form-control"
              id="exampleFormControlTextarea1"
              rows="5"
              placeholder="Discribe your project here"
              v-model="description"
              required
            ></textarea>
          </div>
          <div class="">
            <label for="formFile" class="form-label"
              >Upload a image for more details</label
            >
            <input
              class="form-control"
              type="file"
              name="file"
              id="formFile"
              @change="onFileChanged"
            />
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
import Swal from "sweetalert2";
export default {
  name: "PostView",
  components: {
    SideBar,
    ClientHeader,
  },
  data() {
    return {
      idClient: localStorage["id"],
      idCategory: "",
      city: "",
      title: "",
      selectedFile: "",
      description: "",
      cate: [{ id: "", name: "" }],
      cates: [],
      SuccessMessage: "",
      ExtensionError: "",
    };
  },
  methods: {
    // Get category from database
    GetCategory() {
      axios
        .get(`http://localhost/youcode/mouqaf/client/getcategory`)
        .then((res) => {
          this.cates = res.data;
        });
    },
    // Create post
    CreatePost() {
      const formData = new FormData();
      formData.append("idClient", this.idClient);
      formData.append("title", this.title);
      formData.append("idCategory", this.idCategory);
      formData.append("city", this.city);
      formData.append("file", this.selectedFile);
      formData.append("description", this.description);
      // show alert message with three button save, don't save and cancel
      Swal.fire({
        title: "Do you want to save the changes?",
        showDenyButton: true,
        showCancelButton: true,
        confirmButtonText: "Save",
        denyButtonText: `Don't save`,
      }).then((result) => {
        // if click on save button then save the changes
        if (result.isConfirmed) {
          axios
            .post("http://localhost/youcode/mouqaf/client/CreatePost", formData)
            .then((Response) => {
              console.log(Response.status);
              console.log(Response.data);
              this.SuccessMessage = Response.data.message;
              if (Response.status === 200) {
                Swal.fire({
                  title: this.SuccessMessage,
                  icon: "success",
                  showCancelButton: false,
                  confirmButtonText: "Ok",
                }).then((result) => {
                  if (result.isConfirmed) {
                    this.$router.push({ name: "HomeClient" });
                  }
                });
              }
            })
            .catch((e) => {
              console.log(e.response.status);
              console.log(e.response);
              console.log(e.response.data.message);
              this.ExtensionError = e.response.data.message;
              // console.log("error");
              Swal.fire(this.ExtensionError, "", "error");
            });
        }
        // if click on don't save button then don't save the changes
        else if (result.isDenied) {
          Swal.fire("Changes are not saved", "", "info");
        }
      });
    },
    // get file when user select a file
    onFileChanged(event) {
      this.selectedFile = event.target.files[0];
    },
  },
  // get category when the page is loaded
  mounted() {
    this.GetCategory();
  },
  // get the width of the sidebar
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
label {
  margin: 0 0 5px 5px;
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
