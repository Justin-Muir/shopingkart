<template>
    <div>
        
        <!-- this section is to display all the items in each list -->
        <section class="mt-12">
            <!-- this section is for the list update modal -->
            <div class="flex justify-center">
               <table class="w-4/5 rounded-lg">
                
                    <tr class="bg-gray-200 border-y-4 border-blue-400 rounded-2xl">
                        <th class=" w-1/3 text-left text-green-700 p-4 text-lg font-bold tracking-wider">Item Name</th>
                        <th class=" text-left text-green-700 p-4 text-lg font-bold tracking-wider">Item Price</th>
                        <th class=" text-left text-green-700 p-4 text-lg font-bold tracking-wider">Quantity</th>
                        <th class=" text-left text-green-700 p-4 text-lg font-bold tracking-wider">Item Total</th>
                        <th> </th>
                    </tr>
                
                    <tr class="" v-for="(item, index) in getData.items" :key="index" :class="index % 2===0 ? 'bg-green-200' : 'bg-white' ">
                        <td class="p-4 text-xl font-serif italic font-semibold " v-if="(item.list_for == list_for)">
                            {{item.Item_name}}  
                        </td>
                        <td class="p-4 text-xl font-serif italic font-semibold " v-if="(item.list_for == list_for)">
                            ${{item.price}} 
                        </td>
                        <td class="p-4 text-xl font-serif italic font-semibold " v-if="(item.list_for == list_for)">
                            {{item.quantity}}
                        </td>
                        <td class="p-4 text-xl font-serif italic font-semibold text-blue-800 " v-if="(item.list_for == list_for)">
                            {{item.itemTotal}}
                        </td>
                        <td class="flex justify-center content-center mt-6" v-if="(item.list_for == list_for)">
                            <svg @click="deleteItem(item.id)" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4 text-red-800 duration-500 hover:size-8 cursor-pointer">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                            </svg>
                            <svg @click="updateItem(item.id ,showModal='true') "  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-4 ml-2 cursor-pointer text-green-500 hover:size-6 duration-500 ">
                                <path d="M21.731 2.269a2.625 2.625 0 0 0-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 0 0 0-3.712ZM19.513 8.199l-3.712-3.712-12.15 12.15a5.25 5.25 0 0 0-1.32 2.214l-.8 2.685a.75.75 0 0 0 .933.933l2.685-.8a5.25 5.25 0 0 0 2.214-1.32L19.513 8.2Z" />
                            </svg>
                        </td>
                    </tr>
               </table> 
            </div>
        </section>
    </div>
</template>
<script>
import axios from "axios"
import {getDataStore} from "../store/store"
import {onMounted} from 'vue'
import {useRoute} from "vue-router";
export default{
    setup() {
        const getData = getDataStore()
        const route = useRoute()
        const list_for = route.params.id
        const items = []
        const listTotal = []
        const showModal = []

        const getItems = () => {
            axios.get(`/api/listitems/`)
            .then(response => {
                getData.items = response.data
                items.push(response.data)
            })
            .catch(error => {
                console.log(error)
            })
        }

        const getTotal = () => {
            axios.get(`/api/listTotal/${list_for}`)
            .then(response => {
                getData.listTotal = response.data
                listTotal.push(response.data)
                console.log(response.data)
            })
        }
        onMounted(() => {
            getItems()
            getTotal()
        })

            const deleteItem = (item_id) => {
                axios.delete(`/api/items/${item_id}`)
                .then(response => {
                    if (response == 200 ){
                        console.log('item deleted')
                    }
                })
                .catch(error => {
                    console.log(error)
                })
            }

            return{
                getItems,
                getData,
                list_for,
                listTotal,
                deleteItem,
                showModal,
                getTotal,
        }
    }
}
</script>