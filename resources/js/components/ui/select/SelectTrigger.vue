<script setup lang="ts">
import { cn } from '@/lib/utils';
import { onClickOutside } from '@vueuse/core';
import { ChevronDown } from 'lucide-vue-next';
import { type HTMLAttributes, inject, type Ref, ref } from 'vue';

const props = defineProps<{ class?: HTMLAttributes['class'] }>();

const { isOpen } = inject('select') as { isOpen: Ref<boolean> };
const triggerRef = ref(null);

onClickOutside(triggerRef, () => {
    isOpen.value = false;
});
</script>

<template>
    <button
        ref="triggerRef"
        @click="isOpen = !isOpen"
        type="button"
        :class="
            cn(
                'focus:ring-none focus:ring-none flex h-10 w-full cursor-pointer items-center justify-between rounded-md border-1 border-gray-300 bg-background px-3 py-2 text-sm placeholder:text-muted-foreground hover:bg-gray-50 focus:border-black focus:ring-offset-0 focus:outline-none disabled:cursor-not-allowed disabled:opacity-50',
                props.class,
            )
        "
    >
        <slot />
        <ChevronDown class="h-4 w-4 opacity-50 transition-transform" :class="{ 'rotate-180': isOpen }" />
    </button>
</template>
