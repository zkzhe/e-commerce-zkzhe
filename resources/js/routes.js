import vue from "vue";

//Vue-Router
import VueRouter from "vue-router";

vue.use(VueRouter);

const home = () =>
    import("./pages/home.vue" /* webpackChunkName: "resource/js/pages/home" */);
const login = () =>
    import(
        "./pages/auth/login.vue" /* webpackChunkName: "resource/js/pages/auth/login" */
    );
const register = () =>
    import(
        "./pages/auth/register.vue" /* webpackChunkName: "resource/js/pages/auth/register" */
    );
// const CategoryList = () =>
//     import(
//         "./pages/category/List.vue" /* webpackChunkName: "resource/js/pages/category/list" */
//     );
// const CategoryCreate = () =>
//     import(
//         "./pages/category/Add.vue" /* webpackChunkName: "resource/js/pages/category/add" */
//     );
// const CategoryEdit = () =>
//     import(
//         "./pages/category/Edit.vue" /* webpackChunkName: "resource/js/pages/category/edit" */
//     );

const routes = [
    {
        name: "home",
        path: "/",
        component: home
    },
    {
        name: "login",
        path: "/auth/login",
        component: login
    },
    {
        name: "register",
        path: "/auth/register",
        component: register
    },
    // {
    //     name: "categoryList",
    //     path: "/category",
    //     component: CategoryList
    // },
    // {
    //     name: "categoryEdit",
    //     path: "/category/:id/edit",
    //     component: CategoryEdit
    // },
    // {
    //     name: "categoryAdd",
    //     path: "/category/add",
    //     component: CategoryCreate
    // }
];

const router = new VueRouter({
    mode: "history",
    routes: routes,
    beforeEnter: (to, from, next) => {
        // check if the route requires authentication and user is not logged in
        if (
            to.matched.some(route => route.meta.requiresAuth) &&
            !this.$store.state.isLoggedIn
        ) {
            // redirect to login page
            next({ name: "/auth/login" });
            return;
        }

        // if logged in redirect to dashboard
        if (to.path === "/auth/login" && this.$store.state.isLoggedIn) {
            next({ name: "dashboard" });
            return;
        }

        next();
    }
});

export default router;
