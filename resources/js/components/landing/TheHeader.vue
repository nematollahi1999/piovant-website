<template>
    <!-- 
        We add event listeners, style/class bindings, and positioning classes.
        - @mouseenter/@mouseleave: Toggle the effect on/off.
        - @mousemove: Track the mouse position.
        - :style: Apply the mouse coordinates as CSS variables.
        - :class: Conditionally apply the .is-hovered class for the gradient.
        - relative overflow-hidden: Necessary for the gradient effect to work correctly.
    -->
    <header
        class="sticky top-0 z-50 overflow-hidden border-b border-gray-200 bg-white/60 backdrop-blur-sm"
        @mouseenter="handleMouseEnter"
        @mouseleave="handleMouseLeave"
        @mousemove="handleMouseMove"
        :style="headerStyle"
        :class="{ 'is-hovered': isHovered }"
    >
        <div class="container mx-auto flex h-10 items-center justify-between px-4 sm:justify-center sm:px-6 lg:px-8">
            <div class="flex items-center space-x-8">
                <Link href="/" class="flex-shrink-0">
                    <svg width="42" height="42" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M15.0124 20.3775C15.7674 22.2825 18.1674 23.8375 21.3299 24.5475C21.2999 24.6825 21.2849 24.8225 21.2849 24.965C21.2849 25.1075 21.2999 25.2475 21.3299 25.3825C18.1674 26.0925 15.7674 27.6475 15.0124 29.5525C13.2224 28.295 12.1499 26.7 12.1499 24.9625C12.1499 23.2275 13.2224 21.6325 15.0124 20.3775Z"
                            stroke="black"
                            stroke-miterlimit="10"
                        />
                        <path
                            d="M23.2425 14.51V16.7775C23.2425 17.295 22.86 17.735 22.345 17.8C19.4025 18.17 16.835 19.0975 15.0125 20.3775C14.8475 19.965 14.76 19.5325 14.76 19.0925C14.76 16.47 17.815 14.25 22.035 13.495C22.665 13.38 23.2425 13.87 23.2425 14.51Z"
                            stroke="black"
                            stroke-miterlimit="10"
                        />
                        <path
                            d="M14.76 30.835C14.76 30.3925 14.8475 29.9625 15.0125 29.55C16.835 30.83 19.4025 31.7575 22.345 32.1275C22.86 32.1925 23.2425 32.6325 23.2425 33.15V35.4175C23.2425 36.0575 22.665 36.5475 22.035 36.435C17.815 35.68 14.76 33.4575 14.76 30.835Z"
                            stroke="black"
                            stroke-miterlimit="10"
                        />
                        <path
                            d="M28.055 32.1275C30.9975 31.7575 33.565 30.83 35.3875 29.55C35.5525 29.9625 35.64 30.395 35.64 30.835C35.64 33.4575 32.585 35.6775 28.365 36.4325C27.735 36.545 27.1575 36.0575 27.1575 35.415V33.15C27.1575 32.6325 27.54 32.1925 28.055 32.1275Z"
                            stroke="black"
                            stroke-miterlimit="10"
                        />
                        <path
                            d="M35.64 19.09C35.64 19.5325 35.5525 19.9625 35.3875 20.375C33.565 19.095 30.9975 18.1675 28.055 17.7975C27.54 17.7325 27.1575 17.2925 27.1575 16.775V14.5075C27.1575 13.8675 27.735 13.3775 28.365 13.49C32.585 14.2475 35.64 16.47 35.64 19.09Z"
                            stroke="black"
                            stroke-miterlimit="10"
                        />
                        <path
                            d="M35.3876 29.55C34.6326 27.645 32.2326 26.09 29.0701 25.38C29.1001 25.245 29.1151 25.105 29.1151 24.9625C29.1151 24.82 29.1001 24.68 29.0701 24.545C32.2326 23.835 34.6326 22.28 35.3876 20.375C37.1776 21.6325 38.2501 23.2275 38.2501 24.9625C38.2501 26.7 37.1776 28.295 35.3876 29.55Z"
                            stroke="black"
                            stroke-miterlimit="10"
                        />
                        <path
                            d="M29.1149 24.9625C29.1149 25.105 29.0999 25.245 29.0699 25.38C28.9899 25.7525 28.8024 26.0875 28.5424 26.3475C28.1874 26.7025 27.6999 26.92 27.1574 26.92H23.2424C22.3049 26.92 21.5199 26.26 21.3299 25.38C21.2999 25.245 21.2849 25.105 21.2849 24.9625C21.2849 24.82 21.2999 24.68 21.3299 24.545C21.4099 24.1725 21.5974 23.8375 21.8574 23.5775C22.2124 23.2225 22.6999 23.005 23.2424 23.005H27.1574C28.0949 23.005 28.8799 23.665 29.0699 24.545C29.0999 24.68 29.1149 24.82 29.1149 24.9625Z"
                            stroke="black"
                            stroke-miterlimit="10"
                        />
                        <path
                            d="M38.5114 15.5V13.736H37.9114V13.352H39.5164V13.736H38.9164V15.5H38.5114ZM39.8044 13.352H40.2034L40.8604 14.489H40.8844L41.5414 13.352H41.9434V15.5H41.5414V14.441L41.5654 14.081H41.5414L40.9954 15.044H40.7524L40.2034 14.081H40.1794L40.2034 14.441V15.5H39.8044V13.352Z"
                            fill="black"
                        />
                    </svg>
                </Link>
                <nav class="hidden space-x-6 md:flex">
                    <Link
                        v-for="item in navigation"
                        :key="item.name"
                        :href="item.href"
                        class="text-xs font-medium text-gray-600 transition-colors hover:text-gray-900"
                    >
                        {{ item.name }}
                    </Link>
                </nav>
            </div>
            <div class="flex items-center">
                <!-- Add Search and Cart icons here if needed -->
                <button class="text-gray-500 hover:text-gray-800 md:hidden" @click="mobileMenuOpen = !mobileMenuOpen">
                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                </button>
            </div>
        </div>
        <div v-if="mobileMenuOpen" class="border-t border-gray-200 bg-white md:hidden">
            <nav class="space-y-2 px-4 py-3">
                <Link
                    v-for="item in navigation"
                    :key="item.name"
                    :href="item.href"
                    class="block rounded-md p-2 font-medium text-gray-400 hover:bg-gray-50 hover:text-black"
                >
                    {{ item.name }}
                </Link>
            </nav>
        </div>
    </header>
