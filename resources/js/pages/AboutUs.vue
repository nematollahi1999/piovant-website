<template>
    <div class="font-sans antialiased">
        <main class="space-y-2 overflow-hidden text-white">
            <!-- Hero Section -->
            <section ref="heroRef" class="fade-in-section flex min-h-screen flex-col items-center justify-center bg-black px-6 text-center">
                <h1 class="max-w-4xl text-5xl font-bold tracking-tight text-gray-100 md:text-7xl lg:text-8xl">
                    Where <span class="bg-gradient-to-r from-[#F87479] to-[#2546FF] bg-clip-text text-transparent">Vision</span> Becomes Legacy
                </h1>
                <h2 class="mt-6 max-w-2xl text-xl font-medium tracking-tight text-gray-400 md:text-2xl">Forge a Transcendent Tomorrow</h2>
            </section>

            <!-- Manifesto Section with Background Image -->
            <section ref="manifestoRef" class="fade-in-section relative py-32 sm:py-48">
                <!-- Background Image Layer -->
                <div class="absolute inset-0 bg-cover bg-fixed bg-center" style="background-image: url('/images/manifesto.jpg')"></div>
                <!-- Dark Overlay Layer -->
                <div class="absolute inset-0 bg-black/60"></div>

                <!-- Content Layer -->
                <div class="relative z-10 container mx-auto max-w-3xl px-6 text-center">
                    <p class="text-2xl leading-relaxed text-gray-200 md:text-4xl md:leading-relaxed">
                        At PioVant, vision is not imagined —
                        <span class="text-white">it is forged.</span>
                        Here, imagination rises beyond function, and precision becomes poetry in motion.
                    </p>
                </div>
            </section>

            <!-- Craft Section -->
            <section ref="craftRef" class="fade-in-section bg-zinc-950 py-24 sm:py-32">
                <div class="container mx-auto max-w-4xl space-y-12 px-6 text-center text-lg leading-8 text-gray-400 md:text-xl md:leading-9">
                    <p>
                        We do not design systems; <span class="text-white">we compose sentience.</span> Every creation — from the cognitive vigilance
                        of FortiVault AERIS™, to the instinctive orchestration of PRIME™, to the invisible guardianship of VEIL™, and the seamless
                        unity of ULTRA™ — is born of a single conviction: <br /><br />
                        <span class="bg-gradient-to-r from-[#F87479] to-[#2546FF] bg-clip-text text-2xl font-medium text-transparent"
                            >That foresight is the purest form of strength.</span
                        >
                    </p>
                    <p>
                        Our craft merges art and engineering into a living intelligence — one that perceives, anticipates, and acts long before the
                        world senses a threat.
                    </p>
                </div>
            </section>

            <!-- Serenity Section -->
            <section ref="serenityRef" class="fade-in-section bg-slate-200 py-24 sm:py-32">
                <div class="container mx-auto max-w-3xl px-6 text-center">
                    <p class="text-2xl leading-relaxed text-gray-800 md:text-4xl md:leading-relaxed">
                        This is not security.
                        <br />
                        <span class="text-gray-600">It is serenity — engineered with purpose, perfected through awareness.</span>
                    </p>
                </div>
            </section>

            <!-- Commitment Section -->
            <section ref="commitmentRef" class="fade-in-section bg-gradient-to-r from-[#3e0002] to-[#000b4b] py-24 sm:py-32">
                <div class="container mx-auto max-w-7xl px-6">
                    <div class="grid grid-cols-1 gap-12 text-center md:grid-cols-3 md:text-left">
                        <div class="flex flex-col items-center md:items-start">
                            <h3 class="text-2xl font-bold text-white">Excellence</h3>
                            <p class="mt-2 max-w-xs text-base text-gray-400">Every element shaped with devotion to purity and purpose.</p>
                        </div>
                        <div class="flex flex-col items-center md:items-start">
                            <h3 class="text-2xl font-bold text-white">Trust</h3>
                            <p class="mt-2 max-w-xs text-base text-gray-400">Integrity embedded deep within every algorithm and alloy.</p>
                        </div>
                        <div class="flex flex-col items-center md:items-start">
                            <h3 class="text-2xl font-bold text-white">Impact</h3>
                            <p class="mt-2 max-w-xs text-base text-gray-400">
                                Innovation that redefines protection, empowers motion, and inspires belief in technology’s artistry.
                            </p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Legacy Section -->
            <section ref="legacyRef" class="fade-in-section bg-black py-24 sm:py-40">
                <div class="container mx-auto max-w-4xl px-6 text-center">
                    <h2 class="text-3xl font-bold tracking-tight text-white sm:text-4xl md:text-5xl">
                        <span class="bg-gradient-to-r from-[#F87479] to-[#2546FF] bg-clip-text text-transparent">PioVant</span> — Where Awareness
                        Becomes Art. Where Protection Becomes Legacy.
                    </h2>
                    <p class="mt-6 text-2xl text-gray-400">The Future is Not Awaited. It is Engineered.</p>
                </div>
            </section>
        </main>
    </div>
</template>

<script setup>
import { onMounted, onUnmounted, ref } from 'vue';
import AppLayout from '../layouts/AppLayout.vue';

// This special function tells Inertia to wrap this page with AppLayout.vue
defineOptions({
    layout: AppLayout,
});

// The script for scroll animations remains the same.
const useIntersectionObserver = (elementRef, callback) => {
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

const heroRef = ref(null);
const manifestoRef = ref(null);
const craftRef = ref(null);
const serenityRef = ref(null);
const commitmentRef = ref(null);
const legacyRef = ref(null);

const makeVisible = (element) => element.classList.add('is-visible');

useIntersectionObserver(heroRef, makeVisible);
useIntersectionObserver(manifestoRef, makeVisible);
useIntersectionObserver(craftRef, makeVisible);
useIntersectionObserver(serenityRef, makeVisible);
useIntersectionObserver(commitmentRef, makeVisible);
useIntersectionObserver(legacyRef, makeVisible);
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
