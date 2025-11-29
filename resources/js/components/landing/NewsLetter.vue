<template>
    <section class="bg-gradient-to-r from-[#f1cfd4] to-[#bdc4e7] py-8 sm:py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <!-- Section Header -->
            <div class="mx-auto max-w-2xl text-center">
                <h2 class="text-2xl font-bold tracking-tight text-gray-900 sm:text-4xl">Lets Connect, Beyond the Ordinary</h2>
                <p
                    class="mt-2 bg-gradient-to-r from-[#F87479] to-[#2546FF] bg-clip-text px-4 text-sm leading-8 font-bold font-semibold text-transparent sm:px-0 sm:text-base"
                >
                    Where Innovation feels Personal, and Security feels Effortless.
                </p>
                <p class="mt-2 px-4 text-sm leading-8 text-gray-600 sm:px-0 sm:text-base">
                    Reach out, Share your thoughts and Journey with PioVant into what's Next.
                </p>
            </div>

            <!-- Form -->
            <form @submit.prevent="handleSubmit" class="mx-auto mt-8 max-w-xl px-12 sm:mt-20 sm:px-0">
                <div class="grid grid-cols-1 gap-x-8 gap-y-6 sm:grid-cols-2">
                    <!-- Name Field -->
                    <div>
                        <label for="name" class="block text-sm leading-6 font-semibold text-gray-900">Name</label>
                        <div class="mt-2.5">
                            <input
                                v-model="formData.name"
                                type="text"
                                name="name"
                                id="name"
                                autocomplete="name"
                                required
                                class="block w-full rounded-lg border-0 bg-white px-3.5 py-2 text-gray-900 ring-0 ring-inset placeholder:text-gray-400 focus:ring-2 focus:ring-indigo-600 focus:ring-inset sm:text-sm sm:leading-6"
                                placeholder="Jane Doe"
                            />
                        </div>
                    </div>

                    <!-- Email Field -->
                    <div>
                        <label for="email" class="block text-sm leading-6 font-semibold text-gray-900">Email</label>
                        <div class="mt-2.5">
                            <input
                                v-model="formData.email"
                                type="email"
                                name="email"
                                id="email"
                                autocomplete="email"
                                required
                                class="block w-full rounded-lg border-0 bg-white px-3.5 py-2 text-gray-900 ring-0 ring-inset placeholder:text-gray-400 focus:ring-2 focus:ring-indigo-600 focus:ring-inset sm:text-sm sm:leading-6"
                                placeholder="you@example.com"
                            />
                        </div>
                    </div>

                    <!-- Message Field -->
                    <div class="sm:col-span-2">
                        <label for="message" class="block text-sm leading-6 font-semibold text-gray-900">Message</label>
                        <div class="mt-2.5">
                            <textarea
                                v-model="formData.message"
                                name="message"
                                id="message"
                                rows="4"
                                required
                                class="block w-full rounded-lg border-0 bg-white px-3.5 py-2 text-gray-900 ring-0 ring-inset placeholder:text-gray-400 focus:ring-2 focus:ring-indigo-600 focus:ring-inset sm:text-sm sm:leading-6"
                                placeholder="Your message..."
                            ></textarea>
                        </div>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="mt-10">
                    <button
                        type="submit"
                        class="block w-full rounded-md bg-indigo-600 px-3.5 py-2.5 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
                    >
                        Send Message
                    </button>
                </div>
            </form>
        </div>
    </section>
</template>

<script setup>
import { reactive } from 'vue';

// Use reactive for a grouped object of form fields
const formData = reactive({
    name: '',
    email: '',
    message: '',
});

const handleSubmit = () => {
    // In a real application, you would send this data to your server
    // For this example, we'll just log it to the console.
    console.log('Form Submitted!', { ...formData });

    alert(`Thank you for your message, ${formData.name}! We will get back to you shortly.`);

    // Reset the form after submission
    formData.name = '';
    formData.email = '';
    formData.message = '';
};
</script>
