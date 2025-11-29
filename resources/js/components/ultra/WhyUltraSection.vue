<template>
    <section class="py-8 sm:py-0">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 items-center gap-12 rounded-2xl bg-[#c1c1c1] p-8 md:p-12 lg:grid-cols-2">
                <div class="flex justify-center">
                    <img src="/images/ultra-combo.png" alt="ULTRA System" class="w-full max-w-md" />
                </div>
                <div>
                    <h2 class="mb-1 text-xl font-bold md:text-3xl">Why ULTRA?</h2>
                    <p class="mb-8 text-sm font-semibold text-blue-600 sm:text-base">Because true security doesn’t react — it conducts perfection.</p>
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
    { title: 'All Modules. One Mind.', content: 'SteerVault™, PedalVault™, TrackVault™, AlarmVault™ — perfectly unified.' },
    { title: 'Ready Out-of-the-Box.', content: 'No upgrades, no guesswork. Day one protection.' },
    { title: 'Tempered for Extremes.', content: 'Heat, ice, impact — unyielding.' },
    { title: 'Indivisible. Invincible. ', content: 'No weak links, no compromise.' },
]);
</script>
