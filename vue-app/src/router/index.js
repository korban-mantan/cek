import { createRouter, createWebHistory } from "vue-router";

const routes= [
    {
        path: '/',
        name: 'poll.index',
        component: () => import("../views/poll/Index.vue")

    },
    {
        path: '/create',
        name: 'poll.create',
        component: () => import("../views/poll/Create.vue")

    },
    {
        path: '/edit/:id',
        name: 'poll.edit',
        component: () => import("../views/poll/Edit.vue")

    },
]

const router = createRouter({
    history: createWebHistory(),
    routes
})

export default router;