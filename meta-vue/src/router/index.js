import { createRouter, createWebHistory } from 'vue-router'
import Home from '../views/Home.vue'
import Category from "@/views/Category";
import Product from "@/views/Product";

const routes = [
  {
    path: '/product',
    name: 'Product',
    component: Product
  },
  {
    path: '/category',
    name: 'Category',
    component: Category
  },
  {
    path: '/',
    name: 'Home',
    component: Home
  }
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
