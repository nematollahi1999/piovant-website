<template>
    <section class="py-8 sm:py-0">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 items-center gap-12 rounded-2xl bg-[#c1c1c1] p-8 md:p-12 lg:grid-cols-2">
                <div class="flex justify-center">
                    <img src="/images/aeris-combo.png" alt="ULTRA System" class="w-full max-w-md" />
                </div>
                <div>
                    <h2 class="mb-1 text-xl font-bold md:text-3xl">Why AERIS?</h2>
                    <p class="mb-8 text-sm font-semibold text-blue-600 sm:text-base">
                        Because True defense isn’t reaction — it’s foresight in motion.
                    </p>
                    <div class="p-0 sm:pr-8">
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
    {
        title: 'Integrated Aerial–Terrestrial Awareness.',
        content: 'Unified sky–ground intelligence.',
    },
    {
        title: 'Threat Forecasting AI.',
        content: 'Predictive AI anticipating threats.',
    },
    { title: 'Accurate Intent & Threat Detection.', content: 'Precision recognition of intent and threat.' },
    { title: 'Autonomous Operation in Any Terrain. ', content: 'Seamless autonomy, even in complex environments.' },
    {
        title: 'Secure, Long-Endurance Power. ',
        content: 'Grid-powered endurance and encrypted sovereignty.',
    },
    { title: 'Real-Time Control & Transparent Actions. ', content: 'Instant command, auditable actions, infinite composure.' },
]);
</script>
