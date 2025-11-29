<template>
    <div class="font-sans antialiased">
        <main class="overflow-hidden">
            <!-- Hero Section -->
            <section ref="heroRef" class="fade-in-section flex min-h-[70vh] flex-col items-center justify-center bg-slate-200 px-6 text-center">
                <h1 class="max-w-4xl text-5xl font-bold tracking-tight text-gray-800 md:text-7xl">Terms of Use</h1>
                <p class="mt-6 max-w-3xl text-xl text-gray-600 md:text-2xl">
                    Clarity, safety, and innovation for a
                    <span class="bg-gradient-to-r from-[#F87479] to-[#2546FF] bg-clip-text text-transparent">connected world.</span>
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
                        Welcome to PioVant Inc. These Terms of Use (“Terms”) explain how you may access and use PioVant’s website, mobile
                        applications, IoT devices (including FortiVault™ devices and components), and related digital services (collectively
                        “Services”). By using our Services, you agree to these Terms. If you do not agree, please discontinue use immediately.
                    </p>
                    <div class="inline-block rounded-lg border border-gray-700 bg-black/20 p-4 text-sm">
                        <ul class="space-y-2 text-left">
                            <li>
                                These Terms reference the
                                <Link href="/master-privacy-policy" class="font-medium text-blue-400 hover:underline">Master Privacy Policy</Link> and
                                <Link href="/annex-i" class="font-medium text-blue-400 hover:underline">Annex I — IoT Device Privacy Notice</Link>.
                                Together, they form the full legal framework governing data, device operation, and user rights.
                            </li>
                        </ul>
                    </div>
                </div>
            </section>

            <!-- Main Terms Body Part 1 -->
            <section class="bg-white py-24 text-gray-800 sm:py-32">
                <div class="container mx-auto max-w-4xl space-y-16 px-6">
                    <div ref="purposeRef" class="fade-in-section">
                        <div class="flex items-center gap-4">
                            <DocumentTextIcon class="h-12 w-12 flex-shrink-0 text-blue-600" />
                            <h2 class="text-3xl font-bold tracking-tight">1. Purpose & Agreement</h2>
                        </div>
                        <div class="prose prose-lg prose-a:text-blue-600 mt-6 max-w-none">
                            <p>
                                These Terms promote clarity, safety, and a consistent experience across PioVant platforms. They describe your rights
                                and obligations as a user and set out how we deliver secure, connected, and innovative experiences. Continued use
                                constitutes acceptance of these Terms and any future updates posted at piovant.com/legal/terms.
                            </p>
                        </div>
                    </div>

                    <div ref="definitionsRef" class="fade-in-section">
                        <div class="flex items-center gap-4">
                            <BookOpenIcon class="h-12 w-12 flex-shrink-0 text-blue-600" />
                            <h2 class="text-3xl font-bold tracking-tight">2. Definitions</h2>
                        </div>
                        <div class="prose prose-lg prose-a:text-blue-600 mt-6 max-w-none">
                            <p>
                                Defined terms used throughout these Terms include (capitalized): “Device(s)”, “AERIS”, “AeroVault™”, “TerraDock™”,
                                “User”, “Authorized User”, “Mission Data”, “Tiered Engagement Rules” (as described in Annex I), and “Services”.
                                Definitions are as used in context and as further explained in the Master Privacy Policy and Annex I.
                            </p>
                        </div>
                    </div>

                    <div ref="ownershipRef" class="fade-in-section">
                        <div class="flex items-center gap-4">
                            <KeyIcon class="h-12 w-12 flex-shrink-0 text-blue-600" />
                            <h2 class="text-3xl font-bold tracking-tight">3. Ownership & Access</h2>
                        </div>
                        <div class="prose prose-lg prose-a:text-blue-600 mt-6 max-w-none">
                            <p>
                                PioVant Inc. (Toronto, Canada) owns and operates the Site and Services. You receive a personal, non-exclusive,
                                non-transferable, revocable license to use the Site and Services as permitted by these Terms. PioVant may modify,
                                suspend, or discontinue features temporarily or permanently; such changes take effect upon posting.
                            </p>
                        </div>
                    </div>

                    <div ref="ipRef" class="fade-in-section">
                        <div class="flex items-center gap-4">
                            <SparklesIcon class="h-12 w-12 flex-shrink-0 text-blue-600" />
                            <h2 class="text-3xl font-bold tracking-tight">4. Content & Intellectual Property</h2>
                        </div>
                        <div class="prose prose-lg prose-a:text-blue-600 mt-6 max-w-none">
                            <p>
                                All Content (text, images, video, software, specifications, and designs) is owned or licensed by PioVant. You may use
                                Content only for personal, non-commercial purposes. Copying, redistributing, or creating derivative works requires
                                prior written permission. FortiVault™, PRIME™, VEIL™, ULTRA™, AERIS™, and associated sub-systems and system
                                designs are trademarks of PioVant Inc.
                            </p>
                        </div>
                    </div>

                    <div ref="responsibleUseRef" class="fade-in-section">
                        <div class="flex items-center gap-4">
                            <ExclamationTriangleIcon class="h-12 w-12 flex-shrink-0 text-blue-600" />
                            <h2 class="text-3xl font-bold tracking-tight">5. Responsible Use & Compliance</h2>
                        </div>
                        <div class="prose prose-lg prose-a:text-blue-600 mt-6 max-w-none">
                            <p>You must use Services lawfully and responsibly. Prohibited conduct includes (but is not limited to):</p>
                            <ul>
                                <li>Circumventing or tampering with security or encryption;</li>
                                <li>Using automated scraping or extraction tools without authorization;</li>
                                <li>Attempting unauthorized access to devices, accounts, or PioVant systems;</li>
                                <li>Misrepresentation or impersonation of PioVant personnel;</li>
                                <li>Using Services in unlawful, fraudulent, or harmful ways.</li>
                            </ul>
                            <p>Violation may lead to suspension, termination, liability, or legal action.</p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Main Terms Body Part 2 (UPDATED) -->
            <section class="bg-zinc-950 py-24 text-white sm:py-32">
                <div class="container mx-auto max-w-4xl space-y-16 px-6">
                    <div ref="safetyRef" class="fade-in-section">
                        <div class="flex items-center gap-4">
                            <CpuChipIcon class="h-12 w-12 flex-shrink-0 text-blue-400" />
                            <h2 class="text-3xl font-bold tracking-tight">
                                6. Products, Safety & Operational Requirements (PRIME™, VEIL™, ULTRA™, AERIS™)
                            </h2>
                        </div>
                        <div class="prose prose-lg prose-invert prose-a:text-blue-400 mt-6 max-w-none">
                            <p>
                                PioVant provides a unified line of vehicle-protection and telemetry systems across all FortiVault™️ packages —
                                PRIME™️, VEIL™️, ULTRA™️, and AERIS™️. All product tiers share a common foundation of core automotive security
                                functions, including but not limited to:
                            </p>
                            <ul>
                                <li>GPS tracking</li>
                                <li>Real-time motion and tamper alerts</li>
                                <li>Alarm systems</li>
                                <li>Remote monitoring and control</li>
                                <li>Mobile app access to tracking data</li>
                                <li>Device status diagnostics</li>
                                <li>Firmware updates and system configuration</li>
                            </ul>
                            <p>
                                The products are designed to enhance vehicle security and are not intended to replace legally required safety
                                mechanisms.
                            </p>
                            <p>
                                <strong>Compliance & Permits:</strong> Users must operate all devices in accordance with applicable local, national,
                                and international laws, including aviation, privacy, and public-safety regulations. Where permits or registrations are
                                required for aerial operations (AERIS™), obtaining and maintaining such permits is the User’s responsibility before
                                enabling autonomous features. All autonomous deployments remain subject to in-app safety checks and local
                                restrictions.
                            </p>
                            <p>
                                <strong>Tiered Engagement:</strong> Devices equipped with automated actions, telemetry, or alarms operate under the
                                Tiered Engagement Rules described in Annex I (Monitor → Alert → Deter → Intercept/Record → Coordinate with
                                Authorities). Users acknowledge and accept all automated, auditable actions performed in accordance with these rules.
                            </p>
                            <p>
                                <strong>Installation & Maintenance:</strong> Certain modules across all packages require certified installation. Users
                                must follow PioVant installation guides and employ certified technicians where specified. Improper installation or
                                unauthorized modification may void warranties and increase safety risk.
                            </p>
                            <p>
                                <strong>Operational Limits & Geofencing:</strong> The FortiVault App enforces configurable geofences and operational
                                limits. Devices will abort or refuse actions that violate configured or regulatory geofences. Users may not disable
                                safety-critical enforcement unless legally permitted.
                            </p>
                            <p>
                                <strong>Device Calibration:</strong> Each TerraDock is calibrated for a specific AeroVault unit unless otherwise
                                specified under an enterprise agreement. Devices in PRIME™, VEIL™, and ULTRA™ packages with telemetry and alarm
                                functions are factory-calibrated, and adjustments should follow official PioVant instructions.
                            </p>
                            <p>
                                <strong>User Responsibility:</strong> Users are responsible for the lawful operation of all devices at their location.
                                PioVant provides tools, defaults, and guidance, but cannot guarantee lawful operation in jurisdictions where local
                                regulations prohibit certain uses.
                            </p>
                        </div>
                    </div>

                    <div ref="purchasesRef" class="fade-in-section">
                        <div class="flex items-center gap-4">
                            <ShoppingCartIcon class="h-12 w-12 flex-shrink-0 text-blue-400" />
                            <h2 class="text-3xl font-bold tracking-tight">7. Purchases, Delivery, Returns & Warranty</h2>
                        </div>
                        <div class="prose prose-lg prose-invert prose-a:text-blue-400 mt-6 max-w-none">
                            <ul>
                                <li>Purchases must be made via official channels and authorized resellers.</li>
                                <li>Shipping estimates are indicative; delays may occur. Title and risk transfer upon delivery acceptance.</li>
                                <li>
                                    Returns and refunds follow our Return & Warranty Policy. Standard limited warranty terms are provided with each
                                    product; extended plans are available via PioVant Care™.
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div ref="accountsRef" class="fade-in-section">
                        <div class="flex items-center gap-4">
                            <UserCircleIcon class="h-12 w-12 flex-shrink-0 text-blue-400" />
                            <h2 class="text-3xl font-bold tracking-tight">8. Accounts, Security & User Controls</h2>
                        </div>
                        <div class="prose prose-lg prose-invert prose-a:text-blue-400 mt-6 max-w-none">
                            <ul>
                                <li>
                                    Account holders are responsible for account security and all actions performed under their credentials. Promptly
                                    notify support of suspected compromise.
                                </li>
                                <li>
                                    For devices with multi-user features, Owners control enrollment and authorization (biometric management, shared
                                    access).
                                </li>
                                <li>
                                    The FortiVault App offers a Privacy Dashboard (export/delete controls, telemetry toggles, cloud backup options).
                                    Data practices are governed by the Master Privacy Policy and Annex I.
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div ref="dataRef" class="fade-in-section">
                        <div class="flex items-center gap-4">
                            <FingerPrintIcon class="h-12 w-12 flex-shrink-0 text-blue-400" />
                            <h2 class="text-3xl font-bold tracking-tight">9. Data, Privacy & Logs</h2>
                        </div>
                        <div class="prose prose-lg prose-invert prose-a:text-blue-400 mt-6 max-w-none">
                            <ul>
                                <li>Data collection, use, sharing, and retention follow the Master Privacy Policy and Annex I.</li>
                                <li>
                                    PioVant logs mission actions, automated decisions, and critical system events for safety, auditability, and
                                    diagnostics. Such logs are tamper-evident and accessible to the device Owner or authorized auditors per Annex I
                                    and applicable law.
                                </li>
                                <li>
                                    Lawful disclosure requests from authorities are handled per Annex I, and only the minimum necessary data is
                                    disclosed, unless legally compelled otherwise.
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Main Terms Body Part 3 -->
            <section class="bg-white py-24 text-gray-800 sm:py-32">
                <div class="container mx-auto max-w-4xl space-y-16 px-6">
                    <div ref="thirdPartyRef" class="fade-in-section">
                        <div class="flex items-center gap-4">
                            <GlobeAltIcon class="h-12 w-12 flex-shrink-0 text-blue-600" />
                            <h2 class="text-3xl font-bold tracking-tight">10. Third-Party Services & Integrations</h2>
                        </div>
                        <div class="prose prose-lg prose-a:text-blue-600 mt-6 max-w-none">
                            <p>
                                Third-party links or integrations may be provided for convenience. PioVant does not control external sites or services
                                and is not responsible for their practices. Integration use may require additional consents.
                            </p>
                        </div>
                    </div>
                    <div ref="disclaimersRef" class="fade-in-section">
                        <div class="flex items-center gap-4">
                            <ShieldExclamationIcon class="h-12 w-12 flex-shrink-0 text-blue-600" />
                            <h2 class="text-3xl font-bold tracking-tight">11. Disclaimers & Use-at-Your-Own-Risk</h2>
                        </div>
                        <div class="prose prose-lg prose-a:text-blue-600 mt-6 max-w-none">
                            <p>
                                Services and products are provided “as is” and “as available.” While designed for reliability and safety, PioVant
                                cannot guarantee uninterrupted operation, absolute prevention of theft or harm, or total avoidance of false
                                positives/negatives. Users acknowledge the limitations of automated systems and accept residual risk.
                            </p>
                        </div>
                    </div>
                    <div ref="liabilityRef" class="fade-in-section">
                        <div class="flex items-center gap-4">
                            <NoSymbolIcon class="h-12 w-12 flex-shrink-0 text-blue-600" />
                            <h2 class="text-3xl font-bold tracking-tight">12. Limitation of Liability</h2>
                        </div>
                        <div class="prose prose-lg prose-a:text-blue-600 mt-6 max-w-none">
                            <p>
                                To the fullest extent permitted by law, PioVant (and its affiliates, officers, employees, suppliers) is not liable for
                                indirect, incidental, consequential, special, punitive, or exemplary damages (including lost profits, loss of data,
                                downtime, or third-party claims) arising from use of Services or Devices. For direct damages, PioVant’s aggregate
                                liability is limited to the purchase price paid for the specific product at issue (or statutory minimums where
                                required). These limits do not apply to gross negligence, willful misconduct, or liability that cannot be limited by
                                applicable law.
                            </p>
                        </div>
                    </div>
                    <div ref="indemnificationRef" class="fade-in-section">
                        <div class="flex items-center gap-4">
                            <ShieldCheckIcon class="h-12 w-12 flex-shrink-0 text-blue-600" />
                            <h2 class="text-3xl font-bold tracking-tight">13. Indemnification</h2>
                        </div>
                        <div class="prose prose-lg prose-a:text-blue-600 mt-6 max-w-none">
                            <p>
                                You agree to indemnify, defend, and hold harmless PioVant from any claim, loss, liability, or expense (including
                                reasonable attorneys’ fees) arising from: (a) your misuse or negligent operation of Devices; (b) your failure to
                                obtain required local permits; (c) breach of these Terms; or (d) violation of applicable laws.
                            </p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Main Terms Body Part 4 -->
            <section class="bg-zinc-950 py-24 text-white sm:py-32">
                <div class="container mx-auto max-w-4xl space-y-16 px-6">
                    <div ref="lawEnforcementRef" class="fade-in-section">
                        <div class="flex items-center gap-4">
                            <BuildingLibraryIcon class="h-12 w-12 flex-shrink-0 text-blue-400" />
                            <h2 class="text-3xl font-bold tracking-tight">14. Law Enforcement, Emergency Requests & Cooperation</h2>
                        </div>
                        <div class="prose prose-lg prose-invert prose-a:text-blue-400 mt-6 max-w-none">
                            <p>
                                PioVant responds to lawful requests from authorities in line with Annex I. For imminent threats to life or safety,
                                PioVant may share data with emergency services per documented emergency procedures; such disclosures are logged
                                and—where permitted—Users are notified.
                            </p>
                        </div>
                    </div>
                    <div ref="exportRef" class="fade-in-section">
                        <div class="flex items-center gap-4">
                            <GlobeAmericasIcon class="h-12 w-12 flex-shrink-0 text-blue-400" />
                            <h2 class="text-3xl font-bold tracking-tight">15. Export Controls, Compliance & Geographic Availability</h2>
                        </div>
                        <div class="prose prose-lg prose-invert prose-a:text-blue-400 mt-6 max-w-none">
                            <p>
                                Products and software may be subject to export/import controls and sanctions laws. Certain features or products may be
                                unavailable in some regions. Users are responsible for complying with local import, privacy, aviation, and safety
                                regulations.
                            </p>
                        </div>
                    </div>
                    <div ref="transferRef" class="fade-in-section">
                        <div class="flex items-center gap-4">
                            <BuildingOffice2Icon class="h-12 w-12 flex-shrink-0 text-blue-400" />
                            <h2 class="text-3xl font-bold tracking-tight">16. Transfer, Assignment & Enterprise Use</h2>
                        </div>
                        <div class="prose prose-lg prose-invert prose-a:text-blue-400 mt-6 max-w-none">
                            <p>
                                PioVant may assign these Terms to an affiliate or successor. Enterprise customers may enter separate agreements that
                                supplement these Terms; to the extent of any conflict, the enterprise contract governs.
                            </p>
                        </div>
                    </div>
                    <div ref="terminationRef" class="fade-in-section">
                        <div class="flex items-center gap-4">
                            <StopCircleIcon class="h-12 w-12 flex-shrink-0 text-blue-400" />
                            <h2 class="text-3xl font-bold tracking-tight">17. Termination, Suspension & Safety Measures</h2>
                        </div>
                        <div class="prose prose-lg prose-invert prose-a:text-blue-400 mt-6 max-w-none">
                            <p>
                                PioVant may suspend or terminate accounts or Services for safety, fraud, legal, or security reasons. Where necessary
                                for safety, PioVant may remotely suspend certain device features (including autonomous missions) to prevent unlawful
                                or dangerous operation.
                            </p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Main Terms Body Part 5 -->
            <section class="bg-white py-24 text-gray-800 sm:py-32">
                <div class="container mx-auto max-w-4xl space-y-16 px-6">
                    <div ref="changesRef" class="fade-in-section">
                        <div class="flex items-center gap-4">
                            <ArrowPathIcon class="h-12 w-12 flex-shrink-0 text-blue-600" />
                            <h2 class="text-3xl font-bold tracking-tight">18. Changes to These Terms</h2>
                        </div>
                        <div class="prose prose-lg prose-a:text-blue-600 mt-6 max-w-none">
                            <p>
                                We may update these Terms for legal, product, or safety reasons. Material changes will be communicated via email,
                                in-app notice, or site posting. Continued use after notice indicates acceptance of the updated Terms.
                            </p>
                        </div>
                    </div>
                    <div ref="governingLawRef" class="fade-in-section">
                        <div class="flex items-center gap-4">
                            <ScaleIcon class="h-12 w-12 flex-shrink-0 text-blue-600" />
                            <h2 class="text-3xl font-bold tracking-tight">19. Governing Law & Dispute Resolution</h2>
                        </div>
                        <div class="prose prose-lg prose-a:text-blue-600 mt-6 max-w-none">
                            <p>
                                These Terms are governed by the laws of the Province of Ontario, Canada. Parties will attempt good-faith negotiation;
                                unresolved disputes may proceed to mediation or binding arbitration or to courts in Ontario, as specified in the
                                dispute-resolution clause. (Regional versions for EU/US markets may be published where required.)
                            </p>
                        </div>
                    </div>
                    <div ref="feedbackRef" class="fade-in-section">
                        <div class="flex items-center gap-4">
                            <ChatBubbleLeftRightIcon class="h-12 w-12 flex-shrink-0 text-blue-600" />
                            <h2 class="text-3xl font-bold tracking-tight">20. Feedback, Submissions & Community Contributions</h2>
                        </div>
                        <div class="prose prose-lg prose-a:text-blue-600 mt-6 max-w-none">
                            <p>
                                By submitting ideas or feedback, you grant PioVant a perpetual, worldwide, royalty-free license to use such
                                submissions to improve products and services. Do not submit confidential information unless under a separate
                                agreement.
                            </p>
                        </div>
                    </div>
                    <div ref="miscRef" class="fade-in-section">
                        <div class="flex items-center gap-4">
                            <WrenchScrewdriverIcon class="h-12 w-12 flex-shrink-0 text-blue-600" />
                            <h2 class="text-3xl font-bold tracking-tight">21. Miscellaneous</h2>
                        </div>
                        <div class="prose prose-lg prose-a:text-blue-600 mt-6 max-w-none">
                            <ul>
                                <li><strong>Severability:</strong> If a provision is unenforceable, the remainder remains in effect.</li>
                                <li><strong>No waiver:</strong> Failure to enforce a right does not waive it.</li>
                                <li>
                                    <strong>Entire agreement:</strong> These Terms, the Master Privacy Policy, Annex I, and any enterprise contracts
                                    constitute the full agreement governing Services.
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Contact Section -->
            <section ref="contactRef" class="fade-in-section bg-black py-24 sm:py-32">
                <div class="container mx-auto max-w-2xl px-6 text-center">
                    <EnvelopeIcon class="mx-auto h-12 w-12 text-gray-400" />
                    <h2 class="mt-4 text-3xl font-bold text-white">22. Contact & Notices</h2>
                    <p class="mt-4 text-lg text-gray-400">
                        For questions, reports, or legal requests, please use the designated channel for swift attention.
                    </p>
                    <div class="mt-8 space-y-4 text-left sm:text-center">
                        <p class="text-gray-300">
                            <strong class="font-semibold text-white">Privacy & Data</strong>
                            <a href="mailto:privacy@piovant.com" class="px-2 text-blue-400 hover:underline">privacy@piovant.com</a>
                        </p>
                        <p class="text-gray-300">
                            <strong class="font-semibold text-white">Enterprise & B2B</strong>
                            <a href="mailto:enterprise@piovant.com" class="px-2 text-blue-400 hover:underline">enterprise@piovant.com</a>
                        </p>
                        <p class="text-gray-300">
                            <strong class="font-semibold text-white">Technical Support</strong>
                            <a href="mailto:support@piovant.com" class="px-2 text-blue-400 hover:underline">support@piovant.com</a>
                        </p>
                    </div>
                    <div class="mt-10 border-t border-gray-800 pt-8 text-sm text-gray-500">
                        <p><span class="font-bold">Legal notices</span> PioVant Inc., [Toronto office address — insert].</p>
                        <p class="mt-4">
                            © 2026 PioVant Inc. — All Rights Reserved.<br />FortiVault™, PRIME™, VEIL™, ULTRA™, AERIS™, and associated system
                            designs are trademarks of PioVant Inc., Toronto, Canada.
                        </p>
                    </div>
                </div>
            </section>
        </main>
    </div>
