<template>
    <section class="bg-white py-8 sm:py-20">
        <div class="container mx-auto px-8 sm:px-16">
            <div class="mb-12 flex items-center justify-between">
                <div>
                    <span class="text-xl font-bold text-blue-600 md:text-4xl">01</span>
                    <h2 class="mt-1 text-xl font-bold md:text-4xl">AeroVault™</h2>
                </div>
                <p class="mt-2 text-end text-lg font-medium text-gray-600 md:text-2xl">Eyes Above. <br />Guardian in Motion.</p>
            </div>

            <!-- Image Gallery Carousel -->
            <div class="mx-auto mb-16 w-full">
                <swiper
                    :modules="[Navigation, Pagination]"
                    :slides-per-view="1.5"
                    :space-between="30"
                    :loop="true"
                    :pagination="{ clickable: true }"
                    :navigation="true"
                >
                    <swiper-slide><img src="/images/aeris-1.jpg" alt="SteerVault Image 1" class="h-auto w-full object-cover" /></swiper-slide>
                    <swiper-slide><img src="/images/aeris-2.jpg" alt="SteerVault Image 2" class="h-auto w-full object-cover" /></swiper-slide>
                    <!-- <swiper-slide><img src="/images/steervault-3.jpg" alt="SteerVault Image 3" class="h-auto w-full object-cover" /></swiper-slide> -->
                </swiper>
            </div>

            <div class="grid grid-cols-1 items-start gap-12 sm:px-16 lg:grid-cols-3">
                <div class="col-span-1">
                    <p class="text-lg text-gray-700">An airborne sentinel crafted in aerospace precision—autonomous, adaptive, aware.</p>
                </div>
                <div class="col-span-2">
                    <h3 class="mb-4 text-2xl font-bold text-blue-600">Core Capabilities</h3>
                    <div class="">
                        <AccordionItem
                            v-for="(feature, index) in features"
                            :key="feature.title"
                            :item="feature"
                            :isOpen="openAccordionIndex === index"
                            @toggle="handleToggle(index)"
                        />
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script setup>
import { Navigation, Pagination } from 'swiper/modules';
import { Swiper, SwiperSlide } from 'swiper/vue';
import { ref } from 'vue';
import AccordionItem from '../landing/AccordionItem.vue'; // Check path

import 'swiper/css';
import 'swiper/css/navigation';
import 'swiper/css/pagination';

const openAccordionIndex = ref(null);

const handleToggle = (index) => {
    // If the clicked accordion is already open, close it
    if (openAccordionIndex.value === index) {
        openAccordionIndex.value = null;
    } else {
        // Otherwise, open the clicked one
        openAccordionIndex.value = index;
    }
};

const features = ref([
    { title: 'Autonomous Launch & Response ', content: 'Self-activated within seconds of alert.' },
    { title: 'Thermal, Optical & Motion Fusion  ', content: 'Instantly detects movement and heat signatures.' },
    { title: 'Adaptive Pursuit Mode ', content: 'Tracks intruders or vehicles through encrypted live vision.' },
    { title: 'Cognitive Threat Recognition  ', content: 'Distinguishes human intent from ambient motion.' },
    { title: 'Firearm & Hazard Detection ', content: 'Identifies muzzle flash or aggressive gestures using AI vision.' },
    { title: 'Evasive Protocols ', content: 'Ascends, repositions, and maintains lock even under aggression.              ' },
    { title: 'Failsafe Return ', content: 'AI-guided landing with 9-axis stabilization and predictive routing.' },
    { title: ' Secure Telemetry ', content: 'Footage and diagnostics mirrored locally.' },
    { title: 'All-Weather Resilience  ', content: 'Operational from –30 °C to +70 °C; impervious to wind, rain, and dust.' },
    { title: 'Intelligent Power Core   ', content: '12V 8000 mAh Li-Po battery with 30 min flight endurance.' },
    { title: 'Defense-Grade Encryption   ', content: 'OmniSync™-secured communication and data integrity.' },
]);
</script>

<style scoped>
/* You can add custom Swiper styles here if needed */
:deep(.swiper-button-next),
:deep(.swiper-button-prev) {
    color: #2563eb; /* blue-600 */
}
:deep(.swiper-pagination-bullet-active) {
    background: #2563eb;
}
:deep(.swiper-button-next),
:deep(.swiper-button-prev) {
    color: #2563eb;
    width: 20px;
    height: 20px;
    border-radius: 50%;
    margin: 20px;
}
</style>
