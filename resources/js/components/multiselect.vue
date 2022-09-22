<!-- Vue component -->
<template>
  <div>
    <multiselect
      v-model="value"
      :options="options || []"
      :multiple="true"
      :close-on-select="false"
      :custom-label="customLabel"
      :show-labels="false"
      class="text-capitalize"
    ></multiselect>
    <b-form-select
      class="d-none"
      :name="name + '[]'"
      multiple
      :options="options"
      v-model="value"
    ></b-form-select>
  </div>
</template>

<script>
import Multiselect from "vue-multiselect";

export default {
  components: { Multiselect },
  props: ["list", "selected", "name"],
  data() {
    return {
      value: [],
    };
  },
  computed: {
    options() {
      if (!this.list) return [];
      return this.list.map((i) => i.id);
    },
  },
  created() {
    if (this.selected) {
      this.value = JSON.parse(this.selected).map((i) => i.id);
    }
  },
  methods: {
    customLabel(title) {
      return String(
        this.list.filter((i) => i.id == title)[0].name
      ).capitalize();
    },
  },
};
</script>

<!-- New step!
     Add Multiselect CSS. Can be added as a static asset or inside a component. -->
<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>

<style>
</style>