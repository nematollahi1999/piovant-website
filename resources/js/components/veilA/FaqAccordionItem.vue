<template>
    <div class="cursor-pointer">
        <button
            @click="$emit('toggle')"
            class="flex w-full cursor-pointer items-center justify-between py-4 text-left focus:outline-none"
            aria-expanded="isOpen"
        >
            <span class="cursor-pointer text-sm font-medium text-gray-100 sm:text-base">{{ item.question }}</span>
            <div
                class="flex h-6 w-6 flex-shrink-0 cursor-pointer items-center justify-center rounded-full border-2 transition-colors"
                :class="isOpen ? 'border-white text-white' : 'border-gray-500 text-gray-500'"
            >
                <svg
                    v-if="isOpen"
                    class="h-5 w-5"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="2"
                    stroke="currentColor"
                >
                    <path stroke-linecap="round" stroke-linejoin="round" d="M18 12H6" />
                </svg>
                <svg
                    v-else
                    class="h-5 w-5"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="2.5"
                    stroke="currentColor"
                >
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                </svg>
            </div>
        </button>
        <div class="overflow-hidden transition-all duration-500 ease-in-out" :style="{ 'max-height': isOpen ? '200px' : '0' }">
            <div class="pr-10 pb-4 text-gray-400">
                <p>{{ item.answer }}</p>
            </div>
        </div>
    </div>
</template>

<script setup>
defineProps({
    item: Object,
    isOpen: Boolean,
});
defineEmits(['toggle']);
</script>
