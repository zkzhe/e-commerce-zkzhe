import Vue from "vue";

//Axios
import VueAxios from "vue-axios";
import Axios from "axios";

const axios = Axios.create({
    // baseURL: "http://127.0.0.1:8000/api/auth/register"
});
Vue.use(VueAxios, axios);
