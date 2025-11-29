<template>
    <section class="bg-[#0B132B] py-20 text-white sm:py-24">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="mx-auto items-start gap-12 sm:flex">
                <div class="mb-12 text-start">
                    <h2 class="text-2xl font-bold tracking-tight md:text-4xl">FortiVault™ VEIL FAQs</h2>
                    <p class="mt-4 text-gray-300">
                        Have questions? VEIL reveals. Silent. Sharp. Ahead of every threat.

                        <br />
                        Need discreet advice? <a href="#" class="text-blue-400 hover:underline">Our Experts are here.</a>
                    </p>
                </div>
                <div class="space-y-8 sm:px-8">
                    <div v-for="(category, catIndex) in faqData" :key="catIndex">
                        <div class="flex items-center">
                            <h3 class="text-2xl font-semibold">{{ category.title }}</h3>
                            <div class="ml-6 h-px flex-grow bg-gray-700"></div>
                        </div>
                        <div class="mt-6 space-y-2">
                            <FaqAccordionItem
                                v-for="(item, itemIndex) in category.items"
                                :key="itemIndex"
                                :item="item"
                                class="cursor-pointer"
                                :isOpen="openQuestion === `${catIndex}-${itemIndex}`"
                                @toggle="toggleQuestion(catIndex, itemIndex)"
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
import FaqAccordionItem from './FaqAccordionItem.vue';

const openQuestion = ref('0-1'); // Default open question (second question of first category)

const toggleQuestion = (catIndex, itemIndex) => {
    const id = `${catIndex}-${itemIndex}`;
    openQuestion.value = openQuestion.value === id ? null : id;
};

const faqData = ref([
    {
        title: 'VEIL-Exclusive Features',
        items: [
            {
                question: 'What makes VEIL different?',
                answer: 'Never. VEIL is 100% camera-free by design. No footage. No surveillance. Just sensors that know when something’s wrong. without watching.',
            },
            {
                question: 'Does VEIL use cameras?',
                answer: 'Never. VEIL is 100% camera-free by design. No footage. No surveillance. Just sensors that know when something’s wrong. without watching.',
            },
            {
                question: 'What is TapCode™?',
                answer: 'Each FortiVault component has its own long-lasting internal battery. You will be notified via the app well in advance of the battery running low. A backup TapCode entry system ensures you are never locked out.',
            },
            {
                question: 'Can I share access?',
                answer: 'Our sensors are made from scratch-resistant sapphire glass, making them extremely durable and resistant to everyday wear and tear.',
            },
            {
                question: 'Is a subscription required?',
                answer: 'Yes, all exterior components are IP67 rated, meaning they are fully protected against dust and can withstand being submerged in up to 1 meter of water for 30 minutes.',
            },
        ],
    },
    {
        title: 'Technology & Performance',
        items: [
            {
                question: 'How is the system installed?',
                answer: 'Installation is a simple, DIY process that takes less than 15 minutes. No professional help is needed. Just plug in, pair with the app, and you are secure.',
            },
        ],
    },
    {
        title: 'Security & Resilience',
        items: [
            {
                question: 'How secure is my data?',
                answer: "We use end-to-end military-grade AES-256 encryption. Your biometric data is stored only on your device's secure enclave, never in the cloud, ensuring absolute privacy.",
            },
        ],
    },
    {
        title: 'Installation & Support',
        items: [
            {
                question: 'What does the warranty cover?',
                answer: 'Our 1-year international warranty covers any manufacturing defects. Our Priority Replacement Program means we ship you a new unit before you even send back the old one.',
            },
        ],
    },
]);
</script>
