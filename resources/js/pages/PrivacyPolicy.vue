<template>
    <div class="font-sans antialiased">
        <main class="space-y-2 overflow-hidden">
            <!-- Hero Section -->
            <section ref="heroRef" class="fade-in-section flex min-h-[70vh] flex-col items-center justify-center bg-slate-200 px-6 text-center">
                <h1 class="max-w-4xl text-5xl font-bold tracking-tight text-gray-800 md:text-7xl">Privacy Policy</h1>
                <p class="mt-6 max-w-3xl text-xl text-gray-600 md:text-2xl">
                    At PioVant, privacy is not just a legal requirement — it is a
                    <span class="bg-gradient-to-r from-[#F87479] to-[#2546FF] bg-clip-text text-transparent">design principle.</span>
                </p>
                <div class="mt-4 text-sm text-gray-500">
                    <span>Effective Date: January 20, 2026</span>
                    <span class="mx-2">|</span>
                    <span>Last Updated: January 20, 2026</span>
                </div>
            </section>

            <!-- Introduction Section -->
            <section ref="introRef" class="fade-in-section bg-zinc-950 py-24 sm:py-32">
                <div class="container mx-auto max-w-4xl space-y-8 px-6 text-center text-lg leading-8 text-gray-300">
                    <p>
                        This Policy explains how we collect, use, share, and protect your personal and operational data across all PioVant digital
                        platforms and connected systems — including the FortiVault ecosystem (PRIME™, VEIL™, ULTRA™, AERIS™) and its integrated
                        modules.
                    </p>
                    <p>All operations are governed under a unified framework of data protection, operational safety, and international compliance.</p>
                    <div class="inline-block rounded-lg border border-gray-700 bg-black/20 p-4 text-sm">
                        <ul class="space-y-2 text-left">
                            <li>
                                • For comprehensive legal details, see our
                                <Link href="/master-privacy-policy" class="font-medium text-blue-400 hover:underline">Master Privacy Policy</Link>.
                            </li>
                            <li>
                                • For IoT-specific and device-level data practices, see our
                                <Link href="/annex-i" class="font-medium text-blue-400 hover:underline">Annex I — IoT & Device Privacy Notice</Link>.
                            </li>
                        </ul>
                    </div>
                </div>
            </section>

            <!-- Main Policy Body -->
            <section class="bg-white py-24 text-gray-800 sm:py-32">
                <div class="container mx-auto max-w-4xl space-y-16 px-6">
                    <div ref="transparencyRef" class="fade-in-section">
                        <div class="flex items-center gap-4">
                            <FingerPrintIcon class="h-12 w-12 flex-shrink-0 text-blue-600" />
                            <h2 class="text-3xl font-bold tracking-tight">1. Transparency & Scope</h2>
                        </div>
                        <div class="prose prose-lg prose-a:text-blue-600 mt-6 max-w-none">
                            <p>
                                This Policy applies to every PioVant product and service, including websites, mobile apps, dashboards, and all
                                connected FortiVault devices.
                            </p>
                            <ul>
                                <li>No personal or telemetry data is collected or processed without your explicit knowledge and consent.</li>
                                <li>
                                    You are fully informed before any feature involving personal or mission data is activated, and you retain full
                                    control over data flow.
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div ref="definitionsRef" class="fade-in-section">
                        <div class="flex items-center gap-4">
                            <UserCircleIcon class="h-12 w-12 flex-shrink-0 text-blue-600" />
                            <h2 class="text-3xl font-bold tracking-tight">2. Definition of Personal Data</h2>
                        </div>
                        <div class="prose prose-lg prose-a:text-blue-600 mt-6 max-w-none">
                            <p>“Personal Data” includes information that identifies you or can reasonably be linked to you:</p>
                            <ul>
                                <li>Name, email, or contact information</li>
                                <li>Device or account identifiers (serial number, account ID)</li>
                                <li>Location, flight, or telemetry data (GPS, altitude, AERIS™ telemetry)</li>
                                <li>Diagnostic and performance logs tied to your account</li>
                            </ul>
                            <p>Aggregated or anonymized data that cannot identify an individual is excluded from this definition.</p>
                        </div>
                    </div>

                    <div ref="rightsRef" class="fade-in-section">
                        <div class="flex items-center gap-4">
                            <Cog6ToothIcon class="h-12 w-12 flex-shrink-0 text-blue-600" />
                            <h2 class="text-3xl font-bold tracking-tight">3. Your Privacy Rights</h2>
                        </div>
                        <div class="prose prose-lg prose-a:text-blue-600 mt-6 max-w-none">
                            <p>Depending on jurisdiction, you may:</p>
                            <ul>
                                <li>Access, correct, or delete personal data</li>
                                <li>Restrict or object to certain processing activities</li>
                                <li>Receive a portable copy of your data</li>
                                <li>Withdraw consent (where applicable)</li>
                                <li>File a complaint with your data protection authority</li>
                            </ul>
                            <p>
                                Verification may be required for identity and security purposes. Some requests may be subject to regulatory or
                                operational limitations.
                            </p>
                        </div>
                    </div>
                </div>
            </section>

            <section class="bg-zinc-950 py-24 text-white sm:py-32">
                <div class="container mx-auto max-w-4xl space-y-16 px-6">
                    <div ref="collectionRef" class="fade-in-section">
                        <div class="flex items-center gap-4">
                            <CircleStackIcon class="h-12 w-12 flex-shrink-0 text-blue-400" />
                            <h2 class="text-3xl font-bold tracking-tight">4. Data We Collect</h2>
                        </div>
                        <div class="prose prose-lg prose-invert prose-a:text-blue-400 mt-6 max-w-none">
                            <p>We collect only what is essential to deliver a seamless, secure, and premium experience:</p>
                            <ul>
                                <li><strong>A. Account Data:</strong> identifiers, preferences, connected devices</li>
                                <li><strong>B. Device & Diagnostic Data:</strong> firmware status, system health metrics, telemetry</li>
                                <li>
                                    <strong>C. Location & Telemetry Data:</strong> GPS, flight paths, altitude, and mission data for aerial and
                                    terrestrial devices (only when enabled by user consent)
                                </li>
                                <li><strong>D. Support & Transaction Data:</strong> communications, billing records, service history</li>
                            </ul>
                            <p>
                                Sensitive visual or positional data is encrypted and stored locally by default. Cloud transmission occurs only with
                                explicit user authorization for remote access or backup.
                            </p>
                        </div>
                    </div>

                    <div ref="sourcesRef" class="fade-in-section">
                        <div class="flex items-center gap-4">
                            <CloudArrowDownIcon class="h-12 w-12 flex-shrink-0 text-blue-400" />
                            <h2 class="text-3xl font-bold tracking-tight">5. Data from Other Sources</h2>
                        </div>
                        <div class="prose prose-lg prose-invert prose-a:text-blue-400 mt-6 max-w-none">
                            <p>We may receive limited data from:</p>
                            <ul>
                                <li>Payment processors and service partners</li>
                                <li>Authorized distributors and logistics providers</li>
                                <li>Regulatory authorities or public databases (for compliance)</li>
                            </ul>
                            <p>All such data is processed under this Policy and applicable laws.</p>
                        </div>
                    </div>

                    <div ref="usageRef" class="fade-in-section">
                        <div class="flex items-center gap-4">
                            <CogIcon class="h-12 w-12 flex-shrink-0 text-blue-400" />
                            <h2 class="text-3xl font-bold tracking-tight">6. How We Use Personal Data</h2>
                        </div>
                        <div class="prose prose-lg prose-invert prose-a:text-blue-400 mt-6 max-w-none">
                            <p>Your data is used solely to:</p>
                            <ul>
                                <li>Operate, synchronize, and manage devices and accounts</li>
                                <li>Ensure product performance, mission coordination, and firmware integrity</li>
                                <li>Authenticate access and prevent unauthorized usage</li>
                                <li>Deliver premium customer support and critical safety notifications</li>
                                <li>Conduct anonymized analytics for product improvement</li>
                            </ul>
                            <p>
                                For aerial and terrestrial systems, telemetry or visual data is shared only with your explicit consent and strictly
                                for defined purposes.
                            </p>
                        </div>
                    </div>

                    <div ref="sharingRef" class="fade-in-section">
                        <div class="flex items-center gap-4">
                            <UserGroupIcon class="h-12 w-12 flex-shrink-0 text-blue-400" />
                            <h2 class="text-3xl font-bold tracking-tight">7. Sharing Personal Data</h2>
                        </div>
                        <div class="prose prose-lg prose-invert prose-a:text-blue-400 mt-6 max-w-none">
                            <p>We do not sell personal data. Limited sharing occurs only as necessary:</p>
                            <ul>
                                <li>With verified service providers under strict data protection agreements</li>
                                <li>With regulators or legal authorities as legally required</li>
                                <li>During mergers, acquisitions, or corporate restructuring, with notice</li>
                            </ul>
                            <p>All third parties must uphold PioVant’s privacy and security standards.</p>
                        </div>
                    </div>
                </div>
            </section>

            <section class="bg-white py-24 text-gray-800 sm:py-32">
                <div class="container mx-auto max-w-4xl space-y-16 px-6">
                    <div ref="transfersRef" class="fade-in-section">
                        <div class="flex items-center gap-4">
                            <GlobeAmericasIcon class="h-12 w-12 flex-shrink-0 text-blue-600" />
                            <h2 class="text-3xl font-bold tracking-tight">8. International Transfers</h2>
                        </div>
                        <div class="prose prose-lg prose-a:text-blue-600 mt-6 max-w-none">
                            <p>
                                Some data may be processed in other jurisdictions to enable global operation. We utilize Standard Contractual Clauses
                                (SCCs) and equivalent safeguards to maintain consistent protection worldwide.
                            </p>
                        </div>
                    </div>
                    <div ref="securityRef" class="fade-in-section">
                        <div class="flex items-center gap-4">
                            <ShieldCheckIcon class="h-12 w-12 flex-shrink-0 text-blue-600" />
                            <h2 class="text-3xl font-bold tracking-tight">9. Data Security</h2>
                        </div>
                        <div class="prose prose-lg prose-a:text-blue-600 mt-6 max-w-none">
                            <p>Security is embedded in every layer of PioVant systems:</p>
                            <ul>
                                <li><strong>Technical:</strong> AES-256 encryption at rest, TLS 1.3 in transit, proprietary protocols</li>
                                <li><strong>Administrative:</strong> strict access control, verified personnel, continuous privacy training</li>
                                <li><strong>Physical:</strong> tamper-resistant enclosures, secured facilities, controlled device handling</li>
                            </ul>
                            <p>Independent audits and penetration tests are performed regularly.</p>
                        </div>
                    </div>
                    <div ref="childrenRef" class="fade-in-section">
                        <div class="flex items-center gap-4">
                            <ExclamationTriangleIcon class="h-12 w-12 flex-shrink-0 text-blue-600" />
                            <h2 class="text-3xl font-bold tracking-tight">10. Children & Minors</h2>
                        </div>
                        <div class="prose prose-lg prose-a:text-blue-600 mt-6 max-w-none">
                            <p>
                                PioVant products are not designed for individuals under 13 years of age (or local legal equivalent). Minor data is
                                deleted immediately upon discovery. Parents/guardians may contact privacy@piovant.com for assistance.
                            </p>
                        </div>
                    </div>
                    <div ref="cookiesRef" class="fade-in-section">
                        <div class="flex items-center gap-4">
                            <WrenchScrewdriverIcon class="h-12 w-12 flex-shrink-0 text-blue-600" />
                            <h2 class="text-3xl font-bold tracking-tight">11. Cookies & Tracking</h2>
                        </div>
                        <div class="prose prose-lg prose-a:text-blue-600 mt-6 max-w-none">
                            <p>We use cookies and similar technologies to:</p>
                            <ul>
                                <li>Enable core functionality and authentication</li>
                                <li>Maintain session security and performance</li>
                                <li>Conduct anonymous analytics for UX optimization</li>
                            </ul>
                            <p>Cookie preferences can be managed in browser or app settings. Some features may be limited if cookies are disabled.</p>
                        </div>
                    </div>
                </div>
            </section>

            <section class="bg-zinc-950 py-24 text-white sm:py-32">
                <div class="container mx-auto max-w-4xl space-y-16 px-6">
                    <div ref="controlsRef" class="fade-in-section">
                        <div class="flex items-center gap-4">
                            <AdjustmentsHorizontalIcon class="h-12 w-12 flex-shrink-0 text-blue-400" />
                            <h2 class="text-3xl font-bold tracking-tight">12. Your Controls</h2>
                        </div>
                        <div class="prose prose-lg prose-invert prose-a:text-blue-400 mt-6 max-w-none">
                            <p>You retain full control via the PioVant Web platform or FortiVault App:</p>
                            <ul>
                                <li>View, download, or delete stored data</li>
                                <li>Manage location and telemetry settings</li>
                                <li>Enable or disable cloud sync</li>
                                <li>Clear playback history or local storage</li>
                            </ul>
                            <p>Changes propagate instantly across all connected devices.</p>
                        </div>
                    </div>
                    <div ref="updatesRef" class="fade-in-section">
                        <div class="flex items-center gap-4">
                            <ArrowPathIcon class="h-12 w-12 flex-shrink-0 text-blue-400" />
                            <h2 class="text-3xl font-bold tracking-tight">13. Policy Updates</h2>
                        </div>
                        <div class="prose prose-lg prose-invert prose-a:text-blue-400 mt-6 max-w-none">
                            <p>
                                We update this Policy as products evolve, regulations change, or security enhancements are implemented. Significant
                                updates are communicated via in-app notifications or email. The “Last Updated” date always reflects the most recent
                                version.
                            </p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Annex I Summary Section -->
            <section ref="annexRef" class="fade-in-section bg-gradient-to-r from-[#000B41] to-[#00051D] py-24 sm:py-32">
                <div class="container mx-auto max-w-4xl px-6">
                    <div class="rounded-2xl p-8 md:p-12">
                        <div class="flex items-center gap-4">
                            <CpuChipIcon class="h-10 w-10 flex-shrink-0 text-gray-400" />
                            <h3 class="text-3xl font-bold text-white">Annex I — IoT & Device Privacy Summary</h3>
                        </div>
                        <div class="prose prose-lg mt-6 max-w-none text-gray-200">
                            <p>Applies to all FortiVault devices, aerial units (AeroVault™), and ground systems.</p>
                            <ul>
                                <li>
                                    <strong>Telemetry & Mission Data:</strong> encrypted, local storage by default; temporary cloud transfer only with
                                    explicit authorization
                                </li>
                                <li><strong>Visual/Sensor Data:</strong> stored securely, accessible only via authenticated sessions</li>
                                <li><strong>Location Data (GPS):</strong> processed locally; remote access requires user consent</li>
                                <li><strong>Data Retention:</strong> operational logs stored locally up to 90 days unless otherwise configured</li>
                                <li><strong>User Control:</strong> full deletion or factory reset via app or secure command</li>
                                <li>
                                    <strong>Regulatory Compliance:</strong> aerial and ground units operate under civil aviation, safety, and data
                                    protection laws.
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Contact Section -->
            <section ref="contactRef" class="fade-in-section bg-black py-24 sm:py-32">
                <div class="container mx-auto max-w-xl px-6 text-center">
                    <EnvelopeIcon class="mx-auto h-12 w-12 text-gray-400" />
                    <h2 class="mt-4 text-3xl font-bold text-white">14. Contact Us</h2>
                    <p class="mt-4 text-lg text-gray-400">
                        Questions or privacy concerns? Response within 7 business days. Unresolved issues may be escalated to your regional data
                        protection authority.
                    </p>
                    <a
                        href="mailto:privacy@piovant.com"
                        class="mt-6 inline-block rounded-full bg-gradient-to-r from-[#F87479] to-[#2546FF] px-8 py-3 text-lg font-semibold text-white transition-transform hover:scale-105"
                    >
                        privacy@piovant.com
                    </a>
                </div>
            </section>
        </main>
    </div>
