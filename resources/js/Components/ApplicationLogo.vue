<script setup>
defineProps({
    class: {
        type: String,
        default: 'w-10 h-10'
    }
});
</script>

<template>
    <div :class="['flex items-center gap-2', $props.class]">
        <img 
            src="/images/ruya-logo.png" 
            alt="RÜYA" 
            class="h-full w-auto object-contain"
        />
    </div>
</template>
