<template>
    <div>
        <nav class="flex justify-between items-center border-b-4 border-green-100 mb-12">
            <div>
                <ul class=" text-3xl text-blue-500 font-bold ml-3 mt-4 p-2 flex item-center gap-4 cursor-pointer rounded-lg transition duration-500 ease-in-out hover:border-2 hover:bg-green-300 hover:border-green-400 hover:text-white">
                    <router-link :to="{name:'CreateList'}" name="CreateList">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                        </svg>
                    </router-link>
                </ul>
            </div>
            <div>
                <router-link :to="{name: 'SignIn'}">
                    <button class="bg-green-500 text-white p-3 m-3 rounded-lg font-bold hover:text-blue-700 hover:bg-white duration-1000 shadow-lg">Sign in</button>
                </router-link>

                <router-link :to="{name: 'Register'}">
                    <button class="bg-green-500 text-white p-3 m-3 rounded-lg font-bold hover:text-blue-700 hover:bg-white duration-1000 shadow-lg">Register</button>
                </router-link>
                
                <button class="bg-green-500 text-white p-3 m-3 rounded-lg font-bold hover:text-blue-700 hover:bg-white duration-1000 shadow-lg">Log out</button>
            </div>
        </nav>
    </div>
</template>
<script>
export default {
    
}
</script>
