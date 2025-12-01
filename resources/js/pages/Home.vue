<template>
    <div class="space-y-2">
        <HeroSection />
        <QuoteCtaSection />
        <ProductShowcaseSection />
        <FeaturesSliderSection />
        <WaitlistCtaSection />
        <IntelligentDesignSection />
        <SentinelStackSection />
        <ProductModelsSection />
        <CareSection />
        <EngineeredForLifeSection />
        <FinalCtaSection />
        <div id="faq">
            <FaqSection />
        </div>
        <NewsLetter />
    </div>
</template>

<script setup>
import NewsLetter from '@/components/landing/NewsLetter.vue';
import CareSection from '../components/landing/CareSection.vue';
import EngineeredForLifeSection from '../components/landing/EngineeredForLifeSection.vue';
import FaqSection from '../components/landing/FaqSection.vue';
import FeaturesSliderSection from '../components/landing/FeaturesSliderSection.vue';
import FinalCtaSection from '../components/landing/FinalCtaSection.vue';
import HeroSection from '../components/landing/HeroSection.vue';
import IntelligentDesignSection from '../components/landing/IntelligentDesignSection.vue';
import ProductModelsSection from '../components/landing/ProductModelsSection.vue';
import ProductShowcaseSection from '../components/landing/ProductShowcaseSection.vue';
import QuoteCtaSection from '../components/landing/QuoteCtaSection.vue';
import SentinelStackSection from '../components/landing/SentinelStackSection.vue';
import WaitlistCtaSection from '../components/landing/WaitlistCtaSection.vue';
import AppLayout from '../layouts/AppLayout.vue';

// This special function tells Inertia to wrap this page with AppLayout.vue
defineOptions({
    layout: AppLayout,
});
</script>
