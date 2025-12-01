<template>
    <div class="space-y-2">
        <!-- 2. Big Carousel slider -->
        <HeroSlider />

        <!-- 3. Join the waitlist cta section -->
        <WaitlistCTA />

        <!-- 4. Prime sync banner -->
        <PrimeSyncBanner />

        <!-- 5. Steervault section -->
        <SteerVaultSection />

        <!-- 6. Voice assistance narrow banner -->
        <!-- <VoiceAssistantBanner /> -->

        <!-- 7. TrackVault section -->
        <TrackVaultSection />

        <!-- 8. AlarmVault section -->
        <AlarmVaultSection />

        <!-- 9. The Prime network carousel slider -->
        <PrimeNetwork />

        <!-- 10. Why Prime? section -->
        <WhyPrimeSection />

        <!-- 11. Command the intelligence cta section -->
        <CommandCTA />

        <!-- Your existing FAQ section would go here -->
        <FaqSection />
        <NewsLetter />
    </div>
</template>

<script setup>
import NewsLetter from '@/components/landing/NewsLetter.vue';
import AlarmVaultSection from '@/components/prime/AlarmVaultSection.vue';
import CommandCTA from '@/components/prime/CommandCTA.vue';
import FaqSection from '@/components/prime/FaqSection.vue'; // Uncomment if needed
import HeroSlider from '@/components/prime/HeroSlider.vue';
import PrimeNetwork from '@/components/prime/PrimeNetwork.vue';
import PrimeSyncBanner from '@/components/prime/PrimeSyncBanner.vue';
import SteerVaultSection from '@/components/prime/SteerVaultSection.vue';
import TrackVaultSection from '@/components/prime/TrackVaultSection.vue';
import WaitlistCTA from '@/components/prime/WaitlistCTA.vue';
import WhyPrimeSection from '@/components/prime/WhyPrimeSection.vue';
import AppLayout from '@/layouts/AppLayout.vue';

// This special function tells Inertia to wrap this page with AppLayout.vue
defineOptions({
    layout: AppLayout,
});
</script>
