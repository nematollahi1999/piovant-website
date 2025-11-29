<!-- resources/js/components/modals/LocationSelectorModal.vue -->
<script setup lang="ts">
import { Button } from '@/components/ui/button';
import { Dialog, DialogContent, DialogDescription, DialogFooter, DialogHeader, DialogTitle } from '@/components/ui/dialog';
import { Input } from '@/components/ui/input';
import { toPersianDigits } from '@/composables/formatters';
import { X } from 'lucide-vue-next';
import { computed, ref, watch } from 'vue';

interface City {
    id: number;
    name: string;
    adCount: number;
}

const props = defineProps<{
    modelValue: boolean;
    cities: City[];
    selectedCities: City[];
}>();

const emit = defineEmits(['update:modelValue', 'update:selectedCities']);

const searchQuery = ref('');
const localSelection = ref<City[]>([]);

watch(
    () => props.modelValue,
    (isOpen) => {
        if (isOpen) {
            localSelection.value = [...props.selectedCities];
        }
    },
);

const filteredCities = computed(() => {
    if (!searchQuery.value) {
        return props.cities;
    }
    return props.cities.filter((city) => city.name.includes(searchQuery.value));
});

// --- THE DEFINITIVE FIX IS HERE ---
function toggleCity(city: City) {
    const isSelected = localSelection.value.some((c) => c.id === city.id);

    if (isSelected) {
        // This part was already correct because .filter() creates a new array.
        localSelection.value = localSelection.value.filter((c) => c.id !== city.id);
    } else {
        if (localSelection.value.length < 5) {
            // --- THE CRITICAL CHANGE ---
            // BEFORE (Buggy): localSelection.value.push(city);
            // AFTER (Correct): We create a brand new array. This forces Vue to react.
            localSelection.value = [...localSelection.value, city];
        }
    }
}

function isCitySelected(city: City) {
    return localSelection.value.some((c) => c.id === city.id);
}

function confirmSelection() {
    emit('update:selectedCities', localSelection.value);
    emit('update:modelValue', false);
}
</script>

<!-- Your template remains exactly the same. It is already correct. -->
<template>
    <Dialog :open="modelValue" @update:open="(val) => emit('update:modelValue', val)">
        <DialogContent class="p-4 sm:max-w-[425px]" dir="rtl">
            <DialogHeader>
                <DialogTitle>انتخاب شهر</DialogTitle>
                <DialogDescription>می‌توانید تا ۵ شهر را برای جستجو انتخاب کنید.</DialogDescription>
            </DialogHeader>

            <div class="flex flex-col gap-4 p-4">
                <div dir="rtl">
                    <Input
                        class="cursor-pointer border bg-gray-50 hover:bg-gray-100 focus:border-0 focus:bg-gray-100 focus:outline-none focus-visible:ring-0 focus-visible:ring-offset-0"
                        v-model="searchQuery"
                        placeholder="جستجوی نام شهر..."
                    />
                    <div v-if="localSelection.length > 0" class="mt-4 flex flex-wrap gap-2 border-b border-border pb-4">
                        <div
                            v-for="city in localSelection"
                            :key="`selected-${city.id}`"
                            class="flex items-center gap-1 rounded-full bg-muted px-3 py-1 text-sm font-medium"
                        >
                            <span>{{ city.name }}</span>
                            <button @click="toggleCity(city)" class="cursor-pointer text-muted-foreground transition-colors hover:text-destructive">
                                <X class="h-4 w-4" />
                            </button>
                        </div>
                    </div>
                </div>

                <div dir="rtl" class="max-h-64 space-y-2 overflow-y-auto pl-1">
                    <button
                        v-for="city in filteredCities"
                        :key="city.id"
                        @click="toggleCity(city)"
                        :disabled="!isCitySelected(city) && localSelection.length >= 5"
                        :class="[
                            'w-full cursor-pointer rounded-lg px-4 py-2 text-right transition-colors disabled:cursor-not-allowed disabled:opacity-50',
                            isCitySelected(city) ? 'bg-[#F7E8E8] text-[#FF4A4A]' : 'hover:bg-gray-100',
                        ]"
                    >
                        <span class="text-sm font-bold">{{ city.name }}</span>
                        <span class="block text-xs" :class="isCitySelected(city) ? 'text-[#FF4A4A]/80' : 'text-muted-foreground'">
                            {{ toPersianDigits(city.adCount) }} آگهی
                        </span>
                    </button>
                </div>
            </div>

            <DialogFooter>
                <Button @click="confirmSelection" class="w-full cursor-pointer bg-[#FF4A4A] font-bold text-white hover:bg-red-500"
                    >تایید انتخاب</Button
                >
            </DialogFooter>
        </DialogContent>
    </Dialog>
</template>
