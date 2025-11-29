<script setup lang="ts">
import AppLogo from '@/components/AppLogo.vue';
import IconChat from '@/components/icons/IconChat.vue';
import IconProfile from '@/components/icons/IconProfile.vue';
import IconSupport from '@/components/icons/IconSupport.vue';
import FilterSidebar from '@/components/layout/FilterSidebar.vue';
import { Button } from '@/components/ui/button';
import LocationSelectorModal from '@/components/ui/modals/LocationSelectorModal.vue';
import SearchModal from '@/components/ui/modals/SearchModal.vue'; // Using the new path
import { Sheet, SheetContent, SheetTrigger } from '@/components/ui/sheet';
import { Tooltip, TooltipContent, TooltipProvider, TooltipTrigger } from '@/components/ui/tooltip';
import { toPersianDigits } from '@/composables/formatters';
import { Link, usePage } from '@inertiajs/vue3';
import { MapPin, Menu, Search } from 'lucide-vue-next';
import { computed, ref } from 'vue';

// --- MOCK DATA ---
const cities = ref([
    { id: 1, name: 'تهران', adCount: 1250 },
    { id: 2, name: 'مشهد', adCount: 874 },
    { id: 3, name: 'اصفهان', adCount: 761 },
    { id: 4, name: 'کرج', adCount: 680 },
    { id: 5, name: 'شیراز', adCount: 592 },
    { id: 6, name: 'تبریز', adCount: 433 },
    { id: 7, name: 'قم', adCount: 312 },
]);

const isLocationModalOpen = ref(false);
const selectedCities = ref<Array<{ id: number; name: string; adCount: number }>>([]);
const isSearchModalOpen = ref(false); // State for the SearchModal

const locationDisplayText = computed(() => {
    const count = selectedCities.value.length;
    if (count === 0) {
        return 'همه شهرها';
    }
    if (count === 1) {
        return selectedCities.value[0].name;
    }
    return `${toPersianDigits(count)} شهر انتخاب شده`;
});

const page = usePage();
const isAuthenticated = computed(() => !!page.props.auth?.user);
</script>

<template>
    <header dir="rtl" class="sticky top-0 z-50 w-full border-b bg-background/95 backdrop-blur supports-[backdrop-filter]:bg-background/60">
        <div class="container mx-auto flex h-16 w-full items-center px-6">
            <div class="flex items-center gap-x-6">
                <!-- Logo - Simple URL -->
                <Link href="/" class="flex items-center gap-x-2">
                    <AppLogo />
                </Link>

                <!-- Location Selector -->
                <div class="hidden items-center gap-x-1 border-r border-border pr-6 lg:flex">
                    <MapPin class="h-5 w-5 text-muted-foreground" />
                    <Button variant="ghost" class="cursor-pointer font-medium" @click="isLocationModalOpen = true">
                        {{ locationDisplayText }}
                    </Button>
                </div>

                <!-- Search Button Trigger -->
                <div class="hidden lg:flex">
                    <Button
                        @click="isSearchModalOpen = true"
                        class="flex w-72 cursor-text items-center justify-start gap-x-2 rounded-md bg-gray-100 px-3 text-muted-foreground hover:bg-muted"
                    >
                        <Search class="h-4 w-4" />
                        <span>جستجو در تمامی آگهی ها</span>
                    </Button>
                </div>
            </div>

            <!-- Left Side Actions -->
            <div class="mr-auto flex items-center gap-x-2">
                <div v-if="isAuthenticated" class="hidden items-center gap-x-4 lg:flex">
                    <!-- My Exchanges (معاوضه‌های من) - SIMPLE URL -->
                    <TooltipProvider :delay-duration="100">
                        <Tooltip>
                            <TooltipTrigger as-child>
                                <Link href="/my-profile" class="flex cursor-pointer items-center gap-1" as="button" variant="ghost" size="icon">
                                    <IconProfile /><span>معاوضه های من</span>
                                </Link>
                            </TooltipTrigger>
                            <TooltipContent><p>معاوضه‌های من</p></TooltipContent>
                        </Tooltip>
                    </TooltipProvider>

                    <!-- Chat - SIMPLE URL -->
                    <TooltipProvider :delay-duration="100">
                        <Tooltip>
                            <TooltipTrigger as-child>
                                <Link href="/chat" class="flex cursor-pointer items-center gap-1" as="button" variant="ghost" size="icon">
                                    <IconChat />
                                    <span>چت و اعلانات</span>
                                </Link>
                            </TooltipTrigger>
                            <TooltipContent><p>چت و اعلانات</p></TooltipContent>
                        </Tooltip>
                    </TooltipProvider>

                    <!-- Support - SIMPLE URL -->
                    <TooltipProvider :delay-duration="100">
                        <Tooltip>
                            <TooltipTrigger as-child>
                                <Link href="/support" class="flex cursor-pointer items-center gap-1" as="button" variant="ghost" size="icon">
                                    <IconSupport />
                                    <span>پشتیبانی</span>
                                </Link>
                            </TooltipTrigger>
                            <TooltipContent><p>پشتیبانی</p></TooltipContent>
                        </Tooltip>
                    </TooltipProvider>
                </div>
                <div v-if="isAuthenticated" class="mx-2 hidden h-6 w-px bg-border lg:block"></div>

                <!-- Create Ad Button - SIMPLE URL -->
                <Button v-if="isAuthenticated" class="cursor-pointer bg-[#FF4A4A] font-bold hover:bg-red-500"> ثبت آگهی </Button>

                <!-- Login/Register Button - SIMPLE URL -->
                <Link
                    v-else
                    class="cursor-pointer rounded-md bg-[#FF4A4A] p-2 text-sm font-bold text-white hover:bg-red-500"
                    href="/login"
                    as="button"
                >
                    ورود | ثبت‌نام
                </Link>
            </div>

            <!-- Mobile Menu -->
            <div class="flex lg:hidden">
                <Sheet>
                    <SheetTrigger as-child>
                        <Button variant="ghost" size="icon" class="mr-2 h-9 w-9"> <Menu class="h-5 w-5" /> </Button>
                    </SheetTrigger>
                    <SheetContent side="right" class="w-[90%] p-0" dir="rtl">
                        <FilterSidebar />
                    </SheetContent>
                </Sheet>
            </div>
        </div>
    </header>

    <!-- Modals -->
    <LocationSelectorModal v-model="isLocationModalOpen" v-model:selectedCities="selectedCities" :cities="cities" />
    <SearchModal v-model="isSearchModalOpen" />
</template>
