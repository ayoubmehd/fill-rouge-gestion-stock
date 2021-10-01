// import Login from "../views/Login.vue";
// import Register from "../views/Register.vue";
// import Home from "../views/Home.vue";

const routes = [
    // path: "/post/:id",
    // name: "SinglePost",
    // component: SinglePost,
    // meta: {
    //     login: true,
    // },
    {
        path: "/admin",
        name: "Dashboard",
        component: () => import('../views/admin/Dashboard.vue'),
    },
    {
        path: "/admin/orders",
        name: "Orders",
        component: () => import('../views/admin/Orders.vue'),
        // meta: {
        //     login: true,
        // },
    },
    {
        path: "/admin/users",
        name: "Users",
        component: () => import('../views/admin/Users.vue'),
        // meta: {
        //     login: true,
        // },
    },
    {
        path: "/admin/products",
        name: "Products",
        component: () => import('../views/admin/Products.vue'),
        // meta: {
        //     login: true,
        // },
    },

];

export default routes;