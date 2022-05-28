<template>
  <div class="home">
    <HomeHeader />
    <div class="home__frame">
      <div class="left">
        <img src="../../assets/auth/worker.svg" alt="" />
      </div>
      <div class="right">
        <div class="right__title">
          <h3>WELCOME BACK</h3>
        </div>
        <div class="right__form">
          <form v-on:submit.prevent="SignIn()">
            <span v-if="this.LogInError" class="error__msg">{{
              LogInError
            }}</span>
            <div class="form-group">
              <label for="exampleInputEmail1">Email address</label>
              <input
                type="email"
                class="form-control"
                id="exampleInputEmail1"
                aria-describedby="emailHelp"
                placeholder="Enter email"
                v-model="email"
                required
              />
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Password</label>
              <div class="field has-addons">
                <div class="control is-expanded">
                  <input
                    v-if="showPassword"
                    type="text"
                    class="form-control"
                    placeholder="Password"
                    v-model="password"
                    required
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
            <button type="submit" name="submit" class="btn btn-primary">
              Sign In
            </button>
          </form>
          <span class="footer__link"
            >Don't have an account
            <a href="signup">Sign Up</a>
          </span>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import HomeHeader from "@/components/HomeHeader.vue";
import axios from "axios";
export default {
  name: "SignInWorker",
  data() {
    return {
      showPassword: false,
      password: "",
      email: "",
      LogInError: "",
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
    SignIn() {
      const formData = new FormData();
      formData.append("email", this.email);
      formData.append("password", this.password);
      axios
        .post("http://localhost/youcode/mouqaf/Worker/signin", formData)
        .then((Response) => {
          console.log(Response.status);
          console.log(Response.data);
          if (Response.status === 200) {
            localStorage.setItem("idWorker", Response.data.idWorker);
            this.$router.push({ name: "HomeWorker" });
          }
        })
        .catch((e) => {
          console.log(e.response.status);
          console.log(e.response);
          if (e.response.status === 400) {
            this.LogInError = e.response.data.message;
          }
        });
    },
  },
  components: { HomeHeader },
};
</script>

<style scoped>
.home {
  width: 100%;
  height: 101vh;
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
.logo {
  width: 95px;
  padding: 1rem;
}
.logo img {
  width: 100%;
}
.home__frame {
  width: 80%;
  height: 80%;
  margin: 0 auto;
  display: flex;
  justify-content: space-around;
  align-items: center;
  background-color: #fff;
  border-radius: 1rem;
  gap: 1rem;
}
.left {
  width: 300px;
  order: 1;
}
.left img {
  width: 100%;
}
.right {
  width: 45%;
  display: flex;
  flex-direction: column;
  gap: 2rem;
}
.right__title h3 {
  display: flex;
  justify-content: center;
  font-size: 1.8rem;
  font-weight: 600;
  font-family: "poppins";
}
.right__form {
  width: 100%;
}
.right__form form {
  display: flex;
  flex-direction: column;
  gap: 1rem;
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
.error__msg {
  color: red;
  font-size: 0.8rem;
  font-weight: 600;
}
@media (max-width: 930px) {
  .left {
    width: 250px;
  }
}
@media (max-width: 800px) {
  .logo {
    width: 90px;
  }
  .left {
    display: none;
  }
  .right {
    width: 90%;
    margin: auto;
  }
}
@media (max-width: 400px) {
  .logo {
    width: 80px;
  }
  .right__title h3 {
    font-size: 1.6rem;
  }
  .footer__link,
  .footer__link a {
    font-size: 0.9rem;
  }
}
</style>
