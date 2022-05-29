<template>
  <div class="main__header">
    <div class="header__title">
      <h3>{{ title }}</h3>
    </div>
    <div class="user__info">
      <div class="user__image">
        <img
          v-bind:src="'../uploads/ClientProfile/' + info[0].avatar"
          alt=""
        />
      </div>
      <div class="user__name">
        <span>{{ info[0].first_name }}</span>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";
export default {
  name: "ClientHeader",
  props: {
    title: { type: String, required: true },
    // first_name: { type: String, required: true },
    // avatar: { type: String, required: true },
  },
  data() {
    return {
      idClient: localStorage["id"],
      name: localStorage["name"],
      info: [
        {
          first_name: "",
          last_name: "",
          email: "",
          phone: "",
          avatar: "",
        },
      ],
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
  },
  mounted() {
    this.GetOneClient();
  },
};
</script>

<style scoped>
.main__header {
  width: 100%;
  display: flex;
  justify-content: space-between;
  align-items: center;
  background-color: #f9f3ee;
  padding: 0.5rem;
  border-radius: 5px;
}
.header__title h3 {
  color: #000;
  font-size: 1.7rem;
  font-family: "serif";
  font-weight: 600;
}
.user__info {
  width: 20%;
  display: flex;
  align-items: center;
  gap: 1rem;
}
.user__image {
  width: 50px;
}
.user__image img {
  width: 100%;
  border-radius: 50%;
}
.user__name span {
  font-size: 1.6rem;
  font-family: serif;
  font-weight: 550;
}

@media (min-width: 1500px) and (max-width: 2500px) {
  .user__image {
    width: 100px;
  }
  .user__name span {
    font-size: 2rem;
  }
  .user__info {
    width: 20%;
    gap: 2rem;
  }
  .header__title h3 {
    font-size: 3rem;
  }
}

@media (max-width: 800px) {
  .user__image img {
    display: none;
  }
  .user__info {
    gap: 2rem;
    justify-content: space-around;
    width: auto;
  }
  .header__title h3 {
    font-size: 1rem;
  }
  .user__name span {
    font-size: 1rem;
  }
}
</style>
