import { createApp, markRaw } from 'vue'
import { createPinia } from 'pinia'
import App from './App.vue'
import router from './router'
import './index.css'
import VueAwesomePaginate from "vue-awesome-paginate";
import "vue-awesome-paginate/dist/style.css";

const app = createApp(App)
const pinia = createPinia()

app.use(
    pinia.use(({ store }) => {
        store.router = markRaw(router)
    }),
)
app.use(router).use(VueAwesomePaginate)
app.mount('#app')
