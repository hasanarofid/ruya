<script setup>
import { Sparkles, Heart, Scissors, ShieldCheck, ArrowRight } from 'lucide-vue-next';

defineProps({
    whatsappNumber: {
        type: String,
        default: '6281316053870'
    }
});
</script>

<template>
    <section id="about" class="py-24 bg-brand-sand/50 relative overflow-hidden border-t border-brand-dark/10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-16 items-center">
                
                <!-- Left Visual Showcase (5 cols) -->
                <div class="lg:col-span-5 relative">
                    <div class="relative rounded-2xl overflow-hidden shadow-xl border border-brand-dark/15 aspect-[4/5] bg-brand-dark">
                        <img 
                            src="/images/products/atelier-craftsmanship.jpg" 
                            alt="Atelier Penjahit RÜYA" 
                            class="w-full h-full object-cover object-center"
                            loading="lazy"
                        />
                        <div class="absolute inset-0 bg-gradient-to-t from-brand-deep/80 via-transparent to-transparent"></div>
                        <div class="absolute bottom-6 left-6 right-6 text-brand-cream">
                            <span class="text-[10px] font-bold uppercase tracking-widest text-brand-sand">Atelier & Studio</span>
                            <h4 class="font-serif text-xl font-bold">Ketelitian Jahitan Tangan Semi-Boutique</h4>
                        </div>
                    </div>

                    <!-- Mini Floating Experience Badge -->
                    <div class="absolute -bottom-6 -right-4 bg-brand-cream p-5 rounded-2xl border border-brand-dark/15 shadow-xl max-w-[200px]">
                        <div class="font-serif text-3xl font-bold text-brand-dark">100%</div>
                        <p class="text-[11px] text-brand-dark/70 font-medium leading-tight mt-1">Kurasi Serat Kain Alami Pilihan</p>
                    </div>
                </div>

                <!-- Right Editorial Philosophy (7 cols) -->
                <div class="lg:col-span-7 space-y-6">
                    <span class="text-xs font-bold uppercase tracking-widest text-brand-dark">
                        Filosofi Kami
                    </span>
                    
                    <h2 class="font-serif text-3xl sm:text-4xl lg:text-5xl font-bold text-brand-dark leading-tight">
                        Mengembalikan Hakikat Keanggunan Muslimah Melalui Kesantunan.
                    </h2>

                    <p class="text-base sm:text-lg text-brand-dark/80 leading-relaxed font-normal">
                        RÜYA lahir dari kerinduan akan busana modest yang tidak hanya memenuhi syariat penutup aurat yang sempurna, melainkan juga menghadirkan kebanggaan estetika layaknya busana adibusana dunia.
                    </p>

                    <p class="text-sm text-brand-dark/75 leading-relaxed">
                        Setiap desain kami melalui riset kenyamanan termal untuk iklim tropis Indonesia—memadukan serat sutra alami, crepe lembut yang tidak mencetak lekuk tubuh, serta jahitan tepi kelim halus yang tidak mudah terurai.
                    </p>

                    <!-- Core Value Pills -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 pt-4">
                        <div class="p-4 rounded-xl bg-brand-cream border border-brand-dark/10 space-y-1.5">
                            <div class="flex items-center gap-2 font-serif font-bold text-brand-dark text-base">
                                <Sparkles class="w-4 h-4 text-brand-dark" />
                                <span>No AI Slop / Otentik</span>
                            </div>
                            <p class="text-xs text-brand-dark/70">Seluruh foto, pola, dan busana difoto dari produk fisik nyata karya tangan perancang kami.</p>
                        </div>

                        <div class="p-4 rounded-xl bg-brand-cream border border-brand-dark/10 space-y-1.5">
                            <div class="flex items-center gap-2 font-serif font-bold text-brand-dark text-base">
                                <Scissors class="w-4 h-4 text-brand-dark" />
                                <span>Bespoke Cutting</span>
                            </div>
                            <p class="text-xs text-brand-dark/70">Potongan gaun tidak ketat, leluasa bergerak, serta wudhu-friendly dengan zipper dan kancing manset.</p>
                        </div>
                    </div>

                    <div class="pt-2">
                        <a 
                            :href="`https://wa.me/${whatsappNumber}?text=Halo%20R%C3%9CYA,%20saya%20ingin%20tahu%20lebih%20banyak%20tentang%20bahan%20kain%20yang%20digunakan.`"
                            target="_blank"
                            class="inline-flex items-center gap-2 text-xs font-bold uppercase tracking-wider text-brand-dark hover:text-brand-primary group transition-colors"
                        >
                            <span>Tanyakan Langsung ke Konsultan Busana</span>
                            <ArrowRight class="w-4 h-4 transition-transform group-hover:translate-x-1" />
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </section>
</template>
