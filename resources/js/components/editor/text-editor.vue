<script>
import { VueEditor } from "vue2-editor";
export default {
  props: ["tender", "description"],
  components: { VueEditor },
  data() {
    return {
      inputData: null,
      preview: false
    };
  },
  created() {
    if (this.description) {
      this.$set(this, "inputData", this.description);
    }
  },
};
</script>

<style>
</style>