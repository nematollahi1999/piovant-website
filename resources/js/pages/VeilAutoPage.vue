<template>
    <div class="space-y-2">
        <!-- 2. Big Carousel slider -->
        <HeroSlider />

        <!-- 3. Join the waitlist cta section -->
        <WaitlistCTA />

        <!-- 4. Prime sync banner -->
        <VeilSyncBannerM />

        <!-- 5. VeilM section -->
        <VeilMSection />

        <!-- 7. TrackVault section -->
        <TrackVaultSection />

        <!-- 8. AlarmVault section -->
        <AlarmVaultSection />

        <!-- 9. The Prime network carousel slider -->
        <VeilNetwork />

        <!-- 10. Why Prime? section -->
        <WhyVeilSection />

        <!-- 11. Command the intelligence cta section -->
        <CommandCTA />

        <!-- Your existing FAQ section would go here -->
        <FaqSection />
        <NewsLetter />
    </div>
</template>

<script setup>
import NewsLetter from '@/components/landing/NewsLetter.vue';
import AlarmVaultSection from '@/components/veilA/AlarmVaultSection.vue';
import CommandCTA from '@/components/veilA/CommandCTA.vue';
import FaqSection from '@/components/veilA/FaqSection.vue'; // Uncomment if needed
import HeroSlider from '@/components/veilA/HeroSlider.vue';
import TrackVaultSection from '@/components/veilA/TrackVaultSection.vue';
import VeilMSection from '@/components/veilA/VeilMSection.vue';
import VeilNetwork from '@/components/veilA/VeilNetwork.vue';
import VeilSyncBannerM from '@/components/veilA/VeilSyncBannerM.vue';
import WaitlistCTA from '@/components/veilA/WaitlistCTA.vue';
import WhyVeilSection from '@/components/veilA/WhyVeilSection.vue';
import AppLayout from '@/layouts/AppLayout.vue';

// This special function tells Inertia to wrap this page with AppLayout.vue
defineOptions({
    layout: AppLayout,
});
</script>
