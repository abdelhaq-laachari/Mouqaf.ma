<template>
  <div class="home">
    <HomeHeader/>
    <div class="home__frame">
      <div class="left">
        <img src="../../assets/auth/signin.png" alt="">
      </div>
      <div class="right">
        <div class="right__title">
          <h3>WELCOME BACK</h3>
        </div>
        <div class="right__form">
          <form action="">
            <div class="form-group">
              <label for="exampleInputEmail1">Email address</label>
              <input
                type="email"
                class="form-control"
                id="exampleInputEmail1"
                aria-describedby="emailHelp"
                placeholder="Enter email"
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
            <button type="submit" class="btn btn-primary">Sign In</button>
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
import HomeHeader from '@/components/HomeHeader.vue';
export default {
    name: "SignInClient",
    data() {
        return {
            showPassword: false,
            password: null,
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
    },
    components: { HomeHeader }
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
