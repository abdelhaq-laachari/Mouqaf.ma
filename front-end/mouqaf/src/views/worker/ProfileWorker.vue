<template>
  <SideBar />
  <div class="profile__worker" :style="{ 'margin-left': sidebarWidth }">
  <HeaderWorker name="Profile" />
    <div class="container rounded bg-white mt-5 mb-5">
      <div class="row">
        <div class="col-md-3 border-right">
          <div
            class="d-flex flex-column align-items-center text-center p-3 py-5"
          >
            <img
              class="rounded-circle mt-5"
              width="150px"
              src="../../assets/avatar/a4.jpg"
            /><span class="font-weight-bold">Edogaru</span
            ><span class="text-black-50">edogaru@mail.com.my</span
            ><span> </span>
          </div>
        </div>
        <div class="col-md-5 border-right">
          <div class="p-3 py-5">
            <div class="d-flex justify-content-between align-items-center mb-3">
              <h4 class="text-right">Profile Settings</h4>
            </div>
            <div class="row mt-2">
              <div class="col-md-6">
                <label class="labels">Name</label
                ><input
                  type="text"
                  class="form-control"
                  placeholder="first name"
                  value=""
                />
              </div>
              <div class="col-md-6">
                <label class="labels">Last name</label
                ><input
                  type="text"
                  class="form-control"
                  value=""
                  placeholder="Last name"
                />
              </div>
            </div>
            <div class="row mt-3">
              <div class="col-md-12">
                <label class="labels">Mobile Number</label
                ><input
                  type="text"
                  class="form-control"
                  placeholder="enter phone number"
                  value=""
                />
              </div>
              <div class="col-md-12">
                <label class="labels">Email</label
                ><input
                  type="email"
                  class="form-control"
                  placeholder="enter email"
                  value=""
                />
              </div>
            </div>
            <div class="mt-5 text-center">
              <button class="btn btn-primary profile-button" type="button">
                Save Profile
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import SideBar from "../../components/worker/SideBar.vue";
import {
  collapsed,
  toggleSidebar,
  sidebarWidth,
} from "../../components/sidebar/state";
import HeaderWorker from "@/components/worker/HeaderWorker.vue";
export default {
  name: "ProfileClient",
  components: {
    SideBar,
    HeaderWorker
},
  setup() {
    return { collapsed, toggleSidebar, sidebarWidth };
  },
};
</script>

<style scoped>
.profile__worker {
  padding: 1rem 1rem;
  transition: 0.2s ease;
}
body {
  background: rgb(99, 39, 120);
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

.back:hover {
  color: #682773;
  cursor: pointer;
}

.labels {
  font-size: 11px;
}

.add-experience:hover {
  background: #ba68c8;
  color: #fff;
  cursor: pointer;
  border: solid 1px #ba68c8;
}
</style>
