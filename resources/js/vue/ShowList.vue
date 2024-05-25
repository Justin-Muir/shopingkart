<template>
    <div class="grid grid-cols-2 items-center justify-center gap-3 m-3 w-90 md:grid-cols-6">
            <router-link v-for="(list, index) in getData.lists" :key="index" :to="{name:'ListItem', params:{id:list.listfor}}" class="flex items-center bg-blue-300 p-4 ml-5 w-44 h-20 space-x-1 
                rounded-lg shadow-md cursor-pointer hover:border-2 hover:border-green-500 duration-500 transition-500 overflow-ellipsis overflow-hidden">
                <p class="">{{list.listfor}}</p>
            </router-link>
    </div>
</template>

<script>
    import axios from "axios"
    import {ref, onMounted,onBeforeMount} from 'vue'
    import ListItem from "./ListItem.vue"
    import { getDataStore } from "../store/store"
    export default {
        setup(){
            const getData = getDataStore()

            const getList = () => {
                axios.get('api/ShopingLists')
                .then( response => {
                getData.lists = response.data
                })
                .catch(error => {
                    console.log(error)
                })
            }
            
            onMounted(() => {
                getList()
            })
            return{
                getList,
                getData

            }
        },
    }
</script>