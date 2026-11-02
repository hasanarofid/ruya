<script setup>
import { onMounted, ref } from 'vue';
import { Link } from '@inertiajs/vue3';
import { MessageSquare, ArrowRight, Sparkles, ShieldCheck, Heart, CheckCircle2 } from 'lucide-vue-next';

defineProps({
    whatsappNumber: {
        type: String,
        default: '6281316053870'
    }
});

const heroRef = ref(null);
</script>

<template>
    <section ref="heroRef" class="relative pt-32 pb-20 md:pt-40 md:pb-28 overflow-hidden bg-brand-cream">
        
        <!-- Subtle Fabric Weave & Pattern Background -->
        <div class="absolute inset-0 pointer-events-none opacity-25">
            <svg class="w-full h-full" xmlns="http://www.w3.org/2000/svg">
                <defs>
                    <pattern id="silk-grid" width="60" height="60" patternUnits="userSpaceOnUse">
                        <circle cx="30" cy="30" r="0.75" fill="#530A1E" />
                        <path d="M 0 30 Q 30 35 60 30" fill="none" stroke="#530A1E" stroke-width="0.3" stroke-dasharray="2,4" />
                    </pattern>
                </defs>
                <rect width="100%" height="100%" fill="url(#silk-grid)" />
            </svg>
        </div>

        <!-- Ambient Warm Glows -->
        <div class="absolute -top-24 right-10 w-96 h-96 bg-brand-sand rounded-full blur-3xl opacity-60 pointer-events-none"></div>
        <div class="absolute bottom-0 -left-20 w-80 h-80 bg-brand-blush/40 rounded-full blur-2xl pointer-events-none"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-8 items-center">
                
                <!-- Left Content Column (7 cols) -->
                <div class="lg:col-span-7 space-y-6 sm:space-y-8">
                    
                    <!-- Eyebrow Badge -->
                    <div class="inline-flex items-center gap-2.5 px-4 py-1.5 rounded-full bg-brand-sand border border-brand-dark/15 shadow-sm">
                        <span class="w-2 h-2 rounded-full bg-brand-dark animate-pulse"></span>
                        <span class="text-xs sm:text-sm font-semibold tracking-wider text-brand-dark uppercase">
                            Haute Modest Wear & Luxury Abaya
                        </span>
                    </div>

                    <!-- Hero Serif Heading -->
                    <h1 class="font-serif text-4xl sm:text-5xl md:text-6xl font-bold text-brand-dark leading-[1.12] tracking-tight">
                        Kemewahan Busana <br class="hidden sm:inline" />
                        <span class="italic font-normal text-brand-light">Modest</span> dalam Setiap Helaian Mimpi.
                    </h1>

                    <!-- Editorial Subtitle -->
                    <p class="text-base sm:text-lg md:text-xl text-brand-dark/80 font-normal leading-relaxed max-w-2xl">
                        Koleksi abaya, gaun santun, dan hijab sutra yang dirancang dengan presisi potongan semi-boutique, siluet syar'i berkelas, serta material serat alam murni yang sejuk dan jatuh anggun.
                    </p>

                    <!-- Key Selling Points Badges -->
                    <div class="flex flex-wrap items-center gap-y-2 gap-x-6 text-xs sm:text-sm text-brand-dark/90 font-medium pt-1">
                        <div class="flex items-center gap-2">
                            <CheckCircle2 class="w-4 h-4 text-brand-dark flex-shrink-0" />
                            <span>100% Non-Sheer & Syar'i Silhouette</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <CheckCircle2 class="w-4 h-4 text-brand-dark flex-shrink-0" />
                            <span>Mulberry Silk & Breathable Voile</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <CheckCircle2 class="w-4 h-4 text-brand-dark flex-shrink-0" />
                            <span>Custom Sizing & Hemming</span>
                        </div>
                    </div>

                    <!-- CTA Buttons -->
                    <div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-4 pt-2">
                        <Link 
                            :href="route('products.index')" 
                            class="inline-flex items-center justify-center gap-3 px-8 py-4 rounded-full bg-brand-dark text-brand-cream hover:bg-brand-primary transition-all duration-300 font-semibold text-sm tracking-wide shadow-md hover:shadow-xl group"
                        >
                            <span>Eksplorasi Koleksi</span>
                            <ArrowRight class="w-4 h-4 transition-transform group-hover:translate-x-1" />
                        </Link>

                        <a 
                            :href="`https://wa.me/${whatsappNumber}?text=Halo%20R%C3%9CYA,%20saya%20tertarik%20dengan%20koleksi%20Soleil%20Pastel%20Abaya%20Set.`" 
                            target="_blank"
                            class="inline-flex items-center justify-center gap-3 px-8 py-4 rounded-full bg-brand-sand text-brand-dark border border-brand-dark/20 hover:bg-brand-blush transition-all duration-300 font-semibold text-sm tracking-wide"
                        >
                            <MessageSquare class="w-4 h-4 text-brand-dark" />
                            <span>Pesan via WhatsApp</span>
                        </a>
                    </div>

                    <!-- Trust Stats Bar -->
                    <div class="pt-6 sm:pt-8 border-t border-brand-dark/10 grid grid-cols-3 gap-4 sm:gap-8">
                        <div>
                            <div class="font-serif text-2xl sm:text-3xl font-bold text-brand-dark">100%</div>
                            <div class="text-[11px] sm:text-xs text-brand-dark/70 uppercase tracking-wider font-medium">Bahan Sutra Alami</div>
                        </div>
                        <div>
                            <div class="font-serif text-2xl sm:text-3xl font-bold text-brand-dark">1.200+</div>
                            <div class="text-[11px] sm:text-xs text-brand-dark/70 uppercase tracking-wider font-medium">Koleksi Terkirim</div>
                        </div>
                        <div>
                            <div class="font-serif text-2xl sm:text-3xl font-bold text-brand-dark">4.9/5</div>
                            <div class="text-[11px] sm:text-xs text-brand-dark/70 uppercase tracking-wider font-medium">Rating Kepuasan</div>
                        </div>
                    </div>

                </div>

                <!-- Right Overlapping Visual Composition (5 cols) -->
                <div class="lg:col-span-5 relative mt-6 lg:mt-0">
                    
                    <!-- Decorative Soft Blush Backdrop Frame -->
                    <div class="absolute -inset-4 sm:-inset-6 bg-brand-sand/90 rounded-3xl -rotate-1 border border-brand-dark/15 shadow-fashion pointer-events-none"></div>

                    <!-- Main Hero Visual Card (Real Photo from User Uploaded Shoot) -->
                    <div class="relative rounded-2xl overflow-hidden shadow-2xl border border-brand-dark/15 bg-brand-dark group">
                        <img 
                            src="/images/hero-model.jpg" 
                            alt="Rüya Soleil Pastel Abaya Signature Collection" 
                            class="w-full h-[460px] sm:h-[540px] object-cover object-center transition-transform duration-700 ease-out group-hover:scale-105"
                            loading="eager"
                        />
                        <div class="absolute inset-0 bg-gradient-to-t from-brand-deep/80 via-transparent to-black/20 pointer-events-none"></div>
                        
                        <!-- Caption on Photo -->
                        <div class="absolute bottom-6 left-6 right-6 text-white space-y-1">
                            <span class="inline-block px-2.5 py-0.5 rounded text-[10px] font-bold uppercase tracking-wider bg-brand-sand text-brand-dark">
                                Signature Look 2026
                            </span>
                            <h3 class="font-serif text-lg sm:text-xl font-bold text-brand-cream">
                                Soleil Pastel Abaya & Golden Cuff Ring
                            </h3>
                            <p class="text-xs text-brand-cream/80">
                                Koleksi Eksklusif RÜYA • Dibuat Terbatas
                            </p>
                        </div>
                    </div>

                    <!-- Overlapping Floating Card 1: Top Right Material Spec -->
                    <div class="absolute -top-6 -right-3 sm:-right-8 bg-brand-cream/95 backdrop-blur-md rounded-xl p-4 border border-brand-dark/15 shadow-xl max-w-[210px] hidden sm:block">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-lg bg-brand-dark text-brand-sand flex items-center justify-center">
                                <Sparkles class="w-5 h-5" />
                            </div>
                            <div>
                                <div class="text-xs font-bold text-brand-dark">Gold Button Ring</div>
                                <div class="text-[10px] text-brand-dark/70">Aksen Manset Mewah</div>
                            </div>
                        </div>
                    </div>

                    <!-- Overlapping Floating Card 2: Bottom Left Quality Assurance -->
                    <div class="absolute -bottom-8 -left-3 sm:-left-8 bg-brand-sand/95 backdrop-blur-md rounded-xl p-4 border border-brand-dark/15 shadow-2xl max-w-[240px] transform hover:scale-105 transition-transform">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-lg bg-brand-dark text-brand-cream flex items-center justify-center">
                                <Heart class="w-5 h-5 text-brand-blush" />
                            </div>
                            <div>
                                <div class="text-xs font-bold text-brand-dark">Jahitan Halus Butik</div>
                                <div class="text-[10px] text-brand-dark/80">Kenyamanan Seharian</div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </section>
</template>
