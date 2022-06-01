import { createRouter, createWebHistory } from 'vue-router'
// interface website
import HomeView from '../views/HomeView.vue'
import ServiceView from '../views/ServiceView.vue'
import SignUp from '../views/SignUp.vue'
// client section
import HomeClient from '../views/client/HomeClient.vue'
import SignInClient from '../views/client/SignInClient.vue'
import PostView from '../views/client/PostView.vue'
import CreatePost from '../views/client/CreatePost.vue'
import ReadComment from '../views/client/ReadComment.vue'
import ProfileClient from '../views/client/ProfileClient.vue'
// Worker section
import SignInWorker from '../views/worker/SignInWorker.vue'
import HomeWorker from '../views/worker/HomeWorker.vue'
import ProfileWorker from '../views/worker/ProfileWorker.vue'
import AppliedView from '../views/worker/AppliedView.vue'
import ApplyJob from '../views/worker/ApplyJob.vue'
// admin section
import AuthAdmin from '../views/admin/AuthAdmin.vue'
import AdminDashboard from '../views/admin/DashboardView.vue'

const routes = [
  // website website 
  {
    path: '/',
    name: 'home',
    component: HomeView
  },
  {
    path: '/service',
    name: 'service',
    component: ServiceView
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
    path: '/signup',
    name: 'signup',
    component: SignUp
  },
  // client section
  {
    path: '/SignInClient',
    name: 'SignInClient',
    component: SignInClient
  },
  {
    path: '/home',
    name: 'HomeClient',
    props: true,
    component: HomeClient
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
    path: '/CreatePost',
    name: 'CreatePost',
    component: CreatePost
  },
  {
    path: '/comment',
    name: 'comment',
    props: true,
    component: ReadComment
  },
  // worker section
  {
    path: '/SignInWorker',
    name: 'SignInWorker',
    component: SignInWorker
  },
  {
    path: '/HomeWorker',
    name: 'HomeWorker',
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
  // admin section
  {
    path: '/dashboard',
    name: 'Dashboard',
    component: AdminDashboard
  },
  {
    path: '/auth',
    name: 'AdminAuth',
    component: AuthAdmin
  },
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
