<script setup>
import { Link } from '@inertiajs/vue3';
import { ShoppingBag, Sparkles, ArrowRight, CheckCircle2 } from 'lucide-vue-next';

defineProps({
    categories: {
        type: Array,
        default: () => []
    },
    featuredProducts: {
        type: Array,
        default: () => []
    },
    whatsappNumber: {
        type: String,
        default: '6281316053870'
    }
});
</script>

<template>
    <section class="py-24 bg-brand-cream border-t border-brand-dark/10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-16">
            
            <!-- Section Header -->
            <div class="flex flex-col md:flex-row md:items-end justify-between gap-6">
                <div class="max-w-2xl space-y-3">
                    <span class="text-xs font-bold uppercase tracking-widest text-brand-dark">
                        Kurasi Koleksi Pilihan
                    </span>
                    <h2 class="font-serif text-3xl sm:text-4xl lg:text-5xl font-bold text-brand-dark leading-tight">
                        Mahakarya Busana untuk Momen Berharga Anda.
                    </h2>
                </div>

                <Link 
                    :href="route('products.index')" 
                    class="inline-flex items-center gap-2 text-sm font-bold text-brand-dark hover:text-brand-primary transition-colors group"
                >
                    <span>Lihat Semua Koleksi (Katalog Lengkap)</span>
                    <ArrowRight class="w-4 h-4 transition-transform group-hover:translate-x-1" />
                </Link>
            </div>

            <!-- Categories Pill Tabs -->
            <div class="flex items-center gap-3 overflow-x-auto pb-4 scrollbar-none">
                <Link 
                    v-for="cat in categories" 
                    :key="cat.id" 
                    :href="route('products.index', { kategori: cat.slug })"
                    class="flex-shrink-0 px-5 py-2.5 rounded-full bg-brand-sand/80 hover:bg-brand-dark hover:text-brand-cream text-brand-dark text-xs font-medium tracking-wide border border-brand-dark/15 transition-all duration-300 shadow-sm"
                >
                    {{ cat.name }} ({{ cat.count }})
                </Link>
            </div>

            <!-- Featured Products Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                <div 
                    v-for="item in featuredProducts" 
                    :key="item.id"
                    class="group bg-brand-sand/60 rounded-2xl overflow-hidden border border-brand-dark/15 shadow-sm hover:shadow-xl transition-all duration-500 flex flex-col"
                >
                    <!-- Product Image Container -->
                    <div class="relative overflow-hidden aspect-[3/4] bg-brand-dark">
                        <img 
                            :src="item.thumbnail" 
                            :alt="item.name"
                            class="w-full h-full object-cover object-center transition-transform duration-700 ease-out group-hover:scale-105"
                            loading="lazy"
                        />
                        <div class="absolute inset-0 bg-gradient-to-t from-brand-deep/70 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        
                        <!-- Top Tag -->
                        <div class="absolute top-4 left-4 flex flex-col gap-1.5">
                            <span class="px-3 py-1 rounded-full text-[10px] font-bold uppercase tracking-wider bg-brand-cream/95 text-brand-dark backdrop-blur-md shadow-sm">
                                {{ item.category?.name || 'Signature' }}
                            </span>
                        </div>

                        <!-- Price Pill -->
                        <div class="absolute bottom-4 left-4 right-4 flex items-center justify-between">
                            <span class="px-3.5 py-1.5 rounded-lg text-xs font-bold bg-brand-dark/90 text-brand-cream backdrop-blur-md">
                                {{ item.price_range }}
                            </span>
                        </div>
                    </div>

                    <!-- Product Details -->
                    <div class="p-6 space-y-4 flex-1 flex flex-col justify-between">
                        <div class="space-y-2">
                            <h3 class="font-serif text-lg font-bold text-brand-dark group-hover:text-brand-primary transition-colors leading-snug">
                                {{ item.name }}
                            </h3>
                            <p class="text-xs text-brand-dark/75 line-clamp-2 leading-relaxed">
                                {{ item.short_description }}
                            </p>
                            <div class="text-[11px] text-brand-dark/60 font-medium pt-1">
                                <strong>Bahan:</strong> {{ item.material }}
                            </div>
                        </div>

                        <!-- Action Button WhatsApp Checkout -->
                        <div class="pt-3 border-t border-brand-dark/10">
                            <a 
                                :href="`https://wa.me/${whatsappNumber}?text=Halo%20R%C3%9CYA,%20saya%20tertarik%20untuk%20memesan%20${encodeURIComponent(item.name)}%20(${encodeURIComponent(item.price_range)}).%20Apakah%20stoknya%20tersedia?`"
                                target="_blank"
                                class="w-full inline-flex items-center justify-center gap-2 py-3 px-4 rounded-xl bg-brand-dark hover:bg-brand-primary text-brand-cream font-medium text-xs tracking-wider transition-colors duration-300 shadow-sm"
                            >
                                <ShoppingBag class="w-4 h-4 text-brand-sand" />
                                <span>Pesan Langsung ke WA</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Bottom Banner -->
            <div class="p-8 sm:p-10 rounded-3xl bg-brand-sand border border-brand-dark/15 flex flex-col md:flex-row items-center justify-between gap-6 shadow-sm">
                <div class="space-y-2 text-center md:text-left">
                    <h3 class="font-serif text-2xl font-bold text-brand-dark">Ingin Memesan Ukuran Khusus (*Bespoke Tailoring*)?</h3>
                    <p class="text-sm text-brand-dark/80">Kami menyediakan layanan pembuatan busana custom lingkar dada dan panjang gamis sesuai preferensi Anda.</p>
                </div>
                <a 
                    :href="`https://wa.me/${whatsappNumber}?text=Halo%20R%C3%9CYA,%20saya%20ingin%20berkonsultasi%20layanan%20jahit%20khusus%20(Bespoke%20Sizing).`"
                    target="_blank"
                    class="flex-shrink-0 px-6 py-3.5 rounded-full bg-brand-dark hover:bg-brand-primary text-brand-cream text-xs font-semibold tracking-wider transition-colors shadow-md"
                >
                    Konsultasi Ukuran Gratis
                </a>
            </div>

        </div>
    </section>
</template>
