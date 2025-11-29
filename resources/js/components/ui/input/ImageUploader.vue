<script setup lang="ts">
import { UploadCloud, X } from 'lucide-vue-next';
import { ref } from 'vue';

const files = ref<File[]>([]);
const previews = ref<string[]>([]);
const isDragging = ref(false);

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
    const filesToAdd = newFiles.slice(0, remainingSlots);
    files.value.push(...filesToAdd);
    filesToAdd.forEach((file) => {
        previews.value.push(URL.createObjectURL(file));
    });
};

const removeFile = (index: number) => {
    URL.revokeObjectURL(previews.value[index]);
    files.value.splice(index, 1);
    previews.value.splice(index, 1);
};
</script>

<template>
    <div class="space-y-4">
        <div
            @dragover.prevent="isDragging = true"
            @dragleave.prevent="isDragging = false"
            @drop.prevent="handleDrop"
            @click="($refs.fileInput as HTMLInputElement).click()"
            class="relative flex cursor-pointer flex-col items-center justify-center rounded-lg border-2 border-dashed border-border p-8 text-center transition-colors"
            :class="{ 'border-primary bg-primary/10': isDragging }"
        >
            <UploadCloud class="h-10 w-10 text-muted-foreground" />
            <p class="mt-2 text-sm text-muted-foreground">فایل‌ها را بکشید و رها کنید</p>
            <p class="text-xs text-muted-foreground/80">حداکثر ۴ تصویر</p>
            <input ref="fileInput" type="file" multiple accept="image/*" class="hidden" @change="handleFileChange" />
        </div>

        <div v-if="previews.length > 0" class="grid grid-cols-2 gap-2">
            <div v-for="(preview, index) in previews" :key="index" class="relative aspect-square overflow-hidden rounded-md">
                <img :src="preview" class="h-full w-full object-cover" />
                <button
                    @click.stop="removeFile(index)"
                    class="absolute top-1 right-1 flex h-6 w-6 items-center justify-center rounded-full bg-black/50 text-white hover:bg-red-500"
                >
                    <X class="h-4 w-4" />
                </button>
            </div>
        </div>
        <p class="px-2 text-center text-xs text-gray-400">بارگزاری عکس مناسب، تاثیر بسیار زیادی در دیده شدن آگهی شما دارد.</p>
    </div>
</template>
