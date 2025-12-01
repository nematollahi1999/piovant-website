<template>
    <section class="bg-white pt-8 sm:pt-24">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="mb-16 text-start">
                <h2 class="text-2xl font-bold tracking-tight text-gray-900 md:text-4xl">Four FortiVault™ Models. One Vision. Pure Prevention.</h2>
            </div>
            <div class="space-8 grid gap-2 sm:grid-cols-2">
                <!-- Model 1: PRIME -->
                <div class="relative overflow-hidden">
                    <img src="/images/product-prime.jpg" alt="FortiVault PRIME" class="block h-auto w-full" />
                    <div
                        class="absolute inset-0 flex flex-col items-center justify-start gap-2 bg-black/10 p-4 text-center transition duration-300 ease-in-out hover:bg-black/0 sm:justify-start sm:bg-black/10 sm:p-12"
                    >
                        <h3 class="bg-gradient-to-r from-[#F87479] to-[#2546FF] bg-clip-text text-xs font-bold text-transparent sm:text-base">
                            Smart Shield
                        </h3>
                        <h3 class="text-lg font-bold text-white sm:text-3xl sm:text-black">FortiVault PRIME</h3>
                        <p class="text-sm text-slate-100 sm:text-base sm:text-slate-800">Vigilant in action. Proactive in protection.</p>
                        <Link
                            href="/prime"
                            class="rounded-full border-2 border-white bg-none px-4 py-2 text-center text-xs font-semibold text-white transition-all duration-100 ease-in-out hover:border-blue-700 hover:bg-blue-700 hover:text-white sm:w-auto sm:border-[#2247FF] sm:px-8 sm:py-3 sm:text-[#2247FF] md:text-sm"
                            >View PRIME Specs</Link
                        >
                    </div>
                </div>

                <!-- Model 2: VEIL -->
                <div class="relative overflow-hidden">
                    <img src="/images/product-veil.jpg" alt="FortiVault VEIL" class="block h-auto w-full" />
                    <div
                        class="absolute inset-0 flex flex-col items-center justify-start gap-2 bg-black/10 p-4 text-center transition duration-300 ease-in-out hover:bg-black/0 sm:justify-start sm:bg-black/10 sm:p-12"
                    >
                        <h3 class="bg-gradient-to-r from-[#F87479] to-[#2546FF] bg-clip-text text-xs font-bold text-transparent sm:text-base">
                            Covert Defense
                        </h3>
                        <h3 class="text-lg font-bold text-white sm:text-3xl sm:text-black">FortiVault VEIL</h3>
                        <p class="text-sm text-slate-100 sm:text-base sm:text-slate-800">Invisible by design. Relentless in defense.</p>
                        <Link
                            href="/veil-manual"
                            class="rounded-full border-2 border-white bg-none px-4 py-2 text-center text-xs font-semibold text-white transition-all duration-100 ease-in-out hover:border-blue-700 hover:bg-blue-700 hover:text-white sm:w-auto sm:border-[#2247FF] sm:px-8 sm:py-3 sm:text-[#2247FF] md:text-sm"
                            >View VEIL Specs</Link
                        >
                    </div>
                </div>

                <!-- Model 3: ULTRA -->
                <div class="relative overflow-hidden">
                    <img src="/images/product-ultra.jpg" alt="FortiVault ULTRA" class="block h-auto w-full" />
                    <div
                        class="absolute inset-0 flex flex-col items-center justify-start gap-2 bg-black/10 p-4 text-center transition duration-300 ease-in-out hover:bg-black/0 sm:justify-start sm:bg-black/10 sm:p-12"
                    >
                        <h3 class="bg-gradient-to-r from-[#F87479] to-[#2546FF] bg-clip-text text-xs font-bold text-transparent sm:text-base">
                            Fortress Mode
                        </h3>
                        <h3 class="text-lg font-bold text-white sm:text-3xl sm:text-black">FortiVault ULTRA</h3>
                        <p class="text-sm text-slate-100 sm:text-base sm:text-slate-800">Built for dominance. Engineered for trust.</p>
                        <Link
                            href="/ultra"
                            class="rounded-full border-2 border-white bg-none px-4 py-2 text-center text-xs font-semibold text-white transition-all duration-100 ease-in-out hover:border-blue-700 hover:bg-blue-700 hover:text-white sm:w-auto sm:border-[#2247FF] sm:px-8 sm:py-3 sm:text-[#2247FF] md:text-sm"
                            >View ULTRA Specs</Link
                        >
                    </div>
                </div>

                <!-- Model 4: AERIS -->
                <div class="relative overflow-hidden">
                    <img src="/images/product-drone.jpg" alt="FortiVault AERIS" class="block h-auto w-full" />
                    <div
                        class="absolute inset-0 flex flex-col items-center justify-start gap-2 bg-black/10 p-4 text-center transition duration-300 ease-in-out hover:bg-black/0 sm:justify-start sm:bg-black/10 sm:p-12"
                    >
                        <h3 class="bg-gradient-to-r from-[#F87479] to-[#2546FF] bg-clip-text text-xs font-bold text-transparent sm:text-base">
                            Autonomous Safeguard
                        </h3>
                        <h3 class="text-lg font-bold text-white sm:text-3xl sm:text-black">FortiVault AERIS</h3>
                        <p class="text-sm text-slate-100 sm:text-base sm:text-slate-800">Ever-aware in mission. Unyielding in response.</p>
                        <Link
                            href="/aeris"
                            class="rounded-full border-2 border-white bg-none px-4 py-2 text-center text-xs font-semibold text-white transition-all duration-100 ease-in-out hover:border-blue-700 hover:bg-blue-700 hover:text-white sm:w-auto sm:border-[#2247FF] sm:px-8 sm:py-3 sm:text-[#2247FF] md:text-sm"
                            >View AERIS Specs</Link
                        >
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script setup>
import { Link } from '@inertiajs/vue3';
</script>
