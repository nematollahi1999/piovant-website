<script setup lang="ts">
import { cn } from '@/lib/utils';
import { onMounted, onUnmounted, ref, type HTMLAttributes } from 'vue';

const props = withDefaults(
    defineProps<{
        texts: string[];
        morphTime?: number;
        cooldownTime?: number;
        class?: HTMLAttributes['class'];
        textClassName?: HTMLAttributes['class'];
    }>(),
    {
        morphTime: 2,
        cooldownTime: 0.25,
    },
);

const text1Ref = ref<HTMLSpanElement | null>(null);
const text2Ref = ref<HTMLSpanElement | null>(null);

let animationFrameId: number;

onMounted(() => {
    let textIndex = props.texts.length - 1;
    let time = new Date();
    let morph = 0;
    let cooldown = props.cooldownTime;

    const setMorph = (fraction: number) => {
        if (text1Ref.value && text2Ref.value) {
            text2Ref.value.style.filter = `blur(${Math.min(8 / fraction - 8, 100)}px)`;
            text2Ref.value.style.opacity = `${Math.pow(fraction, 0.4) * 100}%`;

            fraction = 1 - fraction;
            text1Ref.value.style.filter = `blur(${Math.min(8 / fraction - 8, 100)}px)`;
            text1Ref.value.style.opacity = `${Math.pow(fraction, 0.4) * 100}%`;
        }
    };

    const doCooldown = () => {
        morph = 0;
        if (text1Ref.value && text2Ref.value) {
            text2Ref.value.style.filter = '';
            text2Ref.value.style.opacity = '100%';
            text1Ref.value.style.filter = '';
            text1Ref.value.style.opacity = '0%';
        }
    };

    const doMorph = () => {
        morph -= cooldown;
        cooldown = 0;
        let fraction = morph / props.morphTime;

        if (fraction > 1) {
            cooldown = props.cooldownTime;
            fraction = 1;
        }

        setMorph(fraction);
    };

    const animate = () => {
        animationFrameId = requestAnimationFrame(animate);
        const newTime = new Date();
        const shouldIncrementIndex = cooldown > 0;
        const dt = (newTime.getTime() - time.getTime()) / 500;
        time = newTime;

        cooldown -= dt;

        if (cooldown <= 0) {
            if (shouldIncrementIndex) {
                textIndex = (textIndex + 1) % props.texts.length;
                if (text1Ref.value && text2Ref.value) {
                    text1Ref.value.textContent = props.texts[textIndex];
                    text2Ref.value.textContent = props.texts[(textIndex + 1) % props.texts.length];
                }
            }
            doMorph();
        } else {
            doCooldown();
        }
    };

    animate();
});

onUnmounted(() => {
    if (animationFrameId) {
        cancelAnimationFrame(animationFrameId);
    }
});
</script>

<template>
    <div :class="cn('relative', props.class)">
        <!-- The SVG filter definition -->
        <svg class="absolute h-0 w-0" aria-hidden="true" focusable="false">
            <defs>
                <filter id="threshold">
                    <feColorMatrix
                        in="SourceGraphic"
                        type="matrix"
                        values="1 0 0 0 0
                                0 1 0 0 0
                                0 0 1 0 0
                                0 0 0 255 -140"
                    />
                </filter>
            </defs>
        </svg>

        <!-- The container that applies the filter -->
        <div class="flex items-center justify-center" style="filter: url(#threshold)">
            <span ref="text1Ref" :class="cn('absolute inline-block text-center select-none', 'text-foreground', props.textClassName)" />
            <span ref="text2Ref" :class="cn('absolute inline-block text-center select-none', 'text-foreground', props.textClassName)" />
        </div>
    </div>
</template>
