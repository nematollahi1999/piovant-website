<template>
    <section class="bg-white py-8 sm:py-20">
        <div class="container mx-auto space-y-6 px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between">
                <h2 class="text-2xl font-bold tracking-tight text-gray-900 md:text-4xl">The PRIME Network</h2>
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
    //     {
    //         title: 'One System. One Mind. Boundless Insight.',
    //         description: 'An ecosystem without blind spots or hesitation — fully connected, adaptive, and encrypted.',
    //         icon: `<svg width="30" height="30" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
    // <path d="M15.7632 5.74512L12.6875 13.7141L18.0001 30.2548M18.0001 30.2548L23.4525 13.5742L20.5166 5.74512M18.0001 30.2548L3.6001 13.8539M18.0001 30.2548L32.4001 13.8539M3.6001 13.8539L9.75155 5.74512H26.3884L32.4001 13.8539M3.6001 13.8539H32.4001" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
    // </svg>
    // `,
    //     },
    {
        title: 'Seamless Mesh Intelligence',
        description: 'Local action, global cognition',
        icon: `<svg width="30" height="30" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M1.625 6.75C1.34886 6.75 1.125 6.97386 1.125 7.25C1.125 7.52614 1.34886 7.75 1.625 7.75V7.25V6.75ZM17.375 7.75C17.6511 7.75 17.875 7.52614 17.875 7.25C17.875 6.97386 17.6511 6.75 17.375 6.75V7.25V7.75ZM1.71948 11.8124C1.44334 11.8124 1.21948 12.0363 1.21948 12.3124C1.21948 12.5886 1.44334 12.8124 1.71948 12.8124V12.3124V11.8124ZM17.4695 12.8124C17.7456 12.8124 17.9695 12.5886 17.9695 12.3124C17.9695 12.0363 17.7456 11.8124 17.4695 11.8124V12.3124V12.8124ZM18.5 9.5H18C18 14.1944 14.1944 18 9.5 18V18.5V19C14.7467 19 19 14.7467 19 9.5H18.5ZM9.5 18.5V18C4.80558 18 1 14.1944 1 9.5H0.5H0C0 14.7467 4.25329 19 9.5 19V18.5ZM0.5 9.5H1C1 4.80558 4.80558 1 9.5 1V0.5V0C4.25329 0 0 4.25329 0 9.5H0.5ZM9.5 0.5V1C14.1944 1 18 4.80558 18 9.5H18.5H19C19 4.25329 14.7467 0 9.5 0V0.5ZM9.5 18.5V18C9.12178 18 8.72204 17.8269 8.31488 17.4333C7.90531 17.0373 7.51363 16.4402 7.17385 15.6636C6.49494 14.1118 6.0625 11.933 6.0625 9.5H5.5625H5.0625C5.0625 12.0376 5.5115 14.3588 6.25769 16.0644C6.63046 16.9164 7.08723 17.6373 7.61982 18.1522C8.1548 18.6694 8.79091 19 9.5 19V18.5ZM5.5625 9.5H6.0625C6.0625 7.067 6.49494 4.88824 7.17385 3.33645C7.51363 2.55981 7.90531 1.9627 8.31488 1.56674C8.72204 1.1731 9.12178 1 9.5 1V0.5V0C8.79091 0 8.1548 0.330577 7.61982 0.84779C7.08723 1.36268 6.63046 2.08359 6.25769 2.93563C5.5115 4.64119 5.0625 6.96244 5.0625 9.5H5.5625ZM9.5 18.5V19C10.2091 19 10.8452 18.6694 11.3802 18.1522C11.9128 17.6373 12.3695 16.9164 12.7423 16.0644C13.4885 14.3588 13.9375 12.0376 13.9375 9.5H13.4375H12.9375C12.9375 11.933 12.5051 14.1118 11.8262 15.6636C11.4864 16.4402 11.0947 17.0373 10.6851 17.4333C10.278 17.8269 9.87822 18 9.5 18V18.5ZM13.4375 9.5H13.9375C13.9375 6.96244 13.4885 4.64119 12.7423 2.93563C12.3695 2.08359 11.9128 1.36268 11.3802 0.84779C10.8452 0.330577 10.2091 0 9.5 0V0.5V1C9.87822 1 10.278 1.1731 10.6851 1.56674C11.0947 1.9627 11.4864 2.55981 11.8262 3.33645C12.5051 4.88824 12.9375 7.067 12.9375 9.5H13.4375ZM1.625 7.25V7.75H17.375V7.25V6.75H1.625V7.25ZM1.71948 12.3124V12.8124H17.4695V12.3124V11.8124H1.71948V12.3124Z" fill="black"/>
</svg>



`,
    },
    {
        title: 'Chain-Reaction Defense',
        description: 'One alert triggers full lockdown',
        icon: `<svg width="30" height="30" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M9.79343 13.9535H10.0035M18.0001 13.9535H18.2101M25.9943 13.9535H26.2044M17.1001 22.0535H6.8001C5.03279 22.0535 3.6001 20.6208 3.6001 18.8535V9.05352C3.6001 7.2862 5.03279 5.85352 6.8001 5.85352H29.2001C30.9674 5.85352 32.4001 7.2862 32.4001 9.05352V13.9535M23.1169 20.3961L25.2019 19.3536C26.7222 18.5935 28.5116 18.5935 30.0318 19.3536L32.1169 20.3961C32.1169 20.3961 32.1169 23.6811 32.1169 25.4136C32.1169 27.1461 30.5154 28.3156 27.6169 30.1461C24.7184 28.3156 23.1169 26.7711 23.1169 25.4136V20.3961Z" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
</svg>
`,
    },
    {
        title: 'Adaptive AI ',
        description: 'Evolves with every interaction',
        icon: `<svg width="30" height="30" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M17.9998 18.1353V18M31.4439 31.4439C28.6004 34.2875 20.2762 30.5736 12.8513 23.1488C5.42649 15.7239 1.71263 7.39974 4.55618 4.55618C7.39974 1.71263 15.7239 5.42649 23.1488 12.8513C30.5736 20.2762 34.2875 28.6004 31.4439 31.4439ZM4.55647 31.444C1.71292 28.6004 5.42678 20.2763 12.8516 12.8514C20.2765 5.42658 28.6007 1.71271 31.4442 4.55627C34.2878 7.39983 30.5739 15.724 23.1491 23.1489C15.7242 30.5737 7.40003 34.2876 4.55647 31.444Z" stroke="black" stroke-width="2" stroke-linecap="round"/>
</svg>
`,
    },
    {
        title: 'Real-Time Visibility',
        description: 'Command instantly from your FortiVault App',
        icon: `<svg width="30" height="30" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M12.6 5.40012L15 9.00012H21L23.4 5.40012M7.19995 7.2001V28.8001C7.19995 30.7883 8.81173 32.4001 10.8 32.4001H25.2C27.1882 32.4001 28.8 30.7883 28.8 28.8001V7.20012C28.8 5.21189 27.1882 3.60012 25.2 3.60012L10.8 3.6001C8.81173 3.60009 7.19995 5.21187 7.19995 7.2001Z" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg><svg width="30" height="30" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M30.6001 23.4V9.3462C30.6001 7.66386 29.1898 6.30005 27.4501 6.30005H8.5501C6.8104 6.30005 5.4001 7.66386 5.4001 9.3462V23.4M30.6001 23.4C31.5942 23.4 32.4001 24.2059 32.4001 25.2V27.9C32.4001 28.8942 31.5942 29.7 30.6001 29.7H5.4001C4.40599 29.7 3.6001 28.8942 3.6001 27.9V25.2C3.6001 24.2059 4.40599 23.4 5.4001 23.4M30.6001 23.4H24.3001L21.6001 25.2H14.8501L11.7001 23.4H5.4001" stroke="black" stroke-width="2" stroke-linejoin="round"/></svg>
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
