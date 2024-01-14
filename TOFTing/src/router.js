import { createRouter, createWebHistory } from 'vue-router';

const routes = [
  // Define your routes here
  {
    path: '/main',
    name: 'main',
    component: () => import('/src/components/MainPage.vue')
  },
  {
    path: '/achievement/:userId/:achievementId',
    name: 'achievement',
    component: () => import('/src/components/Achievement.vue'), // Update with the correct path
    props: true,
  },
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;