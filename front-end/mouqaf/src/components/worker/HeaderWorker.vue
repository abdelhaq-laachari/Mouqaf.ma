<template>
  <div class="main__header">
    <div class="header__title">
      <h3 class="h3 text-gray-800">{{ title }}</h3>
    </div>
    <div class="user__info">
      <div class="user__image">
        <img v-bind:src="'../uploads/ClientProfile/' + info[0].avatar" alt="" />
      </div>
      <div class="user__name">
        <span class="mr-2 text-gray-600 small">
          {{ info[0].first_name }} {{ info[0].last_name }}
        </span>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";
export default {
  name: "HeaderWorker",
  props: {
    title: { type: String, required: true },
  },
  data() {
    return {
      idWorker: localStorage["idWorker"],
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
          `http://localhost/youcode/mouqaf/client/GetOneClient/${this.idWorker}`
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
    console.log(this.idWorker);
  },
};
</script>

<style scoped>
.main__header {
  width: 100%;
  display: flex;
  justify-content: space-between;
  align-items: center;
  background-color: #f8f9fc;
  padding: 0.5rem;
  border-radius: 5px;
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
  text-transform: capitalize;
}

@media (min-width: 1500px) and (max-width: 2500px) {
  .user__image {
    width: 80px;
  }
  .user__name span {
    font-size: 1.2rem;
  }
  .user__info {
    width: 20%;
    gap: 2rem;
  }
  .header__title h3 {
    font-size: 2rem;
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
}
</style>
