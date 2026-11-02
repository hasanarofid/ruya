<script setup>
import { Sparkles, Scissors, ShieldCheck, Truck, ArrowRight } from 'lucide-vue-next';

defineProps({
    services: {
        type: Array,
        default: () => []
    },
    whatsappNumber: {
        type: String,
        default: '6281316053870'
    }
});

const getIconComponent = (name) => {
    switch (name) {
        case 'Scissors': return Scissors;
        case 'ShieldCheck': return ShieldCheck;
        case 'Truck': return Truck;
        default: return Sparkles;
    }
};
</script>

<template>
    <section id="services" class="py-24 bg-brand-cream border-t border-brand-dark/10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-16">
            
            <div class="max-w-3xl space-y-3">
                <span class="text-xs font-bold uppercase tracking-widest text-brand-dark">
                    Layanan & Keunggulan Belanja
                </span>
                <h2 class="font-serif text-3xl sm:text-4xl lg:text-5xl font-bold text-brand-dark leading-tight">
                    Pengalaman Berbelanja Busana yang Personal & Eksklusif.
                </h2>
                <p class="text-base text-brand-dark/80">
                    Dari pemilihan warna pashmina hingga fitting ukuran gamis, kami memastikan kepuasan terbaik untuk setiap pelanggan RÜYA.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div 
                    v-for="(svc, idx) in services" 
                    :key="idx"
                    class="p-8 rounded-2xl bg-brand-sand/60 border border-brand-dark/15 hover:bg-brand-sand hover:shadow-lg transition-all duration-300 space-y-4 flex flex-col justify-between"
                >
                    <div class="space-y-4">
                        <div class="w-12 h-12 rounded-xl bg-brand-dark text-brand-sand flex items-center justify-center">
                            <component :is="getIconComponent(svc.icon)" class="w-6 h-6" />
                        </div>
                        <h3 class="font-serif text-xl font-bold text-brand-dark">
                            {{ svc.title }}
                        </h3>
                        <p class="text-xs text-brand-dark/75 leading-relaxed">
                            {{ svc.description }}
                        </p>
                    </div>

                    <a 
                        :href="`https://wa.me/${whatsappNumber}?text=Halo%20R%C3%9CYA,%20saya%20tertarik%20dengan%20layanan%20${encodeURIComponent(svc.title)}.`"
                        target="_blank"
                        class="inline-flex items-center gap-1.5 text-xs font-bold text-brand-dark hover:text-brand-primary group pt-2"
                    >
                        <span>Pelajari</span>
                        <ArrowRight class="w-3.5 h-3.5 transition-transform group-hover:translate-x-1" />
                    </a>
                </div>
            </div>

        </div>
    </section>
</template>
