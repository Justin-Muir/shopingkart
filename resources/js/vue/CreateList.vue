<template >
    <div>
        <section class=" flex justify-center mb-10">
            <div>
                <form @submit.prevent="createList" class="border-t-4 border-b-4 border-blue-100 rounded-lg">
                    <div class="flex-col">
                        <div class="grid mt-4">
                            <input class="border-2 border-blue-300 bg-gray-100 rounded-lg w-80 p-2 shadow-lg" placeholder='LIST FOR' v-model="list.listfor" id="listfor" type="text">
                        </div>
                    </div>
                    <div class="grid mt-5">
                        <label class="text-green-500 font-bold font-weight-bolder text-xl" for="listdate">list date</label>
                        <input class="border-2 border-blue-300 bg-gray-100 rounded-lg w-80 p-2 shadow-lg" v-model="list.listdate" id="listdate" type="date">
                    </div>
                    <div>
                        <button class="bg-green-500 text-white p-3 m-3 rounded-lg font-bold hover:text-blue-700 hover:bg-white duration-500 shadow-lg">SAVE</button>
                    </div>
                </form>
            </div>
        </section>
        <show-list/>
    </div>
</template>
<script>
import {ref} from 'vue'
import axios from 'axios'
import ShowList from './ShowList.vue'
import {getDataStore} from '../store/store'
export default {
    components: { ShowList },
    name: "CreateList",
    setup(){
        const getData = getDataStore()
        const list = ref({
            listfor: '',
            listdate: '' 
        })

       function createList() {
            if (listfor.value == "") {
                return
            }
            axios.post('api/list/store', {
               list:list.value
            })
            .then(response => {
                if(response.status == 201) {
                    listfor.value = "",
                    listdate.value = ""
                }
            })
            .catch(error => {
                console.log(error)
            })
        }
        return{
            getData,
            listfor: list.value.listfor,
            listdate: list.value.listdate,
            createList,
            list
        }
    },
}
</script>
