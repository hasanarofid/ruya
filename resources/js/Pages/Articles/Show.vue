<script setup>
import { Head, Link } from '@inertiajs/vue3';
import HeaderNavbar from '@/Components/Frontend/HeaderNavbar.vue';
import FooterSection from '@/Components/Frontend/FooterSection.vue';
import FloatingWhatsapp from '@/Components/Frontend/FloatingWhatsapp.vue';
import { ArrowLeft, Clock, Share2 } from 'lucide-vue-next';

defineProps({
    article: {
        type: Object,
        required: true
    }
});
</script>

<template>
    <Head :title="`${article.title} - RÜYA Journal`" />

    <div class="min-h-screen bg-brand-cream text-brand-dark font-sans antialiased">
        <HeaderNavbar />

        <main class="pt-32 pb-24">
            <article class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 space-y-8">
                
                <Link 
                    :href="route('articles.index')" 
                    class="inline-flex items-center gap-2 text-xs font-bold uppercase tracking-wider text-brand-dark hover:text-brand-primary"
                >
                    <ArrowLeft class="w-4 h-4" />
                    <span>Kembali ke Journal</span>
                </Link>

                <div class="space-y-4">
                    <span class="px-3.5 py-1 rounded-full text-xs font-bold uppercase tracking-wider bg-brand-sand text-brand-dark">
                        {{ article.category?.name || 'Journal' }}
                    </span>
                    <h1 class="font-serif text-3xl sm:text-5xl font-bold text-brand-dark leading-tight">
                        {{ article.title }}
                    </h1>
                    <div class="flex items-center gap-4 text-xs text-brand-dark/60 font-medium">
                        <span>{{ article.published_at }}</span>
                        <span>•</span>
                        <span>{{ article.reading_time }} menit baca</span>
                    </div>
                </div>

                <div class="rounded-3xl overflow-hidden shadow-xl aspect-[16/9] bg-brand-dark">
                    <img 
                        :src="article.image_url" 
                        :alt="article.title" 
                        class="w-full h-full object-cover"
                    />
                </div>

                <div class="prose prose-lg max-w-none text-brand-dark/85 font-normal leading-relaxed space-y-6 pt-4">
                    <p class="text-lg leading-relaxed font-serif italic text-brand-dark">
                        {{ article.excerpt || article.content }}
                    </p>
                    <p>
                        Memilih busana modest berkualitas tidak hanya tentang tampilan luarnya, melainkan bagaimana bahan tersebut bersentuhan lembut dengan kulit Anda saat beraktivitas dari pagi hingga malam hari. Kain sutra alami dan ceruty premium membutuhkan perlakuan khusus agar kilaunya tetap terjaga selama bertahun-tahun.
                    </p>
                    <h3 class="font-serif text-2xl font-bold text-brand-dark pt-4">
                        Langkah Perawatan Sederhana di Rumah:
                    </h3>
                    <ul class="list-disc pl-6 space-y-2 text-sm sm:text-base">
                        <li>Cuci menggunakan air dingin dengan deterjen cair khusus sutra atau sampo bayi.</li>
                        <li>Jangan memeras gaun dengan keras; cukup tekan lembut menggunakan handuk bersih.</li>
                        <li>Jemur di tempat teduh tanpa terkena paparan sinar matahari langsung.</li>
                        <li>Gunakan setrika uap atau setrika bertemperatur rendah dengan alas kain katun tipis.</li>
                    </ul>
                </div>

            </article>
        </main>

        <FooterSection />
        <FloatingWhatsapp />
    </div>
</template>
