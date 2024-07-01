import axios from 'axios'
import {defineStore} from 'pinia'
export const getDataStore = defineStore({
    id: 'store',
    state: () => ({
        lists: {},
        items:[],
        listTotal: 0,
        itemTotals:[],
        test:[1,2,3,4]

    }),
})