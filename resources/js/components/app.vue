<template lang="">
    <div class="bg-gray-100">

    <nav-bar/>
    <router-view/>
    <show-list :lists="lists"/>
    </div>
</template>
<script>
import ShowList from '../vue/ShowList.vue'
import CreateList from '../vue/CreateList.vue';
import Home from '../vue/Home.vue';
import NavBar from '../vue/NavBar.vue';
import axios from 'axios'
export default {
    components:{
        CreateList,
        ShowList,
        Home,
        NavBar
    },
    data: function () {
        return {
            lists: []
        }
    },
    methods: {
        getList () {
            axios.get('api/ShopingLists')
            .then( response => {
                this.lists = response.data
            })
            .catch(error => {
                console.log(error)
            })
        }
    },
    created() {
        this.getList()
    }
}
</script>