<script setup>
import { Link } from '@inertiajs/vue3';
import { ShoppingBag } from 'lucide-vue-next';

defineProps({
    product: {
        type: Object,
        required: true
    },
    whatsappNumber: {
        type: String,
        default: '6281316053870'
    }
});
</script>

<template>
    <div class="group bg-brand-sand/60 rounded-2xl overflow-hidden border border-brand-dark/15 shadow-sm hover:shadow-xl transition-all duration-500 flex flex-col">
        <!-- Product Image -->
        <div class="relative overflow-hidden aspect-[3/4] bg-brand-dark">
            <img 
                :src="product.thumbnail" 
                :alt="product.name"
                class="w-full h-full object-cover object-center transition-transform duration-700 ease-out group-hover:scale-105"
                loading="lazy"
            />
            <div class="absolute inset-0 bg-gradient-to-t from-brand-deep/70 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
            
            <!-- Category Tag -->
            <div class="absolute top-4 left-4">
                <span class="px-3 py-1 rounded-full text-[10px] font-bold uppercase tracking-wider bg-brand-cream/95 text-brand-dark backdrop-blur-md shadow-sm">
                    {{ product.category?.name || 'Signature' }}
                </span>
            </div>

            <!-- Price Pill -->
            <div class="absolute bottom-4 left-4 right-4 flex items-center justify-between">
                <span class="px-3.5 py-1.5 rounded-lg text-xs font-bold bg-brand-dark/90 text-brand-cream backdrop-blur-md">
                    {{ product.price_range }}
                </span>
            </div>
        </div>

        <!-- Product Details -->
        <div class="p-6 space-y-4 flex-1 flex flex-col justify-between">
            <div class="space-y-2">
                <h3 class="font-serif text-lg font-bold text-brand-dark group-hover:text-brand-primary transition-colors leading-snug">
                    {{ product.name }}
                </h3>
                <p class="text-xs text-brand-dark/75 line-clamp-2 leading-relaxed">
                    {{ product.short_description }}
                </p>
                <div class="text-[11px] text-brand-dark/60 font-medium pt-1 space-y-0.5">
                    <div><strong>Bahan:</strong> {{ product.material }}</div>
                    <div><strong>Ukuran:</strong> {{ product.dimensions }}</div>
                </div>
            </div>

            <!-- Action Button WhatsApp Checkout -->
            <div class="pt-3 border-t border-brand-dark/10">
                <a 
                    :href="`https://wa.me/${whatsappNumber}?text=Halo%20R%C3%9CYA,%20saya%20tertarik%20untuk%20memesan%20${encodeURIComponent(product.name)}%20(${encodeURIComponent(product.price_range)}).%20Apakah%20stoknya%20tersedia?`"
                    target="_blank"
                    class="w-full inline-flex items-center justify-center gap-2 py-3 px-4 rounded-xl bg-brand-dark hover:bg-brand-primary text-brand-cream font-medium text-xs tracking-wider transition-colors duration-300 shadow-sm"
                >
                    <ShoppingBag class="w-4 h-4 text-brand-sand" />
                    <span>Pesan via WhatsApp</span>
                </a>
            </div>
        </div>
    </div>
</template>
