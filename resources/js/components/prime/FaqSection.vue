<template>
    <section class="bg-[#0B132B] py-20 text-white sm:py-24">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="mx-auto items-start gap-12 sm:flex">
                <div class="mb-12 text-start">
                    <h2 class="text-2xl font-bold tracking-tight md:text-4xl">FortiVault™ PRIME FAQs</h2>
                    <p class="mt-4 text-gray-300">
                        Have questions? PRIME has answers.Deep intelligence, made beautifully simple..
                        <br />
                        Need more clarity? <a href="#" class="text-blue-400 hover:underline">Talk to an Expert</a>
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
                question: 'What makes PRIME unique?',
                answer: 'PRIME isn’t just smart — it evolves. Its adaptive AI learns owner behavior, anticipates threats, and responds in perfect harmony. Encrypted wireless links connect every module — from biometric lock-in to crash-triggered SOS — powered by high-density batteries for zero downtime.',
            },
            {
                question: 'Does PRIME require subscriptions or upgrades?',
                answer: 'No. PRIME is fully functional from day one, with optional cloud add-ons for extended storage and analytics.',
            },
            {
                question: 'Can I upgrade modules later?',
                answer: 'Absolutely. Every module supports over-the-air firmware and feature updates — no cables, no interruptions.',
            },
        ],
    },
    {
        title: 'Performance & Functionality',
        items: [
            {
                question: 'What happens if the GPS signal is lost or jammed?',
                answer: 'PRIME instantly switches to inertial navigation — maintaining precision through advanced gyros and accelerometers.',
            },
            {
                question: 'How does remote engine shutdown work?',
                answer: 'You can securely disable your vehicle via the FortiVault app. Safety interlocks ensure it cannot activate during normal driving — it engages only when a verified theft or coercion event is detected.',
            },
            {
                question: 'Does PRIME record video inside the vehicle?',
                answer: 'Yes. SteerVault™ SmartCam captures encrypted HD footage locally — never uploaded to external servers. You can view live or erase instantly through the app.',
            },
            {
                question: 'Can PRIME detect silent break-ins?',
                answer: 'Yes. Choose between silent detection or active deterrent response — fully customizable through your app dashboard.',
            },
            {
                question: 'How long does each module stay powered?',
                answer: 'SteerVault™ — Self-powered (≈ 5 days standby) TrackVault™ & AlarmVault™ — Vehicle-powered (24/7) + backup battery (24 h & 2 h active when disconnected) Smart alerts notify you before power depletion.',
            },
        ],
    },
    {
        title: 'Security & Resilience',
        items: [
            {
                question: 'How does PRIME protect against spoofing or jamming?',
                answer: 'Multiple layers of encryption, AI-driven anomaly detection, and redundant communication channels keep interference and imitation out.',
            },
            {
                question: 'Can biometric access be faked?',
                answer: 'No. PRIME’s anti-spoof AI identifies deepfakes, cloned prints, and synthetic faces — even in low light.',
            },
        ],
    },
    {
        title: 'Installation & Compatibility',
        items: [
            {
                question: 'Is professional installation required?',
                answer: 'Recommended — especially for TrackVault™ and AlarmVault™ modules to ensure full functionality and system calibration.',
            },
            {
                question: 'Is PRIME compatible with older vehicles?',
                answer: 'Yes. Works flawlessly with any 12 V power system or standard OBD-II port.',
            },
            {
                question: 'Can I transfer PRIME to another vehicle?',
                answer: 'Yes. PRIME is fully portable — detach, remount, and reconnect in minutes.',
            },
        ],
    },
    {
        title: 'Support & Warranty',
        items: [
            {
                question: 'What warranty does PRIME include?',
                answer: 'Every PRIME system comes with a 12-month comprehensive warranty, extendable anytime through PioVant Care™.',
            },
            {
                question: 'What if I lose access to my phone or credentials?',
                answer: 'Use biometrics, Morse Code unlocks, or follow our secure recovery protocol via PioVant Support.',
            },
        ],
    },
]);
</script>
