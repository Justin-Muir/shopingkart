<template>
    <div>
        <div class="  flex justify-center mb-4  ">
           <h1 class="max-w-1/2 shadow-lg text-5xl italic font-bold font-serif tracking-wider text-blue-700 shadow-green-300/50 h-16 rounded-lg ">
            {{ list_for }}
           </h1> 
        </div>
        <section class="ml-6 mr-6 grid justify-center border-t-4 border-b-4 md:border-none border-blue-300 rounded-lg" >
            
            <form @submit.prevent="addItems" action="" class="md:flex gap-4">
                <div class="flex-col">
                    <div class="grid mt-4">
                        <label for="item_name">Item Name</label>
                        <input class="border-2 border-blue-300 bg-gray-100 rounded-lg w-80 p-2 shadow-lg shadow-green-300/50" v-model="item.item_name" id="Item_name" type="text">
                    </div>
                </div>
                <div class="flex-col">
                    <div class="grid mt-4">
                        <label for="">price</label>
                        <input class="border-2 border-blue-300 bg-gray-100 rounded-lg w-80 p-2 shadow-lg shadow-green-300/50" v-model="item.price" id="price" type="decimal">
                    </div>
                </div>
                <div class="flex-col">
                    <div class="grid mt-4">
                        <label for="Quantity">Quantity</label>
                        <input class="border-2 border-blue-300 bg-gray-100 rounded-lg w-80 p-2 shadow-lg shadow-green-300/50" v-model="item.quantity" id="Quantity" type="integer">
                    </div>
                </div>
                <div class="flex-col">
                    <div class="grid mt-4 mb-4">
                        <label for="list for">Plus GCT</label>
                        <input class="border-2 border-blue-300 bg-gray-100 rounded-lg  p-2" v-model="item.plus_gct" id="plus_gct" type="checkbox">
                    </div>
                </div>
                <div class="flex justify-center">
                    <button class="bg-green-500 text-white p-3 m-3 rounded-lg font-bold hover:text-blue-700 hover:bg-white duration-500 shadow-lg">ADD ITEM</button>
                </div>
            </form>
        <show-item/>
        </section>
    </div>
</template>

<script>
import { getDataStore } from '../store/store'
import {useRoute} from 'vue-router'
import {ref} from 'vue'
import axios from 'axios'
import ShowItem from './ShowItem.vue';
export default {
    components: {ShowItem},
    name:'ListItem',
    setup(){
        const route = useRoute()
        const list_for = route.params.id
        const getData = getDataStore()
        const item = ref({
            item_name: '',
            price: '',
            quantity: '',
            plus_gct: '',
            list_for: list_for
        })

        const addItems = () => {
            if (item.item_name == "") {
                return
            }
            axios.post(`/api/items/store/${list_for}`, {
                item:item.value,
            })

            .then(response => {
                if(response.status == 201) {
                    item.value = ''
                }
            })
            .catch(error => {
                console.log(error)
            })
        }

        return{
            getData,
            list_for,
            item,
            addItems,
        }
    }
}
</script>