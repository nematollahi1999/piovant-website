<template>
    <div class="font-sans antialiased">
        <main class="overflow-hidden">
            <!-- Hero Section -->
            <section ref="heroRef" class="fade-in-section flex min-h-[70vh] flex-col items-center justify-center bg-slate-200 px-6 text-center">
                <h1 class="max-w-4xl text-5xl font-bold tracking-tight text-gray-800 md:text-7xl">FortiVault FAQs</h1>
                <p class="mt-6 max-w-3xl text-xl text-gray-600 md:text-2xl">
                    Answers crafted for precision.
                    <span class="bg-gradient-to-r from-[#F87479] to-[#2546FF] bg-clip-text text-transparent">Confidence forged in clarity.</span>
                </p>
                <a
                    href="#contact"
                    class="mt-8 inline-block rounded-full bg-gray-800 px-6 py-3 font-semibold text-white transition-transform hover:scale-105"
                >
                    Seeking more? Engage with an expert
                </a>
            </section>

            <!-- FAQ Accordion Section -->
            <section class="bg-white py-24 sm:py-32">
                <div class="container mx-auto max-w-4xl px-6">
                    <!-- Loop through each FAQ category -->
                    <div
                        v-for="(section, sectionIndex) in faqSections"
                        :key="section.category"
                        ref="faqSectionRefs"
                        class="fade-in-section mb-20 last:mb-0"
                    >
                        <div class="flex items-center gap-4 border-b border-gray-300 pb-4">
                            <component :is="section.icon" class="h-10 w-10 flex-shrink-0 text-blue-600" />
                            <h2 class="text-3xl font-bold tracking-tight text-gray-800">{{ section.category }}</h2>
                        </div>

                        <div class="mt-8 divide-y divide-gray-200 border-t border-gray-200">
                            <!-- Loop through each FAQ item in the category -->
                            <div v-for="(item, itemIndex) in section.items" :key="item.q" class="py-6">
                                <button
                                    @click="toggleFaq(sectionIndex, itemIndex)"
                                    class="flex w-full items-center justify-between text-left text-gray-800"
                                >
                                    <span class="text-lg font-medium">{{ item.q }}</span>
                                    <ChevronDownIcon
                                        :class="[
                                            'h-6 w-6 flex-shrink-0 transform transition-transform duration-300',
                                            { 'rotate-180': isFaqOpen(sectionIndex, itemIndex) },
                                        ]"
                                    />
                                </button>
                                <div v-show="isFaqOpen(sectionIndex, itemIndex)" class="prose prose-lg mt-4 max-w-none text-gray-600">
                                    <p v-html="item.a"></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Contact Section (Reused from previous examples) -->
            <section id="contact" ref="contactRef" class="fade-in-section bg-black py-24 sm:py-32">
                <div class="container mx-auto max-w-xl px-6 text-center">
                    <EnvelopeIcon class="mx-auto h-12 w-12 text-gray-400" />
                    <h2 class="mt-4 text-3xl font-bold text-white">Still have questions?</h2>
                    <p class="mt-4 text-lg text-gray-400">
                        Our team is ready to provide the clarity you need. Reach out and we'll get back to you promptly.
                    </p>
                    <a
                        href="mailto:support@piovant.com"
                        class="mt-6 inline-block rounded-full bg-gradient-to-r from-[#F87479] to-[#2546FF] px-8 py-3 text-lg font-semibold text-white transition-transform hover:scale-105"
                    >
                        Contact Support
                    </a>
                </div>
            </section>
        </main>
    </div>
</template>

<script setup>
import { ChevronDownIcon, CubeIcon, EnvelopeIcon, LifebuoyIcon, ShieldCheckIcon, TruckIcon, WrenchScrewdriverIcon } from '@heroicons/vue/24/outline';
import { onMounted, onUnmounted, ref } from 'vue';
import AppLayout from '../layouts/AppLayout.vue';

defineOptions({ layout: AppLayout });

// --- Accordion State ---
const openFaq = ref(null); // Stores the open FAQ as a string like "sectionIndex-itemIndex"

const toggleFaq = (sectionIndex, itemIndex) => {
    const key = `${sectionIndex}-${itemIndex}`;
    openFaq.value = openFaq.value === key ? null : key;
};

const isFaqOpen = (sectionIndex, itemIndex) => {
    return openFaq.value === `${sectionIndex}-${itemIndex}`;
};

