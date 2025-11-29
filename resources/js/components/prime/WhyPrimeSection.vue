<template>
    <section class="py-8 sm:py-0">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 items-center gap-12 rounded-2xl bg-[#c1c1c1] p-8 md:p-12 lg:grid-cols-2">
                <div class="flex justify-center">
                    <img src="/images/prime-combo.png" alt="PRIME System" class="w-full max-w-md" />
                </div>
                <div>
                    <h2 class="mb-1 text-xl font-bold md:text-3xl">Why PRIME?</h2>
                    <p class="mb-1 text-sm font-semibold text-blue-600 sm:text-base">Because 'Smart' Is Never Enough.</p>
                    <p class="mb-8 text-xs font-semibold text-gray-600 sm:text-sm">
                        True intelligence is foresight — protection that thinks, learns, and moves before harm exists.
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
    { title: 'Adaptive Intelligence.', content: 'Learns you, locks out intruders.' },
    { title: 'Dual Authentication.', content: 'Face and fingerprint, seamless security.' },
    { title: 'Global Command.', content: 'Issue orders from anywhere, instantly.' },
    { title: 'Resilience by Design.', content: 'Weatherproof, shockproof, tamper-resistant.' },
    { title: 'Future-Ready.', content: 'OTA upgrades, automated and invisible.' },
]);
</script>
