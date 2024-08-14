<template>
    <header>
        <NavBar />
    </header>
    <main>
        <div class="max-w-screen-lg mx-auto py-10">
            <div class="min-w-full bg-white rounded-md p-5">
                <router-view :key="$route.path"></router-view>
            </div>
        </div>
    </main>
</template>

<script setup>
import NavBar from './components/NavBar.vue';
</script>