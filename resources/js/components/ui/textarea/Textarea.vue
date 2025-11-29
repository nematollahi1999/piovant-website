<script setup lang="ts">
import { cn } from '@/lib/utils';
import { useVModel } from '@vueuse/core';
import type { HTMLAttributes } from 'vue';

const props = defineProps<{
    class?: HTMLAttributes['class'];
    defaultValue?: string | number;
    modelValue?: string | number;
}>();

const emits = defineEmits<{
    (e: 'update:modelValue', payload: string | number): void;
}>();

const modelValue = useVModel(props, 'modelValue', emits, {
    passive: true,
    defaultValue: props.defaultValue,
});
</script>

<template>
    <textarea
        v-model="modelValue"
        placeholder="در مورد آگهی خود توضیح دهید ..."
        :class="
            cn(
                'focus-visible:ring-none flex min-h-[80px] w-full rounded-md border border-gray-300 bg-background px-3 py-2 text-sm placeholder:text-muted-foreground hover:bg-gray-50 focus:border-black focus:bg-gray-50 focus-visible:ring-0 focus-visible:ring-offset-0 focus-visible:outline-none disabled:cursor-not-allowed disabled:opacity-50',
                props.class,
            )
        "
    />
</template>
