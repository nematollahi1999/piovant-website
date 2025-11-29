<script setup lang="ts">
import AppContent from '@/components/layout/AppContent.vue';
import AppHeader from '@/components/layout/AppHeader.vue';
import AppShell from '@/components/layout/AppShell.vue';
</script>

<template>
    <AppShell class="flex-col">
        <!-- The header no longer needs breadcrumbs passed to it -->
        <AppHeader />
        <AppContent>
            <slot />
        </AppContent>
    </AppShell>
</template>
