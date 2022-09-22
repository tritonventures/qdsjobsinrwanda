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
        <img
          class="img-fluid"
          :src="internship.company.logo || noImage"
          :alt="internship.company ? internship.company.name : 'Image'"
        />
      </div>
      <h4>{{ internship.title }}</h4>
      <p>
        Posted {{ internship.created_at | date }} by
        <span>{{ internship.company ? internship.company.name : '-' }}</span>
      </p>
      <ul class="featurej_post">
        <li class="list-inline-item">
          <span class="flaticon-location-pin"></span>
          <span>{{ internship.location }}</span>
        </li>
      </ul>
    </div>
    <a
      class="btn btn-md btn-transparent float-right fn-smd"
      :href="`/internships/${internship.id}`"
    >
      Browse Internship
    </a>
  </div>
</template>

<script>
import moment from "moment";
export default {
  props: ["internship", "user"],
  components: {},
  computed: {
    applied() {
      if (this.user) {
        return this.internship.users.map((item) => item.id).includes(this.user);
      }
      return false;
    },
    noImage() {
        if (this.internship.company) return this.internship.company.logo;
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
.internship {
  background-color: #e7edfa;
  box-shadow: 0 2px 3px 0 rgb(0 0 0 / 10%), 0 0 0 1px rgb(0 0 0 / 5%);
}
.internship-image {
  max-height: 200px;
  overflow: hidden;
}
.internship-text {
  line-height: 20px;
  height: 60px;
  overflow: hidden;
}
</style>