<template>
    <section class="bg-[#0B132B] py-20 text-white sm:py-24">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="mx-auto items-start gap-12 sm:flex">
                <div class="mb-12 text-start">
                    <h2 class="text-2xl font-bold tracking-tight md:text-4xl">FortiVault™ AERIS FAQs</h2>
                    <p class="mt-4 text-gray-300">
                        Where intelligence defines clarity. Every question, answered with engineered precision.

                        <br />
                        Need further insight? <a href="#" class="text-blue-400 hover:underline">Talk to an Expert</a>
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
        title: 'AERIS-Exclusive Features',
        items: [
            {
                question: 'What is FortiVault AERIS™, and how does it operate within the ecosystem?',
                answer: 'FortiVault AERIS™ is an intelligent aerial defense extension — where autonomy meets harmony. It integrates two core systems; AeroVault™ — a self-launching aerial sentinel for surveillance and rapid response. TerraDock™ — a ground base managing charging, navigation, and mission intelligence.Together, they seamlessly synchronize with FortiVault (PRIME, VEIL, and ULTRA), ensuring unified protection across the sky and ground.',
            },
            {
                question: 'Does ULTRA require subscriptions or upgrades?',
                answer: 'No. ULTRA is complete from day one — fully functional, subscription-free, and self-updating for long-term reliability.',
            },
            {
                question: 'Can AeroVault™ function independently?',
                answer: 'Not entirely. AeroVault™ coordinates through TrackVault™, maintaining encrypted communication and precision control at all times.',
            },
            {
                question: 'How is AeroVault™ distinct from other FortiVault models?',
                answer: 'While others guard from the ground, AeroVault™ commands the air — bringing real-time aerial vision, tracking, and adaptive defense to your FortiVault ecosystem.',
            },
            {
                question: 'Where should TerraDock™ be installed for optimal performance?',
                answer: 'TerraDock™ performs best on an open, unobstructed, and stable surface — such as rooftops or secured courtyards — ensuring optimal visibility and launch precision.',
            },
        ],
    },
    {
        title: 'Technical & Functionality',
        items: [
            {
                question: 'How quickly does AeroVault™ deploy after activation?',
                answer: 'Within 8 seconds, AeroVault™ autonomously launches and commences its mission.',
            },
            {
                question: 'What is the typical mission duration and recharge process?',
                answer: 'Each flight lasts 25–30 minutes. Upon detecting low power, AeroVault™ automatically returns to TerraDock™ for magnetic recharging.',
            },
            {
                question: 'How does AeroVault™ navigate and maintain orientation?   ',
                answer: 'Using multi-band GNSS, a 9-axis gyroscope, and AI environmental mapping, AeroVault™ ensures accurate positioning and safe return — even under signal disruption.',
            },
            {
                question: 'Can users define flight paths or patrol areas?   ',
                answer: 'Yes. The FortiVault App enables custom flight zones, automated patrol paths, and secure return coordinates.',
            },
            {
                question: 'How resilient is AERIS™ against environmental challenges?  ',
                answer: 'Both AeroVault™ and TerraDock™ are nano-coated and thermally self-regulated, ensuring consistent performance in rain, dust, or extreme temperatures.',
            },
            {
                question: 'What occurs if communication or GPS is lost?   ',
                answer: 'AeroVault™ activates its Failsafe Protocol, ensuring an autonomous and secure return to TerraDock™ while maintaining data integrity.',
            },
            {
                question: 'Can one TerraDock™ manage multiple AeroVaults™?  ',
                answer: 'No. Each TerraDock™ is individually calibrated for one AeroVault™ — ensuring stability, safety, and optimal synchronization.',
            },
            {
                question: 'How are updates managed?  ',
                answer: 'All firmware, AI, and security updates are delivered automatically via encrypted cloud synchronization.',
            },
            {
                question: 'What happens in case of a system or in-flight error?  ',
                answer: 'AeroVault™ instantly initiates Safe Return Mode, back to TerraDock™, and generates a detailed diagnostic report via the app.',
            },
            {
                question: 'Does AeroVault™ require licensing to operate?  ',
                answer: 'AeroVault™ is designed for private, secured deployment only. All flights are internally managed, confined to authorized areas, and comply with operational safety protocols—no public or commercial licensing is required.________________________________________',
            },
        ],
    },
    {
        title: 'Security & Resilience',
        items: [
            {
                question: 'Are communications between AeroVault™ and TrackVault™ secure?',
                answer: 'Absolutely. All transmissions use SkyMesh™ / OmniSync™ encryption with adaptive authentication and real-time frequency modulation.',
            },
            {
                question: 'Is mission data stored in the cloud?',
                answer: 'Only with user consent. By default, all operational data remains locally encrypted within the onboard system.',
            },
            {
                question: 'Can AeroVault™ operate safely during interference or disconnection?',
                answer: 'Yes. Autonomous Failsafe Mode maintains internal navigation until a stable link is reestablished.',
            },
            {
                question: 'Is AeroVault™ immune to hacking or hijacking?',
                answer: 'Practically, yes. Multi-layered AI-driven anti-jamming, private channels, and frequency-hopping encryption make intrusion nearly impossible.',
            },
            {
                question: 'Can AeroVault™ send emergency alerts?',
                answer: 'Yes. When configured, AeroVault™ transmits encrypted emergency notifications to trusted contacts or local authorities during critical events.',
            },
        ],
    },
    {
        title: 'Warranty & Support',
        items: [
            {
                question: 'What is the warranty period for FortiVault AERIS™?',
                answer: 'A 12-month comprehensive warranty covers both hardware and software — including electronics, battery, and updates. Extended coverage plans are available.',
            },
            {
                question: 'Are parts replaceable or upgradable?',
                answer: 'Yes. Battery units, propellers, and camera modules are modular — allowing simple replacement or performance upgrades as technology evolves.',
            },
        ],
    },
]);
</script>
