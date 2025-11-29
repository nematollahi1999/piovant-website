<script setup lang="ts">
import ToggleSwitch from '@/components/ui/button/ToggleSwitch.vue';
import { Input } from '@/components/ui/input';
import { Separator } from '@/components/ui/separator';
// --- IMPORT YOUR ICONS ---
import IconAll from '@/components/icons/IconAll.vue';
import IconAuction from '@/components/icons/IconAuction.vue';
import IconDigital from '@/components/icons/IconDigital.vue';
import IconPersonal from '@/components/icons/IconPersonal.vue';
import IconRealEstate from '@/components/icons/IconRealEstate.vue';
import IconTop from '@/components/icons/IconTop.vue';
import IconUrgent from '@/components/icons/IconUrgent.vue';
import IconVehicle from '@/components/icons/IconVehicle.vue';
// --- NEW: Import an icon for "All Categories" ---
import { toPersianDigits } from '@/composables/formatters';
import { type Category } from '@/types';
import { computed, ref, watch } from 'vue'; // Import computed

// --- 1. ADD "همه" to categories data ---
const categories = ref<Category[]>([
    // The "All" category is now the first item
    { id: 'all', name: 'همه', adCount: 0, icon: IconAll },
    { id: 'real_estate', name: 'املاک و مستغلات', adCount: 153, icon: IconRealEstate },
    { id: 'vehicles', name: 'وسایل نقلیه', adCount: 267, icon: IconVehicle },
    { id: 'digital_goods', name: 'لوازم دیجیتال', adCount: 601, icon: IconDigital },
    { id: 'personal_items', name: 'وسایل شخصی', adCount: 410, icon: IconPersonal },
]);

// --- NEW: Calculate the total ad count for the "All" category ---
const totalAdCount = computed(() => {
    // Sum up the adCount of all categories except for the "all" category itself
    return categories.value.reduce((total, category) => {
        return category.id !== 'all' ? total + category.adCount : total;
    }, 0);
});

// Now update the adCount for the "All" category
const allCategory = categories.value.find((c) => c.id === 'all');
if (allCategory) {
    allCategory.adCount = totalAdCount.value;
}

const adTypes = ref([
    { id: 'all', name: 'همه', icon: IconAll },
    { id: 'urgent', name: 'فوری', icon: IconUrgent },
    { id: 'auction', name: 'مزایده', icon: IconAuction },
    { id: 'top', name: 'پربازخورد', icon: IconTop },
]);

// --- 2. SET "همه" as the default active category ---
const activeCategory = ref<string | null>('all');
const activeAdType = ref('all');
const priceFrom = ref('');
const priceTo = ref('');
const hasPhoto = ref(false);
const acceptsCashDifference = ref(false);

function applyFilters() {
    console.log('Applying filters instantly:', {
        // If 'all' is selected, we might want to send 'null' to the backend
        category: activeCategory.value === 'all' ? null : activeCategory.value,
        adType: activeAdType.value,
        priceFrom: priceFrom.value,
        priceTo: priceTo.value,
        hasPhoto: hasPhoto.value,
        acceptsCashDifference: acceptsCashDifference.value,
    });
}

watch(
    [activeCategory, activeAdType, priceFrom, priceTo, hasPhoto, acceptsCashDifference],
    () => {
        applyFilters();
    },
    { deep: true },
);
</script>

<template>
    <div
        class="scrollbar-hide h-[calc(100vh-4rem)] overflow-y-auto border-l bg-card text-card-foreground [scrollbar-width:none] [&::-webkit-scrollbar]:hidden"
    >
        <div class="px-4 pt-4">
            <h2 class="text-sm font-bold">دسته‌بندی‌ها</h2>
        </div>

        <div class="p-4">
            <div class="space-y-4">
                <ul class="space-y-2">
                    <!-- --- 3. The v-for loop now automatically includes the "همه" option --- -->
                    <li
                        v-for="category in categories"
                        :key="category.id"
                        @click="activeCategory = category.id"
                        class="flex cursor-pointer items-center justify-between rounded-md bg-gray-50 px-3 py-2 text-sm font-[700] transition-colors"
                        :class="activeCategory === category.id ? 'bg-gray-100 font-[800] text-[#FF4A4A]' : 'text-gray-600 hover:bg-gray-100'"
                    >
                        <div class="flex items-center gap-x-2">
                            <component :is="category.icon" class="h-5 w-5" />
                            <span>{{ category.name }}</span>
                        </div>

                        <span
                            class="rounded-sm px-1 text-sm"
                            :class="activeCategory === category.id ? 'bg-[#F7E8E8] text-[#FF4A4A]' : 'bg-gray-200 text-gray-400'"
                            >{{ toPersianDigits(category.adCount) }}</span
                        >
                    </li>
                </ul>

                <Separator />

                <div>
                    <h3 class="text-sm font-bold">نوع آگهی</h3>
                    <div class="flex flex-wrap gap-1 pt-4">
                        <button
                            v-for="adType in adTypes"
                            :key="adType.id"
                            @click="activeAdType = adType.id"
                            class="flex cursor-pointer items-center gap-x-1.5 rounded-md px-3 py-1.5 text-sm font-bold transition-colors"
                            :class="activeAdType === adType.id ? 'bg-[#FF4A4A] text-white' : 'bg-gray-50 text-gray-600 hover:bg-gray-100'"
                        >
                            <component :is="adType.icon" class="h-4 w-4" />
                            <span>{{ adType.name }}</span>
                        </button>
                    </div>
                </div>

                <Separator />

                <div>
                    <h3 class="text-sm font-bold">ارزش معامله</h3>
                    <div class="flex-col items-center space-y-2 pt-4">
                        <div class="flex items-center">
                            <span class="px-6">از</span>
                            <Input
                                v-model="priceFrom"
                                type="number"
                                placeholder="تومان"
                                class="cursor-pointer border-0 bg-gray-50 text-end hover:bg-gray-100 focus:border-0 focus:bg-gray-100 focus:outline-none focus-visible:ring-0 focus-visible:ring-offset-0"
                            />
                        </div>

                        <div class="flex items-center">
                            <span class="px-6">تا</span>
                            <Input
                                v-model="priceTo"
                                type="number"
                                placeholder="تومان"
                                class="cursor-pointer border-0 bg-gray-50 text-end hover:bg-gray-100 focus:border-0 focus:bg-gray-100 focus:outline-none focus-visible:ring-0 focus-visible:ring-offset-0"
                            />
                        </div>
                    </div>
                </div>

                <Separator />

                <div class="space-y-4">
                    <label class="flex cursor-pointer items-center justify-between">
                        <span class="text-sm font-bold">فقط عکس‌دار</span>
                        <ToggleSwitch v-model="hasPhoto" />
                    </label>
                    <Separator />
                    <label class="flex cursor-pointer items-center justify-between">
                        <span class="text-sm font-bold">امکان پرداخت اختلاف معامله</span>
                        <ToggleSwitch v-model="acceptsCashDifference" />
                    </label>
                </div>
            </div>
        </div>
    </div>
</template>
<style scoped>
/* Chrome, Safari, Edge, Opera */
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
    -webkit-appearance: none;
    margin: 0;
}

/* Firefox */
input[type='number'] {
    -moz-appearance: textfield;
}
</style>
