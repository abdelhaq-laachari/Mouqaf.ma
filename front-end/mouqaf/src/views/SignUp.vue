<template>
  <div class="home">
    <HomeHeader />
    <div class="home__frame">
      <div class="left">
        <img src="../assets/auth/signup.png" alt="" />
      </div>
      <div class="right">
        <div class="right__title">
          <h3>Join Our Community</h3>
        </div>
        <div class="right__form">
          <form v-on:submit.prevent="SignUp()">
            <div class="form-group">
              <!-- <label class="form-label">First Name</label> -->
              <input
                type="text"
                class="form-control"
                placeholder="First Name"
                v-model="firstName"
              />
            </div>
            <div class="form-group">
              <!-- <label class="form-label">Last Name</label> -->
              <input
                type="text"
                class="form-control"
                placeholder="Last Name"
                v-model="lastName"
              />
            </div>
            <div class="form-group">
              <!-- <label class="form-label">Phone Number</label> -->
              <input
                type="number"
                class="form-control"
                placeholder="Phone Number"
                v-model="phone"
              />
            </div>
            <div class="form-group">
              <!-- <label class="form-label" for="exampleInputEmail1" -->
              <!-- >Email address</label -->
              <!-- > -->
              <!-- <br> -->
              <span v-if="this.emailError" class="error__msg">{{
                emailError
              }}</span>
              <input
                type="email"
                class="form-control"
                id="exampleInputEmail1"
                aria-describedby="emailHelp"
                placeholder="Enter email"
                v-model="email"
              />
            </div>
            <div class="form-group">
              <!-- <label class="form-label" for="exampleInputPassword1" -->
              <!-- >Password</label -->
              <!-- > -->
              <div class="field has-addons">
                <div class="control is-expanded">
                  <input
                    v-if="showPassword"
                    type="text"
                    class="form-control"
                    placeholder="Password"
                    v-model="password"
                  />
                  <input
                    v-else
                    type="password"
                    class="form-control"
                    placeholder="Password"
                    v-model="password"
                  />
                </div>
                <div class="pass__icon">
                  <div v-if="!showPassword">
                    <FIcons
                      :icon="['fas', 'eye-slash']"
                      class="b-icon"
                      @click="toggleShow"
                    />
                  </div>
                  <div v-if="showPassword">
                    <FIcons
                      :icon="['fas', 'eye']"
                      class="b-icon"
                      @click="toggleShow"
                    />
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group">
              <!-- <label class="form-label" for="exampleInputEmail1">City</label> -->
              <input
                type="text"
                class="form-control"
                placeholder="City"
                v-model="city"
              />
            </div>
            <div class="form-group">
              <!-- <label class="form-label" for="">Choose your account type.</label> -->
              <select
                class="form-select"
                aria-label="Default select example"
                v-model="role"
              >
                <option value="client">Client</option>
                <option value="worker">Worker</option>
              </select>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">
              Sign Up
            </button>
          </form>
          <span class="footer__link"
            >You already have an account?
            <a href="SignInClient">Sign In</a>
          </span>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import HomeHeader from "../components/HomeHeader.vue";
import axios from "axios";
export default {
  name: "SignIn",
  components: {
    HomeHeader,
  },
  data() {
    return {
      showPassword: false,
      password: "",
      role: "",
      firstName: "",
      lastName: "",
      email: "",
      city: "",
      phone: "",
      emailError: "",
    };
  },
  computed: {
    buttonLabel() {
      return this.showPassword ? "Hide" : "Show";
    },
  },
  methods: {
    toggleShow() {
      this.showPassword = !this.showPassword;
    },
    SignUp() {
      const formData = new FormData();
      formData.append("first_name", this.firstName);
      formData.append("last_name", this.lastName);
      formData.append("email", this.email);
      formData.append("password", this.password);
      formData.append("role", this.role);
      formData.append("city", this.city);
      formData.append("phone", this.phone);
      axios
        .post("http://localhost/youcode/mouqaf/client/signup", formData)
        .then((Response) => {
          console.log(Response.status);
          console.log(Response.data);
          // this.$router.push({ name: "home" });
          if (this.role == "client") {
            this.$router.push({ name: "SignInClient" });
          } else if (this.role == "worker") {
            this.$router.push({ name: "SignInWorker" });
          }
        })
        .catch((e) => {
          console.log(e.response.status);
          console.log(e.response);
          if (e.response.status === 400) {
            this.emailError = e.response.data.message;
          }
        });
    },
  },
};
</script>

<style scoped>
.home {
  width: 100%;
  height: 110vh;
  display: flex;
  flex-direction: column;
  background: rgb(30, 25, 126);
  background: linear-gradient(
    90deg,
    rgba(30, 25, 126, 1) 0%,
    rgba(58, 56, 167, 1) 31%,
    rgba(53, 53, 210, 1) 57%,
    rgba(0, 103, 243, 1) 100%
  );
}
.form-label {
  margin-bottom: 5px;
  margin-left: 5px;
}
.logo {
  width: 95px;
  padding: 1rem;
}
.logo img {
  width: 100%;
}
.home__frame {
  width: 80%;
  /* height: 80%; */
  padding: 3rem 1rem;
  margin:  auto;
  /* margin-top: 2rem; */
  display: flex;
  align-items: center;
  background-color: #fff;
  border-radius: 1rem;
  gap: 1rem;
}
.left {
  width: 50%;
}
.left img {
  width: 100%;
}
.right {
  width: 45%;
  display: flex;
  flex-direction: column;
  gap: 1rem;
}
.error__msg {
  color: red;
  font-size: 0.8rem;
  font-weight: 600;
}
.right__title h3 {
  display: flex;
  justify-content: center;
  font-size: 1.6rem;
  font-weight: 600;
  font-family: "poppins";
}
.right__form {
  width: 100%;
}
.right__form form {
  display: flex;
  flex-direction: column;
  gap: 0.7rem;
}
.field {
  display: flex;
  width: 100%;
}
.pass__icon {
  display: flex;
  align-items: center;
  justify-content: center;
  border: 1px solid #ced4da;
  border-radius: 5px;
  width: 7%;
  cursor: pointer;
}
input[type="number"]::-webkit-inner-spin-button {
  -webkit-appearance: none;
}
.control {
  width: 93%;
}
.footer__link {
  display: flex;
  width: 100%;
  margin-top: 1rem;
}
.footer__link a {
  text-decoration: none;
  color: #22211f;
  padding-left: 5px;
  font-size: 1rem;
  font-weight: 700;
}
.footer__link a:hover {
  color: #0364f1;
}
.footer__link {
  font-size: 1rem;
}
@media (max-width: 1000px) {
  .left {
    display: none;
  }
  .right {
    width: 90%;
    margin: auto;
  }
}
@media (max-width: 800px) {
  .logo {
    width: 90px;
  }
  .home {
    height: 100vh;
  }
  /* .home__frame{
    margin: auto;
  } */
}
@media (max-width: 400px) {
  .logo {
    width: 80px;
  }
  .right__title h3 {
    font-size: 1.4rem;
  }
  .footer__link,
  .footer__link a {
    font-size: 0.9rem;
  }
}
</style>
