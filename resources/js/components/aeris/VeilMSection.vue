<template>
    <section class="bg-slate-100 py-8 sm:py-20">
        <div class="container mx-auto px-8 sm:px-16">
            <div class="mb-12 flex items-center justify-between">
                <div>
                    <span class="text-xl font-bold text-blue-600 md:text-4xl">02</span>
                    <h2 class="mt-1 text-xl font-bold md:text-4xl">TerraDock™</h2>
                </div>
                <p class="mt-2 text-end text-lg font-medium text-gray-600 md:text-2xl">Ground Command. <br />Power in Precision.</p>
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
                    <swiper-slide><img src="/images/terra-1.jpg" alt="pedalvault Image 1" class="h-auto w-full object-cover" /></swiper-slide>
                    <swiper-slide><img src="/images/terra-2.jpg" alt="pedalvault Image 2" class="h-auto w-full object-cover" /></swiper-slide>
                </swiper>
            </div>

            <div class="grid grid-cols-1 items-start gap-12 sm:px-16 lg:grid-cols-3">
                <div class="col-span-1">
                    <p class="text-lg text-gray-700">
                        More than a hub—it is the heart of readiness. A silent powerhouse that sustains, stabilizes, and commands AeroVault™ with
                        graceful certainty.
                    </p>
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
    { title: 'Autonomous Launch & Recovery ', content: 'Executes flight cycles and returns seamlessly.' },
    { title: 'Grid-Linked Power System', content: 'Adaptive power module draws from the mains supply.' },
    { title: 'Thermal Regulation  ', content: 'Smart heating and cooling maintain optimal internal balance.' },
    { title: 'Energy Storage System  ', content: 'High-density Li-ion core ensuring uninterrupted readiness.' },
    { title: 'Self-Maintenance Protocols  ', content: 'Runs diagnostics, decontamination, and AI recalibration.' },
    { title: 'Resilient Architecture  ', content: 'Alloy chassis, shock isolation, and anti-tamper reinforcement.' },
    { title: 'Seamless Integration ', content: 'Fully synchronized with AeroVault™ and the FortiVault app.' },
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
