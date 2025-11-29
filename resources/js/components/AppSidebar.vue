<script setup lang="ts">
import NavFooter from '@/components/NavFooter.vue';
import NavMain from '@/components/NavMain.vue';
import NavUser from '@/components/NavUser.vue';
import { Sidebar, SidebarContent, SidebarFooter, SidebarHeader, SidebarMenu, SidebarMenuButton, SidebarMenuItem } from '@/components/ui/sidebar';
import { dashboard, logout } from '@/routes';
import { edit } from '@/routes/profile';
import { type NavItem } from '@/types';
import { Link } from '@inertiajs/vue3';
import { BookOpen, Folder, LayoutGrid, Cog, LogOut, Tag, Layers, List, ShoppingCart } from 'lucide-vue-next';
import AppLogo from './AppLogo.vue';
import useTrans from '@/composables/useTrans';
import { computed } from 'vue';
import { usePage } from '@inertiajs/vue3';

const page = usePage();

const RTL_LOCALES = ['ar', 'fa', 'he', 'ur'];

const side = computed(() => {
    try {
        const locale = (page.props as any).locale;
        if (locale && RTL_LOCALES.includes(locale)) return 'right';
    } catch (e) {
        // ignore
    }
    return 'left';
});

const { t } = useTrans();

const mainNavItems = computed<NavItem[]>(() => [
    {
        title: t('Dashboard'),
        href: dashboard(),
        icon: LayoutGrid,
    },
    {
        title: t('Listings'),
        href: '/listings',
        icon: Layers,
    },
    {
        title: t('Offers'),
        href: '/offers',
        icon: ShoppingCart,
    },
    {
        title: t('Items'),
        href: '/items',
        icon: Tag,
    },
    {
        title: t('Categories'),
        href: '/categories',
        icon: List,
    },
    {
        title: t('Settings'),
        href: edit(),
        icon: Cog,
    },
    {
        title: t('Sign out'),
        href: logout(),
        icon: LogOut,
    },
]);

const footerNavItems: NavItem[] = [
    // {
    //     title: 'Github Repo',
    //     href: 'https://github.com/laravel/vue-starter-kit',
    //     icon: Folder,
    // },
    // {
    //     title: 'Documentation',
    //     href: 'https://laravel.com/docs/starter-kits#vue',
    //     icon: BookOpen,
    // },
];
</script>

<template>
    <Sidebar :side="side" collapsible="icon" variant="inset">
        <SidebarHeader>
            <SidebarMenu>
                <SidebarMenuItem>
                    <SidebarMenuButton size="lg" as-child>
                        <Link :href="dashboard()">
                            <AppLogo />
                        </Link>
                    </SidebarMenuButton>
                </SidebarMenuItem>
            </SidebarMenu>
        </SidebarHeader>

        <SidebarContent>
            <NavMain :items="mainNavItems" />
        </SidebarContent>

        <SidebarFooter>
            <NavFooter :items="footerNavItems" />
            <NavUser />
        </SidebarFooter>
    </Sidebar>
    <slot />
</template>
