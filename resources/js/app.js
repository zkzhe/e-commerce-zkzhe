/* eslint-disable no-undef */
require("./bootstrap");

//Kernel
import Vue from "vue";

//Routes
import Routes from "./routes";

//Plugin
import Store from "./plugin/store";
import "./plugin/axios";
import "./plugin/bootstrapvue";
import "./plugin/sweetalert2";
import "./plugin/loading";

//Main
import App from "./pages/app.vue";

window.Vue = Vue;
// eslint-disable-next-line no-unused-vars
const app = new Vue({
    el: "#app",
    store: Store,
    router: Routes,
    render: h => h(App)
});
