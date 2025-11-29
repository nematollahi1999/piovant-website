<script setup lang="ts">
import { cn } from '@/lib/utils';
import type { HTMLAttributes } from 'vue';

const props = defineProps<{
    class?: HTMLAttributes['class'];
}>();
</script>

<template>
    <th :class="cn('h-12 px-4 text-right align-middle font-bold text-muted-foreground [&:has([role=checkbox])]:pr-0', props.class)">
        <slot />
    </th>
</template>
