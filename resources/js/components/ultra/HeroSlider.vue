<template>
    <div class="flex items-center justify-between px-8 py-4 sm:px-16">
        <h1 class="text-lg font-bold sm:text-2xl">FortiVault ULTRA</h1>
        <h3 class="text-end text-sm font-bold sm:text-base">Absolute Command. <br />Engineered Defense.</h3>
    </div>
    <div class="relative w-full text-white sm:h-[calc(100vh+150px)]">
        <swiper
            :modules="[Navigation, Pagination, EffectFade]"
            :slides-per-view="1"
            :space-between="0"
            :loop="false"
            effect="fade"
            :fade-effect="{ crossFade: true }"
            :pagination="{ clickable: true }"
            :navigation="true"
            @slideChange="onSlideChange"
            @swiper="onSwiperReady"
            class="h-full w-full"
        >
            <swiper-slide v-for="(slide, index) in slides" :key="index">
                <div class="relative h-full w-full">
                    <video :src="slide.video" class="h-full w-full object-cover" autoplay muted playsinline @ended="onVideoEnded(index)"></video>
                    <!-- <div class="absolute inset-0 bg-black/40"></div> -->
                    <div class="absolute inset-0 flex items-center justify-start p-4 text-center">
                        <h1 class="text-xl font-bold sm:px-12 md:text-2xl lg:text-4xl">
                            <span v-if="activeIndex === index" class="">{{ typedText }}</span>
                            <span class="cursor-animation" v-if="activeIndex === index">|</span>
                        </h1>
                    </div>
                </div>
            </swiper-slide>
        </swiper>
    </div>
</template>

<script setup>
import { EffectFade, Navigation, Pagination } from 'swiper/modules';
import { Swiper, SwiperSlide } from 'swiper/vue';
import { ref, watch } from 'vue';

import 'swiper/css';
import 'swiper/css/effect-fade';
import 'swiper/css/navigation';
import 'swiper/css/pagination';

const slides = ref([{ video: '/videos/ultra-auto.mp4', text: 'FortiVault Ultra.' }]);

const activeIndex = ref(0);
const typedText = ref('');
let typingInterval;
let swiperInstance = null;

const onSwiperReady = (swiper) => {
    swiperInstance = swiper;
    playActiveVideo(swiper);
};

const onSlideChange = (swiper) => {
    activeIndex.value = swiper.realIndex;

    // Pause all videos
    swiper.slides.forEach((slide) => {
        const video = slide.querySelector('video');
        if (video) video.pause();
    });

    // Play the active video
    setTimeout(() => playActiveVideo(swiper), 50);
};

const playActiveVideo = (swiper) => {
    const activeSlide = swiper.slides[swiper.activeIndex];
    const currentVideo = activeSlide?.querySelector('video');
    if (currentVideo) {
        currentVideo.currentTime = 0;
        currentVideo.play().catch((err) => {
            if (err.name !== 'AbortError') console.error('Video play failed:', err);
        });
    }
};

// ✅ When video ends → pause it, stay on same slide
const onVideoEnded = (index) => {
    const video = swiperInstance?.slides[index]?.querySelector('video');
    if (video) {
        video.pause();
    }
};

// ✅ Loop back to first when pressing next on last slide
watch(activeIndex, (newIndex) => {
    if (!swiperInstance) return;
    const totalSlides = slides.value.length;
    if (newIndex >= totalSlides) {
        swiperInstance.slideTo(0);
    }
});

// Typing effect
const startTyping = () => {
    clearInterval(typingInterval);
    typedText.value = '';
    let i = 0;
    const currentText = slides.value[activeIndex.value]?.text || '';

    typingInterval = setInterval(() => {
        if (i < currentText.length) {
            typedText.value += currentText.charAt(i);
            i++;
        } else {
            clearInterval(typingInterval);
        }
    }, 100);
};

watch(activeIndex, startTyping, { immediate: true });
</script>

<style scoped>
:deep(.swiper-button-next),
:deep(.swiper-button-prev) {
    color: white;
    width: 20px;
    height: 20px;
    border-radius: 50%;
    margin: 20px;
}
:deep(.swiper-button-next:after),
:deep(.swiper-button-prev:after) {
    font-size: 1.25rem;
}
:deep(.swiper-pagination-bullet) {
    background-color: rgba(255, 255, 255, 0.5);
    opacity: 1;
}
:deep(.swiper-pagination-bullet-active) {
    background-color: white;
}
.cursor-animation {
    animation: blink 1s step-end infinite;
}
@keyframes blink {
    from,
    to {
        opacity: 1;
    }
    50% {
        opacity: 0;
    }
}
</style>
