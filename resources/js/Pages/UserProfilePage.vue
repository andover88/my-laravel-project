<!-- resources/js/Pages/UserProfilePage.vue -->
<template>
    <div class="min-h-screen bg-black text-white flex">
        <!-- Sidebar Component -->
        <Sidebar class="hidden md:block" /> <!-- Sidebar will be hidden on small screens -->

        <div class="flex-1 p-8">
            <div class="max-w-3xl mx-auto flex flex-col items-center">
                <!-- Profile Header -->
                <div class="flex items-center mb-6">
                    <img
                        :src="user.image"
                        alt="Profile Image"
                        class="w-32 h-32 rounded-full border-2 border-white"
                    />

                    <div class="ml-4">
                        <!-- First Line: Username with Follow and Message Buttons -->
                        <div class="flex items-center mb-2">
                            <h1 class="text-3xl font-bold mr-4">{{ user.name }}</h1>
                            <button class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-400 mr-2">
                                Message
                            </button>
                            <button
                                class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-400"
                                @click="toggleFollow"
                            >
                                {{ isFollowing ? 'Unfollow' : 'Follow' }}
                            </button>
                        </div>

                        <!-- Second Line: User Stats -->
                        <div class="flex space-x-6 text-gray-400">
                            <p>{{ user.postsCount }} Posts</p>
                            <p>{{ user.followersCount }} Followers</p>
                            <p>{{ user.followingCount }} Following</p>
                        </div>
                    </div>
                </div>

                <!-- Bio Section -->
                <p class="text-lg text-center mb-8">{{ user.bio }}</p>

                <!-- Tabs -->
                <div class="tabs w-full flex justify-around mb-6 border-b border-gray-500">
                    <button
                        class="flex-1 text-center py-2"
                        :class="{'border-b-4 border-green-500': activeTab === 'posts'}"
                        @click="setActiveTab('posts')"
                    >
                        Posts
                    </button>
                    <button
                        class="flex-1 text-center py-2"
                        :class="{'border-b-4 border-green-500': activeTab === 'reels'}"
                        @click="setActiveTab('reels')"
                    >
                        Reels
                    </button>
                </div>

                <!-- Tab Content -->
                <div v-if="activeTab === 'posts'" class="tab-content w-full">
                    <p class="text-center mb-4">User's Posts will appear here.</p>
                    <ul>
                        <li v-for="post in posts" :key="post.id" class="mb-2">
                            <p class="text-lg">{{ post.content }}</p>
                        </li>
                    </ul>
                </div>

                <div v-else class="tab-content w-full">
                    <p class="text-center mb-4">User's Reels will appear here.</p>
                    <ul>
                        <li v-for="reel in reels" :key="reel.id" class="mb-2">
                            <p class="text-lg">{{ reel.title }}</p>
                        </li>
                    </ul>
                </div>

                <!-- Back Button -->
                <button
                    class="bg-green-500 text-white px-6 py-2 rounded-md hover:bg-green-400 mt-8"
                    @click="goBack"
                >
                    Back to Dashboard
                </button>
            </div>
        </div>
    </div>
</template>

<script setup>
import { ref } from 'vue';
import { useRouter } from 'vue-router';
import Sidebar from '@/Components/Sidebar.vue'; // Import Sidebar

// Sample User Data (replace with real data)
const user = ref({
    name: 'John Doe',
    username: 'johndoe',
    bio: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Passionate about coding and traveling.',
    image: 'https://via.placeholder.com/150',
    postsCount: 20, // Sample post count
    followersCount: 150, // Sample followers count
    followingCount: 75 // Sample following count
});

// Sample Posts and Reels (replace with real data)
const posts = ref([
    { id: 1, content: 'This is my first post!' },
    { id: 2, content: 'Loving the Vue.js framework!' }
]);

const reels = ref([
    { id: 1, title: 'Travel Vlog - Episode 1' },
    { id: 2, title: 'Cooking with John - Pasta Special' }
]);

// Manage router navigation
const router = useRouter();

// Track which tab is active
const activeTab = ref('posts');

// Track follow status
const isFollowing = ref(false);

// Set the active tab
function setActiveTab(tab) {
    activeTab.value = tab;
}

// Toggle follow status
function toggleFollow() {
    isFollowing.value = !isFollowing.value;
}

// Go back to the dashboard
function goBack() {
    router.push('/dashboard');
}
</script>

<style scoped>
.user-profile-page {
    display: flex;
    justify-content: center;
    align-items: center;
}

/* Styling for active tab */
.tabs button {
    background: transparent;
    color: white;
    border: none;
    font-weight: bold;
    cursor: pointer;
    transition: border-bottom 0.3s ease;
}

/* Sidebar styles */
.hidden {
height:100vh;
}

.md\\:block {
    display: block;
}
</style>
