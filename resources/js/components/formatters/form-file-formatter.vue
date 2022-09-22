
<script>
export default {
  data() {
    return {
      file: null,
      fileData: null,
    };
  },
  watch: {
    file(file) {
      if (file && file.type) {
        const reader = new FileReader();
        reader.readAsDataURL(file);
        reader.onloadend = () => this.$set(this, "fileData", reader.result);
      }
    },
  },
};
</script>

<style>
</style>