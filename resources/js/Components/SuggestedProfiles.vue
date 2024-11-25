<template>
    <div class="suggested-profiles bg-white shadow-md rounded-lg p-4">
        <h3 class="font-semibold text-lg mb-4">Suggested Profiles</h3>
        <ul>
            <li
                v-for="profile in suggestedProfiles"
                :key="profile.id"
                class="flex items-center mb-3"
            >
                <img
                    :src="profile.image"
                    alt="Profile Image"
                    class="w-10 h-10 rounded-full mr-2"
                />
                <div>
                    <p class="font-medium">{{ profile.name }}</p>
                    <p class="text-gray-500 text-sm">@{{ profile.username }}</p>
                </div>
            </li>
        </ul>
    </div>
</template>

<script setup>
import { ref } from 'vue';

// Sample data for suggested profiles
const suggestedProfiles = ref([
    { id: 1, name: 'John Doe', username: 'johndoe', image: 'https://via.placeholder.com/40' },
    { id: 2, name: 'Jane Smith', username: 'janesmith', image: 'https://via.placeholder.com/40' },
    { id: 3, name: 'Alex Johnson', username: 'alexjohnson', image: 'https://via.placeholder.com/40' },
    { id: 4, name: 'Emily Davis', username: 'emilydavis', image: 'https://via.placeholder.com/40' },
]);
</script>

<style scoped>
.suggested-profiles {
    max-width: 300px; /* Adjust the width if needed */
    background-color: black; /* Black background */
    color: white; /* White text for better visibility */
    margin-top: 25%; /* Push the component down */
}
.suggested-profiles h3 {
    color: #1db954; /* Greenish accent for the title */
}
</style>
