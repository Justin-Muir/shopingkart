<template lang="">
    <div>

    <nav-bar/>
    <router-view/>
    
    </div>
</template>
<script>
import CreateList from '../vue/CreateList.vue';
import Home from '../vue/Home.vue';
import NavBar from '../vue/NavBar.vue';
export default {
    components:{
        CreateList,
        Home,
        NavBar
    }
}
</script>