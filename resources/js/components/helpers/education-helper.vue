<script>
export default {
  props: ["selected"],
  data() {
    return {
      educations: [],
    };
  },
  mounted() {
    if (this.selected == []) {
      this.addEducation();
    } else {
      this.setSelectedData(JSON.parse(this.selected));
    }
  },
  methods: {
    addEducation() {
      this.educations.push({
        id: new Date(),
        educationId: null,
        schoolName: null,
        startDate: new Date(),
        endDate: null,
      });
    },
    removeEducation(id) {
      if (this.educations.length < 1) return;
      this.$set(
        this,
        "educations",
        this.educations.filter((ed) => ed.id != id)
      );
    },
    setSelectedData(data) {
      data.forEach((ed) => {
        this.educations.push({
          id: new Date(),
          educationId: ed.id,
          educationName: ed.name,
          schoolName: ed.pivot.school_name,
          startDate: ed.pivot.start_date,
          endDate: ed.pivot.end_date,
        });
      });
    },
  },
};
</script>

<style>
</style>