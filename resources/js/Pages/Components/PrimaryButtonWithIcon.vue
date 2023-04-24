<template>
    <button :type="type" class="inline-flex items-center px-3 py-2 border border-transparent shadow-sm text-sm leading-4 font-medium rounded-md text-indigo-500 bg-indigo-50 hover:bg-indigo-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
        <slot />
        <ArrowRightIcon class="ml-2 -mr-0.5 h-4 w-4" aria-hidden="true" />
    </button>
</template>

<script setup>
import { ArrowRightIcon } from '@heroicons/vue/solid';
defineProps({
    type: {
        type: String,
        default: 'submit',
    },
});
</script>
