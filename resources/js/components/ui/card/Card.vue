<script setup lang="ts">
import { cn } from '@/lib/utils';
import type { HTMLAttributes } from 'vue';

const props = defineProps<{
    class?: HTMLAttributes['class'];
}>();
</script>

<template>
    <div data-slot="card" :class="cn('flex flex-col gap-2 rounded-md border bg-card text-card-foreground shadow-sm', props.class)">
        <slot />
    </div>
</template>
