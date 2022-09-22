<script>
export default {
  props: ["text", "options", "selected", "field", "name"],
  data() {
    return {
      inputData: "",
    };
  },
  computed: {
    selectedId() {
      if (this.selected) {
        return this.selected[this.field];
      }
      return "";
    },
  },
  created() {
    if (this.selected) {
      this.$set(this, "inputData", this.selected[this.field]);
    }
  },
};
</script>

<style>
</style>