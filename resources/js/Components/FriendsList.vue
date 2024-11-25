<template>
    <div class="flex space-x-4 overflow-x-auto">
        <div v-for="friend in friends" :key="friend.id" class="flex-none w-24">
            <img :src="friend.profileImage" alt="Profile" class="rounded-full w-full h-auto" />
            <p class="text-center text-sm">{{ friend.name }}</p>
        </div>
    </div>
</template>

<script setup>
// Mock friends data
const friends = [
    { id: 1, name: 'Friend 1', profileImage: 'path/to/image1.jpg' },
    { id: 2, name: 'Friend 2', profileImage: 'path/to/image2.jpg' },
    { id: 3, name: 'Friend 3', profileImage: 'path/to/image3.jpg' },
    // Add more friends as needed
];
</script>

<style scoped>
/* Add any additional styles if needed */
</style>
