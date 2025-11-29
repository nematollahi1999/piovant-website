<template>
    <div class="cursor-pointer overflow-hidden border-b border-black">
        <button
            @click="$emit('toggle')"
            class="flex w-full cursor-pointer items-center justify-between p-2 px-4 text-left focus:outline-none"
            aria-expanded="isOpen"
        >
            <span class="cursor-pointer text-sm font-medium text-gray-900 sm:text-base">{{ item.title }}</span>
            <svg
                class="h-4 w-4 transform cursor-pointer text-gray-500 transition-transform duration-300"
                :class="{ 'rotate-180': isOpen }"
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke-width="2"
                stroke="currentColor"
            >
                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
            </svg>
        </button>
        <div class="overflow-hidden transition-all duration-500 ease-in-out" :style="{ 'max-height': isOpen ? '200px' : '0' }">
            <div class="p-2 px-4 pt-0 text-xs text-gray-600 sm:text-sm">
                <p>{{ item.content }}</p>
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
