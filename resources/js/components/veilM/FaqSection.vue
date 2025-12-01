<template>
    <section class="bg-[#0B132B] py-20 text-white sm:py-24">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="mx-auto items-start gap-12 sm:flex">
                <div class="mb-12 text-start">
                    <h2 class="text-2xl font-bold tracking-tight md:text-4xl">FortiVault™ VEIL FAQs</h2>
                    <p class="mt-4 text-gray-300">
                        Curious? VEIL illuminates. Stealthy. Accurate. Inviolable.

                        <br />
                        Need private guidance? <br /><a href="#" class="text-blue-400 hover:underline">Consult an expert</a>
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
        title: 'Essence & Purpose',
        items: [
            {
                question: 'What makes VEIL unique?',
                answer: 'VEIL isn’t just a security system — it’s a silent guardian. PedalVault™, TrackVault™, and AlarmVault™ work in perfect coordination to anticipate motion, sense intent, and respond before intrusion happens.',
            },
            {
                question: 'Does VEIL use cameras?',
                answer: 'Never. VEIL is 100% camera-free by design. It relies on encrypted sensors and predictive AI — no images, no surveillance, no compromise on privacy.',
            },
            {
                question: 'Is VEIL subscription-based?',
                answer: 'No. Everything you need works right out of the box. Cloud and remote services are entirely optional — never required.',
            },
        ],
    },
    {
        title: 'Access & Control',
        items: [
            {
                question: 'How does TapCode™ work?',
                answer: 'TapCode™ is your personalized rhythm — a silent, encrypted sequence that unlocks access when your exact pattern is recognized.',
            },
            {
                question: 'Can I share access with others?',
                answer: 'Yes. Through the FortiVault app. You remain in full control — add, limit, or revoke access instantly.',
            },
            {
                question: 'What if I lose my phone or can’t log in?',
                answer: 'You can still unlock using backup biometrics, TapCode™, or our secure recovery process.',
            },
        ],
    },
    {
        title: 'Technology & Performance',
        items: [
            {
                question: 'How does VEIL detect threats before a break-in?',
                answer: 'Its sensors analyze vibration, tilt, and motion patterns in real time — triggering lockdown the moment a threat is identified.',
            },
            {
                question: 'What if someone tampers with the pedal lock?',
                answer: 'PedalVault™ immediately activates AlarmVault™ and TrackVault™, alerting you and securing the system automatically.',
            },
            {
                question: 'Can VEIL function without GPS?',
                answer: 'Yes. TrackVault™ switches to inertial navigation, then re-syncs data once GPS returns — ensuring continuous visibility.',
            },
            {
                question: 'How long does each module stay powered?',
                answer: 'PedalVault™: Self-powered, up to 7 days standby. TrackVault™ & AlarmVault™: Vehicle-powered (24/7), backup batteries (24h & 2h). Smart alerts always warn you before power runs low.',
            },
        ],
    },
    {
        title: 'Security & Privacy',
        items: [
            {
                question: 'Can biometrics be spoofed?',
                answer: 'No. VEIL authenticates live biometrics using anti-spoof AI — fakes, lifts, or synthetic faces are instantly rejected.',
            },
            {
                question: 'What if GPS is jammed or signals are lost?',
                answer: 'VEIL adapts automatically, using GNSS fallback, inertial tracking, and encrypted mesh communication.',
            },
            {
                question: 'Where is my data stored?',
                answer: 'Locally. All information is encrypted and stored on-device. Cloud sync, if enabled, is fully encrypted end-to-end.',
            },
        ],
    },
    {
        title: 'Installation & Support',
        items: [
            {
                question: 'Is PedalVault™ compatible with my car?',
                answer: 'Yes. PedalVault™ fits nearly all vehicles — automatic or manual — with no drilling or damage.',
            },
            {
                question: 'Can I install VEIL myself?',
                answer: 'You can, but professional installation ensures ideal calibration, especially for TrackVault™ and AlarmVault™ integration.',
            },
            {
                question: 'Can I move VEIL to another vehicle?',
                answer: 'Absolutely. Detach, mount, and pair — VEIL is designed to move with you.',
            },
            {
                question: 'Is there a warranty?',
                answer: 'Yes. Every VEIL includes 12 months of protection, extendable anytime through PioVant Care™.',
            },
        ],
    },
]);
</script>
