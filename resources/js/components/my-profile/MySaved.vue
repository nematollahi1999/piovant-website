<script setup lang="ts">
import AdCard from '@/components/ads/AdCard.vue';
import { mockAds } from '@/data/mockAds';
</script>

<template>
    <div class="space-y-4">
        <div class="relative items-center justify-between space-y-4 sm:flex">
            <h1 class="w-full text-lg font-bold">آخرین آگهی های ذخیره شده</h1>
        </div>
        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3">
            <!-- We'll show a different slice of mock data for variety -->
            <AdCard v-for="ad in mockAds.slice(4, 10)" :key="ad.id" :ad="ad" />
        </div>
    </div>
</template>
