<template>
    <section class="bg-slate-100 py-8 sm:py-20">
        <div class="container mx-auto px-8 sm:px-16">
            <div class="mb-12 flex items-center justify-between">
                <div>
                    <span class="text-xl font-bold text-blue-600 md:text-4xl">03</span>
                    <h2 class="mt-1 text-xl font-bold md:text-4xl">AlarmVault™</h2>
                </div>
                <p class="mt-2 text-end text-lg font-medium text-gray-600 md:text-2xl">Silent Until It Strikes. <br />Relentless When It Does.</p>
            </div>

            <div class="flex flex-col items-center">
                <img src="/images/alarmvault-module.jpg" alt="AlarmVault Module" class="mb-8 w-full object-cover" />

                <div class="grid w-full grid-cols-1 items-start gap-12 sm:grid-cols-3">
                    <div class="col-span-1">
                        <p class="mb-12 text-start text-lg text-gray-700">Your last line of defense — invisible, intelligent, and unstoppable.</p>
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
    { title: 'Independent Power Source', content: "Keeps working, even if your car's power is cut." },
    { title: 'False Alarm Intelligence', content: 'Details about false alarm prevention...' },
    { title: 'Exclusive Owner Control', content: 'Details about owner control...' },
    { title: 'High-Decibel Deterrent', content: 'Details about the alarm sound...' },
    { title: 'Anti-Jamming Technology', content: 'Details about anti-jamming...' },
    { title: 'Mesh Sync with Ecosystem', content: 'Details about ecosystem sync...' },
]);
</script>
