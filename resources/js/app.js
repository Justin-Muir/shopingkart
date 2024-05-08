// import './bootstrap';

import { createApp } from "vue";
import App from "./components/app.vue";
import router from "./router/index.js"
const app = createApp({
    components: {
        App,
    }
})
app.use(router)
app.mount("#app")
