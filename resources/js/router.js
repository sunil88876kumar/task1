import { createRouter, createWebHistory } from "vue-router";

const routes = [
    {
        path: "/",
        component: () => import("./pages/Index.vue"),
    },
];

export default createRouter({
    history: createWebHistory(),
    routes,
});
