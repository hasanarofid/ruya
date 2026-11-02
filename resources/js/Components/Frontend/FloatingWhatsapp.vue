<script setup>
import { MessageSquare } from 'lucide-vue-next';

defineProps({
    whatsappNumber: {
        type: String,
        default: '6281316053870'
    }
});
</script>

<template>
    <aside 
        class="fixed bottom-6 right-6 z-40"
        aria-label="Personal Shopper WhatsApp"
    >
        <a 
            :href="`https://wa.me/${whatsappNumber}?text=Halo%20R%C3%9CYA,%20saya%20tertarik%20dengan%20koleksi%20busana%20modest%20Anda.`"
            target="_blank"
            class="group flex items-center gap-2.5 px-4 py-3 rounded-full bg-brand-dark text-brand-cream border border-brand-sand/30 shadow-2xl hover:bg-brand-primary transition-all duration-300 hover:scale-105"
        >
            <div class="w-2.5 h-2.5 rounded-full bg-brand-sand animate-pulse"></div>
            <MessageSquare class="w-4 h-4 text-brand-sand" />
            <span class="text-xs font-semibold tracking-wide hidden sm:inline">Chat Stylist</span>
        </a>
    </aside>
</template>
