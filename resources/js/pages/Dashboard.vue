<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
// import { dashboard } from '@/routes';
import SmallBarChart from '@/components/SmallBarChart.vue';
import useTrans from '@/composables/useTrans';
import { Head } from '@inertiajs/vue3';

const { t } = useTrans();

// const breadcrumbs: BreadcrumbItem[] = [
//     {
//         title: 'Dashboard',
//         href: dashboard().url,
//     },
// ];
</script>

<template>
    <Head title="Dashboard" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex h-full flex-1 flex-col gap-4 overflow-x-auto rounded-xl p-4">
            <!-- Top stat cards: responsive 1 / 2 / 3 columns depending on screen -->
            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3">
                <div class="border-sidebar-border/60 dark:border-sidebar-border rounded-lg border bg-card p-4 shadow-sm sm:p-5">
                    <h4 class="mb-2 text-sm font-semibold">{{ t('Total Listings', 'Total Listings') }}</h4>
                    <div class="flex items-center justify-between">
                        <div class="text-2xl font-bold">1,234</div>
                        <small class="text-muted-foreground">+12% {{ t('since last week', 'since last week') }}</small>
                    </div>
                </div>

                <div class="border-sidebar-border/60 dark:border-sidebar-border rounded-lg border bg-card p-4 shadow-sm sm:p-5">
                    <h4 class="mb-2 text-sm font-semibold">{{ t('Active Offers', 'Active Offers') }}</h4>
                    <div class="flex items-center justify-between">
                        <div class="text-2xl font-bold">321</div>
                        <small class="text-muted-foreground">-3% {{ t('since yesterday', 'since yesterday') }}</small>
                    </div>
                </div>

                <div class="border-sidebar-border/60 dark:border-sidebar-border rounded-lg border bg-card p-4 shadow-sm sm:p-5">
                    <h4 class="mb-2 text-sm font-semibold">{{ t('New Users', 'New Users') }}</h4>
                    <div class="flex items-center justify-between">
                        <div class="text-2xl font-bold">89</div>
                        <small class="text-muted-foreground">+5% {{ t('since last month', 'since last month') }}</small>
                    </div>
                </div>
            </div>

            <!-- Charts and detailed content -->
            <div class="grid grid-cols-1 gap-4 lg:grid-cols-3">
                <div class="lg:col-span-2">
                    <div class="border-sidebar-border/60 dark:border-sidebar-border rounded-lg border bg-card p-4">
                        <h3 class="mb-3 font-semibold">{{ t('Overview', 'Overview') }}</h3>
                        <!-- make the chart taller on mobile for touch clarity -->
                        <div class="block h-44 lg:hidden">
                            <SmallBarChart :data="[10, 20, 15, 25, 30, 22, 18]">
                                <template #title>Visits</template>
                                <template #meta><small class="text-muted-foreground">Last 7 days</small></template>
                            </SmallBarChart>
                        </div>
                        <div class="hidden h-36 lg:block">
                            <SmallBarChart :data="[10, 20, 15, 25, 30, 22, 18]">
                                <template #title>Visits</template>
                                <template #meta><small class="text-muted-foreground">Last 7 days</small></template>
                            </SmallBarChart>
                        </div>
                    </div>
                </div>

                <div>
                    <div class="border-sidebar-border/60 dark:border-sidebar-border rounded-lg border bg-card p-4">
                        <h3 class="mb-3 font-semibold">{{ t('Quick Actions', 'Quick Actions') }}</h3>
                        <div class="flex flex-col gap-3">
                            <button class="border-sidebar-border/50 w-full rounded-md border px-4 py-3 text-left hover:bg-muted">
                                {{ t('Create Listing', 'Create Listing') }}
                            </button>
                            <button class="border-sidebar-border/50 w-full rounded-md border px-4 py-3 text-left hover:bg-muted">
                                {{ t('Manage Offers', 'Manage Offers') }}
                            </button>
                            <button class="border-sidebar-border/50 w-full rounded-md border px-4 py-3 text-left hover:bg-muted">
                                {{ t('View Items', 'View Items') }}
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
