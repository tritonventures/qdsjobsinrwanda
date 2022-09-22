<template>
  <div
    class="
      align-items-lg-center align-items-stretch
      d-flex
      fj_post
      flex-column flex-lg-row
      justify-content-center
    "
  >
    <div class="details">
      <div class="thumb fn-smd flex-center">
        <img class="img-fluid" :src="image" :alt="job.company ? job.company.name :'Image'" />
      </div>
      <h4>{{ job.title }}</h4>
      <p>
        Posted {{ job.created_at | date }} by
        <span>{{ job.company ? job.company.name :'-' }}</span>
      </p>
      <ul class="featurej_post">
        <li class="list-inline-item">
          <span class="flaticon-location-pin"></span>
          <span>{{ job.location }}</span>
        </li>
      </ul>
    </div>
    <a
      class="btn btn-md btn-transparent float-right fn-smd"
      :href="`/jobs/${job.id}`"
    >
      Browse Job
    </a>
  </div>
</template>

<script>
import moment from "moment";
export default {
  props: ["job", "user"],
  components: {  },
  computed: {
    applied() {
      if (this.user) {
        return this.job.users.map((item) => item.id).includes(this.user);
      }
      return false;
    },
      image() {
      if (this.job.company) return this.job.company.logo;
      return require("../../images/no-image.png");
    },
  },
  filters: {
    date: (date) => {
      return moment(new Date(date)).format("Do MMMM");
    },
  },
  mounted() {},
};
</script>

<style lang="scss" scoped>
.job {
  background-color: #e7edfa;
  box-shadow: 0 2px 3px 0 rgb(0 0 0 / 10%), 0 0 0 1px rgb(0 0 0 / 5%);
}
.job-image {
  max-height: 200px;
  overflow: hidden;
}
.job-text {
  line-height: 20px;
  height: 60px;
  overflow: hidden;
}
</style>