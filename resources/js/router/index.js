import { createRouter, createWebHistory } from 'vue-router';
import HomePage from '@/Pages/HomePage.vue';
import UserProfilePage from '@/Pages/UserProfilePage.vue';
import FriendsPage from '@/Pages/FriendsPage.vue';
import PostsPage from '@/Pages/PostsPage.vue';
import SuggestedProfilesPage from '@/Pages/SuggestedProfilesPage.vue';

const routes = [
    { path: '/home', name: 'HomePage', component: HomePage },
    { path: '/profile', name: 'UserProfilePage', component: UserProfilePage },
    { path: '/friends', name: 'FriendsPage', component: FriendsPage },
    { path: '/posts', name: 'PostsPage', component: PostsPage },
    { path: '/suggested', name: 'SuggestedProfilesPage', component: SuggestedProfilesPage },
    {
        path: '/create/image',
        name: 'create.image',
        component: () => import('@/Pages/CreateImagePage.vue'),
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;
