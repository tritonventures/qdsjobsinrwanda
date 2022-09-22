require("./bootstrap");

window.Vue = require("vue");
import multiselect from "./components/multiselect.vue";
import customSelect from "./components/custom-select.vue";
import textEditor from "./components/editor/text-editor.vue";
import formFileFormatter from "./components/formatters/form-file-formatter.vue";
import recentJobs from "./components/recent/jobs.vue";
import recentInternships from "./components/recent/internships.vue";
import recentTenders from "./components/recent/tenders.vue";
import educationHelper from "./components/helpers/education-helper.vue";
import experienceHelper from "./components/helpers/experience-helper.vue";
import customSelectHelper from "./components/helpers/custom-select-helper.vue";
import { BootstrapVue, IconsPlugin } from "bootstrap-vue";
import "./prototypes";

import axios from "axios";
import VueAxios from "vue-axios";
import Vue from "vue";

Vue.component("multi-select", multiselect);
Vue.component("custom-select", customSelect);
Vue.component("recent-tenders", recentTenders);
Vue.component("recent-jobs", recentJobs);
Vue.component("recent-internships", recentInternships);
Vue.component("text-editor", textEditor);
Vue.component("file-formatter", formFileFormatter);
Vue.component("education-helper", educationHelper);
Vue.component("experience-helper", experienceHelper);
Vue.component("custom-select-helper", customSelectHelper);

Vue.use(BootstrapVue);
Vue.use(IconsPlugin);
Vue.use(VueAxios, axios);

const app = new Vue({
    el: "#app"
});
