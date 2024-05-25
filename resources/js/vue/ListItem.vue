<template>
    <div>
        <section class="ml-6 mr-6 grid justify-center border-t-4 border-b-4 md:border-none border-blue-300 rounded-lg" >
            <form action="" class="md:flex gap-4">
                <div class="flex-col">
                    <div class="grid mt-4">
                        <label for="item_name">Item Name</label>
                        <input class="border-2 border-blue-300 bg-gray-100 rounded-lg w-80 p-2 shadow-lg shadow-green-300/50" id="Item_name" type="text">
                    </div>
                </div>
                <div class="flex-col">
                    <div class="grid mt-4">
                        <label for="">price</label>
                        <input class="border-2 border-blue-300 bg-gray-100 rounded-lg w-80 p-2 shadow-lg shadow-green-300/50" id="price" type="decimal">
                    </div>
                </div>
                <div class="flex-col">
                    <div class="grid mt-4">
                        <label for="Quantity">Quantity</label>
                        <input class="border-2 border-blue-300 bg-gray-100 rounded-lg w-80 p-2 shadow-lg shadow-green-300/50" id="Quantity" type="integer">
                    </div>
                </div>
                <div class="flex-col">
                    <div class="grid mt-4 mb-4">
                        <label for="list for">Plus GCT</label>
                        <input class="border-2 border-blue-300 bg-gray-100 rounded-lg  p-2" id="plus_gct" type="checkbox">
                    </div>
                </div>
                <div class="flex justify-center">
                    <button class="bg-green-500 text-white p-3 m-3 rounded-lg font-bold hover:text-blue-700 hover:bg-white duration-500 shadow-lg">ADD ITEM</button>
                </div>
            </form>
        </section>

        <section>
            
        </section>
    </div>
</template>

<script>
import { getDataStore } from '../store/store'
export default {
    name: 'listItem',
    data: function() {
        return {
            item: {
                item_name: '',
                price: '',
                quantity: '',
                plus_gct: ''
            }
        }
    },
    setup(){
        const getData = getDataStore()

        return{
            getData
        }
    },
    methods: {
        addItems() {
            if (this.item.item_name == "") {
                return
            }
            axios.post('api/items/store/{list.itemfor}')
        }
    }


}
</script>