</template>

<script setup>
import { Link } from '@inertiajs/vue3';
import { computed, ref } from 'vue';
// --- Logic for the mobile menu ---
const mobileMenuOpen = ref(false);
const navigation = [
    { name: 'Store', href: '#' },
    { name: 'FortiVault PRIME', href: '/prime' },
    { name: 'FortiVault VEIL', href: '/veil-manual' },
    { name: 'FortiVault ULTRA', href: '/ultra' },
    { name: 'FortiVault AERIS', href: '/aeris' },
    { name: 'Support', href: '/support' },
    { name: 'FAQ', href: '/faq' },
    { name: 'About', href: '/about-us' },
];

// --- Logic for the mouse-tracking backlight effect ---
const isHovered = ref(false);
const mouseX = ref(0);
const mouseY = ref(0);

// This computed property will reactively update the CSS variables
const headerStyle = computed(() => ({
    '--mouse-x': `${mouseX.value}px`,
    '--mouse-y': `${mouseY.value}px`,
}));

const handleMouseEnter = () => {
    isHovered.value = true;
};

const handleMouseLeave = () => {
    isHovered.value = false;
};

const handleMouseMove = (event) => {
    // Get the header element itself
    const rect = event.currentTarget.getBoundingClientRect();
    // Calculate mouse position relative to the element
    mouseX.value = event.clientX - rect.left;
    mouseY.value = event.clientY - rect.top;
};
</script>

<style scoped>
/*
 The .is-hovered class is applied when the mouse enters the header.
 It draws a radial gradient on top of the existing background.
 The gradient's center follows the mouse position via CSS variables.
 The rgba(255, 255, 255, 0.2) adds a 20% white opacity "light" on top of the 60% background.
*/
.is-hovered {
    background-image: radial-gradient(circle 300px at var(--mouse-x) var(--mouse-y), rgba(255, 255, 255, 0.6), transparent 40%);
}
</style>
