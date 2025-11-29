<script setup lang="ts">
import AppLogo from '@/components/AppLogo.vue';
import IconChat from '@/components/icons/IconChat.vue';
import IconProfile from '@/components/icons/IconProfile.vue';
import IconSupport from '@/components/icons/IconSupport.vue';
import { Button } from '@/components/ui/button';
import LocationSelectorModal from '@/components/ui/modals/LocationSelectorModal.vue';
import SearchModal from '@/components/ui/modals/SearchModal.vue'; // Using the new path
import { Sheet, SheetContent, SheetTrigger } from '@/components/ui/sheet';
import { Tooltip, TooltipContent, TooltipProvider, TooltipTrigger } from '@/components/ui/tooltip';
import { Link, usePage } from '@inertiajs/vue3';
import { Menu } from 'lucide-vue-next';
import { computed, ref } from 'vue';
import DashboardSidebar from '../my-profile/DashboardSidebar.vue';

const page = usePage();

// --- THIS IS THE NEW LOGIC ---
// Create a computed property to check if the current URL starts with '/my-profile'
const isMyProfileActive = computed(() => page.url.startsWith('/my-profile'));
// --- END NEW LOGIC ---

// --- I've removed the unused refs for the modals from your provided code ---
const isLocationModalOpen = ref(false);
const selectedCities = ref([]);
const cities = ref([]); // Assuming you'll add data back if needed
const isSearchModalOpen = ref(false);
</script>

<template>
    <header dir="rtl" class="sticky top-0 z-50 w-full border-b bg-background/95 backdrop-blur supports-[backdrop-filter]:bg-background/60">
        <div class="container mx-auto flex h-16 w-full items-center px-6">
            <div class="flex items-center gap-x-6">
                <!-- Logo - Simple URL -->
                <Link href="/" class="flex items-center gap-x-2">
                    <AppLogo />
                </Link>
            </div>

            <!-- Left Side Actions -->
            <div class="mr-auto flex items-center gap-x-2">
                <div class="hidden items-center gap-x-4 lg:flex">
                    <!-- My Exchanges (معاوضه‌های من) - SIMPLE URL -->
                    <TooltipProvider :delay-duration="100">
                        <Tooltip>
                            <TooltipTrigger as-child>
                                <Link
                                    href="/my-profile"
                                    class="flex cursor-pointer items-center gap-1"
                                    :class="{ 'rounded-md bg-gray-100 p-2 px-3 text-[#FF4A4A]': isMyProfileActive }"
                                    as="button"
                                    variant="ghost"
                                    size="icon"
                                >
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
                <div class="mx-2 hidden h-6 w-px bg-border lg:block"></div>

                <!-- Create Ad Button - SIMPLE URL -->
                <Button class="cursor-pointer bg-[#FF4A4A] font-bold hover:bg-red-500"> ثبت آگهی </Button>
            </div>

            <!-- Mobile Menu -->
            <div class="flex lg:hidden">
                <Sheet>
                    <SheetTrigger as-child>
                        <Button variant="ghost" size="icon" class="mr-2 h-9 w-9"> <Menu class="h-5 w-5" /> </Button>
                    </SheetTrigger>
                    <SheetContent side="right" class="w-[90%] p-0" dir="rtl">
                        <DashboardSidebar />
                    </SheetContent>
                </Sheet>
            </div>
        </div>
    </header>

    <!-- Modals -->
    <LocationSelectorModal v-model="isLocationModalOpen" v-model:selectedCities="selectedCities" :cities="cities" />
    <SearchModal v-model="isSearchModalOpen" />
</template>
