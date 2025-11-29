<template>
    <section class="bg-gray-100 py-8 sm:py-24">
        <div class="container mx-auto space-y-6 px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between">
                <h2 class="text-2xl font-bold tracking-tight text-gray-900 md:text-4xl">Meet FortiVault™</h2>
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
                        <div class="flex h-full flex-col rounded-2xl border border-gray-200 bg-gray-50 p-8">
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
        title: 'AI-Powered Threat Prediction.',
        description: 'Intelligence that foresees — detecting risks before they arise.',
        icon: `<svg width="30" height="30" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M17.9995 18.1353V18M31.4437 31.4439C28.6001 34.2875 20.2759 30.5736 12.8511 23.1488C5.42625 15.7239 1.71238 7.39974 4.55594 4.55618C7.3995 1.71263 15.7237 5.42649 23.1485 12.8513C30.5734 20.2762 34.2872 28.6004 31.4437 31.4439ZM4.55623 31.444C1.71267 28.6004 5.42654 20.2763 12.8514 12.8514C20.2762 5.42658 28.6004 1.71271 31.444 4.55627C34.2875 7.39983 30.5737 15.724 23.1488 23.1489C15.724 30.5737 7.39979 34.2876 4.55623 31.444Z" stroke="black" stroke-width="2" stroke-linecap="round"/></svg>`,
    },
    {
        title: 'Biometric-first access.',
        description: 'Fingerprint or face — no keys, no codes, only you.',
        icon: `<svg width="30" height="30" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M13.2001 3.6001H6.8001C5.03279 3.6001 3.6001 5.03279 3.6001 6.8001V13.2001M13.2001 32.4001H6.8001C5.03279 32.4001 3.6001 30.9674 3.6001 29.2001V22.8001M22.8001 3.6001H29.2001C30.9674 3.6001 32.4001 5.03279 32.4001 6.8001V13.2001M32.4001 22.8001V29.2001C32.4001 30.9674 30.9674 32.4001 29.2001 32.4001H22.8001M11.7001 13.7479V11.9929M24.3001 13.7479V11.9929M12.9791 23.4004C15.0313 24.9905 19.6334 24.9905 22.5011 23.4004M17.1001 19.0129L17.4729 18.6495C17.8105 18.3203 18.0001 17.8739 18.0001 17.4085V12.8704" stroke="black" stroke-width="2" stroke-linecap="round"/></svg><svg width="30" height="30" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M8.59457 9.38838C7.48027 11.1812 6.90004 13.2237 6.90004 15.3046C6.90004 15.7208 6.98576 18.3843 6.98576 18.3843C6.98576 20.3884 6.44509 22.3605 5.40991 24.1021M24.3099 15.3046C24.3033 12.5898 22.5099 9.38838 18.7878 9.38838C15.0657 9.38838 12.8866 12.4424 12.88 15.1508V16.7899C12.88 20.6892 12.4312 24.4221 10.018 27.5403M14.3042 32.4001C17.2449 28.2895 18.8208 23.4041 18.8208 18.3971V15.0933M21.4417 30.8778C22.5099 29.7001 24.3099 24.3001 24.3099 20.7001M29.1396 27.7259C30.1154 24.5437 30.5901 18.3778 30.5901 15.0611C30.5901 8.74796 25.3285 3.61931 18.8208 3.6001H18.7878C16.7174 3.6001 14.68 4.13153 12.88 5.13677" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>`,
    },
    {
        title: 'Seamless Control in Your Pocket.',
        description: 'Instant, wireless command via the FortiVault™ app.',
        icon: `<svg width="30" height="30" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M12.6 5.40012L15 9.00012H21L23.4 5.40012M7.19995 7.2001V28.8001C7.19995 30.7883 8.81173 32.4001 10.8 32.4001H25.2C27.1882 32.4001 28.8 30.7883 28.8 28.8001V7.20012C28.8 5.21189 27.1882 3.60012 25.2 3.60012L10.8 3.6001C8.81173 3.60009 7.19995 5.21187 7.19995 7.2001Z" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg><svg width="30" height="30" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M30.6001 23.4V9.3462C30.6001 7.66386 29.1898 6.30005 27.4501 6.30005H8.5501C6.8104 6.30005 5.4001 7.66386 5.4001 9.3462V23.4M30.6001 23.4C31.5942 23.4 32.4001 24.2059 32.4001 25.2V27.9C32.4001 28.8942 31.5942 29.7 30.6001 29.7H5.4001C4.40599 29.7 3.6001 28.8942 3.6001 27.9V25.2C3.6001 24.2059 4.40599 23.4 5.4001 23.4M30.6001 23.4H24.3001L21.6001 25.2H14.8501L11.7001 23.4H5.4001" stroke="black" stroke-width="2" stroke-linejoin="round"/></svg>`,
    },
    {
        title: 'TapCode™ Silent Reserve.',
        description: 'Discrete tap-to-unlock. Dependable even if biometrics fail.',
        icon: `<svg width="30" height="30" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M9.89995 13.5839V11.792C9.89995 7.25379 13.5128 3.59985 18 3.59985C20.3941 3.59985 22.5394 4.64009 24.0198 6.29985M18 23.5282V19.9282M28.8 21.648C28.8 27.5862 23.9646 32.4001 18 32.4001C12.0353 32.4001 7.19995 27.5862 7.19995 21.648C7.19995 15.7097 12.0353 10.8958 18 10.8958C23.9646 10.8958 28.8 15.7097 28.8 21.648Z" stroke="black" stroke-width="2" stroke-linecap="round"/></svg>`,
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