</template>

<script setup>
import {
    ArrowPathIcon,
    BookOpenIcon,
    BuildingLibraryIcon,
    BuildingOffice2Icon,
    ChatBubbleLeftRightIcon,
    CpuChipIcon,
    DocumentTextIcon,
    EnvelopeIcon,
    ExclamationTriangleIcon,
    FingerPrintIcon,
    GlobeAltIcon,
    GlobeAmericasIcon,
    KeyIcon,
    NoSymbolIcon,
    ScaleIcon,
    ShieldCheckIcon,
    ShieldExclamationIcon,
    ShoppingCartIcon,
    SparklesIcon,
    StopCircleIcon,
    UserCircleIcon,
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

// Section Refs
const heroRef = ref(null);
const introRef = ref(null);
const purposeRef = ref(null);
const definitionsRef = ref(null);
const ownershipRef = ref(null);
const ipRef = ref(null);
const responsibleUseRef = ref(null);
const safetyRef = ref(null);
const purchasesRef = ref(null);
const accountsRef = ref(null);
const dataRef = ref(null);
const thirdPartyRef = ref(null);
const disclaimersRef = ref(null);
const liabilityRef = ref(null);
const indemnificationRef = ref(null);
const lawEnforcementRef = ref(null);
const exportRef = ref(null);
const transferRef = ref(null);
const terminationRef = ref(null);
const changesRef = ref(null);
const governingLawRef = ref(null);
const feedbackRef = ref(null);
const miscRef = ref(null);
const contactRef = ref(null);

// Attach Observers
useIntersectionObserver(heroRef, makeVisible);
useIntersectionObserver(introRef, makeVisible);
useIntersectionObserver(purposeRef, makeVisible);
useIntersectionObserver(definitionsRef, makeVisible);
useIntersectionObserver(ownershipRef, makeVisible);
useIntersectionObserver(ipRef, makeVisible);
useIntersectionObserver(responsibleUseRef, makeVisible);
useIntersectionObserver(safetyRef, makeVisible);
useIntersectionObserver(purchasesRef, makeVisible);
useIntersectionObserver(accountsRef, makeVisible);
useIntersectionObserver(dataRef, makeVisible);
useIntersectionObserver(thirdPartyRef, makeVisible);
useIntersectionObserver(disclaimersRef, makeVisible);
useIntersectionObserver(liabilityRef, makeVisible);
useIntersectionObserver(indemnificationRef, makeVisible);
useIntersectionObserver(lawEnforcementRef, makeVisible);
useIntersectionObserver(exportRef, makeVisible);
useIntersectionObserver(transferRef, makeVisible);
useIntersectionObserver(terminationRef, makeVisible);
useIntersectionObserver(changesRef, makeVisible);
useIntersectionObserver(governingLawRef, makeVisible);
useIntersectionObserver(feedbackRef, makeVisible);
useIntersectionObserver(miscRef, makeVisible);
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
