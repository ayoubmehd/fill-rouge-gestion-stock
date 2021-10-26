// import Login from "../views/Login.vue";
// import Register from "../views/Register.vue";
// import Home from "../views/Home.vue";

const routes = [
    {
        path: "/:any/pannel",
        name: "Commandes",
        component: () => import("../components/Commandes.vue")
    }
];

export default routes;