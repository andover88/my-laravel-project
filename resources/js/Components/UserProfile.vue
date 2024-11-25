<template>
    <div class="user-profile flex items-center space-x-2">
        <img class="w-10 h-10 rounded-full" :src="profilePicture" alt="Profile Picture" />
        <div class="flex flex-col">
            <span class="font-semibold">{{ name }}</span>
            <span class="text-gray-500 text-sm">@{{ username }}</span>
        </div>
    </div>
</template>

<script setup>
import { ref } from 'vue';

// Sample user data (replace this with your actual user data fetching)
const profilePicture = ref('https://via.placeholder.com/40'); // Replace with user's profile image URL
const name = ref('John Doe'); // Replace with the user's name
const username = ref('johndoe'); // Replace with the user's username
</script>

<style scoped>
.user-profile {
    position: absolute; /* Positioning to the top right */
    top: 20px; /* Adjust as needed */
    right: 20px; /* Adjust as needed */
    z-index: 20; /* Ensure it stays above other content */
}
</style>
