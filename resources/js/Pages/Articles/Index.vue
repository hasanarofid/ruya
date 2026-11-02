<script setup>
import { Head, Link } from '@inertiajs/vue3';
import HeaderNavbar from '@/Components/Frontend/HeaderNavbar.vue';
import FooterSection from '@/Components/Frontend/FooterSection.vue';
import FloatingWhatsapp from '@/Components/Frontend/FloatingWhatsapp.vue';
import { Clock, ArrowRight } from 'lucide-vue-next';

defineProps({
    articles: {
        type: Array,
        default: () => []
    }
});
</script>

<template>
    <Head title="RÜYA Journal - Wawasan Busana & Tips Hijab" />

    <div class="min-h-screen bg-brand-cream text-brand-dark font-sans antialiased">
        <HeaderNavbar />

        <main class="pt-32 pb-24">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-12">
                
                <div class="max-w-3xl space-y-3">
                    <span class="text-xs font-bold uppercase tracking-widest text-brand-dark">
                        RÜYA Editorial Journal
                    </span>
                    <h1 class="font-serif text-4xl sm:text-5xl font-bold text-brand-dark leading-tight">
                        Wawasan Busana Santun, Perawatan Kain & Gaya Hijab.
                    </h1>
                    <p class="text-base text-brand-dark/80">
                        Artikel edukatif dan inspirasi busana yang dipersembahkan untuk Anda pencinta keanggunan sejati.
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <article 
                        v-for="art in articles" 
                        :key="art.id"
                        class="group bg-brand-sand/50 rounded-2xl overflow-hidden border border-brand-dark/15 shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col"
                    >
                        <div class="aspect-[16/10] overflow-hidden bg-brand-dark relative">
                            <img 
                                :src="art.image_url" 
                                :alt="art.title"
                                class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105"
                                loading="lazy"
                            />
                            <div class="absolute top-4 left-4">
                                <span class="px-3 py-1 rounded-full text-[10px] font-bold uppercase tracking-wider bg-brand-cream text-brand-dark">
                                    {{ art.category?.name || 'Journal' }}
                                </span>
                            </div>
                        </div>

                        <div class="p-6 space-y-3 flex-1 flex flex-col justify-between">
                            <div class="space-y-2">
                                <div class="flex items-center gap-3 text-[11px] text-brand-dark/60 font-medium">
                                    <span>{{ art.published_at }}</span>
                                    <span>•</span>
                                    <span class="flex items-center gap-1">
                                        <Clock class="w-3 h-3" />
                                        {{ art.reading_time }} mnt baca
                                    </span>
                                </div>
                                <h3 class="font-serif text-lg font-bold text-brand-dark group-hover:text-brand-primary transition-colors leading-snug">
                                    {{ art.title }}
                                </h3>
                                <p class="text-xs text-brand-dark/75 line-clamp-2 leading-relaxed">
                                    {{ art.excerpt }}
                                </p>
                            </div>

                            <div class="pt-4 border-t border-brand-dark/10">
                                <Link 
                                    :href="route('articles.show', art.slug)" 
                                    class="inline-flex items-center gap-1.5 text-xs font-bold text-brand-dark group-hover:text-brand-primary transition-colors"
                                >
                                    <span>Baca Selengkapnya</span>
                                    <ArrowRight class="w-3.5 h-3.5 transition-transform group-hover:translate-x-1" />
                                </Link>
                            </div>
                        </div>
                    </article>
                </div>

            </div>
        </main>

        <FooterSection />
        <FloatingWhatsapp />
    </div>
</template>
