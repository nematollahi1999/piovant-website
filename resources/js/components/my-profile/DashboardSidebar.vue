<script setup lang="ts">
import { Link, usePage } from '@inertiajs/vue3';
import { computed } from 'vue';
import IconMyAuction from '../icons/IconMyAuction.vue';
import IconMyExchange from '../icons/IconMyExchange.vue';
import IconMyLatestView from '../icons/IconMyLatestView.vue';
import IconMyPayment from '../icons/IconMyPayment.vue';
import IconMySaved from '../icons/IconMySaved.vue';
import IconMySetting from '../icons/IconMySetting.vue';

// Mock user data
const user = {
    name: 'کاربر معاوضه',
    phone: '۰۹۱۲۳۴۵۶۷۸۹',
};

const page = usePage();

const activeSection = computed(() => {
    const url = new URL(window.location.origin + page.url);
    return url.searchParams.get('section') || 'my-exchanges';
});

// Add an 'icon' property to each nav item
const navItems = [
    { key: 'my-exchanges', label: 'معاوضات من', icon: IconMyExchange },
    { key: 'payments', label: 'پرداخت های من', icon: IconMyPayment },
    { key: 'saved', label: 'ذخیره شده ها', icon: IconMySaved },
    { key: 'auctions', label: 'مزایده ها', icon: IconMyAuction },
    { key: 'recent-views', label: 'بازدید های اخیر', icon: IconMyLatestView },
    { key: 'settings', label: 'تنظیمات', icon: IconMySetting },
];
</script>

<template>
    <!-- 
      MODIFIED: 
      - Width changed from `w-64` to match FilterSidebar's column span.
      - We'll control the exact width in DashboardLayout.
    -->
    <aside class="flex-col border-l bg-background p-4">
        <!-- User Info Card -->
        <div class="">
            <div class="flex items-center justify-between rounded-lg bg-gray-100 p-3">
                <div>
                    <p class="text-sm font-bold">{{ user.name }}</p>
                    <p class="text-xs text-muted-foreground">{{ user.phone }}</p>
                </div>
                <div class="">
                    <div class="cursor-pointer rounded-full p-2 text-red-500 hover:bg-red-50">
                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M5.85306 2.3999H3.38247C3.00804 2.3999 2.64896 2.5474 2.3842 2.80995C2.11944 3.0725 1.9707 3.4286 1.9707 3.7999V12.1999C1.9707 12.5712 2.11944 12.9273 2.3842 13.1898C2.64896 13.4524 3.00804 13.5999 3.38247 13.5999H5.85306M6.02852 7.9999H14.0285M14.0285 7.9999L10.9717 4.7999M14.0285 7.9999L10.9717 11.1999"
                                class="stroke-current"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                            />
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <!-- Navigation - Restyled to match FilterSidebar -->
        <nav class="flex-1 space-y-2 py-4">
            <Link
                v-for="item in navItems"
                :key="item.key"
                :href="`/my-profile?section=${item.key}`"
                :class="[
                    'flex cursor-pointer items-center justify-between rounded-md bg-gray-50 px-3 py-2 text-sm font-[700] transition-colors',
                    activeSection === item.key ? 'bg-gray-100 font-[800] text-[#FF4A4A]' : 'text-gray-600 hover:bg-gray-100',
                ]"
            >
                <div class="flex items-center gap-x-2">
                    <component :is="item.icon" class="h-5 w-5" />
                    <span>{{ item.label }}</span>
                </div>
            </Link>
        </nav>
    </aside>
</template>
