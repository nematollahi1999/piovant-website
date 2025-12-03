<template>
    <section class="bg-white py-8 sm:py-20">
        <div class="container mx-auto space-y-6 px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between">
                <h2 class="text-2xl font-bold tracking-tight text-gray-900 md:text-4xl">The AERIS Network</h2>
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
        title: 'Detect ',
        description: 'Sensors perceive the anomaly.',
        icon: `<svg width="30" height="30" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M1.625 6.75C1.34886 6.75 1.125 6.97386 1.125 7.25C1.125 7.52614 1.34886 7.75 1.625 7.75V7.25V6.75ZM17.375 7.75C17.6511 7.75 17.875 7.52614 17.875 7.25C17.875 6.97386 17.6511 6.75 17.375 6.75V7.25V7.75ZM1.71948 11.8124C1.44334 11.8124 1.21948 12.0363 1.21948 12.3124C1.21948 12.5886 1.44334 12.8124 1.71948 12.8124V12.3124V11.8124ZM17.4695 12.8124C17.7456 12.8124 17.9695 12.5886 17.9695 12.3124C17.9695 12.0363 17.7456 11.8124 17.4695 11.8124V12.3124V12.8124ZM18.5 9.5H18C18 14.1944 14.1944 18 9.5 18V18.5V19C14.7467 19 19 14.7467 19 9.5H18.5ZM9.5 18.5V18C4.80558 18 1 14.1944 1 9.5H0.5H0C0 14.7467 4.25329 19 9.5 19V18.5ZM0.5 9.5H1C1 4.80558 4.80558 1 9.5 1V0.5V0C4.25329 0 0 4.25329 0 9.5H0.5ZM9.5 0.5V1C14.1944 1 18 4.80558 18 9.5H18.5H19C19 4.25329 14.7467 0 9.5 0V0.5ZM9.5 18.5V18C9.12178 18 8.72204 17.8269 8.31488 17.4333C7.90531 17.0373 7.51363 16.4402 7.17385 15.6636C6.49494 14.1118 6.0625 11.933 6.0625 9.5H5.5625H5.0625C5.0625 12.0376 5.5115 14.3588 6.25769 16.0644C6.63046 16.9164 7.08723 17.6373 7.61982 18.1522C8.1548 18.6694 8.79091 19 9.5 19V18.5ZM5.5625 9.5H6.0625C6.0625 7.067 6.49494 4.88824 7.17385 3.33645C7.51363 2.55981 7.90531 1.9627 8.31488 1.56674C8.72204 1.1731 9.12178 1 9.5 1V0.5V0C8.79091 0 8.1548 0.330577 7.61982 0.84779C7.08723 1.36268 6.63046 2.08359 6.25769 2.93563C5.5115 4.64119 5.0625 6.96244 5.0625 9.5H5.5625ZM9.5 18.5V19C10.2091 19 10.8452 18.6694 11.3802 18.1522C11.9128 17.6373 12.3695 16.9164 12.7423 16.0644C13.4885 14.3588 13.9375 12.0376 13.9375 9.5H13.4375H12.9375C12.9375 11.933 12.5051 14.1118 11.8262 15.6636C11.4864 16.4402 11.0947 17.0373 10.6851 17.4333C10.278 17.8269 9.87822 18 9.5 18V18.5ZM13.4375 9.5H13.9375C13.9375 6.96244 13.4885 4.64119 12.7423 2.93563C12.3695 2.08359 11.9128 1.36268 11.3802 0.84779C10.8452 0.330577 10.2091 0 9.5 0V0.5V1C9.87822 1 10.278 1.1731 10.6851 1.56674C11.0947 1.9627 11.4864 2.55981 11.8262 3.33645C12.5051 4.88824 12.9375 7.067 12.9375 9.5H13.4375ZM1.625 7.25V7.75H17.375V7.25V6.75H1.625V7.25ZM1.71948 12.3124V12.8124H17.4695V12.3124V11.8124H1.71948V12.3124Z" fill="black"/>
</svg>


`,
    },
    {
        title: 'Activate  ',
        description: 'TerraDock™ deploys AeroVault™ through OmniSync™, within safety and legal limits.',
        icon: `<svg width="30" height="30" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M9.01694 18.2806C13.9787 13.465 22.0232 13.465 26.985 18.2806M13.5089 22.6403C15.9898 20.2325 20.0121 20.2325 22.493 22.6403M18.001 27L18.0273 26.9745M4.5 14.4272C11.9558 7.19095 24.0442 7.19095 31.5 14.4272" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
</svg>


`,
    },
    {
        title: 'Engage ',
        description: 'AeroVault™ ascends, intercepts, and acts under tiered rules.',
        icon: `<svg width="30" height="30" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M31.5 31.5L26.4375 27L31.5 22.5019L26.4375 18L31.5 13.5001L26.4375 9.00008L31.5 4.5M18.0242 8.89323L11.4611 14.2623H4.5V21.9923L11.4611 21.9904L18.0242 27.3614V8.89323Z" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
</svg>


`,
    },
    {
        title: 'Coordinate ',
        description: 'Intelligence flows seamlessly; external sharing only by law or consent.',
        icon: `<svg width="30" height="30" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M18.0002 3.59961C13.955 7.03881 11.4194 7.19961 7.2002 7.19961V21.0416C7.2002 26.5652 11.0438 28.0064 18.0002 32.3996C24.9566 28.0064 28.8002 26.5652 28.8002 21.0416C28.8002 15.518 28.8002 7.19961 28.8002 7.19961C24.581 7.19961 22.0454 7.03881 18.0002 3.59961Z" stroke="black" stroke-width="2" stroke-linejoin="round"/>
</svg>

`,
    },
    {
        title: 'Reset ',
        description: ' Mission complete. Logged, auditable, and restored to silent readiness.',
        icon: `<svg width="30" height="30" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M18.0002 3.59961C13.955 7.03881 11.4194 7.19961 7.2002 7.19961V21.0416C7.2002 26.5652 11.0438 28.0064 18.0002 32.3996C24.9566 28.0064 28.8002 26.5652 28.8002 21.0416C28.8002 15.518 28.8002 7.19961 28.8002 7.19961C24.581 7.19961 22.0454 7.03881 18.0002 3.59961Z" stroke="black" stroke-width="2" stroke-linejoin="round"/>
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
