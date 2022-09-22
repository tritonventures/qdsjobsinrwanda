<script>
export default {
  props: ["selected"],
  data() {
    return {
      experiences: [],
    };
  },
  mounted() {
    if (this.selected == []) {
      this.addExperience();
    } else {
      this.setSelectedData(JSON.parse(this.selected));
    }
  },
  methods: {
    addExperience() {
      this.experiences.push({
        id: new Date(),
        company: null,
        position: null,
        start_date: null,
        end_date: null,
        isNew: true,
      });
    },
    removeExperience(id) {
      this.$set(
        this,
        "experiences",
        this.experiences.filter((exp) => exp.id != id)
      );
    },
    setSelectedData(data) {
      data.forEach((exp) => {
        this.experiences.push({
          id: exp.id,
          company: exp.company,
          position: exp.position,
          start_date: exp.start_date,
          end_date: exp.end_date,
          isNew: false,
        });
      });
    },
  },
};
</script>

<style>
</style>