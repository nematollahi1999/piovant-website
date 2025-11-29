<template>
    <div class="font-sans antialiased">
        <main class="space-y-2 overflow-hidden">
            <!-- Hero Section -->
            <section ref="heroRef" class="fade-in-section flex min-h-[70vh] flex-col items-center justify-center bg-slate-200 px-6 text-center">
                <h1 class="max-w-4xl text-5xl font-bold tracking-tight md:text-7xl">
                    <span class="bg-gradient-to-r from-[#F87479] to-[#2546FF] bg-clip-text text-transparent">Annex I</span> — IoT Device Privacy
                    Notice
                </h1>
                <div class="mt-8 max-w-4xl text-sm leading-relaxed text-gray-600 md:text-base">
                    <p class="font-semibold">Applies to:</p>
                    <p>
                        Smart Steering Lock, Smart Pedal Lock, Smart GPS Tracker, Smart Alarm System, AeroVault™, TerraDock™, and the FortiVault
                        Application
                    </p>
                </div>
                <div class="mt-4 text-xs text-gray-500">
                    <span>Effective Date: January 20, 2026</span>
                    <span class="mx-2">|</span>
                    <span>Last Updated: January 20, 2026</span>
                </div>
            </section>

            <!-- Overview Section -->
            <section ref="overviewRef" class="fade-in-section bg-zinc-950 py-24 sm:py-32">
                <div class="container mx-auto max-w-4xl space-y-6 px-6 text-center text-lg leading-8 text-gray-300">
                    <h2 class="text-3xl font-bold text-white">Purpose & Scope</h2>
                    <p>
                        This Annex supplements the Master Privacy Policy with product- and operation-specific privacy, safety, and compliance details
                        for PioVant IoT devices and the FortiVault ecosystem (PRIME™, VEIL™, ULTRA™, AERIS™).
                    </p>
                    <p>
                        Applies to all consumer, enterprise, and AERIS deployments, and to data collected or processed during device operation,
                        flights, missions, maintenance, or support.
                    </p>
                </div>
            </section>

            <!-- Main Policy Body -->
            <section class="bg-white py-24 text-gray-800 sm:py-32">
                <div class="container mx-auto max-w-4xl space-y-16 px-6">
                    <div ref="principlesRef" class="fade-in-section">
                        <div class="flex items-center gap-4">
                            <LightBulbIcon class="h-12 w-12 flex-shrink-0 text-blue-600" />
                            <h2 class="text-3xl font-bold tracking-tight">A. Principles & System Design</h2>
                        </div>
                        <div class="prose prose-lg prose-a:text-blue-600 mt-6 max-w-none">
                            <h3>A.1 Privacy by Design & Local-First Processing</h3>
                            <ul>
                                <li>PioVant designs devices to collect only the minimum data strictly necessary for secure operation.</li>
                                <li>
                                    Sensitive data (biometrics, in-cabin video, precise GPS telemetry) is stored on-device by default. Cloud storage
                                    occurs only with explicit user consent or by contract for enterprise customers.
                                </li>
                                <li>
                                    Users keep full control through the FortiVault app and the Privacy Dashboard (export, delete, retention settings).
                                </li>
                            </ul>
                            <h3>A.2 Safety & Operational Compliance (General)</h3>
                            <ul>
                                <li>
                                    All systems operate subject to local aviation, data protection, and safety law. Automated flight or engagement
                                    features are conditioned on local regulatory permissions and safety checks.
                                </li>
                                <li>
                                    TerraDock™/AeroVault™ deployments require user confirmation that local operational constraints (no-fly zones,
                                    altitude limits, privacy-restricted zones) are respected. PioVant provides geofencing defaults and compliance
                                    guidance.
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div ref="biometricRef" class="fade-in-section">
                        <div class="flex items-center gap-4">
                            <FingerPrintIcon class="h-12 w-12 flex-shrink-0 text-blue-600" />
                            <h2 class="text-3xl font-bold tracking-tight">B. Biometric Data (Fingerprint & Face)</h2>
                        </div>
                        <div class="prose prose-lg prose-a:text-blue-600 mt-6 max-w-none">
                            <ul>
                                <li><strong>Purpose:</strong> local authentication and on-device safety verification.</li>
                                <li>
                                    <strong>Storage:</strong> biometric templates are stored only in a device secure element (hardware-backed).
                                    Templates are non-reversible and encrypted; they are not uploaded to PioVant servers except under enterprise
                                    agreements with explicit consent.
                                </li>
                                <li>
                                    <strong>Control:</strong> users may add/delete templates via the app. Factory reset permanently erases templates.
                                </li>
                                <li>
                                    <strong>Security:</strong> hardware anti-tamper protections, encryption at rest, and secure boot protect
                                    templates. Biometric use is limited to access/authentication and safety verification — never for marketing.
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div ref="videoRef" class="fade-in-section">
                        <div class="flex items-center gap-4">
                            <VideoCameraIcon class="h-12 w-12 flex-shrink-0 text-blue-600" />
                            <h2 class="text-3xl font-bold tracking-tight">C. In-Cabin Video & Images</h2>
                        </div>
                        <div class="prose prose-lg prose-a:text-blue-600 mt-6 max-w-none">
                            <ul>
                                <li><strong>Purpose:</strong> theft prevention, evidentiary recording, and safety alerts.</li>
                                <li>
                                    <strong>Default Storage:</strong> encrypted, locally on device storage. Cloud backup/uploads occur only if user
                                    explicitly enables backup or opts into a paid plan.
                                </li>
                                <li><strong>Access:</strong> via authenticated FortiVault sessions only; access logs recorded.</li>
                                <li>
                                    <strong>Retention & Deletion:</strong> user-configurable; default retention 90 days for operational logs and 6
                                    months for GPS route archive (see G). Factory reset erases local media.
                                </li>
                                <li>
                                    <strong>Lawful Disclosure:</strong> PioVant will comply with lawful requests (see H) and will challenge overbroad
                                    requests.
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div ref="locationRef" class="fade-in-section">
                        <div class="flex items-center gap-4">
                            <MapPinIcon class="h-12 w-12 flex-shrink-0 text-blue-600" />
                            <h2 class="text-3xl font-bold tracking-tight">D. Location / GPS & Mission Telemetry</h2>
                        </div>
                        <div class="prose prose-lg prose-a:text-blue-600 mt-6 max-w-none">
                            <ul>
                                <li>
                                    <strong>Purpose:</strong> real-time tracking, geofencing, mission coordination, recovery, and safety. Not used for
                                    marketing unless expressly consented.
                                </li>
                                <li>
                                    <strong>Local Processing Model & User Control:</strong> GPS and telemetry are processed primarily on-device;
                                    real-time views are end-to-end encrypted between device and authorized app sessions. Users may grant/revoke
                                    sharing to specific authorized users and clear local location history at any time.
                                </li>
                                <li>
                                    <strong>Mission / Flight Data:</strong> for AERIS missions, mission telemetry is logged locally and only uploaded
                                    to the cloud or shared with authorities upon user consent, legal compulsion, or enterprise agreement.
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>

            <section class="bg-zinc-950 py-24 text-white sm:py-32">
                <div class="container mx-auto max-w-4xl space-y-16 px-6">
                    <div ref="telemetryRef" class="fade-in-section">
                        <div class="flex items-center gap-4">
                            <ChartBarIcon class="h-12 w-12 flex-shrink-0 text-blue-400" />
                            <h2 class="text-3xl font-bold tracking-tight">E. Telemetry, Diagnostics & Usage Data</h2>
                        </div>
                        <div class="prose prose-lg prose-invert prose-a:text-blue-400 mt-6 max-w-none">
                            <p>
                                Collected to ensure reliability, safety, firmware integrity, and product improvement. Diagnostic reports are stripped
                                of PII by default unless the user consents to include contact identifiers for support. Extended telemetry is opt-in
                                and clearly described in the app.
                            </p>
                        </div>
                    </div>

                    <div ref="securityRef" class="fade-in-section">
                        <div class="flex items-center gap-4">
                            <LockClosedIcon class="h-12 w-12 flex-shrink-0 text-blue-400" />
                            <h2 class="text-3xl font-bold tracking-tight">F. Communication Security & Firmware</h2>
                        </div>
                        <div class="prose prose-lg prose-invert prose-a:text-blue-400 mt-6 max-w-none">
                            <p>
                                All comms use industry standard encryption: TLS 1.3 for transport, AES-256 at rest, and authenticated device
                                identities. Firmware is code-signed; devices install only verified updates. PioVant runs a coordinated vulnerability
                                disclosure program; security researchers may report issues to security@piovant.com.
                            </p>
                        </div>
                    </div>

                    <div ref="retentionRef" class="fade-in-section">
                        <div class="flex items-center gap-4">
                            <ArchiveBoxIcon class="h-12 w-12 flex-shrink-0 text-blue-400" />
                            <h2 class="text-3xl font-bold tracking-tight">G. Data Retention, Audit Trails & Access Logs</h2>
                        </div>
                        <div class="prose prose-lg prose-invert prose-a:text-blue-400 mt-6 max-w-none">
                            <ul>
                                <li>
                                    <strong>Default retention:</strong> mission logs and telemetry up to 6 months locally (user-configurable).
                                    Operational logs may be retained for up to 90 days unless the user changes settings.
                                </li>
                                <li>
                                    <strong>Auditability:</strong> All AERIS missions, automated decisions (tier triggers), and critical operator
                                    actions are time-stamped and stored in tamper-evident logs locally; summaries may be uploaded for enterprise
                                    customers under contract.
                                </li>
                                <li>
                                    <strong>Deletion:</strong> users may request deletion/export via app or privacy@piovant.com; deletions are
                                    executed per legal limits and may be delayed if required for investigations or legal holds.
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div ref="lawfulRef" class="fade-in-section">
                        <div class="flex items-center gap-4">
                            <ShieldExclamationIcon class="h-12 w-12 flex-shrink-0 text-blue-400" />
                            <h2 class="text-3xl font-bold tracking-tight">H. Lawful Requests, Emergency Access & Cooperation</h2>
                        </div>
                        <div class="prose prose-lg prose-invert prose-a:text-blue-400 mt-6 max-w-none">
                            <ul>
                                <li>
                                    PioVant resists overbroad requests and requires proper legal process for disclosure (warrants, subpoenas). Minimal
                                    necessary data is disclosed; data holders will notify the user unless legally prohibited.
                                </li>
                                <li>
                                    <strong>Emergency Escalation:</strong> For imminent threats to life, PioVant may cooperate promptly with
                                    authorized emergency services. Any emergency data-sharing follows documented, legally reviewed procedures and is
                                    logged.
                                </li>
                                <li>
                                    <strong>Auditable Process:</strong> law-enforcement disclosure requests are recorded; users may be informed where
                                    permitted.
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>

            <section class="bg-white py-24 text-gray-800 sm:py-32">
                <div class="container mx-auto max-w-4xl space-y-16 px-6">
                    <div ref="tieredRef" class="fade-in-section">
                        <div class="flex items-center gap-4">
                            <Bars4Icon class="h-12 w-12 flex-shrink-0 text-blue-600" />
                            <h2 class="text-3xl font-bold tracking-tight">I. Tiered Engagement Rules (AERIS-specific)</h2>
                        </div>
                        <div class="prose prose-lg prose-a:text-blue-600 mt-6 max-w-none">
                            <p>To reduce legal & safety risk and to clarify the system’s behavior, AERIS follows graded engagement (tiered) rules:</p>
                            <ul>
                                <li>
                                    <strong>Tier 0 — Monitor (Passive):</strong> sensors record and flag anomalies; no external action taken except
                                    local logging and user notification.
                                </li>
                                <li>
                                    <strong>Tier 1 — Alert (Advisory):</strong> app notifications and audible local signals; TerraDock and AeroVault
                                    prepare (safety checks) but do not deploy.
                                </li>
                                <li>
                                    <strong>Tier 2 — Deter (Non-Contact):</strong> non-kinetic deterrents (siren, light strobes), silent alerts to
                                    authorized contacts; remote monitoring intensifies.
                                </li>
                                <li>
                                    <strong>Tier 3 — Intercept & Record (Active, Non-Kinetic):</strong> AeroVault may launch (where permitted) to
                                    capture encrypted live telemetry and video; tracking is active, but the system does not physically engage persons.
                                    All actions abide by pre-configured geofences and altitude limits.
                                </li>
                                <li>
                                    <strong>Tier 4 — Escalation (Coordinate with Authorities):</strong> When a clear, imminent threat to life is
                                    detected, the system relays real-time data to authorized responders and can trigger additional safety protocols
                                    per user settings and local law.
                                </li>
                            </ul>
                            <h3>Human-in-the-loop safeguards</h3>
                            <p>
                                Automated tier transitions are constrained by thresholds (sensor consensus, confidence scores, contextual checks).
                                High-risk actions (Tier 3 → Tier 4) surface operator alerts and, where required, user confirmation unless a
                                life-threatening emergency is detected.
                            </p>
                            <h3>Audit & Appeal</h3>
                            <p>
                                Every automated action that moves beyond Tier 1 is logged and reviewable; users and authorized auditors can request
                                mission logs for post-event review.
                            </p>
                        </div>
                    </div>

                    <div ref="aerovaultRef" class="fade-in-section">
                        <div class="flex items-center gap-4">
                            <PaperAirplaneIcon class="h-12 w-12 flex-shrink-0 text-blue-600" />
                            <h2 class="text-3xl font-bold tracking-tight">J. AeroVault™ & TerraDock™ — Aviation & Safety</h2>
                        </div>
                        <div class="prose prose-lg prose-a:text-blue-600 mt-6 max-w-none">
                            <ul>
                                <li>
                                    <strong>Flight Authorization:</strong> AeroVault autonomous launch and flight are performed only where the user
                                    has authority to operate or where TerraDock detects compliance with local flight rules. PioVant’s app provides
                                    geofencing maps and recommended restrictions.
                                </li>
                                <li>
                                    <strong>Operational Limits:</strong> Configurable altitude caps, no-fly zone enforcement, and automatic abort on
                                    loss of required permissions or signal integrity.
                                </li>
                                <li>
                                    <strong>Single-Drone TerraDock:</strong> Each TerraDock is calibrated for a single AeroVault unless otherwise
                                    contracted for enterprise deployments.
                                </li>
                                <li>
                                    <strong>Maintenance & Certification:</strong> TerraDock and AeroVault must be installed and serviced per PioVant
                                    instructions; certain installations (commercial / public-area) may require certified installers or local permits.
                                </li>
                                <li>
                                    <strong>Liability Note:</strong> Users are responsible for compliance with local aviation and privacy laws where
                                    the device is operated.
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>

            <section class="bg-zinc-950 py-24 text-white sm:py-32">
                <div class="container mx-auto max-w-4xl space-y-16 px-6">
                    <div ref="marketingRef" class="fade-in-section">
                        <div class="flex items-center gap-4">
                            <NoSymbolIcon class="h-12 w-12 flex-shrink-0 text-blue-400" />
                            <h2 class="text-3xl font-bold tracking-tight">K. No Marketing Use of Sensitive Data</h2>
                        </div>
                        <div class="prose prose-lg prose-invert prose-a:text-blue-400 mt-6 max-w-none">
                            <p>
                                Biometric, in-cabin video, and precise location data are never used for marketing. Optional analytics or
                                personalization requires explicit opt-in.
                            </p>
                        </div>
                    </div>

                    <div ref="enterpriseRef" class="fade-in-section">
                        <div class="flex items-center gap-4">
                            <BuildingOffice2Icon class="h-12 w-12 flex-shrink-0 text-blue-400" />
                            <h2 class="text-3xl font-bold tracking-tight">L. Enterprise / Fleet Deployments</h2>
                        </div>
                        <div class="prose prose-lg prose-invert prose-a:text-blue-400 mt-6 max-w-none">
                            <p>
                                Enterprise customers may contract bespoke hosting, access, retention, and reporting terms. Such agreements supersede
                                default Annex settings only as expressly stated in the contract. Contact enterprise@piovant.com.
                            </p>
                        </div>
                    </div>

                    <div ref="dashboardRef" class="fade-in-section">
                        <div class="flex items-center gap-4">
                            <AdjustmentsHorizontalIcon class="h-12 w-12 flex-shrink-0 text-blue-400" />
                            <h2 class="text-3xl font-bold tracking-tight">M. User Controls & Privacy Dashboard</h2>
                        </div>
                        <div class="prose prose-lg prose-invert prose-a:text-blue-400 mt-6 max-w-none">
                            <p>The FortiVault App and web dashboard provide:</p>
                            <ul>
                                <li>Privacy toggles (GPS precision, camera enable/disable, biometric enrollment)</li>
                                <li>Data export (machine-readable) and deletion tools</li>
                                <li>Mission log access (for user-owned devices) and request forms for authorities</li>
                                <li>Consent management for cloud backup or enterprise features</li>
                            </ul>
                        </div>
                    </div>

                    <div ref="updatesRef" class="fade-in-section">
                        <div class="flex items-center gap-4">
                            <ArrowPathIcon class="h-12 w-12 flex-shrink-0 text-blue-400" />
                            <h2 class="text-3xl font-bold tracking-tight">N. Updates to this Annex</h2>
                        </div>
                        <div class="prose prose-lg prose-invert prose-a:text-blue-400 mt-6 max-w-none">
                            <p>
                                This Annex will be updated for new features, regulations, or safety needs. Major changes will be promoted via in-app
                                notices and at piovant.com/legal/privacy/annex-I.
                            </p>
                        </div>
                    </div>
                </div>
            </section>
        </main>
    </div>
