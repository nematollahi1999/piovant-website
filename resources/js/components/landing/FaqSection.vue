<template>
    <section class="bg-[#0B132B] py-20 text-white sm:py-24">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="mx-auto items-start gap-12 sm:flex">
                <div class="mb-12 w-full text-start">
                    <h2 class="text-2xl font-bold tracking-tight md:text-4xl">FortiVault™ FAQs</h2>
                    <p class="mt-4 text-gray-300">
                        We've answered the most common questions, because clarity builds confidence. <br />
                        Still curious? <a href="#" class="text-blue-400 hover:underline">Talk to an Expert</a>
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
        title: 'Product Overview',
        items: [
            {
                question: 'Is FortiVault compatible with my car?',
                answer: 'Yes. FortiVault integrates seamlessly with nearly all modern vehicles — regardless of make, model, or powertrain.',
            },
            {
                question: 'How does biometric unlocking work?',
                answer: 'AI-powered fingerprint and facial recognition authenticate with exceptional accuracy — even in rain, low light, or dusty environments. Backup access via app or TapCode™ ensures you’re never locked out.',
            },
            {
                question: 'What if the battery depletes?',
                answer: 'The lock remains engaged. Simply recharge externally — uninterrupted security assured.',
            },
            {
                question: 'Is FortiVault weatherproof?',
                answer: 'Absolutely. Each module is treated with LIQUIPEL™ nano-coating, defending against moisture, dust, and temperature extremes.',
            },
            {
                question: 'What makes AERIS™ extraordinary, and how do its components work together?',
                answer: 'AERIS™ extends protection beyond the vehicle through a fully synchronized ecosystem: AeroVault™ Drone — Autonomous flight, AI-guided tracking, and live visual monitoring.  TerraDock™ Station — Launches, recharges, and sustains AeroVault™ using grid-powered backup. The central unit, TrackVault™ (GPS Tracker), coordinates mission signals. AeroVault™ executes surveillance and defensive actions, then returns to TerraDock™. AeroVault™ cannot operate independently; it requires encrypted coordination with TrackVault™.',
            },
            {
                question: 'What happens when a threat is detected?',
                answer: 'TrackVault™ locks the engine and fuel systems, activates the alarm system, and dispatches real-time alerts. When integrated with AERIS™, AeroVault™ autonomously deploys to pursue, record, and report.',
            },
        ],
    },
    {
        title: 'Technical & Functionality',
        items: [
            {
                question: 'What role does IoT play in FortiVault?',
                answer: 'IoT creates a live bridge between you and your devices — enabling remote access, instant alerts, and diagnostic visibility in real time.',
            },
            {
                question: 'How precise is vehicle tracking?',
                answer: 'FortiVault uses multi-constellation GNSS (GPS + GLONASS + Galileo + BeiDou) for up to 1.5-meter accuracy — anywhere on Earth.',
            },
            {
                question: 'How resilient is the fingerprint sensor?',
                answer: 'The ZW0608 sensor is high-resolution, fast, and power-efficient. It adapts seamlessly to dirt, wet, or cold conditions, switching to facial recognition, Morse code, or app unlock as needed.',
            },
            {
                question: 'Is FortiVault compatible with all platforms and packs?',
                answer: 'Yes. The FortiVault ecosystem supports Android, iOS, and web access — with AERIS™ integrating seamlessly across PRIME™, VEIL™, and ULTRA™.',
            },
            {
                question: 'What are the operational limits for AeroVault™ and TerraDock™?',
                answer: 'Flight missions last 25–30 minutes. Nano-coated for environmental resilience. TerraDock™ draws primary power from the grid supply and maintains a backup battery during outages. Firmware updates are automatic. Each TerraDock™ supports one AeroVault™ for safe synchronization.',
            },
        ],
    },
    {
        title: 'Security & Encryption',
        items: [
            {
                question: 'Is biometric data secure?',
                answer: 'Completely. All data is stored locally, fully encrypted, never leaving the device.',
            },
            {
                question: 'Can FortiVault systems be tampered with or hijacked?',
                answer: 'No. Tamper detection, adaptive AI, industrial-grade encryption, and anti-jamming secure the systems. AeroVault™ employs frequency hopping, private channels, and Failsafe Mode.',
            },
        ],
    },
    {
        title: 'Warranty & Support',
        items: [
            {
                question: 'What does the warranty include?',
                answer: '12-month full coverage for all hardware, electronics, and batteries. Extended protection and priority replacement are available via PioVant Care™.',
            },
            {
                question: 'What’s not covered under warranty?',
                answer: 'Physical damage (impact, liquid, chemicals). Unauthorized accessories or apps. Scratched, tampered with, or modified sensors. Battery misuse or extreme discharge. Power surges, faulty wiring, unsafe installations. Mishandling or forced fittings. Network misuse or unprotected connections',
            },
            {
                question: 'What if damage occurs outside warranty?',
                answer: 'Damaged packs can be returned for discounted replacement via PioVant Care™. AeroVault™ and TerraDock™ are also eligible for Priority Replacement.',
            },
            {
                question: 'Is support available 24/7?',
                answer: 'Yes — via app or email. Priority issues are handled immediately.',
            },
            {
                question: 'Can the product be returned?',
                answer: '7-day money-back guarantee for technical issues. 30-day exchange for manufacturing defects. Return shipping is covered by the customer unless the issue is PioVant’s responsibility.',
            },
        ],
    },
]);
</script>
