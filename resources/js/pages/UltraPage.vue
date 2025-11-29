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
        <TrackVaultSection />

        <!-- 8. AlarmVault section -->
        <AlarmVaultSection />

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
import NewsLetter from '@/components/landing/NewsLetter.vue';
import AlarmVaultSection from '@/components/ultra/AlarmVaultSection.vue';
import CommandCTA from '@/components/ultra/CommandCTA.vue';
import FaqSection from '@/components/ultra/FaqSection.vue'; // Uncomment if needed
import HeroSlider from '@/components/ultra/HeroSlider.vue';
import SteerVaultSection from '@/components/ultra/SteerVaultSection.vue';
import TrackVaultSection from '@/components/ultra/TrackVaultSection.vue';
import UltraNetwork from '@/components/ultra/UltraNetwork.vue';
import UltraSyncBannerM from '@/components/ultra/UltraSyncBannerM.vue';
import VeilMSection from '@/components/ultra/VeilMSection.vue';
import WaitlistCTA from '@/components/ultra/WaitlistCTA.vue';
import WhyUltraSection from '@/components/ultra/WhyUltraSection.vue';
import AppLayout from '@/layouts/AppLayout.vue';

// This special function tells Inertia to wrap this page with AppLayout.vue
defineOptions({
    layout: AppLayout,
});
</script>
