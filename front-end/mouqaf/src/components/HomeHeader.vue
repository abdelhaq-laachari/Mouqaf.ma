<template>
  <!-- Nav Bar -->
  <div class="home__header">
    <nav class="navbar navbar-expand-lg navbar-dark">
      <div class="container">
        <a href="/">
          <img src="../assets/logo/mouqaf.png" class="logo" alt="" />
        </a>
        <button
          class="navbar-toggler btn-dark"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarNav"
          aria-controls="navbarNav"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
          <div class="mx-auto"></div>
          <ul class="navbar-nav">
            <li class="nav-item">
              <router-link class="nav-link text-light link-r" to="/"
                >Home</router-link
              >
            </li>
            <li class="nav-item">
              <router-link class="nav-link text-light link-r" to="/about"
                >About</router-link
              >
            </li>
            <li class="nav-item">
              <router-link class="nav-link text-light link-r" to="/service"
                >Service</router-link
              >
            </li>
            <!-- <li class="nav-item">
              <router-link class="nav-link text-light link-r" to="/signin"
                >Sign In</router-link
              >
            </li> -->
            <li class="nav-item ">
              <div
                class="nav-link text-light link-r dropdown-toggle"
                href="#"
                id="navbarDropdown"
                role="button"
                data-toggle="dropdown"
                aria-haspopup="true"
                aria-expanded="false"
              >
                Dropdown
              </div>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Something else here</a>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </div>
</template>

<script>
export default {
  name: "HomeHeader",
  components: {},
};
</script>

<style scop>
.link-r {
  font-weight: 600;
  font-size: 1.3rem;
  font-family: serif;
}
.logo {
  width: 70px;
}
@media (min-width: 1500px) {
  .link-r {
    font-weight: 600;
    font-size: 2rem;
  }
  .logo {
    width: 100px;
  }
}

@media (max-width: 500px) {
  .logo {
    width: 70px;
  }
}
</style>
