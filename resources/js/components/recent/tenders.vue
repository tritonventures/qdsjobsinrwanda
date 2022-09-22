<template>
  <b-tab @click="tabOpened">
    <template #title>
      <b-spinner v-if="state.loading" small />
      Tenders <span v-if="state.opened">({{ length }})</span>
    </template>

    <b-row
      align-h="center"
      align-v="center"
      class="py-5 flex-column"
      v-if="state.loading"
    >
      <b-spinner label="Loading..." />
      <p class="mt-3">Loading Tenders...</p>
    </b-row>
    <b-row
      v-else-if="!tenders || tenders.length < 1"
      class="py-5"
      align-h="center"
      align-v="center"
    >
      <p class="font-18">No Tenders available</p>
    </b-row>
    <b-row v-else align-h="start">
      <b-col v-for="(tender, i) in tenders" :key="i" cols="12" class="p-0">
        <tender :tender="tender" />
      </b-col>
    </b-row>
  </b-tab>
</template>

<script>
import Tender from "./tender.vue";
export default {
  components: { Tender },
  data() {
    return {
      state: { loading: true, opened: false },
      tenders: null,
    };
  },
  computed: {
    length() {
      if (this.tenders) return this.tenders.length;
      return 0;
    },
  },
  mounted() {
    this.fetchTenders();
  },
  methods: {
    async fetchTenders() {
      if (!this.state.opened) return (this.state.loading = false);
      this.state.loading = true;
      try {
        const { data } = await this.axios.get("/recent/tenders");
        this.tenders = data;
        console.log(data);
      } catch (error) {
        console.log(error);
      } finally {
        this.state.loading = false;
      }
    },
    tabOpened() {
      this.state.opened = true;
      this.fetchTenders();
    },
  },
};
</script>

<style lang="scss" scoped>
.tender-inner {
  width: 240px;
}
</style>