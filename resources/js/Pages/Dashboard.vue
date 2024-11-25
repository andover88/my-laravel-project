<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import Sidebar from '@/Components/Sidebar.vue';
import FriendsList from '@/Components/FriendsList.vue';
import UserProfile from '@/Components/UserProfile.vue';
import SuggestedProfiles from '@/Components/SuggestedProfiles.vue';
import RecentPosts from '@/Components/RecentPosts.vue'
import { Link } from '@inertiajs/vue3'; // Import Inertia's Link component

</script>

<template>
    <AppLayout title="Dashboard">
        <div class="flex relative bg-black min-h-screen"> <!-- Black background with min-height -->
            <router-link to="/home" class="block p-4 hidden md:block"> <!-- Sidebar as router link -->
                <Sidebar />
            </router-link>

            <div class="flex-1 ml-0 md:ml-64 p-4 flex flex-col md:flex-row"> <!-- Main content area -->
                <div class="flex-1"> <!-- Left column -->
                    <router-link to="/friends" class="block mb-4"> <!-- FriendsList as router link -->
                        <FriendsList />
                    </router-link>

                    <router-link to="/posts" class="block mt-4"> <!-- RecentPosts as router link -->
                        <RecentPosts />
                    </router-link>
                </div>

                <div class="w-full md:w-1/4 flex flex-col justify-between mt-4 md:mt-0 md:ml-4">
                    <Link href="/profile" class="block mb-4 p-4"> <!-- Use Inertia's Link component -->
                        <UserProfile />
                    </Link>

                    <Link href="/suggested" class="block mt-4 p-4 hidden md:block">
                        <SuggestedProfiles />
                    </Link>
                </div>
            </div>
        </div>
    </AppLayout>
</template>

<style scoped>
/* Ensure background and text colors are readable */
body {
    background-color: black;
    color: white;
}

/* Optional hover effect for clickable components */
a, .router-link-active {
    transition: background-color 0.3s ease;
}

a:hover, .router-link-active {
    background-color: #374151; /* Tailwind's gray-700 for hover effect */
}
</style>
