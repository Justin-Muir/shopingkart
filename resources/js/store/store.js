import {defineStore} from 'pinia'
export const getDataStore = defineStore({
    id: 'store',
    state: () => ({
        lists: [],
        items:{}
    }),
})