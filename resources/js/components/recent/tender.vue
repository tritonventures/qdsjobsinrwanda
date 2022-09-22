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
          :src="image"
          :alt="tender.company ? tender.company.name : 'image'"
        />
      </div>
      <h4>{{ tender.title }}</h4>
      <p>
        Posted {{ tender.created_at | date }} by
        <span>{{ tender.company ? tender.company.name : "-" }}</span>
      </p>
      <ul class="featurej_post">
        <li class="list-inline-item">
          <span class="flaticon-location-pin"></span>
          <span>{{ tender.location }}</span>
        </li>
      </ul>
    </div>
    <a
      class="btn btn-md btn-transparent float-right fn-smd"
      :href="`/tenders/${tender.id}`"
    >
      Browse Tender
    </a>
  </div>
</template>

<script>
import moment from "moment";
export default {
  props: ["tender"],
  filters: {
    date: (date) => {
      return moment(new Date(date)).format("Do MMMM");
    },
  },
  computed: {
    image() {
      if (this.tender.company) return this.tender.company.logo;
      return require("../../images/no-image.png");
    },
  },
  mounted() {},
};
</script>

<style lang="scss" scoped>
.tender {
  background-color: #e7edfa;
  box-shadow: 0 2px 3px 0 rgb(0 0 0 / 10%), 0 0 0 1px rgb(0 0 0 / 5%);
}
.tender-image {
  max-height: 200px;
  overflow: hidden;
}
.tender-text {
  line-height: 20px;
  height: 60px;
  overflow: hidden;
}
</style>