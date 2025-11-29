<script setup lang="ts">
import { cn } from '@/lib/utils';
import type { HTMLAttributes } from 'vue';

const props = defineProps<{
    class?: HTMLAttributes['class'];
}>();
</script>

<template>
    <thead :class="cn('[&_tr]:border-b-2', props.class)" class="bg-muted/50">
        <slot />
    </thead>
</template>
