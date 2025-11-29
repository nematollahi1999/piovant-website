<script setup lang="ts">
import { computed } from 'vue';
const props = defineProps<{ data: number[]; labels?: string[]; color?: string }>();
const max = computed(() => Math.max(...(props.data || [1])) || 1);
const values = computed(() => props.data || [1, 2, 3]);
const labels = computed(() => props.labels || values.value.map((_, i) => String(i + 1)));
const color = computed(() => props.color || 'currentColor');
</script>

<template>
  <div class="w-full p-4">
    <div class="flex items-center justify-between pb-2">
      <slot name="title"><h3 class="text-sm font-medium">Stats</h3></slot>
      <slot name="meta"></slot>
    </div>
    <svg class="w-full h-32" viewBox="0 0 100 32" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
      <g transform="translate(0,0)">
        <template v-for="(v, i) in values" :key="i">
          <rect
            :x="(i * (100 / values.length)) + 1"
            :y="(32 - (v / max) * 28)"
            :width="(100 / values.length) - 2"
            :height="(v / max) * 28"
            :fill="color"
            rx="1"
          />
        </template>
      </g>
    </svg>
    <div class="mt-2 flex items-center justify-between text-xs text-muted-foreground">
      <template v-for="(l, i) in labels" :key="i">
        <div class="truncate" style="width: calc(100% / var(--count))" :style="{'--count': values.length} as any">{{ l }}</div>
      </template>
    </div>
  </div>
</template>

<style scoped>
.text-muted-foreground { color: var(--muted-foreground); }
</style>
