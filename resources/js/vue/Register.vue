<template>
    <div>
        <section class=" flex justify-center">
            <div>
                <form @submit.prevent="handleSignin" class="border-t-4 border-b-4 border-blue-100 rounded-lg">
                    <div class="flex-col">
                        <div class="grid mt-4">
                            <input class="border-2 border-blue-300 bg-gray-100 rounded-lg w-80 p-2 shadow-lg" placeholder='Username' id="username" type="email" v-model="user.username">
                        </div>
                    </div>
                    <div class="grid mt-5">
                        <input class="border-2 border-blue-300 bg-gray-100 rounded-lg w-80 p-2 shadow-lg" placeholder='Password' id="password" type="password" v-model="user.password">
                    </div>
                    <div class="grid mt-5">
                        <input class="border-2 border-blue-300 bg-gray-100 rounded-lg w-80 p-2 shadow-lg" placeholder='Confirm Password' id="password" type="password" v-model="user.confirm_password">
                    </div>
                    <div>
                        <button type="submit" class="bg-green-500 text-white p-3 m-3 rounded-lg font-bold hover:text-blue-700 hover:bg-white duration-500 shadow-lg">SIGN IN</button>
                    </div>
                </form>
            </div>
        </section>
    </div>
</template>

<script>
import {ref} from 'vue'
export default {
    Name: 'Register',
    setup(){
        const user =ref({
            username: '',
            password: '',
            confirm_password: ''
            
        })
    }
}

</script>