<template>
    <div class="grid grid-cols-2 items-center justify-center gap-3 m-3 w-90 md:grid-cols-6">
        <!-- this section display all the shoping lists -->
        <section v-for="(list, index) in getData.lists" :key="index" class="flex">
            <router-link :to="{name:'ListItem', params:{id:list.listfor}}" class="flex items-center bg-blue-300 p-4 ml-5 w-44 h-20 space-x-1 
                rounded-lg shadow-md cursor-pointer hover:border-2 hover:border-green-500 duration-500 transition-500 overflow-ellipsis overflow-hidden">
                <p class="">{{list.listfor}}</p>
            </router-link>
            <div>
                <svg @click="deleteList(list.id)" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 text-red-800 duration-500 hover:size-8 cursor-pointer ">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                </svg>

                <svg @click="updateList(list.id, list.listfor)" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-4 mt-4 ml-2 cursor-pointer text-green-500 hover:size-6 duration-500 ">
                    <path d="M21.731 2.269a2.625 2.625 0 0 0-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 0 0 0-3.712ZM19.513 8.199l-3.712-3.712-12.15 12.15a5.25 5.25 0 0 0-1.32 2.214l-.8 2.685a.75.75 0 0 0 .933.933l2.685-.8a5.25 5.25 0 0 0 2.214-1.32L19.513 8.2Z" />
                </svg>

            </div>
        </section>
    </div>
</template>
<script>
    import axios from "axios"
    import {onMounted} from 'vue'
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
            
            getList()

            const deleteList = (list_id) => {
            axios.delete(`api/list/${list_id}`)
            .then(response => {
                if(response.status == 200) {
                    console.log('item deleted')
                    console.log(list_id)
                }
            })
            .catch (error => {
                console.log (error)
            })

        }
        const updateList = (list_id) => {
            axios.put(`/api/list/${list_id}`)

            .then(response => {
                if(response.status == 200) {
                    console.log('item updated')
                }
            })
            .catch (error => {
                console.log(error)
            })
        }

            return{
                getList,
                getData,
                deleteList,
                updateList,
            }
        },
    }
</script>