<script setup>
import { Quote } from 'lucide-vue-next';

defineProps({
    testimonials: {
        type: Array,
        default: () => []
    }
});
</script>

<template>
    <section class="py-24 bg-brand-cream border-t border-brand-dark/10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-16">
            
            <div class="text-center max-w-2xl mx-auto space-y-3">
                <span class="text-xs font-bold uppercase tracking-widest text-brand-dark">
                    Kata Pelanggan Setia
                </span>
                <h2 class="font-serif text-3xl sm:text-4xl lg:text-5xl font-bold text-brand-dark leading-tight">
                    Kepercayaan dalam Setiap Penampilan.
                </h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div 
                    v-for="(testi, idx) in testimonials" 
                    :key="idx"
                    class="p-8 rounded-3xl bg-brand-sand/50 border border-brand-dark/15 shadow-sm space-y-6 flex flex-col justify-between"
                >
                    <div class="space-y-4">
                        <Quote class="w-8 h-8 text-brand-dark/40" />
                        <p class="text-sm text-brand-dark/85 italic leading-relaxed">
                            "{{ testi.quote }}"
                        </p>
                    </div>

                    <div class="flex items-center gap-4 pt-4 border-t border-brand-dark/10">
                        <img 
                            :src="testi.avatar" 
                            :alt="testi.author" 
                            class="w-12 h-12 rounded-full object-cover border border-brand-dark/20"
                        />
                        <div>
                            <div class="font-serif font-bold text-brand-dark text-sm">{{ testi.author }}</div>
                            <div class="text-xs text-brand-dark/70">{{ testi.role }}</div>
                            <div class="text-[10px] text-brand-light font-semibold mt-0.5">{{ testi.project }}</div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
</template>
