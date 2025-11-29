<!-- resources/js/components/modals/SearchModal.vue -->
<script setup lang="ts">
import IconDigital from '@/components/icons/IconDigital.vue';
import IconPersonal from '@/components/icons/IconPersonal.vue';
import IconRealEstate from '@/components/icons/IconRealEstate.vue';
import IconVehicle from '@/components/icons/IconVehicle.vue';
import { Dialog, DialogContent, DialogHeader, DialogTitle } from '@/components/ui/dialog';
import { Input } from '@/components/ui/input';
import { mockAds } from '@/data/mockAds.js'; // Correct import path
import type { Ad } from '@/types';
import { Search } from 'lucide-vue-next';
import { computed, nextTick, ref, watch } from 'vue';

const props = defineProps<{
    modelValue: boolean;
}>();
const emit = defineEmits(['update:modelValue']);

const searchQuery = ref('');
const searchInput = ref<HTMLInputElement | null>(null);

watch(
    () => props.modelValue,
    (isOpen) => {
        if (isOpen) {
            nextTick(() => searchInput.value?.focus());
        }
    },
);

const filteredAds = computed<Ad[]>(() => {
    if (searchQuery.value.length < 2) {
        return [];
    }
    const query = searchQuery.value.toLowerCase();
    // Safely cast mockAds to Ad[] for filtering
    return (mockAds as Ad[]).filter((ad) => ad.title.toLowerCase().includes(query));
});

function getCategoryInfo(category: Ad['category']) {
    switch (category) {
        case 'real_estate':
            return { name: 'املاک', icon: IconRealEstate };
        case 'vehicles':
            return { name: 'خودرو', icon: IconVehicle };
        case 'digital_goods':
            return { name: 'دیجیتال', icon: IconDigital };
        case 'personal_items':
            return { name: 'شخصی', icon: IconPersonal };
        default:
            return { name: '', icon: null };
    }
}

// Function to handle click on a result and close the modal
function onResultClick() {
    emit('update:modelValue', false);
}
</script>

<template>
    <Dialog :open="modelValue" @update:open="(val) => emit('update:modelValue', val)">
        <DialogContent class="sm:max-w-lg" dir="rtl">
            <DialogHeader>
                <DialogTitle class="p-4">جستجو در همه آگهی‌ها</DialogTitle>
            </DialogHeader>

            <div class="flex flex-col gap-4 p-4">
                <!-- Styled Search Input -->
                <div class="relative" dir="rtl">
                    <Input
                        ref="searchInput"
                        v-model="searchQuery"
                        placeholder="عنوان آگهی را وارد کنید..."
                        class="cursor-pointer border-0 bg-gray-50 pr-10 hover:bg-gray-100 focus:bg-gray-100 focus:outline-none focus-visible:ring-0 focus-visible:ring-offset-0"
                    />
                    <Search class="absolute top-1/2 right-3 h-5 w-5 -translate-y-1/2 text-muted-foreground" />
                </div>

                <!-- Results List -->
                <div class="max-h-96 min-h-[10rem] space-y-2 overflow-y-auto pl-1">
                    <div dir="rtl" v-if="searchQuery.length < 2" class="flex h-full items-center justify-center text-sm text-muted-foreground">
                        <p>برای جستجو حداقل ۲ حرف وارد کنید.</p>
                    </div>
                    <div v-else-if="filteredAds.length === 0" class="flex h-full items-center justify-center text-sm text-muted-foreground">
                        <p>نتیجه‌ای یافت نشد.</p>
                    </div>

                    <a
                        v-for="ad in filteredAds"
                        :key="ad.id"
                        :href="`/ads/${ad.slug}`"
                        @click="onResultClick"
                        dir="rtl"
                        class="block w-full cursor-pointer rounded-lg px-4 py-2 text-right transition-colors hover:bg-gray-100"
                    >
                        <div class="flex items-center gap-x-3">
                            <component :is="getCategoryInfo(ad.category).icon" class="h-5 w-5 text-muted-foreground" />
                            <div>
                                <p class="text-sm font-bold">{{ ad.title }}</p>
                                <p class="text-xs text-muted-foreground">در دسته {{ getCategoryInfo(ad.category).name }}</p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </DialogContent>
    </Dialog>
</template>
