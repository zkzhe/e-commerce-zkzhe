require("./bootstrap");

//Kernel
import vue from "vue";

//Routes
import VueRouter from "vue-router";
import { routes } from "./routes";

//Axios
import VueAxios from "vue-axios";
import axios from "axios";

//Boostrap-vue.js
import { BootstrapVue, IconsPlugin } from "bootstrap-vue";
import "bootstrap/dist/css/bootstrap.css";
import "bootstrap-vue/dist/bootstrap-vue.css";

//Sweetalert2
import VueSweetalert2 from "vue-sweetalert2";
import "sweetalert2/dist/sweetalert2.min.css";
//Main
import App from "./components/App.vue";

//Call Vue.js And Use
window.Vue = vue;
Vue.use(VueRouter);
Vue.use(VueAxios, axios);
Vue.use(BootstrapVue, IconsPlugin);
Vue.use(VueSweetalert2);

const router = new VueRouter({
    mode: "history",
    routes: routes
});

const app = new Vue({
    el: "#app",
    router: router,
    render: h => h(App)
});
