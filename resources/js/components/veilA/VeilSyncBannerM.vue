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

        <!-- 
            THE KEY FIX IS HERE:
            1. The `container` establishes the padded, max-width safe zone.
            2. We make THIS div a flex container (`flex`).
            3. We control HORIZONTAL alignment here:
               - `justify-center` for mobile.
               - `sm:justify-end` for desktop.
        -->
        <div class="relative z-10 container mx-auto flex justify-center px-4 py-12 sm:justify-end sm:p-0">
            <!-- This text block is now the flex item. It has a max-width, so there's space to push it around. -->
            <div class="max-w-2xl">
                <h2 class="text-xl font-bold text-white md:text-4xl">VEIL Sync™</h2>
                <h3 class="mt-2 text-lg text-white md:text-2xl">Listens. Analyzes. Acts.</h3>
                <p class="mt-4 text-sm text-gray-300 sm:text-base">
                    PedalVault™, TrackVault™, and AlarmVault™ move as one .When danger appears, all engage—Seamlessly. Instantly. Leaving no trace.
                </p>
            </div>
        </div>
    </section>
</template>
