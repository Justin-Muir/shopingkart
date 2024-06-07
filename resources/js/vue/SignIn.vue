<template>
    <div>
        <section class=" flex justify-center">
            <div>
                <form @submit.prevent="handleSignin" class="border-t-4 border-b-4 border-blue-100 rounded-lg">
                    <div class="flex-col">
                        <div class="grid mt-4">
                            <input class="border-2 border-blue-300 bg-gray-100 rounded-lg w-80 p-2 shadow-lg" placeholder='username' id="username" type="email" v-model="user.email">
                        </div>
                    </div>
                    <div class="grid mt-5">
                        <input class="border-2 border-blue-300 bg-gray-100 rounded-lg w-80 p-2 shadow-lg" placeholder='password' id="password" type="password" v-model="user.password">
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
import axios from 'axios'
import { useRoute } from 'vue-router'
export default {
    Name: 'SignIn',
    setup() {
        const router = useRoute()
        
        const handleSignin = () => {
            console.log('working')
            axios.post('/login',{
                user: this.user,
            })
            router.push('/')
        }
        return{
            handleSignin,
            router
        }
    }

}
</script>