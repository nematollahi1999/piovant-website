<script setup lang="ts">
import { LoaderCircle, Star, UploadCloud, X } from 'lucide-vue-next';
import { onMounted, ref, watch } from 'vue';

// Use `defineModel` for a simpler and more robust v-model implementation
const files = defineModel<File[]>({ default: () => [] });

interface Preview {
    id: number;
    url: string;
    isLoading: boolean;
}

const previews = ref<Preview[]>([]);
const coverImageIndex = ref(0);
const isDragging = ref(false);
let nextId = 0;

// This function now correctly syncs the previews with the files array
const syncPreviews = () => {
    previews.value.forEach((p) => URL.revokeObjectURL(p.url)); // Cleanup old URLs
    previews.value = files.value.map((file) => ({
        id: nextId++,
        url: URL.createObjectURL(file),
        isLoading: false, // Assume they are loaded by the time this runs
    }));
};

watch(files, syncPreviews, { deep: true });
onMounted(syncPreviews);

const handleFileChange = (event: Event) => {
    const target = event.target as HTMLInputElement;
    if (target.files) {
        addFiles(Array.from(target.files));
    }
};

const handleDrop = (event: DragEvent) => {
    isDragging.value = false;
    if (event.dataTransfer?.files) {
        addFiles(Array.from(event.dataTransfer.files));
    }
};

const addFiles = (newFiles: File[]) => {
    const remainingSlots = 4 - files.value.length;
    if (remainingSlots <= 0) return;

    const filesToAdd = newFiles.slice(0, remainingSlots);

    // Show loading state immediately
    const loadingPreviews = filesToAdd.map(() => ({
        id: nextId++,
        url: '', // No URL yet
        isLoading: true,
    }));
    previews.value.push(...loadingPreviews);

    // Process files and update the model
    setTimeout(() => {
        files.value.push(...filesToAdd);
        // The watcher will then call syncPreviews to replace loading states with real images
    }, 100); // Small delay to allow UI to show loaders
};

const removeFile = (index: number) => {
    files.value.splice(index, 1);
    if (coverImageIndex.value === index) {
        coverImageIndex.value = 0;
    } else if (coverImageIndex.value > index) {
        coverImageIndex.value--;
    }
};

const setAsCover = (index: number) => {
    coverImageIndex.value = index;
};
</script>

<template>
    <div class="space-y-4">
        <!-- Responsive Container -->
        <div class="flex flex-col gap-4 md:grid md:grid-cols-4 md:gap-2">
            <!-- Upload Slot -->
            <!-- `order-first` keeps it at the top on mobile, `md:order-none` resets it -->
            <div
                v-if="files.length < 4"
                @dragover.prevent="isDragging = true"
                @dragleave.prevent="isDragging = false"
                @drop.prevent="handleDrop"
                @click="($refs.fileInput as HTMLInputElement).click()"
                class="order-first flex h-32 w-full cursor-pointer flex-col items-center justify-center rounded-lg border-2 border-dashed border-border text-center transition-colors hover:bg-gray-50 md:order-none md:aspect-square md:h-auto"
                :class="{ 'border-primary bg-primary/10': isDragging }"
            >
                <UploadCloud class="h-8 w-8 text-muted-foreground" />
                <p class="mt-1 text-xs text-muted-foreground">افزودن تصویر</p>
                <input ref="fileInput" type="file" multiple accept="image/*" class="hidden" @change="handleFileChange" />
            </div>

            <!-- Previews Container -->
            <!-- On mobile, it's a grid below the uploader. On desktop, it's part of the main grid. -->
            <div class="grid grid-cols-4 gap-2 md:contents">
                <div v-for="(preview, index) in previews" :key="preview.id" class="group relative aspect-square overflow-hidden rounded-md bg-muted">
                    <!-- Loading State -->
                    <div v-if="preview.isLoading" class="flex h-full w-full items-center justify-center">
                        <LoaderCircle class="h-6 w-6 animate-spin text-muted-foreground" />
                    </div>

                    <!-- Image Display -->
                    <img v-else :src="preview.url" class="h-full w-full object-cover" />

                    <!-- Actions Overlay -->
                    <div v-if="!preview.isLoading" class="absolute inset-0 flex items-center justify-center gap-1 bg-black/30 opacity-100">
                        <button
                            @click.stop.prevent="setAsCover(index)"
                            class="flex h-7 w-7 cursor-pointer items-center justify-center rounded-full bg-white/80 text-[#FF4A4A] hover:bg-white"
                            title="انتخاب به عنوان تصویر اصلی"
                        >
                            <Star class="h-4 w-4" :class="{ 'fill-current': coverImageIndex === index }" />
                        </button>
                        <button
                            @click.stop.prevent="removeFile(index)"
                            class="flex h-7 w-7 cursor-pointer items-center justify-center rounded-full bg-white/80 hover:bg-white"
                            title="حذف تصویر"
                        >
                            <X class="h-4 w-4" />
                        </button>
                    </div>

                    <!-- Cover Image Indicator -->
                    <div
                        v-if="!preview.isLoading && coverImageIndex === index"
                        class="absolute right-0 bottom-0 left-0 bg-primary/80 py-0.5 text-center text-[10px] font-bold text-white"
                    >
                        تصویر اصلی
                    </div>
                </div>
            </div>
        </div>
        <p class="text-xs text-gray-400">بارگزاری عکس مناسب، تاثیر بسیار زیادی در دیده شدن آگهی شما دارد.</p>
    </div>
</template>
