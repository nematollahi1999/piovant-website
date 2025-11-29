<script setup lang="ts">
import { cn } from '@/lib/utils'; // Assuming you have a `cn` utility for merging classes
import { type VariantProps, cva } from 'class-variance-authority';
import { type HTMLAttributes, computed } from 'vue';

const badgeVariants = cva(
    'inline-flex items-center rounded-sm border px-2.5 py-0.5 text-xs font-semibold transition-colors focus:ring-2 focus:ring-ring focus:ring-offset-2 focus:outline-none',
    {
        variants: {
            variant: {
                default: 'border-transparent bg-primary text-primary-foreground hover:bg-primary/80',
                secondary: 'border-transparent bg-secondary text-secondary-foreground hover:bg-secondary/80',
                destructive: 'border-transparent bg-destructive text-destructive-foreground hover:bg-destructive/80',
                outline: 'text-foreground',
            },
        },
        defaultVariants: {
            variant: 'default',
        },
    },
);

type BadgeVariants = VariantProps<typeof badgeVariants>;

interface BadgeProps {
    variant?: BadgeVariants['variant'];
    class?: HTMLAttributes['class'];
}

const props = defineProps<BadgeProps>();

const delegatedProps = computed(() => {
    const { class: _, ...delegated } = props;
    return delegated;
});
</script>

<template>
    <div :class="cn(badgeVariants({ variant }), props.class)" v-bind="delegatedProps">
        <slot />
    </div>
</template>
