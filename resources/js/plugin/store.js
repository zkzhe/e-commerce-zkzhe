import Vue from "vue";

//Vuex
import Vuex from "vuex";

Vue.use(Vuex);

export default new Vuex.Store({
    state: {
        isLoggedIn: !!localStorage.getItem("token"),
        token: localStorage.getItem("token")
    },
    mutations: {
        LoginUser(state, data) {
            state.isLoggedIn = true;
            let token = data.accessToken;
            state.token = token;
            localStorage.setItem("token", token);
        },
        LogoutUser(state) {
            state.isLoggedIn = false;
            state.token = localStorage.removeItem("token");
        },
        tokenStored(state) {
            state.token = localStorage.getItem("token");
        }
    }
});

// this.$store.commit("LoginUser", response.data.info);
