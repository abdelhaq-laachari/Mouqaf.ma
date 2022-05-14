<template>
  <div class="search__form shadow p-3 mb-5 bg-white rounded">
    <form action="" class="search__bar">
      <select
        class="form-select form-select-m"
        aria-label=".form-select-sm example"
      >
        <option selected disabled>Select Category</option>
        <option value="1">One</option>
        <option value="2">Two</option>
        <option value="3">Three</option>
      </select>
      <div class="form-group">
        <input
          type="text"
          class="form-control"
          id="exampleInputPassword1"
          placeholder="All morocco"
        />
      </div>
      <button type="submit" class="btn btn-primary">
        <FIcons :icon="['fas', 'search']" class="b-icon face" />
      </button>
    </form>
  </div>
</template>

<script>
export default {
  name: "SearchBar",
};
</script>

<style scoped>
.search__form {
  width: 100%;
  padding: 1rem;
  margin-top: 0.8rem;
  border-radius: 5px;
  background-color: #f8f8f8;
}
.search__bar {
  width: 100%;
  margin: auto;
  display: flex;
  justify-content: center;
  gap: 2rem;
}
.form-select,
.form-control {
  width: auto;
}
@media (min-width: 1500px) and (max-width: 2500px) {
  .form-select,
  .form-control {
    width: 500px;
  }
}

@media (max-width: 800px) {
  .search__bar {
    flex-direction: column;
  }
  .form-select,
  .form-control {
    width: 100%;
  }
}
</style>
