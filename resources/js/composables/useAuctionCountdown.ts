// resources/js/composables/useAuctionCountdown.ts

import { ref, onMounted, onUnmounted, type Ref, computed, unref } from 'vue';
import { toPersianDigits } from '@/composables/formatters';

// We use Ref<string | undefined> to accept a reactive end time
export function useAuctionCountdown(endTimeString: Ref<string | undefined>) {
    const countdown = ref('');
    const isFinished = ref(false);
    let intervalId: number | undefined;

    function updateCountdown() {
        const endTimeValue = unref(endTimeString); // Get the current value of the ref
        if (!endTimeValue) {
            isFinished.value = true;
            return;
        }

        const endTime = new Date(endTimeValue).getTime();
        const now = new Date().getTime();
        const distance = endTime - now;

        if (distance < 0) {
            countdown.value = toPersianDigits('مزایده تمام شد');
            isFinished.value = true;
            clearInterval(intervalId);
            return;
        }

        const days = Math.floor(distance / (1000 * 60 * 60 * 24));
        const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        const seconds = Math.floor((distance % (1000 * 60)) / 1000);

        const countdownString = `${days} روز و ${String(hours).padStart(2, '0')}:${String(minutes).padStart(2, '0')}:${String(seconds).padStart(2, '0')}`;
        
        countdown.value = toPersianDigits(countdownString);
        isFinished.value = false;
    }

    onMounted(() => {
        updateCountdown();
        intervalId = window.setInterval(updateCountdown, 1000);
    });

    onUnmounted(() => {
        clearInterval(intervalId);
    });

    // Return the reactive values so the component can use them
    return { countdown, isFinished };
}