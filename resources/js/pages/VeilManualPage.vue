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
import AlarmVaultSection from '@/components/veilM/AlarmVaultSection.vue';
import CommandCTA from '@/components/veilM/CommandCTA.vue';
import FaqSection from '@/components/veilM/FaqSection.vue'; // Uncomment if needed
import HeroSlider from '@/components/veilM/HeroSlider.vue';
import TrackVaultSection from '@/components/veilM/TrackVaultSection.vue';
import VeilMSection from '@/components/veilM/VeilMSection.vue';
import VeilNetwork from '@/components/veilM/VeilNetwork.vue';
import VeilSyncBannerM from '@/components/veilM/VeilSyncBannerM.vue';
import WaitlistCTA from '@/components/veilM/WaitlistCTA.vue';
import WhyVeilSection from '@/components/veilM/WhyVeilSection.vue';
import AppLayout from '@/layouts/AppLayout.vue';

// This special function tells Inertia to wrap this page with AppLayout.vue
defineOptions({
    layout: AppLayout,
});
</script>
