<script setup lang="ts">
import { cn } from '@/lib/utils';
import { Check } from 'lucide-vue-next';
import { computed, inject, useSlots, type Ref } from 'vue';

const props = defineProps<{
    value: string | number;
}>();

const slots = useSlots();

const { selectedValue, selectOption, registerItem } = inject('select') as {
    selectedValue: Ref<any>;
    selectOption: (value: any, label: string) => void;
    registerItem: (value: any, label: string) => void;
};

const isSelected = computed(() => props.value === selectedValue.value);

const getLabel = () => {
    if (slots.default) {
        const vnodes = slots.default();
        if (vnodes && vnodes[0] && vnodes[0].children) {
            return String(vnodes[0].children).trim();
        }
    }
    return String(props.value);
};

// Instead of onMounted, we just register ourselves with the parent
registerItem(props.value, getLabel());
</script>

<template>
    <div
        @click="selectOption(props.value, getLabel())"
        :class="
            cn(
                'relative flex w-full cursor-pointer items-center rounded-sm py-1.5 pr-2 pl-8 text-sm outline-none select-none focus:bg-accent focus:text-accent-foreground data-[disabled]:pointer-events-none data-[disabled]:opacity-50',
                { 'bg-accent': isSelected },
            )
        "
    >
        <span class="absolute left-2 flex h-3.5 w-3.5 items-center justify-center">
            <Check v-if="isSelected" class="h-4 w-4" />
        </span>
        <slot />
    </div>
</template>
