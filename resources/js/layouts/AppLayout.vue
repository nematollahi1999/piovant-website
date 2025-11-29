<template>
    <div class="scrollbar-hide bg-white font-sans text-gray-800 antialiased [scrollbar-width:none] [&::-webkit-scrollbar]:hidden">
        <TheHeader />
        <main>
            <slot />
        </main>
        <TheFooter />
    </div>
</template>

<script setup>
import TheFooter from '../components/landing/TheFooter.vue';
import TheHeader from '../components/landing/TheHeader.vue';
</script>
