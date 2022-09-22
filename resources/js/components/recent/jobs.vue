<template>
  <b-tab @click="refresh">
    <template #title>
      <b-spinner v-if="state.loading" small />
      Jobs <span>({{ length }})</span>
    </template>

    <b-row
      align-h="center"
      align-v="center"
      class="py-5 flex-column"
      v-if="state.loading"
    >
      <b-spinner label="Loading..." />
      <p class="mt-3">Loading Jobs...</p>
    </b-row>
    <b-row
      v-else-if="!jobs || jobs.length < 1"
      class="py-5"
      align-h="center"
      align-v="center"
    >
      <p class="font-18">No Jobs available</p>
    </b-row>
    <b-row v-else>
      <b-col cols="12" v-for="(job, i) in jobs" :key="i">
        <job :job="job" :user="user" />
      </b-col>
    </b-row>
  </b-tab>
</template>

<script>
import Job from "./job.vue";
export default {
  components: { Job },
  props: ["currentUser"],
  data() {
    return {
      state: { loading: true },
      jobs: null,
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
      if (this.jobs) return this.jobs.length;
      return 0;
    },
  },
  mounted() {
    this.fetchJobs();
  },
  methods: {
    async fetchJobs() {
      this.state.loading = true;
      try {
        const { data } = await this.axios.get("/recent/jobs");
        this.jobs = data;
      } catch (error) {
        console.log(error);
      } finally {
        this.state.loading = false;
      }
    },
    refresh() {
      this.fetchJobs();
    },
  },
};
</script>

<style lang="scss" scoped>
.job-inner {
  width: 240px;
}
</style>