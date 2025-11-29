import { computed } from 'vue';
import { usePage } from '@inertiajs/vue3';

export default function useTrans() {
    const page = usePage();

    // Inertia's page.props exposes shared props directly (reactive). Read translations
    // from the props object. Avoid using .value here which is not present.
    const translations = computed(() => ((page.props as any).translations ?? {}));

    function t(key: string, fallback?: string) {
        return translations.value[key] ?? fallback ?? key;
    }

    return { t, translations };
}
