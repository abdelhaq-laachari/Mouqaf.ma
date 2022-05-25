<template>
  <div v-if="typeof this.idClient !== 'undefined'">
    <SideBar />
    <div class="profile__main" :style="{ 'margin-left': sidebarWidth }">
      <ClientHeader title="Profile" />
      <form v-on:submit.prevent="UpdateClient()">
        <input type="hidden" name="idClient" v-model="idClient" />
        <div class="container rounded bg-white mt-5 mb-5">
          <div class="row">
            <div class="col-md-3 border-right">
              <div
                class="d-flex flex-column align-items-center text-center p-3 py-5"
              >
                <img
                  class="rounded-circle mt-5"
                  src="../../assets/avatar/a1.jpg"
                />
                <input
                  v-if="seen"
                  @change="onFileChanged"
                  type="file"
                  class="custom-file-input"
                />
                <!-- just fo remember wher i stope -->
                <span class="font-weight-bold">
                  {{ info[0].first_name }} {{ info[0].last_name }}
                </span>
                <span class="text-black-50">{{ info[0].email }} </span>
              </div>
            </div>
            <div class="col-md-5 border-right">
              <div class="p-3 py-5">
                <div
                  class="d-flex justify-content-between align-items-center mb-3"
                >
                  <h4 class="text-right">Profile Settings</h4>
                </div>
                <div class="row mt-2">
                  <div class="col-md-6">
                    <label class="labels">Name</label
                    ><input
                      type="text"
                      class="form-control"
                      v-model="info[0].first_name"
                      :disabled="disable"
                    />
                  </div>
                  <div class="col-md-6">
                    <label class="labels">Last name</label
                    ><input
                      type="text"
                      class="form-control"
                      v-model="info[0].last_name"
                      :disabled="disable"
                    />
                  </div>
                </div>
                <div class="row mt-3">
                  <div class="col-md-12">
                    <label class="labels">Mobile Number</label
                    ><input
                      type="text"
                      class="form-control"
                      v-model="info[0].phone"
                      :disabled="disable"
                    />
                  </div>
                  <div class="col-md-12">
                    <label class="labels"> Email</label
                    ><input
                      type="email"
                      class="form-control"
                      v-model="info[0].email"
                      :disabled="disable"
                    />
                  </div>
                </div>
                <div class="mt-5 text-center buttons">
                  <button
                    v-if="!seen"
                    @click="ShowButton()"
                    class="btn btn-primary profile-button"
                    type="button"
                  >
                    Edit Profile
                  </button>
                  <button
                    v-if="seen"
                    class="btn btn-primary "
                    type="submit"
                  >
                    Save
                  </button>
                  <button
                    v-if="seen"
                    @click="HideButton()"
                    class="btn btn-danger"
                    type="button"
                  >
                    Cancel
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </form>
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
  name: "ProfileClient",
  components: {
    SideBar,
    ClientHeader,
  },
  data() {
    return {
      seen: false,
      idClient: localStorage["id"],
      info: [
        {
          first_name: "",
          last_name: "",
          email: "",
          phone: "",
        },
      ],
      disable: true,
      error: "",
    };
  },

  methods: {
    //  get clients by id from database
    GetOneClient() {
      axios
        .get(
          `http://localhost/youcode/mouqaf/client/GetOneClient/${this.idClient}`
        )
        .then((res) => {
          console.log(res.data);
          this.info = res.data;
        })
        .catch((err) => {
          console.log(err);
        });
    },
    ShowButton() {
      this.disable = false;
      this.seen = true;
    },
    HideButton() {
      this.disable = true;
      this.seen = false;
    },
    // comment if i missed up on the file

    // update profile information
    // Create post
    UpdateClient() {
      const formData = new FormData();
      formData.append("idClient", this.idClient);
      formData.append("Fname", this.info[0].first_name);
      formData.append("Lname", this.info[0].last_name);
      formData.append("phone", this.info[0].phone);
      formData.append("email", this.info[0].email);
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
            .post(
              "http://localhost/youcode/mouqaf/client/updateclient",
              formData
            )
            .then((Response) => {
              console.log(Response.status);
              console.log(Response.data);
              // this.message = Response.data.message;
              if (Response.status === 200) {
                Swal.fire({
                  title: "Your post has been created successfully",
                  icon: "success",
                  showCancelButton: false,
                  confirmButtonText: "Ok",
                }).then((result) => {
                  if (result.isConfirmed) {
                    localStorage.removeItem("name");
                    localStorage.setItem("name", this.info[0].first_name);
                    this.$router.go(this.$router.currentRoute);
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
    // end of missing code
    onFileChanged(event) {
      this.selectedFile = event.target.files[0];
    },
  },
  setup() {
    return { collapsed, toggleSidebar, sidebarWidth };
  },
  mounted() {
    this.GetOneClient();
  },
};
</script>

<style scoped>
.profile__main {
  padding: 1rem 1rem;
  transition: 0.2s ease;
}
body {
  background: rgb(99, 39, 120);
}

.rounded-circle {
  width: 150px;
}

.form-control:focus {
  box-shadow: none;
  border-color: #ba68c8;
}

.profile-button {
  background: rgb(99, 39, 120);
  box-shadow: none;
  border: none;
}

.profile-button:hover {
  background: #682773;
}

.profile-button:focus {
  background: #682773;
  box-shadow: none;
}

.profile-button:active {
  background: #682773;
  box-shadow: none;
}
.row {
  justify-content: space-around;
}
.labels {
  font-size: 11px;
}
.buttons {
  display: flex;
  justify-content: center;
  width: 100%;
  gap: 1rem;
}

.custom-file-input::-webkit-file-upload-button {
  visibility: hidden;
}
.custom-file-input::before {
  content: "Select picture";
  display: inline-block;
  background: linear-gradient(top, #f9f9f9, #e3e3e3);
  border: 1px solid #999;
  border-radius: 3px;
  padding: 5px 8px;
  outline: none;
  white-space: nowrap;
  -webkit-user-select: none;
  cursor: pointer;
  text-shadow: 1px 1px #fff;
  font-weight: 700;
  font-size: 10pt;
}
.custom-file-input:hover::before {
  border-color: black;
}
.custom-file-input:active::before {
  background: -webkit-linear-gradient(top, #e3e3e3, #f9f9f9);
}
</style>
