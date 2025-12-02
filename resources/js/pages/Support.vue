<template>
    <div class="relative font-sans antialiased">
        <main class="overflow-hidden">
            <!-- Hero Section -->
            <section ref="heroRef" class="fade-in-section flex min-h-[70vh] flex-col items-center justify-center bg-zinc-950 px-6 text-center">
                <h1 class="max-w-4xl text-5xl font-bold tracking-tight text-white md:text-7xl">PioVant Support Center</h1>
                <p class="mt-6 max-w-3xl text-xl text-gray-300 md:text-2xl">
                    Expert guidance, always within reach. Access guides, resolve issues or connect with our dedicated team effortlessly.
                </p>
            </section>

            <!-- Categories Section -->
            <section ref="categoriesRef" class="fade-in-section bg-white py-24 sm:py-32">
                <div class="container mx-auto max-w-6xl px-6">
                    <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-3">
                        <div
                            v-for="category in supportCategories"
                            :key="category.name"
                            class="flex flex-col items-center rounded-xl border border-gray-200 p-8 text-center transition-shadow hover:shadow-lg"
                        >
                            <component :is="category.icon" class="mx-auto h-12 w-12 text-blue-600" />
                            <h3 class="mt-6 text-xl font-semibold text-gray-900">{{ category.name }}</h3>
                            <p class="mt-2 mb-6 text-base text-gray-600">{{ category.description }}</p>

                            <!-- Updated Button with Modal Trigger -->
                            <button
                                @click="openModal(category)"
                                class="mt-auto inline-block font-semibold text-blue-600 transition-colors hover:text-blue-800"
                            >
                                Contact Expert &rarr;
                            </button>
                        </div>
                    </div>
                </div>
            </section>

            <!-- General Contact Options Section -->
            <section ref="contactRef" class="fade-in-section bg-zinc-950 py-24 text-white sm:py-32">
                <div class="container mx-auto max-w-6xl px-6">
                    <div class="mx-auto max-w-2xl text-center">
                        <h2 class="text-2xl font-bold tracking-tight sm:text-3xl">Should your question fall outside the sections above,</h2>
                        <p class="mt-4 text-lg leading-8 text-gray-300">
                            Our General inquiry team remains prepared to assist with utmost clarity and discretion.
                        </p>
                    </div>
                    <div class="mx-auto mt-16 grid max-w-2xl gap-8 text-center lg:max-w-none">
                        <div class="rounded-xl bg-white/5 p-12 ring-1 ring-white/10">
                            <EnvelopeIcon class="mx-auto h-10 w-10 text-blue-400" />
                            <h3 class="mt-6 text-xl font-semibold">General Inquiry</h3>
                            <p class="mt-2 text-gray-400">Expect a detailed response from our experts within one business day.</p>
                            <a
                                href="mailto:support@piovant.com"
                                class="mt-6 inline-block rounded-full bg-gray-600 px-5 py-2 text-sm font-semibold text-white hover:bg-gray-500"
                            >
                                Email Us
                            </a>
                        </div>
                    </div>
                </div>
            </section>
        </main>

        <!-- MODAL OVERLAY -->
        <Transition
            enter-active-class="transition duration-200 ease-out"
            enter-from-class="opacity-0"
            enter-to-class="opacity-100"
            leave-active-class="transition duration-150 ease-in"
            leave-from-class="opacity-100"
            leave-to-class="opacity-0"
        >
            <div
                v-if="isModalOpen"
                class="fixed inset-0 z-50 flex items-center justify-center bg-black/60 p-4 backdrop-blur-sm"
                @click.self="closeModal"
            >
                <!-- MODAL CONTENT -->
                <Transition
                    enter-active-class="transition duration-300 ease-out"
                    enter-from-class="transform scale-95 opacity-0 translate-y-4"
                    enter-to-class="transform scale-100 opacity-100 translate-y-0"
                    leave-active-class="transition duration-200 ease-in"
                    leave-from-class="transform scale-100 opacity-100 translate-y-0"
                    leave-to-class="transform scale-95 opacity-0 translate-y-4"
                >
                    <div class="w-full max-w-lg overflow-hidden rounded-2xl bg-white shadow-2xl ring-1 ring-gray-200">
                        <!-- Header -->
                        <div class="flex items-center justify-between border-b border-gray-100 bg-gray-50 px-6 py-4">
                            <div>
                                <h3 class="text-lg font-bold text-gray-900">Contact {{ activeCategory?.name }} Expert</h3>
                                <p class="text-xs text-gray-500">{{ activeCategory?.targetEmail }}</p>
                            </div>
                            <button @click="closeModal" class="text-gray-400 hover:text-gray-600">
                                <span class="sr-only">Close</span>
                                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>

                        <!-- Form -->
                        <form @submit.prevent="submitForm" class="space-y-4 p-6">
                            <!-- Name / Title -->
                            <div>
                                <label for="name" class="block text-sm font-medium text-gray-700">Your Name / Title</label>
                                <input
                                    v-model="formData.name"
                                    type="text"
                                    id="name"
                                    required
                                    class="mt-1 block w-full rounded-md border border-gray-300 px-3 py-2 focus:border-blue-500 focus:ring-blue-500 sm:text-sm"
                                    placeholder="Jane Doe"
                                />
                            </div>

                            <!-- Email -->
                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700">Email Address</label>
                                <input
                                    v-model="formData.email"
                                    type="email"
                                    id="email"
                                    required
                                    class="mt-1 block w-full rounded-md border border-gray-300 px-3 py-2 focus:border-blue-500 focus:ring-blue-500 sm:text-sm"
                                    placeholder="jane@company.com"
                                />
                            </div>

                            <!-- Subject -->
                            <div>
                                <label for="subject" class="block text-sm font-medium text-gray-700">Subject</label>
                                <input
                                    v-model="formData.subject"
                                    type="text"
                                    id="subject"
                                    required
                                    class="mt-1 block w-full rounded-md border border-gray-300 px-3 py-2 focus:border-blue-500 focus:ring-blue-500 sm:text-sm"
                                />
                            </div>

                            <!-- Description -->
                            <div>
                                <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                                <textarea
                                    v-model="formData.description"
                                    id="description"
                                    rows="4"
                                    required
                                    class="mt-1 block w-full rounded-md border border-gray-300 px-3 py-2 focus:border-blue-500 focus:ring-blue-500 sm:text-sm"
                                    placeholder="Describe your issue or question..."
                                ></textarea>
                            </div>

                            <!-- Footer Actions -->
                            <div class="flex justify-end gap-3 pt-4">
                                <button
                                    type="button"
                                    @click="closeModal"
                                    class="rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 ring-1 ring-gray-300 ring-inset hover:bg-gray-50"
                                >
                                    Cancel
                                </button>
                                <button
                                    type="submit"
                                    class="inline-flex justify-center rounded-md bg-blue-600 px-3 py-2 text-sm font-semibold text-white hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600"
                                >
                                    Send Request
                                </button>
                            </div>
                        </form>
                    </div>
                </Transition>
            </div>
        </Transition>
    </div>