// --- FAQ Content ---
const faqSections = ref([
    {
        category: 'Product Overview',
        icon: CubeIcon,
        items: [
            {
                q: 'Is FortiVault compatible with my vehicle?',
                a: 'Yes. FortiVault integrates seamlessly with nearly all modern vehicles—automatic or manual, petrol, hybrid, or electric—without drilling or modifications. Classic cars or EVs? Fully supported via standard 12 V or OBD-II connection.',
            },
            {
                q: 'How does biometric unlocking work?',
                a: 'AI-powered fingerprint and facial recognition authenticate with precision in all conditions— moisture, low light, or dust. TapCode™ and app-based backup access ensure uninterrupted entry.',
            },
            { q: 'What if the battery depletes?', a: 'Locks remain engaged. Recharge externally at your convenience—security never compromises.' },
            {
                q: 'Is FortiVault weatherproof?',
                a: 'Yes. Each module is nano-coated with LIQUIPEL™, defending against moisture, dust, and extreme temperatures.',
            },
            {
                q: 'What is FortiVault AERIS™, and how does it operate?',
                a: 'AERIS™ is an intelligent aerial defense ecosystem integrating:<ul class="list-disc pl-6"><li><strong>AeroVault™ Drone:</strong> Autonomous flight with AI-guided tracking and live monitoring.</li><li><strong>TerraDock™ Station:</strong> Grid-powered launch, recharge, and continuous support for AeroVault™, with backup battery maintained when offline.</li><li><strong>TrackVault™ (GPS Tracker):</strong> Central hub coordinating all signals.</li></ul>Together, they provide synchronized aerial and ground protection. AeroVault™ operates only in encrypted coordination with TrackVault™—ensuring secure, precise defense.',
            },
            {
                q: 'What happens when a threat is detected?',
                a: 'TrackVault™ instantly locks the engine and fuel system, triggers alarms, and sends real-time alerts. When AERIS™ is integrated, AeroVault™ autonomously deploys, records, and reports.',
            },
            {
                q: 'What makes PRIME unique?',
                a: 'PRIME adapts to you. Its AI learns behaviors, anticipates threats, and responds instantly. Encrypted wireless links connect all modules—from biometrics to crash-triggered SOS—powered by dual batteries for uninterrupted operation.',
            },
            {
                q: 'Do FortiVault devices require subscriptions or upgrades?',
                a: 'No. Fully functional out of the box. Optional cloud features are available for analytics and extended storage.',
            },
            {
                q: 'Can I upgrade modules later?',
                a: 'Yes. All modules support over-the-air firmware updates—providing seamless and cable-free updates.',
            },
            {
                q: 'What makes VEIL unique?',
                a: 'VEIL is a silent guardian. PedalVault™, TrackVault™, and AlarmVault™ anticipate intrusion through encrypted sensors and predictive AI—no cameras, no compromise on privacy. Fully functional from day one, subscription-free.',
            },
            {
                q: 'What makes ULTRA different?',
                a: 'ULTRA represents FortiVault engineering at its peak: a unified, AI-enabled defense with MeshLink Sync™ encrypted communication for instant, system-wide security. Fully functional, subscription-free, and self-updating.',
            },
            {
                q: 'How does TapCode™ work?',
                a: 'TapCode™ is a personalized, silent, encrypted sequence—unlocking access when your exact pattern is recognized.',
            },
            {
                q: 'Can I share access with others?',
                a: 'Yes. Through the FortiVault app, with full control to add, limit, or revoke access instantly.',
            },
            {
                q: 'What if I lose my phone or credentials?',
                a: 'Backup biometrics, TapCode™, or our secure recovery process ensures uninterrupted access.',
            },
        ],
    },
    {
        category: 'Technical & Functionality',
        icon: WrenchScrewdriverIcon,
        items: [
            {
                q: 'What role does IoT play in FortiVault?',
                a: 'IoT bridges you and your devices—enabling remote access, instant alerts, and real-time diagnostics.',
            },
            {
                q: 'How precise is vehicle tracking?',
                a: 'Multi-constellation GNSS (GPS + GLONASS + Galileo + BeiDou) provides up to 1.5-meter accuracy globally. In GPS loss, inertial navigation ensures uninterrupted precision.',
            },
            {
                q: 'How resilient is the fingerprint sensor?',
                a: 'The ZW0608 sensor is high-resolution, fast, and power-efficient. Adapts seamlessly to dirt, moisture, or cold—automatically switching to facial recognition, TapCode™, or app unlock as needed.',
            },
            {
                q: 'What are AeroVault™ operational limits?',
                a: 'Flight missions last 25–30 minutes. Nano-coated for environmental resilience. TerraDock™ draws primary power from the grid supply and maintains a backup battery during outages. Firmware updates are automatic. Each TerraDock™ supports one AeroVault™ for safe synchronization.',
            },
            { q: 'How quickly does AeroVault™ deploy after activation?', a: '8 seconds to launch and commence the mission.' },
            {
                q: 'How does AeroVault™ navigate and maintain orientation?',
                a: 'Multi-band GNSS, 9-axis gyroscope, and AI environmental mapping ensure accurate positioning, safe return, and fail-safe operation under signal disruption.',
            },
            {
                q: 'Can users define flight paths or patrol areas?',
                a: 'Yes. The FortiVault app enables custom zones, automated patrols, and secure return coordinates.',
            },
            {
                q: 'How resilient is AeroVault™ in extreme conditions?',
                a: 'Nano-coated and thermally regulated for rain, dust, or temperature extremes. Failsafe Protocol ensures a secure return if GPS or communication is lost.',
            },
            {
                q: 'Can one TerraDock™ manage multiple AeroVaults™?',
                a: 'No. Each TerraDock™ is calibrated for a single AeroVault™ to maintain stability and synchronization.',
            },
            {
                q: 'How are updates managed?',
                a: 'All firmware, AI, and security updates are delivered automatically via encrypted cloud synchronization.',
            },
            {
                q: 'What happens in case of in-flight errors or GPS loss?',
                a: 'Safe Return Mode ensures autonomous return to TerraDock™, generating diagnostic reports via the app.',
            },
            {
                q: 'Does AeroVault™ require licensing?',
                a: 'AeroVault™ is intended for private, on-premise operation within authorized zones and does not require public or commercial flight licensing. Users remain responsible for compliance with local airspace and safety regulations.',
            },
            {
                q: 'How does remote engine shutdown work?',
                a: 'Securely disable your vehicle via the app. Safety interlocks prevent activation during normal driving; only verified theft or coercion triggers engagement.',
            },
            {
                q: 'Does PRIME record video inside the vehicle?',
                a: 'Yes. SteerVault™ SmartCam captures encrypted HD footage locally—never uploaded externally. Live view and deletion are app-controlled.',
            },
            { q: 'Can FortiVault systems detect silent break-ins?', a: 'Yes. Fully customizable between silent detection and active deterrent.' },
            {
                q: 'How long does each module stay powered?',
                a: '<ul><li><strong>SteerVault™:</strong> ≈5 days standby</li><li><strong>PedalVault™:</strong> ≈7 days standby</li><li><strong>TrackVault™ & AlarmVault™:</strong> Vehicle-powered 24/7, with 24h & 2h active backup</li></ul>Smart alerts notify before power depletion.',
            },
            {
                q: 'How do FortiVault devices detect threats preemptively?',
                a: 'Sensors analyze vibration, tilt, and motion, triggering lockdown and activating AlarmVault™ and TrackVault™ instantly.',
            },
            {
                q: 'Can TrackVault function without GPS?',
                a: 'Yes. It switches to encrypted inertial navigation for continuous tracking, then syncs automatically when GPS returns.',
            },
            {
                q: 'How do FortiVault devices handle extreme conditions?',
                a: 'Operates flawlessly from –30 °C to +70 °C—resistant to dust, humidity, and shock.',
            },
        ],
    },
    {
        category: 'Security & Encryption',
        icon: ShieldCheckIcon,
        items: [
            { q: 'Is biometric data secure?', a: 'Completely. Stored locally, fully encrypted, never leaving the device.' },
            {
                q: 'Can FortiVault systems be tampered with or hijacked?',
                a: 'No. Tamper detection, adaptive AI, industrial-grade encryption, and anti-jamming secure the systems. AeroVault™ employs frequency hopping, private channels, and Failsafe Mode.',
            },
            {
                q: 'Are communications secure?',
                a: 'All transmissions (SkyMesh™ / OmniSync™ / MeshLink Sync™) use adaptive encryption with real-time frequency modulation. Mission data is stored locally unless the user consents to cloud sync.',
            },
            {
                q: 'Can biometric access be faked?',
                a: 'No. Anti-spoof AI identifies deepfakes, cloned prints, and synthetic faces—even in low light.',
            },
            { q: 'What if GPS is jammed?', a: 'PRIME, VEIL, and ULTRA adapt via inertial tracking and encrypted mesh communication.' },
            { q: 'Where is data stored?', a: 'Locally, fully encrypted. Cloud sync is optional and end-to-end encrypted.' },
            { q: 'How can access be recovered?', a: 'TapCode™ offline recovery or PioVant Support ensures secure identity verification.' },
        ],
    },
    {
        category: 'Installation & Compatibility',
        icon: TruckIcon,
        items: [
            {
                q: 'Is professional installation required?',
                a: 'Recommended for TrackVault™ and AlarmVault™ for full calibration and functionality. Other modules are plug-and-play.',
            },
            {
                q: 'Can systems transfer between vehicles?',
                a: 'Yes. PRIME, VEIL, and ULTRA are fully portable—detach, mount, and pair within minutes.',
            },
            {
                q: 'Can PedalVault™ and other modules be self-installed?',
                a: 'Yes. PedalVault™ fits most vehicles without drilling. Professional installation ensures optimal calibration for integrated modules.',
            },
            {
                q: 'Where should TerraDock™ be installed for optimal performance?',
                a: 'Open, stable surfaces—such as rooftops or secured courtyards—ensure visibility and launch precision.',
            },
        ],
    },
    {
        category: 'Warranty & Support',
        icon: LifebuoyIcon,
        items: [
            {
                q: 'What does the warranty include?',
                a: '12-month full coverage for hardware, electronics, and batteries. Extended plans available via PioVant Care™.',
            },
            {
                q: 'What’s not covered under warranty?',
                a: '<ul class="list-disc pl-6"><li>Physical damage (impact, liquid, chemicals)</li><li>Unauthorized accessories or apps</li><li>Scratched, tampered with, or modified sensors</li><li>Battery misuse or extreme discharge</li><li>Power surges, faulty wiring, unsafe installations</li><li>Mishandling or forced fittings</li><li>Network misuse or unprotected connections</li></ul>',
            },
            {
                q: 'What if damage occurs outside warranty?',
                a: 'Damaged packs can be returned for discounted replacement via PioVant Care™. AeroVault™ and TerraDock™ are also eligible for Priority Replacement.',
            },
            { q: 'Is support available 24/7?', a: 'Yes — via app or email. Priority issues are handled immediately.' },
            {
                q: 'Are parts replaceable or upgradable?',
                a: 'Yes. Battery units, propellers, and camera modules are modular — allowing simple replacement or performance upgrades as technology evolves.',
            },
            {
                q: 'What if I lose access to my phone or credentials?',
                a: 'Use biometrics, Morse Code unlocks, or follow our secure recovery protocol via PioVant Support.',
            },
            {
                q: 'Can the product be returned?',
                a: '<ul class="list-disc pl-6"><li>7-day money-back guarantee for technical issues.</li><li>30-day exchange for manufacturing defects.</li><li>Return shipping is covered by the customer unless the issue is PioVant’s responsibility.</li></ul>',
            },
        ],
    },
]);

