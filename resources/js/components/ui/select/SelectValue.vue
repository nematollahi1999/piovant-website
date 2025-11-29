<script setup lang="ts">
import { computed, inject, type Ref } from 'vue';

const props = defineProps<{
    placeholder?: string;
}>();

const { selectedLabel, selectedValue } = inject('select') as { selectedLabel: Ref<string>; selectedValue: Ref<any> };

const displayLabel = computed(() => selectedLabel.value || props.placeholder);
</script>

<template>
    <span>{{ displayLabel }}</span>
</template>
