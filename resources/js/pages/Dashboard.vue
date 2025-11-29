<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { dashboard } from '@/routes';
import { type BreadcrumbItem } from '@/types';
import { Head } from '@inertiajs/vue3';
import PlaceholderPattern from '../components/PlaceholderPattern.vue';
import useTrans from '@/composables/useTrans';
import SmallBarChart from '@/components/SmallBarChart.vue';

const { t } = useTrans();

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Dashboard',
        href: dashboard().url,
    },
];
</script>

<template>
    <Head title="Dashboard" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex h-full flex-1 flex-col gap-4 overflow-x-auto rounded-xl p-4">
            <!-- Top stat cards: responsive 1 / 2 / 3 columns depending on screen -->
            <div class="grid gap-4 grid-cols-1 sm:grid-cols-2 lg:grid-cols-3">
                <div class="bg-card p-4 sm:p-5 rounded-lg shadow-sm border border-sidebar-border/60 dark:border-sidebar-border">
                    <h4 class="text-sm font-semibold mb-2">{{ t('Total Listings', 'Total Listings') }}</h4>
                    <div class="flex items-center justify-between">
                        <div class="text-2xl font-bold">1,234</div>
                        <small class="text-muted-foreground">+12% {{ t('since last week', 'since last week') }}</small>
                    </div>
                </div>

                <div class="bg-card p-4 sm:p-5 rounded-lg shadow-sm border border-sidebar-border/60 dark:border-sidebar-border">
                    <h4 class="text-sm font-semibold mb-2">{{ t('Active Offers', 'Active Offers') }}</h4>
                    <div class="flex items-center justify-between">
                        <div class="text-2xl font-bold">321</div>
                        <small class="text-muted-foreground">-3% {{ t('since yesterday', 'since yesterday') }}</small>
                    </div>
                </div>

                <div class="bg-card p-4 sm:p-5 rounded-lg shadow-sm border border-sidebar-border/60 dark:border-sidebar-border">
                    <h4 class="text-sm font-semibold mb-2">{{ t('New Users', 'New Users') }}</h4>
                    <div class="flex items-center justify-between">
                        <div class="text-2xl font-bold">89</div>
                        <small class="text-muted-foreground">+5% {{ t('since last month', 'since last month') }}</small>
                    </div>
                </div>
            </div>

            <!-- Charts and detailed content -->
            <div class="grid gap-4 grid-cols-1 lg:grid-cols-3">
                <div class="lg:col-span-2">
                    <div class="bg-card rounded-lg border border-sidebar-border/60 dark:border-sidebar-border p-4">
                        <h3 class="font-semibold mb-3">{{ t('Overview', 'Overview') }}</h3>
                        <!-- make the chart taller on mobile for touch clarity -->
                        <div class="block lg:hidden h-44">
                            <SmallBarChart :data="[10, 20, 15, 25, 30, 22, 18]">
                                <template #title>Visits</template>
                                <template #meta><small class="text-muted-foreground">Last 7 days</small></template>
                            </SmallBarChart>
                        </div>
                        <div class="hidden lg:block h-36">
                            <SmallBarChart :data="[10, 20, 15, 25, 30, 22, 18]">
                                <template #title>Visits</template>
                                <template #meta><small class="text-muted-foreground">Last 7 days</small></template>
                            </SmallBarChart>
                        </div>
                    </div>
                </div>

                <div>
                    <div class="bg-card rounded-lg border border-sidebar-border/60 dark:border-sidebar-border p-4">
                        <h3 class="font-semibold mb-3">{{ t('Quick Actions', 'Quick Actions') }}</h3>
                        <div class="flex flex-col gap-3">
                            <button class="w-full text-left rounded-md border border-sidebar-border/50 px-4 py-3 hover:bg-muted">{{ t('Create Listing', 'Create Listing') }}</button>
                            <button class="w-full text-left rounded-md border border-sidebar-border/50 px-4 py-3 hover:bg-muted">{{ t('Manage Offers', 'Manage Offers') }}</button>
                            <button class="w-full text-left rounded-md border border-sidebar-border/50 px-4 py-3 hover:bg-muted">{{ t('View Items', 'View Items') }}</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
