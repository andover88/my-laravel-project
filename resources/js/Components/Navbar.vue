<template>
    <div class="lg:hidden bg-white shadow-md fixed w-full z-50">
      <div class="flex items-center justify-between p-4">
        <h1 class="text-xl font-bold">Instagram Clone</h1>
        <button @click="toggle" class="focus:outline-none">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"/>
          </svg>
        </button>
      </div>
      <transition name="fade">
        <div v-if="isOpen" class="bg-white shadow-md w-full z-10">
          <ul class="space-y-2">
            <li>
              <a href="#" class="flex items-center p-4 text-gray-600 hover:bg-gray-100 rounded-lg">Home</a>
            </li>
            <li @click="toggleDropdown" class="relative">
              <a href="#" class="flex items-center p-4 text-gray-600 hover:bg-gray-100 rounded-lg">
                More
                <svg class="ml-2 w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                </svg>
              </a>
              <transition name="fade">
                <ul v-if="isDropdownOpen" class="absolute left-0 w-full bg-white shadow-md z-20 mt-2 rounded-md">
                  <li>
                    <a href="#" class="block px-4 py-2 text-gray-600 hover:bg-gray-100">Submenu 1</a>
                  </li>
                  <li>
                    <a href="#" class="block px-4 py-2 text-gray-600 hover:bg-gray-100">Submenu 2</a>
                  </li>
                  <li>
                    <a href="#" class="block px-4 py-2 text-gray-600 hover:bg-gray-100">Submenu 3</a>
                  </li>
                </ul>
              </transition>
            </li>
            <li>
              <a href="#" class="flex items-center p-4 text-gray-600 hover:bg-gray-100 rounded-lg">Profile</a>
            </li>

              <li @click="logout" class="w-full text-left p-4 text-white-600 hover:bg-gray-100 rounded-lg">Log Out</li>

          </ul>
        </div>
      </transition>
    </div>
  </template>

  <script setup>
  import { ref, defineProps } from 'vue';

  const props = defineProps({
    isOpen: {
      type: Boolean,
      required: true,
    },
  });

  const emit = defineEmits(['toggle', 'logout']);
  const isDropdownOpen = ref(false);

  const toggle = () => {
    emit('toggle');
  };

  const toggleDropdown = () => {
    isDropdownOpen.value = !isDropdownOpen.value; // Toggle dropdown visibility
  };

  const logout = () => {
    emit('logout'); // Emit a log-out event
  };
  </script>

  <style scoped>
  .fade-enter-active, .fade-leave-active {
    transition: opacity 0.5s;
  }
  .fade-enter, .fade-leave-to {
    opacity: 0;
  }
  </style>
