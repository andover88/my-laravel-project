<template>
    <div class="sidebar bg-gray-800 text-white h-full p-4">
        <ul>
            <li class="mb-4 flex items-center">
                <i class="fas fa-home mr-2"></i>
                <Link href="/dashboard" class="hover:underline">Home</Link>
            </li>
            <li class="mb-4 flex items-center">
                <i class="fas fa-video mr-2"></i>
                <Link href="/reels" class="hover:underline">Reels</Link>
            </li>
            <li class="mb-4 flex items-center">
                <i class="fas fa-envelope mr-2"></i>
                <Link href="/messages" class="hover:underline">Messages</Link>
            </li>
            <li class="mb-4 flex items-center">
                <i class="fas fa-bell mr-2"></i>
                <Link href="/notifications" class="hover:underline">Notifications</Link>
            </li>
            <li
                class="mb-4 flex items-center relative"
                @mouseover="isDropdownOpen = true"
                @mouseleave="isDropdownOpen = false"
            >
                <i class="fas fa-plus-circle mr-2"></i>
                <button class="hover:underline">Create</button>
                <ul v-if="isDropdownOpen" class="absolute left-0 mt-2 bg-gray-700 w-40 rounded-md shadow-lg z-10">
                    <li class="mb-1">
                        <Link href="/create/video" class="block px-4 py-2 hover:bg-gray-600">Post a Video</Link>
                    </li>
                    <li>
                        <Link href="/create/image" class="block px-4 py-2 hover:bg-gray-600">Post an Image</Link>
                    </li>
                </ul>
            </li>
            <li class="mb-4 flex items-center">
                <i class="fas fa-user mr-2"></i>
                <Link href="/profile" class="hover:underline">Profile</Link>
            </li>
            <li class="mb-4 flex items-center">
                <i class="fas fa-sign-out-alt mr-2"></i>
                <button @click="logout" class="hover:underline">Logout</button>
            </li>
        </ul>
    </div>
</template>

<script setup>
import { ref } from 'vue';
import { Link } from '@inertiajs/inertia-vue3'; // Import Inertia Link component
import { Inertia } from '@inertiajs/inertia'; // Import Inertia for handling actions

const isDropdownOpen = ref(false);

// Logout method
const logout = () => {
    // Make a POST request to the logout route
    Inertia.post('/logout');
};
</script>

<style scoped>
.sidebar {
    width: 120px;
    font-size: 0.6rem;
    line-height: 3.6rem;
}
.absolute {
    position: absolute;
}
</style>
