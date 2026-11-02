<script setup>
import { Link } from '@inertiajs/vue3';
import { ArrowRight, Clock } from 'lucide-vue-next';

defineProps({
    articles: {
        type: Array,
        default: () => []
    }
});
</script>

<template>
    <section class="py-24 bg-brand-sand/30 border-t border-brand-dark/10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-16">
            
            <div class="flex flex-col md:flex-row md:items-end justify-between gap-6">
                <div class="max-w-2xl space-y-3">
                    <span class="text-xs font-bold uppercase tracking-widest text-brand-dark">
                        RÜYA Editorial Journal
                    </span>
                    <h2 class="font-serif text-3xl sm:text-4xl lg:text-5xl font-bold text-brand-dark leading-tight">
                        Wawasan Busana, Tips Hijab & Inspirasi Gaya.
                    </h2>
                </div>

                <Link 
                    :href="route('articles.index')" 
                    class="inline-flex items-center gap-2 text-sm font-bold text-brand-dark hover:text-brand-primary transition-colors group"
                >
                    <span>Baca Semua Journal</span>
                    <ArrowRight class="w-4 h-4 transition-transform group-hover:translate-x-1" />
                </Link>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <article 
                    v-for="art in articles" 
                    :key="art.id"
                    class="group bg-brand-cream rounded-2xl overflow-hidden border border-brand-dark/15 shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col"
                >
                    <div class="aspect-[16/10] overflow-hidden bg-brand-dark relative">
                        <img 
                            :src="art.image_url" 
                            :alt="art.title"
                            class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105"
                            loading="lazy"
                        />
                        <div class="absolute top-4 left-4">
                            <span class="px-3 py-1 rounded-full text-[10px] font-bold uppercase tracking-wider bg-brand-sand text-brand-dark backdrop-blur-md">
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
    </section>
</template>
