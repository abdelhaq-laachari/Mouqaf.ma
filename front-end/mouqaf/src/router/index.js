import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'
import SignUp from '../views/SignUp.vue'
import SignInClient from '../views/client/SignInClient.vue'
import SignInWorker from '../views/worker/SignInWorker.vue'
import ServiceView from '../views/ServiceView.vue'
import PostView from '../views/client/PostView.vue'
import ProfileClient from '../views/client/ProfileClient.vue'
import HomeClient from '../views/client/HomeClient.vue'
import CreatePost from '../views/client/CreatePost.vue'
import ReadComment from '../views/client/ReadComment.vue'
import HomeWorker from '../views/worker/HomeWorker.vue'
import ProfileWorker from '../views/worker/ProfileWorker.vue'
import AppliedView from '../views/worker/AppliedView.vue'
import ApplyJob from '../views/worker/ApplyJob.vue'

const routes = [
  {
    path: '/',
    name: 'home',
    component: HomeView
  },
  {
    path: '/SignInClient',
    name: 'SignInClient',
    component: SignInClient
  },
  {
    path: '/SignInWorker',
    name: 'SignInWorker',
    component: SignInWorker
  },
  {
    path: '/signup',
    name: 'signup',
    component: SignUp
  },
  {
    path: '/service',
    name: 'service',
    component: ServiceView
  },
  {
    path: '/post',
    name: 'post',
    component: PostView
  },
  {
    path: '/profile',
    name: 'profile',
    component: ProfileClient
  },
  {
    path: '/home',
    name: 'homeClient',
    component: HomeClient
  },
  {
    path: '/CreatePost',
    name: 'CreatePost',
    component: CreatePost
  },
  {
    path: '/comment',
    name: 'comment',
    component: ReadComment
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
    path: '/HomeWorker',
    name: 'homeWork',
    component: HomeWorker
  },
  {
    path: '/ProfileWorker',
    name: 'ProfileWorker',
    component: ProfileWorker
  },
  {
    path: '/applied',
    name: 'applied',
    component: AppliedView
  },
  {
    path: '/apply',
    name: 'apply',
    component: ApplyJob
  },
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
