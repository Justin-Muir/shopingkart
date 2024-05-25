// import './bootstrap';

import { createApp } from "vue";
import App from "./components/app.vue";
import router from "./router/index.js"
import {createPinia} from 'pinia'

const pinia = createPinia()
const app = createApp({
    components: {
        App,
    }
})
app.use(pinia)
app.use(router)
app.mount("#app")