</template>

<script setup>
import {
    AdjustmentsHorizontalIcon,
    ArrowPathIcon,
    CircleStackIcon,
    CloudArrowDownIcon,
    Cog6ToothIcon,
    CogIcon,
    CpuChipIcon,
    EnvelopeIcon,
    ExclamationTriangleIcon,
    FingerPrintIcon,
    GlobeAmericasIcon,
    ShieldCheckIcon,
    UserCircleIcon,
    UserGroupIcon,
    WrenchScrewdriverIcon,
} from '@heroicons/vue/24/outline';
import { Link } from '@inertiajs/vue3';
import { onMounted, onUnmounted, ref } from 'vue';
import AppLayout from '../layouts/AppLayout.vue';

defineOptions({ layout: AppLayout });

const useIntersectionObserver = (elementRef, callback) => {
    if (!elementRef) return;
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
        if (elementRef.value) observer.observe(elementRef.value);
    });
    onUnmounted(() => {
        if (elementRef.value) observer.unobserve(elementRef.value);
    });
};

const makeVisible = (element) => element.classList.add('is-visible');

const heroRef = ref(null);
const introRef = ref(null);
const transparencyRef = ref(null);
const definitionsRef = ref(null);
const rightsRef = ref(null);
const collectionRef = ref(null);
const sourcesRef = ref(null);
const usageRef = ref(null);
const sharingRef = ref(null);
const transfersRef = ref(null);
const securityRef = ref(null);
const childrenRef = ref(null);
const cookiesRef = ref(null);
const controlsRef = ref(null);
const updatesRef = ref(null);
const annexRef = ref(null);
const contactRef = ref(null);

useIntersectionObserver(heroRef, makeVisible);
useIntersectionObserver(introRef, makeVisible);
useIntersectionObserver(transparencyRef, makeVisible);
useIntersectionObserver(definitionsRef, makeVisible);
useIntersectionObserver(rightsRef, makeVisible);
useIntersectionObserver(collectionRef, makeVisible);
useIntersectionObserver(sourcesRef, makeVisible);
useIntersectionObserver(usageRef, makeVisible);
useIntersectionObserver(sharingRef, makeVisible);
useIntersectionObserver(transfersRef, makeVisible);
useIntersectionObserver(securityRef, makeVisible);
useIntersectionObserver(childrenRef, makeVisible);
useIntersectionObserver(cookiesRef, makeVisible);
useIntersectionObserver(controlsRef, makeVisible);
useIntersectionObserver(updatesRef, makeVisible);
useIntersectionObserver(annexRef, makeVisible);
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
</style>
