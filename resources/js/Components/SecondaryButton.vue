<script setup>
defineProps({
    type: {
        type: String,
        default: 'button',
    },
});
</script>

<template>
    <button
        :type="type"
        class="inline-flex items-center rounded-xl border border-brand-sand bg-white px-5 py-2.5 text-xs font-semibold uppercase tracking-widest text-brand-dark shadow-sm transition duration-150 ease-in-out hover:bg-brand-sand/50 focus:outline-none focus:ring-2 focus:ring-brand-primary focus:ring-offset-2 disabled:opacity-30 cursor-pointer"
    >
        <slot />
    </button>
</template>
