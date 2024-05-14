<template>
    <div>
        <h3 class="bg-green-100">welcome home</h3>
    </div>
</template>

<script>
import {ref, onMounted} from "vue"
import axios from "axios"

onMounted(async () => {
    const data = await axios.get("/api/user")
    console.log(data);
})
export default {
    // name: 'Home',

    
}
</script>