<template>
    <section class="bg-white py-8 sm:py-20">
        <div class="container mx-auto space-y-6 px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between">
                <h2 class="text-2xl font-bold tracking-tight text-gray-900 md:text-4xl">The VEIL Network</h2>
                <div class="flex items-center gap-4">
                    <button
                        @click="prev"
                        class="cursor-pointer rounded-full bg-gray-200 p-2 transition-opacity disabled:cursor-not-allowed disabled:opacity-50"
                        :disabled="currentIndex === 0"
                    >
                        <!-- SVG Arrow Left -->
                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                        </svg>
                    </button>
                    <button
                        @click="next"
                        class="cursor-pointer rounded-full bg-gray-200 p-2 transition-opacity disabled:cursor-not-allowed disabled:opacity-50"
                        :disabled="currentIndex >= features.length - itemsToShow"
                    >
                        <!-- SVG Arrow Right -->
                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                        </svg>
                    </button>
                </div>
            </div>

            <div class="relative overflow-hidden">
                <TransitionGroup tag="div" :name="transitionDirection === 'right' ? 'slide-right' : 'slide-left'" class="flex">
                    <div
                        v-for="feature in visibleFeatures"
                        :key="feature.title"
                        class="flex-shrink-0 p-3"
                        :style="{ flexBasis: `${100 / itemsToShow}%` }"
                    >
                        <div class="flex h-full flex-col rounded-2xl border border-[#98A2D4] bg-[#E9EDFF] p-8">
                            <div v-html="feature.icon" class="mb-4 flex items-center space-x-4 text-gray-800"></div>
                            <h3 class="text-base font-semibold text-gray-900 sm:text-lg">{{ feature.title }}</h3>
                            <p class="mt-2 flex-grow text-sm text-gray-600 sm:text-base">{{ feature.description }}</p>
                        </div>
                    </div>
                </TransitionGroup>
            </div>
        </div>
    </section>
</template>

<style scoped>
/* A single, unified transition for all animated elements (enter, leave, move) */
.slide-left-move,
.slide-right-move,
.slide-left-enter-active,
.slide-left-leave-active,
.slide-right-enter-active,
.slide-right-leave-active {
    transition: all 0.6s cubic-bezier(0.55, 0, 0.1, 1);
}

/* The leaving item is taken out of flow so the others can animate into its place */
.slide-left-leave-active,
.slide-right-leave-active {
    position: absolute;
    width: calc(100% / v-bind(itemsToShow));
}

/* --- Slide Right (when clicking "next") --- */

/* [CHANGE] The new item enters from 100% (the right side) without fading */
.slide-right-enter-from {
    /* opacity: 0; <-- This line was removed */
    transform: translateX(100%);
}
/* The old item leaves to -100% (the left side) without fading */
.slide-right-leave-to {
    transform: translateX(-100%);
}

/* --- Slide Left (when clicking "prev") --- */

/* [CHANGE] The new item enters from -100% (the left side) without fading */
.slide-left-enter-from {
    /* opacity: 0; <-- This line was removed */
    transform: translateX(-100%);
}
/* The old item leaves to 100% (the right side) without fading */
.slide-left-leave-to {
    transform: translateX(100%);
}
</style>

<script setup>
// The <script> block is unchanged.
import { computed, onMounted, onUnmounted, ref } from 'vue';

