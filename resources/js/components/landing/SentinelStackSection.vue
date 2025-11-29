<template>
    <section class="bg-slate-100 py-8 sm:py-24">
        <div class="container mx-auto px-4 sm:px-6 lg:px-20">
            <div class="mx-auto">
                <h2 class="text-2xl font-bold tracking-tight text-gray-900 md:text-4xl">SentinelStack™ – Protection with a Mind of Its Own</h2>
                <div class="items-start gap-16 pt-8 sm:flex">
                    <div class="text-start">
                        <div class="mt-6 text-lg text-gray-700">
                            <p class="bg-gradient-to-r from-[#F87479] to-[#2546FF] bg-clip-text font-bold text-transparent">
                                FortiVault isn’t just hardware.
                            </p>
                            <p>It’s a multi-layered intelligence network — working together, thinking ahead.</p>
                        </div>
                        <p class="mt-2 text-lg text-gray-700">
                            Every Layer. Perfectly Synced. <br />
                            <span class="font-semibold">
                                No Extras. No Gimmicks. <br />
                                FortiVault — Absolute.
                            </span>
                        </p>
                    </div>
                    <div class="cursor-pointer">
                        <AccordionItem
                            v-for="(item, index) in items"
                            :key="index"
                            :item="item"
                            :isOpen="openItemIndex === index"
                            @toggle="toggleItem(index)"
                        />
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script setup>
import { ref } from 'vue';
import AccordionItem from './AccordionItem.vue';

const openItemIndex = ref(1); // Default to NeuroSentinel being open

const items = ref([
    {
        title: 'ZeroTouch™ Entry',
        content: 'Your finger is your key. Your face, your pass.',
    },
    { title: 'NeuroSentinel™', content: 'Learns like a mind. Defends like armor.' },
    { title: 'SkyMesh™', content: 'Real-time GPS. Anti-jamming. Cloud-synced.' },
    {
        title: 'TitanEdge™',
        content: 'Rugged. Military-grade. Built for battle, but designed for your peace of mind.',
    },
    {
        title: 'OmniSync™',
        content: 'Vigilance in Perfect Harmony. Intelligence Unites Ground and Sky — Flawless.',
    },
]);

const toggleItem = (index) => {
    openItemIndex.value = openItemIndex.value === index ? null : index;
};
</script>
