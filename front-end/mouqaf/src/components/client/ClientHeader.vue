<template>
  <div class="dropdown">
    <div class="client__img">
      <img src="../../assets/logo/mouqaf.png" alt="" />
    </div>
    <div class="menu__drop">
      <button
        class="btn btn-secondary dropdown-toggle"
        type="button"
        id="dropdownMenuButton1"
        data-bs-toggle="dropdown"
        aria-expanded="false"
      >
        Client Name
      </button>
      <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
        <li><a class="dropdown-item" href="#">Action</a></li>
        <li><a class="dropdown-item" href="#">Another action</a></li>
        <li><a class="dropdown-item" href="#">Something else here</a></li>
      </ul>
    </div>
  </div>
</template>

<script>
export default {
  name: "ClientHeader",
};
</script>

<style scoped>
.dropdown {
  display: flex;
}
</style>
