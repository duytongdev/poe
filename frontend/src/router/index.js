import { createRouter, createWebHistory } from 'vue-router'
import routes from './routes'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes
})

// const authStore = useAuthStore()

// router.beforeEach((to, from, next) => {
//   if (to.meta.requiresAuth && !authStore.token) {
//     next({ name: 'login' })
//   } else if (to.meta.requiresGuest && authStore.token) {
//     next({ name: 'admin.dashboard' })
//   } else {
//     next()
//   }
// })

router.afterEach((route) => {
  document.title = route.meta.title
})

export default router
