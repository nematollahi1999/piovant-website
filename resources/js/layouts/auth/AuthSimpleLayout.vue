<script setup lang="ts">
import DottedSurface from '@/components/ui/DottedSurface.vue';
import GooeyText from '@/components/ui/GooeyText.vue'; // <-- 1. Import the new component
import { home } from '@/routes';
import { Link } from '@inertiajs/vue3';
import { ref } from 'vue';

defineProps<{
    title?: string;
    description?: string;
}>();

// --- 2. Define the texts for the animation ---
const gooeyTexts = ref(['معاوضه', 'برای', 'حفظ', 'ارزش', 'دارایی', 'شما', 'دراثر', 'تورم']);
</script>

<template>
    <!-- Root div has NO background color -->
    <div dir="rtl" class="relative flex min-h-svh flex-col items-center justify-center gap-6 p-6 md:p-10">
        <!-- The background effect is a direct child -->
        <DottedSurface />

        <!-- The content card sits on top -->
        <div class="z-10 w-full max-w-sm rounded-2xl border bg-card/40 p-6 backdrop-blur-[2px]">
            <div class="flex flex-col gap-8">
                <div class="flex flex-col items-center gap-4">
                    <Link :href="home()" class="flex flex-col items-center gap-2 font-medium">
                        <div class="mb-1 flex h-16 items-center justify-center rounded-md">
                            <!-- 
                                3. Replace the <h1> with the new GooeyText component.
                                We pass it the texts array and the specific styling for the title.
                            -->
                            <GooeyText :texts="gooeyTexts" class="w-full" text-class-name="text-3xl font-black text-[#FF4A4A]" />
                        </div>
                        <span class="sr-only">{{ title }}</span>
                    </Link>
                    <div class="space-y-2 text-center">
                        <h1 class="text-xl font-medium text-card-foreground">{{ title }}</h1>
                        <p class="text-center text-sm text-muted-foreground">{{ description }}</p>
                    </div>
                </div>
                <slot />
            </div>
        </div>
    </div>
</template>

<style scoped>
/* Your existing scoped styles are fine and can remain */
</style>
