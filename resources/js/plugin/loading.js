import Vue from "vue";

//Vue-Loading
import Loading from "vue-loading-overlay";

Vue.use(Loading, {
    loader: "bars",
    color: "#4287f5",
    width: 100,
    height: 100,
    zIndex: 1050
});