</template>

<script setup>
import {
    BookOpenIcon,
    CreditCardIcon,
    EnvelopeIcon,
    LifebuoyIcon,
    RocketLaunchIcon,
    TruckIcon,
    WrenchScrewdriverIcon,
} from '@heroicons/vue/24/outline';
import { onMounted, onUnmounted, ref } from 'vue';
import AppLayout from '../layouts/AppLayout.vue';

defineOptions({ layout: AppLayout });

// --- Mock Data with Specific Emails ---
const supportCategories = ref([
    {
        name: 'Getting Started',
        description: 'Installation guides and first-time setup.',
        icon: RocketLaunchIcon,
        targetEmail: 'setup@piovant.com',
    },
    {
        name: 'Troubleshooting',
        description: 'Solve common issues with step-by-step solutions.',
        icon: WrenchScrewdriverIcon,
        targetEmail: 'tech-support@piovant.com',
    },
    {
        name: 'User Manuals',
        description: 'In-depth documentation for all FortiVault packages.',
        icon: BookOpenIcon,
        targetEmail: 'docs@piovant.com',
    },
    {
        name: 'Shipping & Delivery',
        description: 'Track orders and learn about shipping terms.',
        icon: TruckIcon,
        targetEmail: 'logistics@piovant.com',
    },
    {
        name: 'Account & Billing',
        description: 'Manage your PioVant account and subscriptions.',
        icon: CreditCardIcon,
        targetEmail: 'billing@piovant.com',
    },
    {
        name: 'Warranty & Returns',
        description: 'Review our warranty terms, then initiate a return.',
        icon: LifebuoyIcon,
        targetEmail: 'returns@piovant.com',
    },
]);

// --- Modal & Form Logic ---
const isModalOpen = ref(false);
const activeCategory = ref(null);
const formData = ref({
    name: '',
    email: '',
    subject: '',
    description: '',
});

const openModal = (category) => {
    activeCategory.value = category;
    // Pre-fill subject based on category
    formData.value = {
        name: '',
        email: '',
        subject: `Help regarding: ${category.name}`,
        description: '',
    };
    isModalOpen.value = true;
};

const closeModal = () => {
    isModalOpen.value = false;
    setTimeout(() => {
        activeCategory.value = null;
    }, 300); // Wait for transition
};

const submitForm = () => {
    // Construct Mailto Link
    // Since this is a frontend-only template, using mailto is the best way
    // to direct the data to specific emails instantly.
    const recipient = activeCategory.value.targetEmail;
    const subject = encodeURIComponent(`${formData.value.subject} - [${formData.value.name}]`);
    const body = encodeURIComponent(
        `Name: ${formData.value.name}\n` + `Email: ${formData.value.email}\n\n` + `Description:\n${formData.value.description}`,
    );

    window.location.href = `mailto:${recipient}?subject=${subject}&body=${body}`;

    // In a real app with backend, you would use:
    // axios.post('/api/contact', { ...formData, to: recipient })

    closeModal();
};

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
const categoriesRef = ref(null);
const contactRef = ref(null);

useIntersectionObserver(heroRef, makeVisible);
useIntersectionObserver(categoriesRef, makeVisible);
useIntersectionObserver(contactRef, makeVisible);
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
