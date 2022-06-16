import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'

const routes = [
  {
    path: '/',
    name: 'home',
    component: HomeView
  },
  {
    path: '/about',
    name: 'about',
    // route level code-splitting
    // this generates a separate chunk (about.[hash].js) for this route
    // which is lazy-loaded when the route is visited.
    component: () => import(/* webpackChunkName: "about" */ '../views/AboutView.vue')
  },
  {
    path: '/signing',
    name: 'signing',
    component: () => import('../views/SigningView.vue')
  },
  {
    path: '/login',
    name: 'LoginPage',
    component: () => import('../views/LoginView.vue')
  },
  {
      path: '/post',
      name: 'PostView',
      component: () => import('../views/PostView.vue'),
      children:[
          {path: '/allpost', component: 'AllPostes'},
          {path: '/last' , component: 'LastPostes'}
        ],
  },
  {
    path: '/sitter',
    name: 'SitterView',
    component: () => import('../views/SitterView.vue')
  },
  {
    path: '/form',
    name: 'FormView',
    component: () => import('../views/FormView.vue')
  },
  {
    path: '/profile',
    name: 'ProfileView',
    component: () => import('../views/ProfileView.vue')
  },
  {
    path: '/allsitter',
    name: 'AllsittersView',
    component: ()=>import('../views/AllsittersView.vue')
  },
  {
    path: '/loginsitter',
    nema: 'LoginsitterView',
    component: ()=>import('../views/LoginsitterView.vue')
  },
  {
    path: '/siiterprofile',
    name: 'SitterProfile',
    component: ()=>import('../views/ProfilesitterView.vue')
  },
  {
    path: '/admin',
    name: 'AdminView',
    component: ()=>import('../views/AdminView.vue')
  },
  {
    path: '/siterpro/:id_sitter',
    name: 'SitterPro',
    component: ()=>import('../views/SitterprofileView.vue')
  }
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
