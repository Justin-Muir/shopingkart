import {createMemoryHistory, createRouter} from "vue-router"
import Home from "../vue/Home.vue"
import CreateList from "../vue/CreateList.vue"
const routes = [
    {
        path: '/',
        name: 'Home',
        component: Home
    },

    {
        path: '/createlist',
        name: 'CreateList',
        component: CreateList
    }
]

const router = createRouter({
    history: createMemoryHistory(),
    routes
})

export default router