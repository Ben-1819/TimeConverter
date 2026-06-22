import { createRouter, createWebHistory } from 'vue-router';
import Home from '@/views/Home.vue';
import BatchMenu from '@/views/BatchMenu.vue';

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'Home',
      component: Home,
    },
    {
      path: '/BatchMenu',
      name: 'Batch Menu',
      component: BatchMenu,
    },
  ],
});

export default router;
