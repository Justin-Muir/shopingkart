<template>
    <div>
        <nav class="flex justify-between items-center border-b-4 border-green-100 mb-12">
            <div>
                <ul class=" text-lg text-blue-500 font-bold ml-3 mt-4 flex item-center gap-4 cursor-pointer">
                    <router-link :to="{name:'Home'}" name="Home">Home</router-link>
                    <router-link :to="{name:'CreateList'}" name="CreateList">CreateList</router-link>
                </ul>
            </div>
            <div>
                <button class="bg-green-500 text-white p-3 m-3 rounded-lg font-bold hover:text-blue-700 hover:bg-white duration-500 shadow-lg">Sign in</button>
                <button class="bg-green-500 text-white p-3 m-3 rounded-lg font-bold hover:text-blue-700 hover:bg-white duration-500 shadow-lg">Log out</button>
            </div>
        </nav>
    </div>
</template>
<script>
    import {useRouter} from 'vue-router'
export default {
    
}
</script>
