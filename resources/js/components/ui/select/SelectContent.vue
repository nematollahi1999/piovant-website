<script setup lang="ts">
import { cn } from '@/lib/utils';
import { inject, type HTMLAttributes, type Ref } from 'vue';

const props = defineProps<{ class?: HTMLAttributes['class'] }>();

const { isOpen } = inject('select') as { isOpen: Ref<boolean> };
</script>

<template>
    <div
        v-if="isOpen"
        :class="
            cn(
                'absolute z-50 mt-1 w-full min-w-[8rem] animate-in overflow-hidden rounded-md border bg-popover text-popover-foreground shadow-md fade-in-0 zoom-in-95',
                props.class,
            )
        "
    >
        <div class="p-1">
            <slot />
        </div>
    </div>
</template>
