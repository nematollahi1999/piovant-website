<script setup lang="ts">
import { provide, ref, watch } from 'vue';

const props = defineProps<{
    modelValue?: string | number;
}>();

const emits = defineEmits(['update:modelValue']);

const isOpen = ref(false);
const selectedValue = ref(props.modelValue);
const selectedLabel = ref('');

// This map will store the value-label pairs from all child SelectItems
const itemMap = new Map<string | number, string>();

const registerItem = (value: string | number, label: string) => {
    itemMap.set(value, label);
};

const selectOption = (value: string | number, label: string) => {
    selectedValue.value = value;
    selectedLabel.value = label;
    emits('update:modelValue', value);
    isOpen.value = false;
};

// This watcher is now the single source of truth for syncing the label
watch(
    () => props.modelValue,
    (newValue) => {
        selectedValue.value = newValue;
        if (newValue !== undefined && itemMap.has(newValue)) {
            selectedLabel.value = itemMap.get(newValue) || '';
        } else {
            selectedLabel.value = ''; // Clear label if value is invalid or cleared
        }
    },
    { immediate: true },
); // `immediate: true` runs the watcher on component mount

provide('select', {
    isOpen,
    selectedValue,
    selectedLabel,
    selectOption,
    registerItem, // Provide the registration function to children
});
</script>

<template>
    <div class="relative">
        <slot />
    </div>
</template>
