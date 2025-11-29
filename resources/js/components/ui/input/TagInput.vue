<script setup lang="ts">
import { Input } from '@/components/ui/input';
import { X } from 'lucide-vue-next';
import { computed, ref } from 'vue';

const props = withDefaults(
    defineProps<{
        modelValue: string[];
        availableTags: string[];
        maxTags?: number;
    }>(),
    {
        modelValue: () => [], // <-- KEY FIX #1: Default modelValue to an empty array
        maxTags: 3,
    },
);

const emit = defineEmits(['update:modelValue']);

const searchTerm = ref('');
const isFocused = ref(false);

// A safe computed property that ensures modelValue is always an array
const safeModelValue = computed(() => props.modelValue || []);

const suggestedTags = computed(() => {
    const currentTags = safeModelValue.value;
    if (searchTerm.value) {
        return props.availableTags.filter((tag) => tag.toLowerCase().includes(searchTerm.value.toLowerCase()) && !currentTags.includes(tag));
    } else {
        return props.availableTags.filter((tag) => !currentTags.includes(tag)).slice(0, 4);
    }
});

const addTag = (tag: string) => {
    const currentTags = safeModelValue.value;
    if (currentTags.length < props.maxTags && !currentTags.includes(tag)) {
        const newTags = [...currentTags, tag];
        emit('update:modelValue', newTags);
    }
    searchTerm.value = '';
};

const removeTag = (index: number) => {
    const currentTags = [...safeModelValue.value];
    currentTags.splice(index, 1);
    emit('update:modelValue', currentTags);
};

const handleKeyDown = (event: KeyboardEvent) => {
    if (event.key === 'Enter' && searchTerm.value && suggestedTags.value.length > 0) {
        addTag(suggestedTags.value[0]);
    }
    if (event.key === 'Backspace' && !searchTerm.value && safeModelValue.value.length > 0) {
        removeTag(safeModelValue.value.length - 1);
    }
};
</script>

// --- Your

<template>
    <div class="relative" @focusin="isFocused = true" @blur.capture="isFocused = false">
        <div class="flex min-h-10 w-full flex-wrap items-center gap-2 rounded-md border border-input bg-background p-2 text-sm">
            <div
                v-for="(tag, index) in safeModelValue"
                :key="tag"
                class="flex items-center gap-1 rounded-sm bg-secondary px-2 py-1 text-secondary-foreground"
            >
                <span>{{ tag }}</span>
                <button @click="removeTag(index)" class="rounded-full hover:text-red-500">
                    <X class="h-3 w-3 cursor-pointer" />
                </button>
            </div>
            <Input
                v-if="safeModelValue.length < props.maxTags"
                v-model="searchTerm"
                @keydown="handleKeyDown"
                placeholder="جستجو..."
                class="h-auto flex-grow border-0 p-0 shadow-none focus:ring-0 focus-visible:ring-0 focus-visible:ring-offset-0"
            />
        </div>

        <div v-if="isFocused && suggestedTags.length > 0" class="absolute z-10 mt-1 w-full overflow-hidden rounded-md border bg-popover shadow-lg">
            <ul>
                <li v-for="tag in suggestedTags" :key="tag" @mousedown.prevent="addTag(tag)" class="cursor-pointer p-2 text-sm hover:bg-accent">
                    {{ tag }}
                </li>
            </ul>
            <div class="border-t bg-muted/50 px-3 py-2 text-center text-xs text-muted-foreground">موارد مورد نظر را تایپ کنید</div>
        </div>
    </div>
</template>
