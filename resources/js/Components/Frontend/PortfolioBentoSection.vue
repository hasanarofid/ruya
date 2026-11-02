<script setup>
import { ArrowUpRight } from 'lucide-vue-next';
import { Link } from '@inertiajs/vue3';

defineProps({
    portfolios: {
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
    <section class="py-24 bg-brand-sand/40 border-t border-brand-dark/10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-16">
            
            <div class="flex flex-col md:flex-row md:items-end justify-between gap-6">
                <div class="max-w-2xl space-y-3">
                    <span class="text-xs font-bold uppercase tracking-widest text-brand-dark">
                        Lookbook & Styling Inspiration
                    </span>
                    <h2 class="font-serif text-3xl sm:text-4xl lg:text-5xl font-bold text-brand-dark leading-tight">
                        Inspirasi Gaya Nyata dalam Kehidupan Sehari-hari.
                    </h2>
                </div>

                <Link 
                    :href="route('portfolios.index')" 
                    class="inline-flex items-center gap-2 text-sm font-bold text-brand-dark hover:text-brand-primary transition-colors group"
                >
                    <span>Jelajahi Seluruh Lookbook</span>
                    <ArrowUpRight class="w-4 h-4 transition-transform group-hover:translate-x-0.5 group-hover:-translate-y-0.5" />
                </Link>
            </div>

            <!-- Bento Grid -->
            <div class="grid grid-cols-1 md:grid-cols-12 gap-6">
                
                <!-- Main Feature Bento Card (7 cols) -->
                <div v-if="portfolios[0]" class="md:col-span-7 group relative rounded-3xl overflow-hidden aspect-[16/11] md:aspect-auto md:min-h-[460px] border border-brand-dark/15 shadow-md bg-brand-dark">
                    <img 
                        :src="portfolios[0].image" 
                        :alt="portfolios[0].title"
                        class="w-full h-full object-cover object-center transition-transform duration-700 ease-out group-hover:scale-105"
                        loading="lazy"
                    />
                    <div class="absolute inset-0 bg-gradient-to-t from-brand-deep/85 via-black/20 to-transparent"></div>
                    <div class="absolute bottom-8 left-8 right-8 text-white space-y-2">
                        <span class="inline-block px-3 py-1 rounded-full text-[10px] font-bold uppercase tracking-wider bg-brand-sand text-brand-dark">
                            {{ portfolios[0].category }}
                        </span>
                        <h3 class="font-serif text-2xl sm:text-3xl font-bold text-brand-cream">
                            {{ portfolios[0].title }}
                        </h3>
                        <p class="text-xs sm:text-sm text-brand-cream/80 max-w-lg">
                            {{ portfolios[0].description }}
                        </p>
                    </div>
                </div>

                <!-- Secondary Bento Column (5 cols) -->
                <div class="md:col-span-5 flex flex-col gap-6">
                    <div 
                        v-for="(item, idx) in portfolios.slice(1, 3)" 
                        :key="idx"
                        class="group relative rounded-3xl overflow-hidden min-h-[220px] flex-1 border border-brand-dark/15 shadow-sm bg-brand-dark"
                    >
                        <img 
                            :src="item.image" 
                            :alt="item.title"
                            class="w-full h-full object-cover object-center transition-transform duration-700 ease-out group-hover:scale-105"
                            loading="lazy"
                        />
                        <div class="absolute inset-0 bg-gradient-to-t from-brand-deep/85 via-black/20 to-transparent"></div>
                        <div class="absolute bottom-6 left-6 right-6 text-white space-y-1">
                            <span class="inline-block px-2.5 py-0.5 rounded text-[9px] font-bold uppercase tracking-wider bg-brand-sand text-brand-dark">
                                {{ item.category }}
                            </span>
                            <h4 class="font-serif text-lg font-bold text-brand-cream">
                                {{ item.title }}
                            </h4>
                            <p class="text-[11px] text-brand-cream/80 line-clamp-1">
                                {{ item.description }}
                            </p>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </section>
</template>
