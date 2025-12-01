<template>
    <section class="bg-slate-50 py-4 sm:py-24">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="mx-auto max-w-3xl text-center">
                <h2 class="text-2xl font-bold text-gray-900 sm:text-4xl">PioVant Care™</h2>
                <p class="mt-4 text-base text-gray-600 sm:text-lg">Your protection doesn't end at purchase. It evolves with you.</p>
            </div>
            <div class="mx-auto mt-8 flex max-w-lg flex-col items-center justify-center space-y-4">
                <div v-for="item in careItems" :key="item.text" class="flex items-start space-x-4">
                    <div class="h-4 w-4 flex-shrink-0 text-blue-600 sm:h-6 sm:w-6" v-html="item.icon"></div>
                    <p class="text-sm font-medium text-gray-700 sm:text-base">{{ item.text }}</p>
                </div>
            </div>
            <div class="mt-8 text-center">
                <a
                    href="#"
                    class="w-full rounded-full border-2 border-[#2247FF] bg-none px-8 py-3 text-center text-xs font-semibold text-[#2247FF] backdrop-blur-sm transition-all duration-100 ease-in-out hover:border-blue-700 hover:bg-blue-700 hover:text-white sm:w-auto md:text-sm"
                    >Contact Support</a
                >
                <p class="mt-8 bg-gradient-to-r from-[#F87479] to-[#2546FF] bg-clip-text font-bold text-transparent">
                    We don't just build tech, <br />
                    we build trust.
                </p>
            </div>
        </div>
    </section>
</template>

<script setup>
const careItems = [
    {
        icon: `<svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M9.60005 11.1874L11.4 12.9874L15.0001 9.38738M4.80005 5.78738L10.3901 2.99237C11.4036 2.48562 12.5965 2.48562 13.61 2.99237L19.2001 5.78738C19.2001 5.78738 19.2001 11.0434 19.2001 13.8154C19.2001 16.5874 16.6377 18.4586 12 21.3874C7.36245 18.4586 4.80005 15.9874 4.80005 13.8154V5.78738Z" stroke="#2247FF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
</svg>
`,
        text: '1 Year Global Warranty',
    },
    {
        icon: `<svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M3.6001 15.6001H6.0001C6.66284 15.6001 7.2001 16.1374 7.2001 16.8001V19.2001C7.2001 19.8628 6.66284 20.4001 6.0001 20.4001H3.6001V12.0001C3.6001 7.36091 7.36091 3.6001 12.0001 3.6001C16.6393 3.6001 20.4001 7.36091 20.4001 12.0001V20.4001H18.0001C17.3374 20.4001 16.8001 19.8628 16.8001 19.2001V16.8001C16.8001 16.1374 17.3374 15.6001 18.0001 15.6001H20.4001" stroke="#2247FF" stroke-width="2" stroke-linejoin="round"/>
</svg>
`,
        text: '24/7 Concierge-Level Support',
    },
    {
        icon: `<svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M5.81605 21.5999L2.3999 17.9999M2.3999 17.9999L5.81605 14.3999M2.3999 17.9999H19.1999C20.5254 17.9999 21.5999 16.9254 21.5999 15.5999V11.9999M18.1838 2.3999L21.5999 5.9999M21.5999 5.9999L18.1838 9.5999M21.5999 5.9999L4.7999 5.9999C3.47442 5.9999 2.3999 7.07442 2.3999 8.3999L2.3999 11.9999" stroke="#2247FF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
</svg>
`,
        text: 'Priority Replacement Program',
    },
];
</script>
