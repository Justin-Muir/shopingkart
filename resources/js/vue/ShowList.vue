<template>
    <div class="grid grid-cols-2 items-center justify-center gap-3 m-3 w-90 md:grid-cols-6">
        <div v-for="(list, index) in lists" :key="index" class="flex items-center bg-blue-300 p-4 ml-5 w-44 h-20 space-x-1 
            rounded-lg shadow-md cursor-pointer hover:border-2 hover:border-green-500 duration-500 overflow-ellipsis overflow-hidden">
                   <p class="">
                       {{list.listfor}}
                   </p>
        </div>
    </div>
</template>

<script>
    import ListItem from "./ListItem.vue"
    export default {
        props: ['lists'],
        components: {
            ListItem
    }
}
</script>