<!-- resources/js/components/ui/ToggleSwitch.vue -->
<script setup lang="ts">
// 1. Assign the result of defineProps to a 'props' constant.
//    This is the correct way to access prop values within the <script> block.
const props = defineProps<{
    modelValue: boolean;
}>();

const emit = defineEmits(['update:modelValue']);

function toggle() {
    // 2. Use `props.modelValue` to get the current value and emit its opposite.
    emit('update:modelValue', !props.modelValue);
}
</script>

<!-- The second <script> block with useAttrs has been completely removed. -->

<template>
    <button
        type="button"
        @click="toggle"
        :class="[
            modelValue ? 'bg-[#FF4A4A]' : 'bg-gray-100',
            'relative inline-flex h-6 w-11 shrink-0 cursor-pointer rounded-md border-2 border-transparent transition-colors duration-200 ease-in-out focus:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 focus-visible:ring-offset-background',
        ]"
        role="switch"
        :aria-checked="modelValue"
    >
        <span class="sr-only">Toggle setting</span>
        <span
            aria-hidden="true"
            :class="[
                modelValue ? '-translate-x-5' : 'translate-x-0',
                'pointer-events-none inline-block h-5 w-5 transform rounded-sm bg-white shadow-lg ring-0 transition duration-200 ease-in-out',
            ]"
        />
    </button>
</template>
