<script setup>
import { Head, Link } from '@inertiajs/vue3';
import HeaderNavbar from '@/Components/Frontend/HeaderNavbar.vue';
import FooterSection from '@/Components/Frontend/FooterSection.vue';
import FloatingWhatsapp from '@/Components/Frontend/FloatingWhatsapp.vue';
import { ArrowUpRight } from 'lucide-vue-next';

defineProps({
    portfolios: {
        type: Array,
        default: () => []
    }
});
</script>

<template>
    <Head title="Lookbook & Koleksi Musiman - RÜYA Modest Wear" />

    <div class="min-h-screen bg-brand-cream text-brand-dark font-sans antialiased">
        <HeaderNavbar />

        <main class="pt-32 pb-24">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-12">
                
                <div class="max-w-3xl space-y-3">
                    <span class="text-xs font-bold uppercase tracking-widest text-brand-dark">
                        Editorial Lookbook
                    </span>
                    <h1 class="font-serif text-4xl sm:text-5xl font-bold text-brand-dark leading-tight">
                        Dokumentasi Gaya Nyata & Momen Istimewa RÜYA.
                    </h1>
                    <p class="text-base text-brand-dark/80">
                        Inspirasi padu-padan abaya, kaftan, dan scarf dalam berbagai kesempatan istimewa Anda.
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <div 
                        v-for="item in portfolios" 
                        :key="item.id"
                        class="group rounded-3xl overflow-hidden border border-brand-dark/15 shadow-md bg-brand-dark flex flex-col"
                    >
                        <div class="aspect-[4/5] overflow-hidden relative">
                            <img 
                                :src="item.image" 
                                :alt="item.title" 
                                class="w-full h-full object-cover transition-transform duration-700 ease-out group-hover:scale-105"
                                loading="lazy"
                            />
                            <div class="absolute inset-0 bg-gradient-to-t from-brand-deep/85 via-black/20 to-transparent"></div>
                            
                            <div class="absolute bottom-6 left-6 right-6 text-brand-cream space-y-1.5">
                                <span class="inline-block px-3 py-1 rounded-full text-[10px] font-bold uppercase tracking-wider bg-brand-sand text-brand-dark">
                                    {{ item.category }}
                                </span>
                                <h3 class="font-serif text-xl font-bold">
                                    {{ item.title }}
                                </h3>
                                <p class="text-xs text-brand-cream/80 line-clamp-2">
                                    {{ item.description }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </main>

        <FooterSection />
        <FloatingWhatsapp />
    </div>
</template>
