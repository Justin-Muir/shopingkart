<template>
    <div>
        <section class="mt-12">
            <div class="flex justify-center">
               <table class="w-4/5">
                
                    <tr class=" bg-gray-200 border-y-4 border-blue-400 rounded-2xl">
                        <th class=" text-left text-green-700 p-4 text-lg font-bold tracking-wider">Item Name</th>
                        <th class=" text-left text-green-700 p-4 text-lg font-bold tracking-wider">Item Price</th>
                        <th class=" text-left text-green-700 p-4 text-lg font-bold tracking-wider">Quantity</th>
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
                        <div class="flex" v-else>
                            there is no items in list
                        </div>
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

        const getItems = () => {
            axios.get('/api/listitems')
            .then(response => {
                getData.items = response.data
            })
            .catch(error => {
                console.log(error)
            })
            }
            onMounted(() => {
                getItems()
                const items = getData.items
                // list_for_items = items.list_for

            })
            return{
                getItems,
                getData,
                list_for,
                // items,
                // list_for_items
        }
    }
}
</script>