<template>
  <b-tab @click="tabOpened">
    <template #title>
      <b-spinner v-if="state.loading" small />
      Internships <span v-if="state.opened">({{ length }})</span>
    </template>

    <b-row
      align-h="center"
      align-v="center"
      class="py-5 flex-column"
      v-if="state.loading"
    >
      <b-spinner label="Loading..." />
      <p class="mt-3">Loading Internships...</p>
    </b-row>
    <b-row
      v-else-if="!internships || internships.length < 1"
      class="py-5"
      align-h="center"
      align-v="center"
    >
      <p class="font-18">No Internships available</p>
    </b-row>
    <b-row v-else>
      <b-col cols="12" v-for="(internship, i) in internships" :key="i">
        <internship :internship="internship" :user="user" />
      </b-col>
    </b-row>
  </b-tab>
</template>

<script>
import Internship from "./internship.vue";
export default {
  components: { Internship },
  props: ["currentUser"],
  data() {
    return {
      state: { loading: true, opened: false },
      internships: null,
    };
  },
  computed: {
    user() {
      if (this.currentUser) {
        return this.currentUser.id;
      }
      return null;
    },
    length() {
      if (this.internships) return this.internships.length;
      return 0;
    },
  },
  mounted() {
    this.fetchInternships();
  },
  methods: {
    async fetchInternships() {
      if (!this.state.opened) return (this.state.loading = false);
      this.state.loading = true;
      try {
        const { data } = await this.axios.get("/recent/internships");
        this.internships = data;
      } catch (error) {
        console.log(error);
      } finally {
        this.state.loading = false;
      }
    },
    tabOpened() {
      this.state.opened = true;
      this.fetchInternships();
    },
  },
};
</script>

<style lang="scss" scoped>
.internship-inner {
  width: 240px;
}
</style>