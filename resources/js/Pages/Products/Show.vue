<script setup>
import { Head, Link } from '@inertiajs/vue3';
import HeaderNavbar from '@/Components/Frontend/HeaderNavbar.vue';
import FooterSection from '@/Components/Frontend/FooterSection.vue';
import FloatingWhatsapp from '@/Components/Frontend/FloatingWhatsapp.vue';
import { ArrowLeft, MessageSquare, ShoppingBag, Sparkles, CheckCircle2 } from 'lucide-vue-next';

defineProps({
    product: {
        type: Object,
        required: true
    },
    relatedProducts: {
        type: Array,
        default: () => []
    }
});
</script>

<template>
    <Head :title="`${product.name} - RÜYA Modest Wear`" />

    <div class="min-h-screen bg-brand-cream text-brand-dark font-sans antialiased">
        <HeaderNavbar />

        <main class="pt-32 pb-24">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-12">
                
                <Link 
                    :href="route('products.index')" 
                    class="inline-flex items-center gap-2 text-xs font-bold uppercase tracking-wider text-brand-dark hover:text-brand-primary"
                >
                    <ArrowLeft class="w-4 h-4" />
                    <span>Kembali ke Katalog Busana</span>
                </Link>

                <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-start">
                    <!-- Image -->
                    <div class="lg:col-span-6 rounded-3xl overflow-hidden border border-brand-dark/15 shadow-xl bg-brand-dark aspect-[3/4]">
                        <img 
                            :src="product.thumbnail" 
                            :alt="product.name" 
                            class="w-full h-full object-cover"
                        />
                    </div>

                    <!-- Details -->
                    <div class="lg:col-span-6 space-y-6">
                        <div class="space-y-2">
                            <span class="px-3.5 py-1 rounded-full text-xs font-bold uppercase tracking-wider bg-brand-sand text-brand-dark">
                                {{ product.category?.name || 'Signature Series' }}
                            </span>
                            <h1 class="font-serif text-3xl sm:text-4xl font-bold text-brand-dark">
                                {{ product.name }}
                            </h1>
                            <div class="font-serif text-2xl font-bold text-brand-dark pt-2">
                                {{ product.price_range }}
                            </div>
                        </div>

                        <p class="text-sm text-brand-dark/80 leading-relaxed">
                            {{ product.short_description }}
                        </p>

                        <div class="p-5 rounded-2xl bg-brand-sand/60 border border-brand-dark/15 space-y-2 text-xs">
                            <div><strong>Bahan Material:</strong> {{ product.material }}</div>
                            <div><strong>Panduan Ukuran:</strong> {{ product.dimensions }}</div>
                            <div><strong>Finishing:</strong> Jahitan butik halus & wudhu-friendly cuffs</div>
                        </div>

                        <div class="pt-4">
                            <a 
                                :href="`https://wa.me/6281316053870?text=Halo%20R%C3%9CYA,%20saya%20tertarik%20untuk%20memesan%20${encodeURIComponent(product.name)}%20(${encodeURIComponent(product.price_range)}).`"
                                target="_blank"
                                class="inline-flex items-center justify-center gap-3 px-8 py-4 rounded-full bg-brand-dark hover:bg-brand-primary text-brand-cream font-semibold text-sm tracking-wide shadow-lg w-full sm:w-auto"
                            >
                                <ShoppingBag class="w-4 h-4 text-brand-sand" />
                                <span>Pesan Langsung via WhatsApp</span>
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </main>

        <FooterSection />
        <FloatingWhatsapp />
    </div>
</template>