const features = ref([
    {
        title: 'No Wires. No Clues. No Delay.',
        description: 'Fully encrypted. Fully hidden. Fully instant.',
        icon: `<svg width="30" height="30" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M15.7632 5.74512L12.6875 13.7141L18.0001 30.2548M18.0001 30.2548L23.4525 13.5742L20.5166 5.74512M18.0001 30.2548L3.6001 13.8539M18.0001 30.2548L32.4001 13.8539M3.6001 13.8539L9.75155 5.74512H26.3884L32.4001 13.8539M3.6001 13.8539H32.4001" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
</svg>
`,
    },
    {
        title: 'Seamless Integration',
        description: 'Flush mount. Invisible within any interior.',
        icon: `<svg width="30" height="30" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M30.6001 29.25L8.1001 6.75M15.3001 15.6624C14.74 16.2799 14.4001 17.0911 14.4001 17.9795C14.4001 19.9141 16.0119 21.4825 18.0001 21.4825C18.9168 21.4825 19.7535 21.1491 20.3891 20.6001M30.6583 21.4825C31.8976 19.6272 32.4001 18.1142 32.4001 18.1142C32.4001 18.1142 29.1232 7.65 18.0001 7.65C17.3756 7.65 16.7759 7.68298 16.2001 7.74524M26.1001 26.0242C24.034 27.3422 21.3741 28.2743 18.0001 28.2191C7.01548 28.0395 3.6001 18.1142 3.6001 18.1142C3.6001 18.1142 5.18688 13.0471 9.9001 9.96498" stroke="black" stroke-width="2" stroke-linecap="round"/>
</svg>

`,
    },
    {
        title: 'Live Notifications. Global Reach.',
        description: 'You’re informed before they make a move.',
        icon: `<svg width="30" height="30" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M31.5 31.5L26.4375 27L31.5 22.5019L26.4375 18L31.5 13.5001L26.4375 9.00008L31.5 4.5M18.0242 8.89323L11.4611 14.2623H4.5V21.9923L11.4611 21.9904L18.0242 27.3614V8.89323Z" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
</svg>

`,
    },
    {
        title: 'Unified AI Protocols.',
        description: 'Responds faster than human reflex.',
        icon: `<svg width="30" height="30" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M17.9998 18.1353V18M31.4439 31.4439C28.6004 34.2875 20.2762 30.5736 12.8513 23.1488C5.42649 15.7239 1.71263 7.39974 4.55618 4.55618C7.39974 1.71263 15.7239 5.42649 23.1488 12.8513C30.5736 20.2762 34.2875 28.6004 31.4439 31.4439ZM4.55647 31.444C1.71292 28.6004 5.42678 20.2763 12.8516 12.8514C20.2765 5.42658 28.6007 1.71271 31.4442 4.55627C34.2878 7.39983 30.5739 15.724 23.1491 23.1489C15.7242 30.5737 7.40003 34.2876 4.55647 31.444Z" stroke="black" stroke-width="2" stroke-linecap="round"/>
</svg>
`,
    },
    {
        title: 'Another Feature',
        description: 'This is another great feature of our product that you will surely love.',
        icon: `<svg width="30" height="30" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M17.9998 18.1353V18M31.4439 31.4439C28.6004 34.2875 20.2762 30.5736 12.8513 23.1488C5.42649 15.7239 1.71263 7.39974 4.55618 4.55618C7.39974 1.71263 15.7239 5.42649 23.1488 12.8513C30.5736 20.2762 34.2875 28.6004 31.4439 31.4439ZM4.55647 31.444C1.71292 28.6004 5.42678 20.2763 12.8516 12.8514C20.2765 5.42658 28.6007 1.71271 31.4442 4.55627C34.2878 7.39983 30.5739 15.724 23.1491 23.1489C15.7242 30.5737 7.40003 34.2876 4.55647 31.444Z" stroke="black" stroke-width="2" stroke-linecap="round"/>
</svg>
`,
    },
]);

const currentIndex = ref(0);
const itemsToShow = ref(4);
const transitionDirection = ref('right'); // 'left' or 'right'

const visibleFeatures = computed(() => {
    return features.value.slice(currentIndex.value, currentIndex.value + itemsToShow.value);
});

const calculateItemsToShow = () => {
    const width = window.innerWidth;
    if (width >= 1280) itemsToShow.value = 4;
    else if (width >= 1024) itemsToShow.value = 3;
    else if (width >= 640) itemsToShow.value = 2;
    else itemsToShow.value = 1;

    if (currentIndex.value > features.length - itemsToShow.value) {
        currentIndex.value = features.length - itemsToShow.value;
    }
};

onMounted(() => {
    calculateItemsToShow();
    window.addEventListener('resize', calculateItemsToShow);
});

onUnmounted(() => {
    window.removeEventListener('resize', calculateItemsToShow);
});

function next() {
    if (currentIndex.value < features.value.length - itemsToShow.value) {
        transitionDirection.value = 'right';
        currentIndex.value++;
    }
}

function prev() {
    if (currentIndex.value > 0) {
        transitionDirection.value = 'left';
        currentIndex.value--;
    }
}
</script>
