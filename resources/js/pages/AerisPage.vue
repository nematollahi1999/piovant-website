<template>
    <div class="space-y-2">
        <!-- 2. Big Carousel slider -->
        <HeroSlider />

        <!-- 3. Join the waitlist cta section -->
        <WaitlistCTA />

        <!-- 4. Prime sync banner -->
        <UltraSyncBannerM />

        <SteerVaultSection />

        <!-- 5. VeilM section -->
        <VeilMSection />

        <!-- 7. TrackVault section -->
        <!-- <TrackVaultSection /> -->

        <!-- 8. AlarmVault section -->
        <!-- <AlarmVaultSection /> -->

        <!-- 9. The Prime network carousel slider -->
        <UltraNetwork />

        <!-- 10. Why Prime? section -->
        <WhyUltraSection />

        <!-- 11. Command the intelligence cta section -->
        <CommandCTA />

        <!-- Your existing FAQ section would go here -->
        <FaqSection />
        <NewsLetter />
    </div>
</template>

<script setup>
import CommandCTA from '@/components/aeris/CommandCTA.vue';
import FaqSection from '@/components/aeris/FaqSection.vue'; // Uncomment if needed
import HeroSlider from '@/components/aeris/HeroSlider.vue';
import SteerVaultSection from '@/components/aeris/SteerVaultSection.vue';
import UltraNetwork from '@/components/aeris/UltraNetwork.vue';
import UltraSyncBannerM from '@/components/aeris/UltraSyncBannerM.vue';
import VeilMSection from '@/components/aeris/VeilMSection.vue';
import WaitlistCTA from '@/components/aeris/WaitlistCTA.vue';
import WhyUltraSection from '@/components/aeris/WhyUltraSection.vue';
import NewsLetter from '@/components/landing/NewsLetter.vue';
import AppLayout from '@/layouts/AppLayout.vue';

// This special function tells Inertia to wrap this page with AppLayout.vue
defineOptions({
    layout: AppLayout,
});
</script>
