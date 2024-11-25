<template>
    <div id="app">
        <Navbar />
        <router-view /> <!-- This is where your routed components will be rendered -->
    </div>
</template>

<script>
import Navbar from './components/Navbar.vue'; // Adjust the path as necessary

export default {
    name: 'App',
    components: {
        Navbar,
    },
};
</script>

<style>
/* Global styles can go here */
</style>
