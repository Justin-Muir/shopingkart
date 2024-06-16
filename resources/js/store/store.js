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

    actions:{

        findTotal(){
            this.items.forEach(item => {
                this.itemTotals.push(item.itemTotal)
            })
            console.log(this.itemTotals) 
            this.listTotal = this.test.reduce((acc,curr) => acc+curr)   
            console.log(this.listTotal)
        } 
    }
})