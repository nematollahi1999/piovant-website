<script setup lang="ts">
import type { HTMLAttributes } from 'vue'
import { cn } from '@/lib/utils'

const props = defineProps<{
  class?: HTMLAttributes['class']
}>()
</script>

<template>
  <main
    data-slot="sidebar-inset"
    :class="cn(
      'bg-background relative flex w-full flex-1 flex-col',
      // On desktop, offset the content by the sidebar width or icon width
      // depending on collapsed/expanded state and the side (left/right).
      'md:peer-data-[variant=inset]:m-2 md:peer-data-[variant=inset]:rounded-xl md:peer-data-[variant=inset]:shadow-sm',
      // When sidebar is the standard (expanded) width, add margin-left or margin-right
      'md:peer-data-[side=left]:peer-data-[state=expanded]:ml-[var(--sidebar-width)]',
      'md:peer-data-[side=left]:peer-data-[state=collapsed]:ml-[var(--sidebar-width-icon)]',
      'md:peer-data-[side=right]:peer-data-[state=expanded]:mr-[var(--sidebar-width)]',
      'md:peer-data-[side=right]:peer-data-[state=collapsed]:mr-[var(--sidebar-width-icon)]',
      props.class,
    )"
  >
    <slot />
  </main>
</template>
