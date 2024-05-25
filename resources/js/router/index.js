import {createWebHistory, createRouter} from "vue-router"
import CreateList from "../vue/CreateList.vue"
import SignIn from "../vue/SignIn.vue"
import ListItem from '../vue/ListItem.vue'
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
    },

    {
        path: '/listitem/:id',
        name: 'ListItem',
        component: ListItem
    }
]

const router = createRouter({
    history: createWebHistory(),
    routes
})

export default router