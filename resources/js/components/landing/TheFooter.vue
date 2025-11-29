<template>
    <footer class="mt-2 w-full bg-slate-100">
        <div class="mx-auto flex w-full justify-center px-4 pt-16 pb-8 sm:px-6 lg:px-8">
            <!-- Newsletter and Links -->
            <div class="mb-12 max-w-5xl">
                <!-- Footer Links (takes 2/3 width on large screens) -->
                <div class="grid grid-cols-2 gap-16 md:grid-cols-4">
                    <div v-for="section in footerLinks" :key="section.title">
                        <h3 class="font-semibold text-gray-900">{{ section.title }}</h3>
                        <ul class="mt-4 space-y-2">
                            <li v-for="link in section.links" :key="link.name">
                                <Link :href="link.href" class="text-sm text-gray-600 hover:text-gray-900">{{ link.name }}</Link>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Bottom Bar -->
        </div>
        <div
            class="mt-2 flex flex-col items-center justify-between border-t border-gray-200 bg-[#001EB7] p-3 px-8 text-sm text-white sm:flex-row sm:px-16"
        >
            <p>&copy; 2026 PIOVANT. All rights reserved.</p>
            <p class="mt-2 sm:mt-0">Toronto, Canada</p>
        </div>
    </footer>
</template>

<script setup>
import { Link } from '@inertiajs/vue3';
const footerLinks = [
    {
        title: 'Shop and learn',
        links: [
            { name: 'Store', href: '#' },
            { name: 'FortiVault PRIME', href: '/prime' },
            { name: 'FortiVault VEIL', href: '/veil-manual' },
            { name: 'FortiVault ULTRA', href: '/ultra' },
            { name: 'FortiVault AERIS', href: '/aeris' },
        ],
    },
    {
        title: 'Company',
        links: [
            { name: 'About', href: '/about-us' },
            { name: 'Contact', href: '/contact' },
            { name: 'Support', href: '/support' },
        ],
    },
    {
        title: 'Resources',
        links: [
            { name: 'FAQ', href: '/faq' },
            { name: 'Tutorials', href: '/tutorials' },
            { name: 'Download', href: '/download' },
        ],
    },
    {
        title: 'Legal',
        links: [
            { name: 'Privacy policy', href: '/privacy-policy' },
            { name: 'Terms of use', href: '/terms-of-use' },
        ],
    },
];
</script>
