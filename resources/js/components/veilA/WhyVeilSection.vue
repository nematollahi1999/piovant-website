<template>
    <section class="py-8 sm:py-0">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 items-center gap-12 rounded-2xl bg-[#c1c1c1] p-8 md:p-12 lg:grid-cols-2">
                <div class="flex justify-center">
                    <img src="/images/veil-combo.png" alt="VEIL System" class="w-full max-w-md" />
                </div>
                <div>
                    <h2 class="mb-1 text-xl font-bold md:text-3xl">Why VEIL?</h2>
                    <p class="mb-8 text-sm font-semibold text-blue-600 sm:text-base">Because What You Can’t See. You Can’t Hack.</p>
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
    { title: 'Anticipate. Avert. Defend.', content: 'AI that intercepts danger before it’s even danger.' },
    { title: 'Three Access Points. One Controller.', content: 'Details about identity...' },
    { title: 'No Subscriptions. No Restrictions.', content: 'Details about global control...' },
    { title: 'Armor for Extremes.', content: 'Details about durability...' },
    { title: 'Unseen Shielding.', content: 'Details about updates...' },
]);
</script>
