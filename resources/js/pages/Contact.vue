<template>
    <div class="font-sans antialiased">
        <main class="overflow-hidden">
            <!-- Hero Section -->
            <section ref="heroRef" class="fade-in-section flex min-h-[70vh] flex-col items-center justify-center bg-slate-200 px-6 text-center">
                <h1 class="max-w-4xl text-5xl font-bold tracking-tight text-gray-800 md:text-7xl">Let's Connect</h1>
                <p class="mt-6 max-w-3xl text-xl text-gray-600 md:text-2xl">
                    For Visionaries, discerning minds, and curious souls — together, we spark ideas, sculpt possibilities, and
                    <span class="bg-gradient-to-r from-[#F87479] to-[#2546FF] bg-clip-text text-transparent">shape the future.</span>
                </p>
            </section>

            <!-- Contact Form & Info Section -->
            <section ref="formRef" class="fade-in-section bg-white py-24 sm:py-32">
                <div class="container mx-auto max-w-6xl px-6">
                    <div class="grid grid-cols-1 gap-16 lg:grid-cols-2">
                        <!-- Contact Info Column -->
                        <div class="prose prose-lg max-w-none text-gray-600">
                            <h2 class="py-2 text-3xl font-bold tracking-tight text-gray-900">Contact Information</h2>
                            <p>
                                Our team is available to assist with inquiries from Monday to Friday, 9 AM to 5 PM EST. We strive to respond to all
                                messages within one business day.
                            </p>
                            <ul class="not-prose mt-8 space-y-6">
                                <li class="flex items-start gap-4">
                                    <MapPinIcon class="h-8 w-8 flex-shrink-0 text-blue-600" />
                                    <div>
                                        <h3 class="text-lg font-semibold text-gray-800">Our Headquarters</h3>
                                        <p>123 Innovation Drive<br />Toronto, ON M5V 2T6, Canada</p>
                                    </div>
                                </li>

                                <li class="flex items-start gap-4">
                                    <PhoneIcon class="h-8 w-8 flex-shrink-0 text-blue-600" />
                                    <div>
                                        <h3 class="text-lg font-semibold text-gray-800">Call Us</h3>
                                        <p>+1 (416) 555-0123</p>
                                    </div>
                                </li>
                            </ul>
                        </div>

                        <!-- Contact Form Column -->
                        <div class="rounded-lg bg-gray-50 p-8 shadow-sm">
                            <h2 class="text-3xl font-bold tracking-tight text-gray-900">Send us a Message</h2>
                            <form action="#" method="POST" class="mt-8 grid grid-cols-1 gap-y-6 sm:grid-cols-2 sm:gap-x-8">
                                <div>
                                    <label for="first-name" class="block text-sm font-medium text-gray-700">First name</label>
                                    <div class="mt-1">
                                        <input
                                            type="text"
                                            name="first-name"
                                            id="first-name"
                                            autocomplete="given-name"
                                            class="block w-full rounded-md border-gray-300 bg-white px-4 py-3 focus:border-blue-500 focus:ring-blue-500"
                                        />
                                    </div>
                                </div>
                                <div>
                                    <label for="last-name" class="block text-sm font-medium text-gray-700">Last name</label>
                                    <div class="mt-1">
                                        <input
                                            type="text"
                                            name="last-name"
                                            id="last-name"
                                            autocomplete="family-name"
                                            class="block w-full rounded-md border-gray-300 bg-white px-4 py-3 focus:border-blue-500 focus:ring-blue-500"
                                        />
                                    </div>
                                </div>
                                <div class="sm:col-span-2">
                                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                                    <div class="mt-1">
                                        <input
                                            id="email"
                                            name="email"
                                            type="email"
                                            autocomplete="email"
                                            class="block w-full rounded-md border-gray-300 bg-white px-4 py-3 focus:border-blue-500 focus:ring-blue-500"
                                        />
                                    </div>
                                </div>
                                <div class="sm:col-span-2">
                                    <label for="subject" class="block text-sm font-medium text-gray-700">Subject</label>
                                    <select
                                        id="subject"
                                        name="subject"
                                        class="mt-1 block w-full rounded-md border-gray-300 bg-white px-4 py-3 focus:border-blue-500 focus:ring-blue-500"
                                    >
                                        <option>General Inquiry</option>
                                        <option>Sales & Partnerships</option>
                                        <option>Technical Support</option>
                                        <option>Press & Media</option>
                                    </select>
                                </div>
                                <div class="sm:col-span-2">
                                    <label for="message" class="block text-sm font-medium text-gray-700">Message</label>
                                    <div class="mt-1">
                                        <textarea
                                            id="message"
                                            name="message"
                                            rows="4"
                                            class="block w-full rounded-md border-gray-300 bg-white px-4 py-3 focus:border-blue-500 focus:ring-blue-500"
                                        ></textarea>
                                    </div>
                                </div>
                                <div class="sm:col-span-2">
                                    <button
                                        type="submit"
                                        class="inline-flex w-full items-center justify-center rounded-full border border-transparent bg-gradient-to-r from-[#F87479] to-[#2546FF] px-6 py-3 text-base font-medium text-white shadow-sm transition-transform hover:scale-105"
                                    >
                                        Send Message
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Map Section -->
            <section ref="mapRef" class="fade-in-section bg-zinc-950 py-24 sm:py-32">
                <div class="container mx-auto max-w-6xl px-6 text-center">
                    <h2 class="text-3xl font-bold tracking-tight text-white sm:text-4xl">Our Global Headquarters</h2>
                    <p class="mt-4 text-lg text-gray-400">Located in the heart of Toronto's tech hub.</p>
                    <div class="mt-10 aspect-[16/9] w-full overflow-hidden rounded-xl bg-gray-800 shadow-2xl">
                        <!-- In a real app, you would embed a Google Map iframe here -->
                        <a href="https://www.google.com/maps" target="_blank" rel="noopener noreferrer">
                            <img
                                src="/images/toronto.jpg"
                                alt="Stylized map of a city grid"
                                class="h-full w-full object-cover opacity-60 transition-opacity hover:opacity-80"
                            />
                        </a>
                    </div>
                </div>
            </section>

            <!-- Team Section -->
            <section ref="teamRef" class="fade-in-section bg-white py-24 sm:py-32">
                <div class="container mx-auto max-w-6xl px-6">
                    <div class="mx-auto max-w-2xl text-center">
                        <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Curators of Tomorrow</h2>
                        <p class="mt-4 text-lg leading-8 text-gray-600">Shaping progress with precision, vision and human grace.</p>
                    </div>
                    <ul
                        role="list"
                        class="mx-auto mt-20 grid max-w-2xl grid-cols-1 gap-x-8 gap-y-16 sm:grid-cols-2 lg:mx-0 lg:max-w-none lg:grid-cols-4"
                    >
                        <li v-for="person in team" :key="person.name" class="text-center">
                            <Link :href="person.profile">
                                <img
                                    class="mx-auto h-48 w-48 rounded-full object-cover shadow-lg"
                                    :src="person.imageUrl"
                                    :alt="`Photo of ${person.name}`"
                                />
                                <h3 class="mt-6 text-xl leading-7 font-semibold tracking-tight text-gray-900">{{ person.name }}</h3>
                                <p class="text-base leading-6 font-semibold text-blue-600">{{ person.role }}</p></Link
                            >
                        </li>
                    </ul>
                </div>
            </section>
        </main>
    </div>
