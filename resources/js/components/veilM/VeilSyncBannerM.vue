<template>
    <!-- 
        The outer section is still a flex container mainly for VERTICAL alignment.
        - `items-start` on mobile (top)
        - `sm:items-center` on desktop (middle)
    -->
    <section class="relative flex min-h-[50vh] items-start overflow-hidden bg-black px-6 sm:min-h-0 sm:items-center sm:py-40">
        <!-- Background Images -->
        <div class="absolute inset-0 z-0">
            <img src="/images/veil-sync-bg.jpg" alt="FortiVault products" class="hidden h-full w-full object-cover sm:block" />
            <img src="/images/veil-sync-bg-alter.jpg" alt="FortiVault products" class="block h-full w-full object-cover sm:hidden" />
        </div>

        <div class="relative z-10 container mx-auto flex justify-center px-4 py-12 sm:justify-end sm:p-0">
            <!-- This text block is now the flex item. It has a max-width, so there's space to push it around. -->
            <div class="max-w-2xl">
                <h2 class="text-xl font-bold text-white md:text-4xl">VEIL Sync™</h2>
                <h3 class="mt-2 text-lg text-white md:text-2xl">Listens. Analyzes. Acts.</h3>
                <p class="mt-4 text-sm font-bold text-gray-300 sm:text-base">Three components. One instinct.</p>
                <p class="mt-4 text-sm text-gray-300 sm:text-base">
                    PedalVault™, TrackVault™, and AlarmVault™ communicate through MeshLink Sync™, forming a unified field of perception.
                </p>
                <p class="mt-4 text-sm font-bold text-gray-300 sm:text-base">One alert detected — one decisive reaction.</p>
                <p class="mt-4 text-sm text-gray-300 sm:text-base">Invisible. Immediate. Absolute.</p>
            </div>
        </div>
    </section>
</template>
