<script setup lang="ts">
import AdCard from '@/components/ads/AdCard.vue';
import { mockAds } from '@/data/mockAds';
</script>

<template>
    <div class="space-y-4">
        <h1 class="text-xl font-bold">بازدیدهای اخیر</h1>
        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3">
            <!-- Show the last few items from mock data to simulate "recent" -->
            <AdCard v-for="ad in mockAds.slice(-4)" :key="ad.id" :ad="ad" />
        </div>
    </div>
</template>
