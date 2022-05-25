<template>
  <div class="search__form shadow p-3 mb-5 bg-white rounded">
    <form action="" class="search__bar">
      <select
        class="form-select form-select-m"
        aria-label=".form-select-sm example"
        v-model="idCategory"
        required
      >
        <option value="" disabled selected>Select category</option>
        <option
          v-for="category in cates"
          :key="category.id"
          :value="category.id"
        >
          {{ category.name }}
        </option>
      </select>
      <div class="form-group">
        <input
          type="text"
          class="form-control"
          id="exampleInputPassword1"
          placeholder="All morocco"
        />
      </div>
      <button type="submit" class="btn bg-blue-500">
        <FIcons :icon="['fas', 'search']" class="b-icon face" />
      </button>
    </form>
  </div>
</template>

<script>
import axios from 'axios';
export default {
  name: "SearchBar",
  data(){
    return{
      idClient: localStorage["id"],
      idCategory: "",
      name: "",
      cate: [{ id: "", name: "" }],
      cates: [],
    }
  },
  methods: {
    // Get category from database
    GetCategory() {
      axios
        .get(`http://localhost/youcode/mouqaf/client/getcategory`)
        .then((res) => {
          this.cates = res.data;
        })
        .catch((err) => {
          console.log(err);
        });
    },
  },
  // get category when the page is loaded
  mounted() {
    this.GetCategory();
  },
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
.face{
  color: #fff;
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
