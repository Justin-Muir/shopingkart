<template lang="">
    <div class="bg-gray-100">

    <nav-bar/>
    <router-view/>
    </div>
</template>
<script>
import ShowList from '../vue/ShowList.vue'
import CreateList from '../vue/CreateList.vue';
import Home from '../vue/Home.vue';
import NavBar from '../vue/NavBar.vue';
export default {
    components:{
        CreateList,
        ShowList,
        Home,
        NavBar
    },
}
</script>