<script setup lang="ts">
import AdCard from '@/components/ads/AdCard.vue';
import { Input } from '@/components/ui/input';
import { mockAds } from '@/data/mockAds';
import { computed } from 'vue';

// Filter the mock data to only include auction ads
const auctionAds = computed(() => mockAds.filter((ad) => ad.adType === 'auction'));
</script>

<template>
    <div class="space-y-4">
        <div class="relative items-center justify-between space-y-4 sm:flex">
            <h1 class="w-full text-lg font-bold">آخرین مزایده ها</h1>
            <Input
                placeholder="جستجو در مزایده های من..."
                class="w-full cursor-pointer border-1 border-gray-300 text-start hover:bg-gray-50 focus:bg-gray-50 focus:outline-none focus-visible:ring-0 focus-visible:ring-offset-0 sm:w-100"
            />
        </div>
        <div v-if="auctionAds.length > 0" class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3">
            <AdCard v-for="ad in auctionAds" :key="ad.id" :ad="ad" management-mode />
        </div>
        <div v-else class="flex h-64 items-center justify-center rounded-lg border-2 border-dashed">
            <p class="text-muted-foreground">شما در هیچ مزایده‌ای شرکت نکرده‌اید.</p>
        </div>
    </div>
</template>
