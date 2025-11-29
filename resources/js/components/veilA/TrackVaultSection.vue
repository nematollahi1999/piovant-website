<template>
    <section class="bg-white py-8 sm:py-20">
        <div class="container mx-auto px-8 sm:px-16">
            <div class="mb-12 flex items-center justify-between">
                <div>
                    <span class="text-xl font-bold text-blue-600 md:text-4xl">02</span>
                    <h2 class="mt-1 text-xl font-bold md:text-4xl">TrackVault™</h2>
                </div>
                <p class="mt-2 text-end text-lg font-medium text-gray-600 md:text-2xl">Satellite-Grade Tracking. <br />Total Awareness.</p>
            </div>
            <div class="grid grid-cols-1 items-start gap-12 lg:grid-cols-2">
                <div class="flex w-full flex-col items-start sm:col-span-1">
                    <img src="/images/trackvault-module.jpg" alt="TrackVault Module" class="h-full w-full object-cover" />
                    <p class="mt-8 max-w-md text-start text-lg text-gray-700">
                        More than GPS — it reads anomalies and notifies before it's too late.
                    </p>
                </div>
                <div class="sm:col-span-1">
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
import { ref } from 'vue';
import AccordionItem from '../landing/AccordionItem.vue';

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
    { title: 'Global GNSS Tracking', content: 'GPS, GLONASS, BeiDou, Galileo — pinpoint precision worldwide.' },
    { title: '9-Axis Inertial Navigation', content: 'Details about inertial navigation...' },
    { title: '12-Month Route Playback', content: 'Details about route playback...' },
    { title: 'AI Geofencing', content: 'Details about AI geofencing...' },
    { title: 'Impact & Motion Detection', content: 'Details about detection systems...' },
    { title: 'Remote Engine Immobilizer', content: 'Details about the immobilizer...' },
    { title: 'Sabotage Shield', content: 'Details about sabotage protection...' },
    { title: 'Multi-Channel Connectivity', content: 'Details about connectivity...' },
    { title: 'Crash-Triggered SOS', content: 'Details about SOS feature...' },
    { title: 'Dual Battery Backup', content: 'Details about the battery backup...' },
]);
</script>
