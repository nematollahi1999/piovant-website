<template>
    <div class="font-sans antialiased">
        <main class="space-y-2 overflow-hidden">
            <!-- Hero Section -->
            <section ref="heroRef" class="fade-in-section flex min-h-[70vh] flex-col items-center justify-center bg-slate-100 px-6 text-center">
                <h1 class="max-w-4xl text-5xl font-bold tracking-tight md:text-7xl">Master Privacy Policy</h1>
                <p class="mt-6 max-w-3xl text-xl text-gray-600 md:text-2xl">
                    Privacy is not an afterthought. At PioVant, it is
                    <span class="bg-gradient-to-r from-[#F87479] to-[#2546FF] bg-clip-text text-transparent">engineered</span> into every system.
                </p>
                <div class="mt-4 text-sm text-gray-500">
                    <span>Effective Date: January 20, 2026</span>
                    <span class="mx-2">|</span>
                    <span>Last Updated: January 20, 2026</span>
                </div>
            </section>

            <!-- Overview Section -->
            <section ref="overviewRef" class="fade-in-section bg-zinc-950 py-24 sm:py-32">
                <div class="container mx-auto max-w-4xl space-y-8 px-6 text-center text-lg leading-8 text-gray-300">
                    <p>
                        This Master Privacy Policy explains how PioVant and its affiliates (“PioVant”, “we”, “us”, “our”) collect, use, share, and
                        protect personal data across our websites, mobile apps, connected devices, and related services worldwide — including the
                        FortiVault ecosystem (PRIME™, VEIL™, ULTRA™, AERIS™) and all integrated components.
                    </p>
                    <p>All data management operates under a unified framework of protection, operational safety, and global compliance.</p>
                    <div class="inline-block rounded-lg border border-gray-700 bg-black/20 p-4 text-sm">
                        <ul class="space-y-2 text-left">
                            <li>
                                • For product-specific details, see
                                <Link href="/annex-i" class="font-medium text-blue-400 hover:underline">Annex I — IoT Device Privacy Notice</Link>.
                            </li>
                            <li>
                                • For regional disclosures, downloads, and cookie settings, visit
                                <Link href="/privacy-policy" class="font-medium text-blue-400 hover:underline">Privacy Policy</Link>.
                            </li>
                        </ul>
                    </div>
                </div>
            </section>

            <!-- Main Policy Body -->
            <section class="bg-white py-24 text-gray-800 sm:py-32">
                <div class="container mx-auto max-w-4xl space-y-16 px-6">
                    <!-- Section Wrapper -->
                    <div ref="scopeRef" class="fade-in-section">
                        <div class="flex items-center gap-4">
                            <GlobeAltIcon class="h-12 w-12 flex-shrink-0 text-blue-600" />
                            <h2 class="text-3xl font-bold tracking-tight">1. Scope, Controller & Jurisdiction</h2>
                        </div>
                        <div class="prose prose-lg prose-a:text-blue-600 mt-6 max-w-none">
                            <h3>1.1 Controller</h3>
                            <p>
                                PioVant Inc. (and, where applicable, the relevant regional affiliate) is the data controller for the processing
                                described in this Policy. Contact: piovant.com/legal/contact
                            </p>
                            <h3>1.2 Scope</h3>
                            <p>This Policy applies to personal data collected through:</p>
                            <ul>
                                <li>PioVant corporate websites and online services</li>
                                <li>PioVant mobile applications</li>
                                <li>PioVant-branded IoT and connected devices, including drone telemetry (AERIS™)</li>
                                <li>Certain offline interactions (trade shows, support channels)</li>
                            </ul>
                            <h3>1.3 Compliance Framework</h3>
                            <p>
                                Our practices meet or exceed global standards, including: EU GDPR, U.S. state privacy laws (CCPA/CPRA), Canada’s
                                PIPEDA, and other national and international data protection regulations.
                            </p>
                        </div>
                    </div>

                    <div ref="definitionsRef" class="fade-in-section">
                        <div class="flex items-center gap-4">
                            <KeyIcon class="h-12 w-12 flex-shrink-0 text-blue-600" />
                            <h2 class="text-3xl font-bold tracking-tight">2. Key Definitions</h2>
                        </div>
                        <div class="prose prose-lg mt-6 max-w-none">
                            <ul>
                                <li>
                                    <strong>Personal Data:</strong> Any information that directly or indirectly identifies you (name, email, device
                                    ID, GPS location, flight path).
                                </li>
                                <li>
                                    <strong>Sensitive Data:</strong> Biometric identifiers, health information, government IDs — processed only when
                                    necessary and safeguarded.
                                </li>
                                <li>
                                    <strong>Anonymized / Aggregated Data:</strong> Data no longer identifying individuals; not treated as Personal
                                    Data.
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div ref="legalBasisRef" class="fade-in-section">
                        <div class="flex items-center gap-4">
                            <ScaleIcon class="h-12 w-12 flex-shrink-0 text-blue-600" />
                            <h2 class="text-3xl font-bold tracking-tight">3. Legal Basis for Processing</h2>
                        </div>
                        <div class="prose prose-lg mt-6 max-w-none">
                            <p>Our processing relies on one or more legal bases:</p>
                            <ul>
                                <li><strong>Contractual necessity:</strong> Deliver requested products or services</li>
                                <li><strong>Legal obligation:</strong> Comply with aviation and other applicable laws</li>
                                <li><strong>Consent:</strong> Where required or for optional features</li>
                                <li><strong>Vital interests:</strong> Protect health or safety</li>
                                <li><strong>Legitimate interests:</strong> Improve products, prevent fraud, ensure security</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>

            <section class="bg-zinc-950 py-24 text-white sm:py-32">
                <div class="container mx-auto max-w-4xl space-y-16 px-6">
                    <div ref="collectionRef" class="fade-in-section">
                        <div class="flex items-center gap-4">
                            <CircleStackIcon class="h-12 w-12 flex-shrink-0 text-blue-400" />
                            <h2 class="text-3xl font-bold tracking-tight">4. Personal Data We Collect — and Why</h2>
                        </div>
                        <div class="prose prose-lg prose-invert prose-a:text-blue-400 mt-6 max-w-none">
                            <h4>A. Account & Transaction Data</h4>
                            <ul>
                                <li>Name, email, billing/shipping, payment tokens, purchase history</li>
                                <li><strong>Purpose:</strong> Order fulfillment, delivery, fraud prevention</li>
                            </ul>
                            <h4>B. Device & Product Data</h4>
                            <ul>
                                <li>Serial numbers, firmware versions, connectivity logs</li>
                                <li>Flight & Telemetry Data (AERIS™): Paths, sensor readings, operational status</li>
                                <li><strong>Purpose:</strong> Diagnostics, updates, performance optimization, safety, regulatory compliance</li>
                            </ul>
                            <h4>C. Usage & Telemetry</h4>
                            <ul>
                                <li>App interactions, feature metrics, crash logs (minimized/anonymized)</li>
                                <li><strong>Purpose:</strong> Reliability, analytics, user experience improvements</li>
                            </ul>
                            <h4>D. Location & Flight Data</h4>
                            <ul>
                                <li>GPS, flight paths, altitude, operational telemetry (AERIS™)</li>
                                <li>
                                    <strong>Purpose:</strong> On-device processing; optional encrypted cloud sync only with user consent; compliance
                                    with aviation regulations
                                </li>
                            </ul>
                            <h4>E. Security & Fraud Signals</h4>
                            <ul>
                                <li>Integrity checks, trust scores, anomaly detection</li>
                                <li><strong>Purpose:</strong> Protect devices, accounts, and connected systems</li>
                            </ul>
                            <h4>F. Sensitive Data</h4>
                            <ul>
                                <li>Biometric identifiers (fingerprint, facial) — processed locally on-device</li>
                                <li><strong>Purpose:</strong> Local authentication and unlocking</li>
                            </ul>
                            <h4>G. Support Communications</h4>
                            <ul>
                                <li>Chat, email, call logs</li>
                                <li><strong>Purpose:</strong> Troubleshooting, service improvement, audit trails</li>
                            </ul>
                        </div>
                    </div>

                    <div ref="usageRef" class="fade-in-section">
                        <div class="flex items-center gap-4">
                            <Cog6ToothIcon class="h-12 w-12 flex-shrink-0 text-blue-400" />
                            <h2 class="text-3xl font-bold tracking-tight">5. How We Use Personal Data</h2>
                        </div>
                        <div class="prose prose-lg prose-invert mt-6 max-w-none">
                            <p>Personal Data is used solely to deliver secure, efficient, user-centric experiences:</p>
                            <ul>
                                <li>Deliver, maintain, enhance products/services</li>
                                <li>Process payments and verify identity</li>
                                <li>Provide customer support and transactional notifications</li>
                                <li>Detect, prevent, respond to fraud/security incidents</li>
                                <li>Meet legal, regulatory, safety obligations (including aviation compliance)</li>
                                <li>Personalize experiences with user consent</li>
                            </ul>
                        </div>
                    </div>

                    <div ref="sharingRef" class="fade-in-section">
                        <div class="flex items-center gap-4">
                            <UserGroupIcon class="h-12 w-12 flex-shrink-0 text-blue-400" />
                            <h2 class="text-3xl font-bold tracking-tight">6. Sharing & Disclosure</h2>
                        </div>
                        <div class="prose prose-lg prose-invert mt-6 max-w-none">
                            <p>We do not sell Personal Data. Sharing occurs only when lawful:</p>
                            <ul>
                                <li><strong>Service Providers:</strong> Operations (payment, logistics, hosting)</li>
                                <li><strong>Affiliates:</strong> Centralized services, unified support</li>
                                <li><strong>Co-Branded Partners:</strong> Opt-in offerings</li>
                                <li><strong>Legal Authorities:</strong> Law, court order, safety, or aviation regulatory requests</li>
                                <li><strong>Corporate Transactions:</strong> Mergers/acquisitions (with notice where required)</li>
                            </ul>
                            <p><em>Note: Flight data remains on-device by default; shared only as legally required or with user consent.</em></p>
                        </div>
                    </div>
                </div>
            </section>

            <section class="bg-white py-24 text-gray-800 sm:py-32">
                <div class="container mx-auto max-w-4xl space-y-16 px-6">
                    <div ref="transfersRef" class="fade-in-section">
                        <div class="flex items-center gap-4">
                            <GlobeAmericasIcon class="h-12 w-12 flex-shrink-0 text-blue-600" />
                            <h2 class="text-3xl font-bold tracking-tight">7. International Data Transfers</h2>
                        </div>
                        <div class="prose prose-lg mt-6 max-w-none">
                            <p>Data may be processed in multiple jurisdictions using lawful safeguards:</p>
                            <ul>
                                <li>EU Standard Contractual Clauses (SCCs)</li>
                                <li>Binding Corporate Rules (BCRs)</li>
                                <li>Other lawful transfer mechanisms</li>
                            </ul>
                        </div>
                    </div>

                    <div ref="retentionRef" class="fade-in-section">
                        <div class="flex items-center gap-4">
                            <ClockIcon class="h-12 w-12 flex-shrink-0 text-blue-600" />
                            <h2 class="text-3xl font-bold tracking-tight">8. Data Retention & Minimization</h2>
                        </div>
                        <div class="prose prose-lg mt-6 max-w-none">
                            <p>
                                Personal Data is retained only for as long as necessary to fulfill its original purpose, to comply with applicable
                                legal or regulatory requirements, and to support warranty, safety, operational, or legitimate business needs. Flight
                                telemetry is stored on-device for up to 12 months, with optional encrypted cloud backups retained solely for safety
                                and compliance purposes.
                            </p>
                        </div>
                    </div>

                    <div ref="securityRef" class="fade-in-section">
                        <div class="flex items-center gap-4">
                            <ShieldCheckIcon class="h-12 w-12 flex-shrink-0 text-blue-600" />
                            <h2 class="text-3xl font-bold tracking-tight">9. Security & Governance</h2>
                        </div>
                        <div class="prose prose-lg mt-6 max-w-none">
                            <ul>
                                <li>Encryption (in transit & at rest)</li>
                                <li>Access control & secure authentication</li>
                                <li>Continuous logging, monitoring, vulnerability testing</li>
                                <li>Regular penetration tests & employee privacy training</li>
                                <li>Data breaches reported to users and regulators by law</li>
                            </ul>
                        </div>
                    </div>

                    <div ref="childrenRef" class="fade-in-section">
                        <div class="flex items-center gap-4">
                            <ExclamationTriangleIcon class="h-12 w-12 flex-shrink-0 text-blue-600" />
                            <h2 class="text-3xl font-bold tracking-tight">10. Children & Special Categories</h2>
                        </div>
                        <div class="prose prose-lg mt-6 max-w-none">
                            <p>
                                Our products are not directed at children under the minimum legal age (usually 13). Minor data collected only with
                                parental consent; deletion requests via privacy@piovant.com.
                            </p>
                        </div>
                    </div>

                    <div ref="cookiesRef" class="fade-in-section">
                        <div class="flex items-center gap-4">
                            <WrenchScrewdriverIcon class="h-12 w-12 flex-shrink-0 text-blue-600" />
                            <h2 class="text-3xl font-bold tracking-tight">11. Cookies & Tracking Technologies</h2>
                        </div>
                        <div class="prose prose-lg mt-6 max-w-none">
                            <p>
                                We use cookies for essential functions, security, analytics, and personalization (with consent). Preferences are
                                managed in browser/app settings.
                            </p>
                        </div>
                    </div>
                </div>
            </section>

            <section class="bg-zinc-950 py-24 text-white sm:py-32">
                <div class="container mx-auto max-w-4xl space-y-16 px-6">
                    <div ref="rightsRef" class="fade-in-section">
                        <div class="flex items-center gap-4">
                            <AdjustmentsHorizontalIcon class="h-12 w-12 flex-shrink-0 text-blue-400" />
                            <h2 class="text-3xl font-bold tracking-tight">12. Your Privacy Rights</h2>
                        </div>
                        <div class="prose prose-lg prose-invert prose-a:text-blue-400 mt-6 max-w-none">
                            <p>
                                Depending on the jurisdiction, you may access, correct, delete, or restrict Personal Data, request portability,
                                withdraw consent, or request human review of automated decisions. Exercise rights via: privacy@piovant.com or
                                piovant.com/contact.
                            </p>
                        </div>
                    </div>

                    <div ref="lawRef" class="fade-in-section">
                        <div class="flex items-center gap-4">
                            <ShieldExclamationIcon class="h-12 w-12 flex-shrink-0 text-blue-400" />
                            <h2 class="text-3xl font-bold tracking-tight">13. Law Enforcement & Legal Requests</h2>
                        </div>
                        <div class="prose prose-lg prose-invert mt-6 max-w-none">
                            <p>
                                We respond only to lawful, specific requests and notify affected users where permitted. We minimize disclosed data and
                                challenge overbroad requests. Flight/telemetry data is shared with aviation authorities only as required.
                            </p>
                        </div>
                    </div>

                    <div ref="researchRef" class="fade-in-section">
                        <div class="flex items-center gap-4">
                            <BeakerIcon class="h-12 w-12 flex-shrink-0 text-blue-400" />
                            <h2 class="text-3xl font-bold tracking-tight">14. Research & Development</h2>
                        </div>
                        <div class="prose prose-lg prose-invert mt-6 max-w-none">
                            <p>
                                Anonymized/aggregated data is used for R&D, product safety, innovation, and analytics, and may be shared with trusted
                                partners for legitimate purposes.
                            </p>
                        </div>
                    </div>
                    <div ref="updatesRef" class="fade-in-section">
                        <div class="flex items-center gap-4">
                            <ArrowPathIcon class="h-12 w-12 flex-shrink-0 text-blue-400" />
                            <h2 class="text-3xl font-bold tracking-tight">15. Policy Updates</h2>
                        </div>
                        <div class="prose prose-lg prose-invert mt-6 max-w-none">
                            <p>
                                We perform periodic updates for legal, technical, and business changes. Significant updates are notified via
                                email/site. The “Last Updated” date always reflects the latest version.
                            </p>
                        </div>
                    </div>
                    <div ref="notesRef" class="fade-in-section">
                        <div class="flex items-center gap-4">
                            <DocumentTextIcon class="h-12 w-12 flex-shrink-0 text-blue-400" />
                            <h2 class="text-3xl font-bold tracking-tight">16. Legal Notes</h2>
                        </div>
                        <div class="prose prose-lg prose-invert mt-6 max-w-none">
                            <p>
                                This policy does not create contractual rights beyond the law. Additional notices/consents may appear where data is
                                collected. It is governed by applicable laws in our Regional Disclosures.
                            </p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Contact Section -->
            <section ref="contactRef" class="fade-in-section bg-black py-24 sm:py-32">
                <div class="container mx-auto max-w-xl px-6 text-center">
                    <EnvelopeIcon class="mx-auto h-12 w-12 text-gray-400" />
                    <h2 class="mt-4 text-3xl font-bold text-white">17. Contact & Complaints</h2>
                    <p class="mt-4 text-lg text-gray-400">
                        Response within 7 business days. Unresolved issues may be escalated to your regional data protection authority.
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
    BeakerIcon,
    CircleStackIcon,
    ClockIcon,
    Cog6ToothIcon,
    DocumentTextIcon,
    EnvelopeIcon,
    ExclamationTriangleIcon,
    GlobeAltIcon,
    GlobeAmericasIcon,
    KeyIcon,
    ScaleIcon,
    ShieldCheckIcon,
    ShieldExclamationIcon,
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
const overviewRef = ref(null);
const scopeRef = ref(null);
const definitionsRef = ref(null);
const legalBasisRef = ref(null);
const collectionRef = ref(null);
const usageRef = ref(null);
const sharingRef = ref(null);
const transfersRef = ref(null);
const retentionRef = ref(null);
const securityRef = ref(null);
const childrenRef = ref(null);
const cookiesRef = ref(null);
const rightsRef = ref(null);
const lawRef = ref(null);
const researchRef = ref(null);
const updatesRef = ref(null);
const notesRef = ref(null);
const contactRef = ref(null);

useIntersectionObserver(heroRef, makeVisible);
useIntersectionObserver(overviewRef, makeVisible);
useIntersectionObserver(scopeRef, makeVisible);
useIntersectionObserver(definitionsRef, makeVisible);
useIntersectionObserver(legalBasisRef, makeVisible);
useIntersectionObserver(collectionRef, makeVisible);
useIntersectionObserver(usageRef, makeVisible);
useIntersectionObserver(sharingRef, makeVisible);
useIntersectionObserver(transfersRef, makeVisible);
useIntersectionObserver(retentionRef, makeVisible);
useIntersectionObserver(securityRef, makeVisible);
useIntersectionObserver(childrenRef, makeVisible);
useIntersectionObserver(cookiesRef, makeVisible);
useIntersectionObserver(rightsRef, makeVisible);
useIntersectionObserver(lawRef, makeVisible);
useIntersectionObserver(researchRef, makeVisible);
useIntersectionObserver(updatesRef, makeVisible);
useIntersectionObserver(notesRef, makeVisible);
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
