<template>
    <section class="bg-[#0B132B] py-20 text-white sm:py-24">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="mx-auto items-start gap-12 sm:flex">
                <div class="mb-12 text-start">
                    <h2 class="text-2xl font-bold tracking-tight md:text-4xl">FortiVault™ ULTRA FAQs</h2>
                    <p class="mt-4 text-gray-300">
                        Clarity. Confidence. Command. Every question deserves precision — every answer, assurance.

                        <br />
                        Need expert insight? <a href="#" class="text-blue-400 hover:underline">Our specialists are always within reach</a>
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
        title: 'Essence & Design',
        items: [
            {
                question: 'What makes ULTRA different?',
                answer: 'ULTRA is the summit of FortiVault engineering — a unified, AI-enabled defense built for seamless command and instant response. Every module speaks through MeshLink Sync™, an encrypted mesh network that locks down your entire system in milliseconds.',
            },
            {
                question: 'Does ULTRA require subscriptions or upgrades?',
                answer: 'No. ULTRA is complete from day one — fully functional, subscription-free, and self-updating for long-term reliability.',
            },
        ],
    },
    {
        title: 'Performance & Environment',
        items: [
            {
                question: 'Can ULTRA track without GPS?',
                answer: 'Yes. TrackVault™ uses inertial and 9-axis navigation to maintain precise tracking even in tunnels or dead zones.',
            },
            {
                question: 'How does ULTRA handle extreme conditions?',
                answer: 'Engineered for endurance, ULTRA operates flawlessly from –30 °C to +70 °C — resistant to dust, humidity, and shock.',
            },
            {
                question: 'How long do modules stay powered?',
                answer: 'SteerVault™ — Self-powered (≈ 5 days standby) PedalVault™ — Self-powered (≈ 7 days standby) TrackVault™ & AlarmVault™ — Vehicle-powered (24/7) + backup battery (24 h & 2 h armed when disconnected) Smart alerts notify you before any power loss.',
            },
        ],
    },
    {
        title: 'Security & Resilience',
        items: [
            {
                question: 'What happens if a module is tampered with?',
                answer: 'ULTRA reacts instantly — initiating full lockdown and sending immediate alerts through the app.',
            },
            {
                question: 'How does ULTRA defend against jamming or spoofing?',
                answer: 'Each module employs multi-layer encryption, adaptive frequency hopping, and AI-based signal integrity monitoring to resist interference and imitation.',
            },
            {
                question: 'How can I recover access if I lose biometric data or app credentials?',
                answer: 'Use TapCode™ for offline recovery or contact PioVant Support for secure identity verification.',
            },
        ],
    },
    {
        title: 'Installation & Compatibility',
        items: [
            {
                question: 'Can I install ULTRA myself?',
                answer: 'Most modules are wireless and simple to mount. However, for TrackVault™ and AlarmVault™, certified installation is recommended for proper integration with vehicle power and theft-response systems.',
            },
            {
                question: 'Is ULTRA compatible with older vehicles?',
                answer: 'Yes. It works with any 12 V system or standard OBD-II port — from classic sedans to modern EVs.',
            },
            {
                question: 'Can I move ULTRA to another vehicle?',
                answer: 'Absolutely. Detach, mount, and pair — ULTRA is designed to transfer effortlessly.',
            },
        ],
    },
    {
        title: 'Warranty & Support',
        items: [
            {
                question: 'What warranty and support come with ULTRA?',
                answer: 'Every FortiVault ULTRA includes a 12-month comprehensive warranty, extendable anytime through PioVant Care™. Firmware updates and direct expert support are always available.',
            },
        ],
    },
]);
</script>
