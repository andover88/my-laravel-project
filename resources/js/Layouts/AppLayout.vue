<!-- resources/js/Layouts/AppLayout.vue -->
<template>
    <div>
        <header>
            <slot name="header" /> <!-- This will hold the Navbar -->
        </header>
        <main>
            <slot /> <!-- Main content goes here -->
        </main>
    </div>
</template>

<style scoped>
/* Add any styles for the layout */
</style>
