<template>
    <div>
        <section v-if="showModal='true'" class="bg-gray-300 h-1/2 w-1/2 index-1 hidden">
                <form v-for="(item,index) in getData.items" :key='index' @submit.prevent="addItems" action="" class="grid  gap-4">
                    <div class="flex-col">
                        <div class="grid mt-4">
                            <label class=" font-mono tracking-wide font-semibold text-lg" for="item_name">Item Name</label>
                            <input class="border-2 border-blue-300 bg-gray-100 rounded-lg w-80 p-2 shadow-lg shadow-green-300/50" v-model="item.item_name"  id="Item_name" type="text">
                        </div>
                    </div>
                    <div class="flex-col">
                        <div class="grid mt-4">
                            <label class=" font-mono tracking-wide font-semibold text-lg" for="">price</label>
                            <input class="border-2 border-blue-300 bg-gray-100 rounded-lg w-80 p-2 shadow-lg shadow-green-300/50" v-model="item.price" id="price" type="decimal">
                        </div>
                    </div>
                    <div class="flex-col">
                        <div class="grid mt-4">
                            <label class=" font-mono tracking-wide font-semibold text-lg" for="Quantity">Quantity</label>
                            <input class="border-2 border-blue-300 bg-gray-100 rounded-lg w-80 p-2 shadow-lg shadow-green-300/50" v-model="item.quantity" id="Quantity" type="integer">
                        </div>
                    </div>
                    <div class="flex-col">
                        <div class="md:grid flex mt-4 mb-4">
                            <label class=" font-mono tracking-wide font-semibold text-lg" for="list for">Plus GCT</label>
                            <input class=" ring-2  shadow-lg shadow-green-300/50 ring-inset ring-offset-2  ring-blue-300 size-8 md:mt-2 ml-6 p-2" v-model="item.plus_gct"  id="plus_gct" type="checkbox">
                        </div>
                    </div>
                    <div class="flex justify-center">
                        <button class="bg-green-500 text-white p-3 m-3 rounded-lg font-bold hover:text-blue-700 hover:bg-white duration-500 shadow-lg">UPDATE ITEM</button>
                    </div>
                </form>
            </section>
    </div>
</template>

<script>
import {getDataStore} from '../store/store'
import {ref} from 'vue'

export default{
    setup() {
        const getData = getDataStore()
        const item = ref({
            item_name: '',
            price: '',
            quantity: '',
            plus_gct: '',
        })

        const updateItem = (ltem_id) => {
               showModal.push('true')
                console.log('update')
                console.log(showModal)
                axios.put(`/api/items/${ltem_id}`)
                .then(response => {
                    if (response == 200){
                    }
                })
            }

        return{
            updateItem,
            item,
            getData

        }
    }
}
</script>