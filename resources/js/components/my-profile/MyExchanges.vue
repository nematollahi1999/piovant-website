<script setup lang="ts">
import AdCard from '@/components/ads/AdCard.vue'; // We reuse the AdCard from the homepage
import { Input } from '@/components/ui/input';
import { mockAds } from '@/data/mockAds';
</script>

<template>
    <div class="space-y-4">
        <div class="relative items-center justify-between space-y-4 sm:flex">
            <h1 class="w-full text-lg font-bold">آخرین آگهی ها</h1>
            <Input
                placeholder="جستجو در آگهی های من..."
                class="w-full cursor-pointer border-1 border-gray-300 text-start hover:bg-gray-50 focus:bg-gray-50 focus:outline-none focus-visible:ring-0 focus-visible:ring-offset-0 sm:w-100"
            />
        </div>
        <div class="grid grid-cols-1 gap-3 sm:grid-cols-2 lg:grid-cols-3">
            <AdCard v-for="ad in mockAds.slice(0, 6)" :key="ad.id" :ad="ad" management-mode />
        </div>
    </div>
</template>
