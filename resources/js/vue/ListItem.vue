<template>
    <div>
        <div class="  flex justify-center content-center mb-4  ">
           <h1 class="max-w-1/2 border-b-4 border-green-200 
                text-3xl italic font-bold font-serif tracking-wider text-blue-700 h-14 rounded-lg ">
                {{ list_for }}
            </h1> 
            <h1 class="ml-8 text-green-600 text-lg font-simibold tracking-wider font-serif border-b-2 h-6 border-green-300 rounded-lg bg-gray-100 shadow-sm shadow-green-300/50">
                TOTAL ${{getData.total}}{{ getData.items }}
            </h1>
        </div>
        <section class="ml-6 mr-6 grid justify-center border-t-4 md:border-none border-blue-300 rounded-lg" >
            
            <form @submit.prevent="addItems" action="" class="md:flex gap-4">
                <div class="flex-col">
                    <div class="grid mt-4">
                        <label class=" font-mono tracking-wide font-semibold text-lg  " for="item_name">Item Name</label>
                        <input class="border-2 border-blue-300 bg-gray-100 rounded-lg w-80 p-2 shadow-lg shadow-green-300/50" v-model="item.item_name" id="Item_name" type="text">
                    </div>
                </div>
                <div class="flex-col">
                    <div class="grid mt-4">
                        <label class=" font-mono tracking-wide font-semibold text-lg  " for="">price</label>
                        <input class="border-2 border-blue-300 bg-gray-100 rounded-lg w-80 p-2 shadow-lg shadow-green-300/50" v-model="item.price" id="price" type="decimal">
                    </div>
                </div>
                <div class="flex-col">
                    <div class="grid mt-4">
                        <label class=" font-mono tracking-wide font-semibold text-lg " for="Quantity">Quantity</label>
                        <input class="border-2 border-blue-300 bg-gray-100 rounded-lg w-80 p-2 shadow-lg shadow-green-300/50" v-model="item.quantity" id="Quantity" type="integer">
                    </div>
                </div>
                <div class="flex-col">
                    <div class="md:grid flex mt-4 mb-4">
                        <label class=" font-mono tracking-wide font-semibold text-lg  " for="list for">Plus GCT</label>
                        <input class=" ring-2  shadow-lg shadow-green-300/50 ring-inset ring-offset-2  ring-blue-300 size-8 md:mt-2 ml-6 p-2" v-model="item.plus_gct" id="plus_gct" type="checkbox">
                    </div>
                </div>
                <div class="flex justify-center">
                    <button class="bg-green-500 text-white p-3 m-3 rounded-lg font-bold hover:text-blue-700 hover:bg-white duration-500 shadow-lg">ADD ITEM</button>
                </div>
            </form>
        </section>
        <!-- components to display list of items -->
        <show-item/>
    </div>
</template>

<script>
import {useRoute} from 'vue-router'
import {ref} from 'vue'
import axios from 'axios'
import {onMounted,onUnmounted} from 'vue'

// import {created} from 'vue'
import { getDataStore } from '../store/store'
import ShowItem from './ShowItem.vue'

export default {
    components: {ShowItem},
    name:'ListItem',
    setup(){
        const route = useRoute()
        const list_for = route.params.id
        const getData = getDataStore()
        const storedItem = getData.items
        const GCT = 15
        const item = ref({
            item_name: '',
            price: '',
            quantity: '',
            plus_gct: '',
            itemTotal: '',
            itemSubTotal: '',
            itemGCT: '',
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
            if (item.value.quantity !== ''){
                item.value.itemTotal = item.value.quantity * item.value.price

                if(item.value.plus_gct == 1){
                    item.value.itemGCT = (GCT / 100) * item.value.price
                    item.value.itemSubTotal = Number(item.value.itemGCT) + Number(item.value.price)
                    item.value.itemTotal = (item.value.quantity) * item.value.itemSubTotal
                    
                }
            }
        }

        const findTotal = () =>{ 
            console.log(storedItem.value)
            // storedItem.value.forEach(item => {
            //     this.itemTotals.push(item.itemTotal)
            // })
            // console.log(this.itemTotals) 
            // this.listTotal = this.test.reduce((acc,curr) => acc+curr)   
            // console.log(this.listTotal)
        } 

        onMounted(() => {
            findTotal()
            console.log('list item')
        })

        return{
            getData,
            list_for,
            item,
            addItems,
        }
    }
}
</script>