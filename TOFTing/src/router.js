import { createApp } from 'vue'
import { createRouter, createWebHistory } from 'vue-router';
import MainPage from '@/components/MainPage.vue';

const routes = [
  // Define your routes here
  {
    path: '/',
    name: 'home',
    component: MainPage,
  },
  {
    path: '/achievement/:achievementId',
    name: 'achievement',
    component: () => import('/src/components/Achievement.vue'),
    props: true,
  },
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;
