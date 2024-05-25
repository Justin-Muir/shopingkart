import {defineStore} from 'pinia'
// import axios from 'axios'
// import {ref} from 'vue'
export const getDataStore = defineStore({
    id: 'store',
    state: () => ({
        lists: [],

        items:{
            listdate: '',
            item_name: '',
            price: '',
            quantity: '',
            plus_gct: '',
            listfor: '',
        },
    }),
})