import {createWebHistory, createRouter} from "vue-router"
import CreateList from "../vue/CreateList.vue"
import SignIn from "../vue/SignIn.vue"
const routes = [

    {
        path: '/',
        name: 'CreateList',
        component: CreateList
    },

    {
        path: '/signin',
        name: 'SignIn',
        component: SignIn,
    }
]

const router = createRouter({
    history: createWebHistory(),
    routes
})

export default router