<template>
    <div class="recent-posts">
        <h2 class="text-xl font-bold mb-4">Recent Posts</h2>
        <div v-for="post in posts" :key="post.id" class="post mb-6 bg-gray-800 rounded-lg overflow-hidden">
            <div class="post-media">
                <img v-if="post.type === 'image'" :src="post.mediaUrl" alt="Post Image" class="w-full h-96 object-cover" />
                <video v-if="post.type === 'video'" controls class="w-full h-96">
                    <source :src="post.mediaUrl" type="video/mp4" />
                    Your browser does not support the video tag.
                </video>
            </div>
            <div class="post-details p-4 text-white">
                <h3 class="text-lg font-semibold">{{ post.userName }}</h3>
                <p class="text-sm text-gray-400">{{ post.createdAt }}</p>
            </div>
        </div>
    </div>
</template>

<script setup>
// Assume posts are passed as a prop or fetched from a store
import { ref } from 'vue';

const posts = ref([
    {
        id: 1,
        type: 'image', // or 'video'
        mediaUrl: 'path/to/image_or_video.jpg',
        userName: 'User1',
        createdAt: '2 hours ago',
    },
    // Add more posts as needed
]);
</script>

<style scoped>
.recent-posts {
    background-color: #1a1a1a; /* Background for the recent posts section */
    padding: 1rem;
    border-radius: 0.5rem;
}

.post {
    border-radius: 0.5rem;
}

.post-media {
    /* Styles for the media container */
}

.post-details {
    border-top: 1px solid rgba(255, 255, 255, 0.2); /* Optional separator */
}

h3 {
    margin-bottom: 0.25rem; /* Space between user name and timestamp */
}
</style>
