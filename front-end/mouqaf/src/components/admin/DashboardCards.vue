<template>
  <div class="row pt-3">
    <!-- card start here -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2" v-for="user in users" :key="user">
              <div
                class="text-xs font-weight-bold text-primary text-uppercase mb-1"
              >
                Total Users
              </div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">{{user.NumberOfUsers}}</div>
            </div>
            <div class="col-auto">
              <FIcons :icon="['fas', 'users']" class="icon" />
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- card end here -->
    <!-- card start here -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2" v-for="poste in posts" :key="poste">
              <div
                class="text-xs font-weight-bold text-success text-uppercase mb-1"
              >
                Total Posts
              </div>
              <div class="h5 mb-0 font-weight-bold text-gray-800"> {{poste.NumberOfPosts}} </div>
            </div>
            <div class="col-auto">
              <FIcons :icon="['fas', 'clipboard-list']" class="icon" />
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- card end here -->
    <!-- card start here -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-danger shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2" v-for="report in reports" :key="report">
              <div
                class="text-xs font-weight-bold text-danger text-uppercase mb-1"
              >
                Total Reports
              </div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">{{report.NumberOfReports}} </div>
            </div>
            <div class="col-auto">
              <FIcons :icon="['fas', 'triangle-exclamation']" class="icon" />
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- card end here -->
    <!-- card start here -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2" v-for="category in categories" :key="category">
              <div
                class="text-xs font-weight-bold text-warning text-uppercase mb-1"
              >
                All Category's
              </div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">{{category.NumberOfCategory}} </div>
            </div>
            <div class="col-auto">
              <FIcons :icon="['fas', 'list-ul']" class="icon" />
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- card end here -->
  </div>
</template>

<script>
import axios from 'axios';
export default {
  name: "DashboardCards",
  components: {},
  data() {
    return {
      id: localStorage["idAdmin"],
      posts:[],
      categories:[],
      users:[],
      reports:[],
    };
  },
  methods:{
    //  get total posts
    GetTotalPosts() {
      axios
        .get(
          `http://localhost/youcode/mouqaf/admin/GetTotalPosts`
        )
        .then((res) => {
          console.log(res.data);
          this.posts = res.data;
        })
        .catch((err) => {
          console.log(err);
        });
    },
    //  get total posts
    GetTotalReports() {
      axios
        .get(
          `http://localhost/youcode/mouqaf/admin/GetTotalReports`
        )
        .then((res) => {
          console.log(res.data);
          this.reports = res.data;
        })
        .catch((err) => {
          console.log(err);
        });
    },
    //  get total comments
    GetTotalCategory() {
      axios
        .get(
          `http://localhost/youcode/mouqaf/admin/GetTotalCategory`
        )
        .then((res) => {
          console.log(res.data);
          this.categories = res.data;
        })
        .catch((err) => {
          console.log(err);
        });
    },
    //  get total users
    GetTotalUsers() {
      axios
        .get(
          `http://localhost/youcode/mouqaf/admin/GetTotalUsers`
        )
        .then((res) => {
          console.log(res.data);
          this.users = res.data;
        })
        .catch((err) => {
          console.log(err);
        });
    },
  },
    mounted() {
        this.GetTotalPosts();
        this.GetTotalReports();
        this.GetTotalCategory();
        this.GetTotalUsers();
    },
};
</script>

<style scoped>
.post__main {
  padding: 1rem 1rem;
  transition: 0.2s ease;
}
.border-left-primary {
  border-left: 0.25rem solid #4e73df !important;
}
.border-left-success {
  border-left: 0.25rem solid #1cc88a !important;
}
.border-left-danger {
  border-left: 0.25rem solid #c81c47 !important;
}
.border-left-warning {
  border-left: 0.25rem solid #f6c23e !important;
}
.text-xs {
  font-size: 0.9rem;
}
.text-primary {
  color: #4e73df !important;
}
.text-success {
  color: #1cc88a !important;
}
.text-danger {
  color: #c81c47 !important;
}
.text-warning {
  color: #f6c23e !important;
}
.icon {
  color: #dddfeb !important;
  font-weight: 900;
  font-size: 2em;
}
.all__chart {
  padding: 1rem 1rem;
  transition: 0.2s ease;
  display: flex;
  align-items: center;
  width: 100%;
  justify-content: space-around;
}

@media (max-width: 750px) {
  .all__chart {
    flex-direction: column;
    gap: 1rem;
  }
}
</style>
