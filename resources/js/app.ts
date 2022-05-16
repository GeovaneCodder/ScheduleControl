import { createApp } from 'vue'
import router from './routes'
import i18n from './langs'
import Toast from 'vue-toastification'
import Default from '@/views/pages/default.vue'

const app = createApp(Default)

app.use(router)
  .use(Toast)
  .use(i18n)
  .mount('#app')
