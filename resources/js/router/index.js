import { createRouter, createWebHistory } from 'vue-router'


const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [

    {
      path: '/',
      name: 'main',
      component: () => import('../views/Main/Index.vue')
    },
    {
      path: '/products',
      name: 'products.index',
      component: () => import('../views/Product/Index.vue')
    },
    {
      path: '/products/:id',
      name: 'products.show',
      component: () => import('../views/Product/Show.vue')
    },
    {
      path: '/cart',
      name: 'cart.index',
      component: () => import('../views/Cart/Index.vue')
    },
  ]
})

export default router
