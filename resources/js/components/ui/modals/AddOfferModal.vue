<script setup lang="ts">
import CreateQuickAdForm from '@/components/ads/CreateQuickAdForm.vue';
import MyAdsList from '@/components/ads/MyAdsList.vue';
import { ref } from 'vue';

const activeTab = ref<'createAd' | 'myAds'>('createAd');
</script>

<template>
    <!-- 
      Main container now uses flexbox and responsive direction.
      - `flex-col`: Stacks tabs and content vertically on mobile.
      - `md:flex-row`: Switches to horizontal layout on medium screens and up.
    -->
    <div class="flex flex-col md:flex-row" dir="rtl">
        <!-- Tabs Section -->
        <div class="border-b p-2 md:w-1/5 md:border-b-0 md:border-l">
            <!-- 
              - `flex`: Makes tabs horizontal on mobile.
              - `md:block`: Stacks them vertically again on desktop.
            -->
            <ul class="flex justify-around space-x-2 space-x-reverse md:block md:space-y-2 md:space-x-0">
                <li class="flex-1 md:flex-none">
                    <button
                        @click="activeTab = 'createAd'"
                        class="w-full cursor-pointer rounded-md p-3 text-center text-sm font-bold transition-colors duration-100 md:text-right"
                        :class="activeTab === 'createAd' ? 'bg-[#FF4A4A] text-white' : 'hover:bg-gray-100'"
                    >
                        ساخت آگهی
                    </button>
                </li>
                <li class="flex-1 md:flex-none">
                    <button
                        @click="activeTab = 'myAds'"
                        class="w-full cursor-pointer rounded-md p-3 text-center text-sm font-bold transition-colors duration-100 md:text-right"
                        :class="activeTab === 'myAds' ? 'bg-[#FF4A4A] text-white' : 'hover:bg-gray-100'"
                    >
                        آگهی‌های من
                    </button>
                </li>
            </ul>
        </div>

        <!-- Content Section -->
        <div class="p-4 md:w-4/5">
            <CreateQuickAdForm v-if="activeTab === 'createAd'" />
            <MyAdsList v-else />
        </div>
    </div>
</template>
