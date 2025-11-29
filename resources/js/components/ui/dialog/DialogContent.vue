<script setup lang="ts">
import { cn } from '@/lib/utils';
import { X } from 'lucide-vue-next';
import { DialogClose, DialogContent, type DialogContentEmits, type DialogContentProps, DialogPortal, useForwardPropsEmits } from 'reka-ui';
import { computed, type HTMLAttributes } from 'vue';
import DialogOverlay from './DialogOverlay.vue';

const props = defineProps<DialogContentProps & { class?: HTMLAttributes['class'] }>();
const emits = defineEmits<DialogContentEmits>();

const delegatedProps = computed(() => {
    const { class: _, ...delegated } = props;

    return delegated;
});

const forwarded = useForwardPropsEmits(delegatedProps, emits);
</script>

<template>
    <DialogPortal>
        <DialogOverlay />
        <DialogContent
            data-slot="dialog-content"
            v-bind="forwarded"
            :class="
                cn(
                    'fixed top-[50%] left-[50%] z-50 grid w-full max-w-[calc(100%-2rem)] translate-x-[-50%] translate-y-[-50%] rounded-lg border bg-background shadow-lg duration-200 data-[state=closed]:animate-out data-[state=closed]:fade-out-0 data-[state=closed]:zoom-out-95 data-[state=open]:animate-in data-[state=open]:fade-in-0 data-[state=open]:zoom-in-95',
                    props.class,
                )
            "
        >
            <slot />

            <DialogClose
                class="focus:ring-none ring-none absolute top-4 left-4 cursor-pointer rounded-xs opacity-70 transition-opacity hover:opacity-100 focus:outline-none disabled:pointer-events-none data-[state=open]:bg-accent data-[state=open]:text-muted-foreground [&_svg]:pointer-events-none [&_svg]:shrink-0 [&_svg:not([class*='size-'])]:size-4"
            >
                <X />
                <span class="sr-only">Close</span>
            </DialogClose>
        </DialogContent>
    </DialogPortal>
</template>
