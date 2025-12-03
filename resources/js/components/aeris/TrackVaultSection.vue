<template>
    <section class="bg-white py-8 sm:py-20">
        <div class="container mx-auto px-8 sm:px-16">
            <div class="mb-12 flex items-center justify-between">
                <div>
                    <span class="text-xl font-bold text-blue-600 md:text-4xl">03</span>
                    <h2 class="mt-1 text-xl font-bold md:text-4xl">TrackVault™</h2>
                </div>
                <p class="mt-2 text-end text-lg font-medium text-gray-600 md:text-2xl">Beyond Location. <br />Into Awareness.</p>
            </div>
            <div class="grid grid-cols-1 items-start gap-12 lg:grid-cols-2">
                <div class="flex w-full flex-col items-start sm:col-span-1">
                    <img src="/images/trackvault-module.jpg" alt="TrackVault Module" class="h-full w-full object-cover" />
                </div>
                <div class="sm:col-span-1">
                    <p class="mb-4 max-w-md text-start text-lg text-gray-700">
                        A predictive guardian that perceives movement, evaluates behavior, and triggers protection before threats escalate.
                    </p>
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
    { title: 'Global GNSS Convergence ', content: 'GPS, GLONASS, BeiDou, Galileo for planetary positioning accuracy.' },
    { title: '9-Axis Navigation Array ', content: 'Gyroscope, accelerometer, magnetometer — reliable even underground.' },
    { title: 'Twelve-Month Route Memory ', content: 'Encrypted playback of your vehicle’s every motion.' },
    {
        title: 'AI Geofence Intelligence ',
        content: 'Creates invisible boundaries. Breach one — you’ll know in an instant.',
    },
    {
        title: 'Impact & Motion Sensors ',
        content: 'Detects towing, glass break, and intrusion before escalation.',
    },
    {
        title: 'Remote Immobilization Protocol ',
        content: 'Disable ignition remotely. Restart only with your consent.',
    },
    { title: 'Sabotage Shield™ ', content: 'Counteracts jamming, spoofing, and signal manipulation.' },
    { title: 'HyperLink Connectivity ', content: 'SIM, eSIM, and RF mesh — multi-channel network reliability.' },
    { title: 'Dual Battery ', content: 'Vehicle and system backup; always operational.' },
]);
</script>