</template>

<script setup>
import {
    AdjustmentsHorizontalIcon,
    ArchiveBoxIcon,
    ArrowPathIcon,
    Bars4Icon,
    BuildingOffice2Icon,
    ChartBarIcon,
    FingerPrintIcon,
    LightBulbIcon,
    LockClosedIcon,
    MapPinIcon,
    NoSymbolIcon,
    PaperAirplaneIcon,
    ShieldExclamationIcon,
    VideoCameraIcon,
} from '@heroicons/vue/24/outline';
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
const principlesRef = ref(null);
const biometricRef = ref(null);
const videoRef = ref(null);
const locationRef = ref(null);
const telemetryRef = ref(null);
const securityRef = ref(null);
const retentionRef = ref(null);
const lawfulRef = ref(null);
const tieredRef = ref(null);
const aerovaultRef = ref(null);
const marketingRef = ref(null);
const enterpriseRef = ref(null);
const dashboardRef = ref(null);
const updatesRef = ref(null);

useIntersectionObserver(heroRef, makeVisible);
useIntersectionObserver(overviewRef, makeVisible);
useIntersectionObserver(principlesRef, makeVisible);
useIntersectionObserver(biometricRef, makeVisible);
useIntersectionObserver(videoRef, makeVisible);
useIntersectionObserver(locationRef, makeVisible);
useIntersectionObserver(telemetryRef, makeVisible);
useIntersectionObserver(securityRef, makeVisible);
useIntersectionObserver(retentionRef, makeVisible);
useIntersectionObserver(lawfulRef, makeVisible);
useIntersectionObserver(tieredRef, makeVisible);
useIntersectionObserver(aerovaultRef, makeVisible);
useIntersectionObserver(marketingRef, makeVisible);
useIntersectionObserver(enterpriseRef, makeVisible);
useIntersectionObserver(dashboardRef, makeVisible);
useIntersectionObserver(updatesRef, makeVisible);
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