// --- Intersection Observer for Animations ---
const useIntersectionObserver = (elementsRef, callback) => {
    if (!elementsRef) return;
    const observer = new IntersectionObserver(
        (entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    callback(entry.target);
                    observer.unobserve(entry.target);
                }
            });
        },
        { threshold: 0.1 },
    );

    onMounted(() => {
        if (Array.isArray(elementsRef.value)) {
            elementsRef.value.forEach((el) => {
                if (el) observer.observe(el);
            });
        } else if (elementsRef.value) {
            observer.observe(elementsRef.value);
        }
    });

    onUnmounted(() => {
        if (Array.isArray(elementsRef.value)) {
            elementsRef.value.forEach((el) => {
                if (el) observer.unobserve(el);
            });
        } else if (elementsRef.value) {
            observer.unobserve(elementsRef.value);
        }
    });
};

const makeVisible = (element) => element.classList.add('is-visible');

const heroRef = ref(null);
const faqSectionRefs = ref([]);
const contactRef = ref(null);

useIntersectionObserver(heroRef, makeVisible);
useIntersectionObserver(faqSectionRefs, makeVisible);
useIntersectionObserver(contactRef, makeVisible);
</script>

<style scoped>
.fade-in-section {
    opacity: 0;
    transform: translateY(20px);
    transition:
        opacity 0.8s ease-out,
        transform 0.8s ease-out;
}
.fade-in-section.is-visible {
    opacity: 1;
    transform: translateY(0);
}

/* Additional styles for the accordion content to appear smoothly */
[v-show] {
    transition: opacity 0.5s ease;
}
</style>