</template>

<script setup>
import { MapPinIcon, PhoneIcon } from '@heroicons/vue/24/outline';
import { Link } from '@inertiajs/vue3';
import { onMounted, onUnmounted, ref } from 'vue';
import AppLayout from '../layouts/AppLayout.vue';

defineOptions({ layout: AppLayout });

// --- Mock Data for Team Section ---
const team = ref([
    {
        name: 'Atabak Shahabadi',
        role: 'Founder & Chief Executive Officer',
        imageUrl: 'images/Atabak.jpg',
        profile: '/contact/atabak-shahabadi',
    },
    {
        name: 'Akbar Rezanezhad',
        role: 'Co-founder & Chief Financial Officer',
        imageUrl: 'images/Akbar.jpg',
    },
    {
        name: 'Soudabeh Shariati',
        role: 'Co-founder & Chief Marketing Officer',
        imageUrl: 'images/Soudabeh.jpg',
    },
    {
        name: 'Shahrzad Jalili',
        role: 'Co-founder & Chief Sales Officer',
        imageUrl: 'images/Shahrzad.jpg',
    },
]);

// --- Intersection Observer for Animations ---
const useIntersectionObserver = (elementRef, callback) => {
    if (!elementRef) return;
    const observer = new IntersectionObserver(
        (entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    callback(entry.target);
                    observer.unobserve(entry.target);
                }
            });
        },
        { threshold: 0.1 },
    );
    onMounted(() => {
        if (elementRef.value) observer.observe(elementRef.value);
    });
    onUnmounted(() => {
        if (elementRef.value) observer.unobserve(elementRef.value);
    });
};

const makeVisible = (element) => element.classList.add('is-visible');

const heroRef = ref(null);
const formRef = ref(null);
const mapRef = ref(null);
const teamRef = ref(null);

useIntersectionObserver(heroRef, makeVisible);
useIntersectionObserver(formRef, makeVisible);
useIntersectionObserver(mapRef, makeVisible);
useIntersectionObserver(teamRef, makeVisible);
</script>

<style scoped>
.fade-in-section {
    opacity: 0;
    transform: translateY(20px);
    transition:
        opacity 0.8s ease-out,
        transform 0.8s ease-out;
}
.fade-in-section.is-visible {
    opacity: 1;
    transform: translateY(0);
}
</style>
