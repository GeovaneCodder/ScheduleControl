import { createRouter, createWebHistory, RouterOptions, RouteRecordRaw } from 'vue-router'

const routes: Array<RouteRecordRaw> = [
  {
    path: '/auth/login',
    name: 'login',
    component: () => import('@/views/pages/auth/login.vue'),
  },
]

const router = createRouter(<RouterOptions>{
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
