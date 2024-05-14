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
    </div>
</template>
<script>
import axios from 'axios'
import ShowList from './ShowList.vue'
export default {
    components: { ShowList },
    name: "CreateList",
    data: function() {
        return {
            list: {
                listfor: '',
                listdate: ''
            }
        }
    },
    methods: {
        createList() {
            if (this.list.listfor == "") {
                return
            }
            console.log(this.list.listfor)
            axios.post('api/list/store', {
                list: this.list,
            })
            .then(response => {
                if(response.status == 201) {
                    this.list.listfor = "",
                    this.list.listdate = ""
                }
            })
            .catch(error => {
                console.log(error)
            })
        }
    } 
}
</script>
