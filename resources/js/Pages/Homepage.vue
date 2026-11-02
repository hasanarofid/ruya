<script setup>
import { Head } from '@inertiajs/vue3';
import { onMounted } from 'vue';
import gsap from 'gsap';

// Modular Frontend Components
import HeaderNavbar from '@/Components/Frontend/HeaderNavbar.vue';
import HeroSection from '@/Components/Frontend/HeroSection.vue';
import AboutSection from '@/Components/Frontend/AboutSection.vue';
import ServicesSection from '@/Components/Frontend/ServicesSection.vue';
import FeaturedCatalogSection from '@/Components/Frontend/FeaturedCatalogSection.vue';
import PortfolioBentoSection from '@/Components/Frontend/PortfolioBentoSection.vue';
import TestimonialsSection from '@/Components/Frontend/TestimonialsSection.vue';
import ArticlePreviewSection from '@/Components/Frontend/ArticlePreviewSection.vue';
import ConsultationCtaSection from '@/Components/Frontend/ConsultationCtaSection.vue';
import FooterSection from '@/Components/Frontend/FooterSection.vue';
import FloatingWhatsapp from '@/Components/Frontend/FloatingWhatsapp.vue';

const props = defineProps({
    categories: {
        type: Array,
        default: () => []
    },
    featuredProducts: {
        type: Array,
        default: () => []
    },
    portfolios: {
        type: Array,
        default: () => []
    },
    services: {
        type: Array,
        default: () => []
    },
    testimonials: {
        type: Array,
        default: () => []
    },
    articles: {
        type: Array,
        default: () => []
    },
    contactInfo: {
        type: Object,
        default: () => ({
            brand_name: 'RÜYA',
            phone: '+62 813-1605-3870',
            whatsapp_number: '6281316053870',
            workshop_address: 'RÜYA Boutique Studio, Jalan Kemang Raya No. 42B, Jakarta Selatan',
            maps_url: 'https://demo.hasanarofid.site',
            working_hours: 'Senin - Sabtu: 09.00 - 20.00 WIB'
        })
    }
});

onMounted(() => {
    // Subtle reveal animation using GSAP
    gsap.from('main > section', {
        opacity: 0,
        y: 20,
        duration: 0.8,
        stagger: 0.12,
        ease: 'power2.out'
    });
});
</script>

<template>
    <Head>
        <title>RÜYA — Haute Modest Fashion & Signature Abaya Couture</title>
        <meta name="description" content="Koleksi busana modest muslimah kontemporer: Abaya sutra, gaun pesta syar'i, outer drapery, dan pashmina voal kualitas boutique internasional." />
        <meta property="og:title" content="RÜYA — Haute Modest Fashion & Signature Abaya Couture" />
        <meta property="og:description" content="Kemewahan busana modest dalam setiap helaian mimpi. Bahan sutra alami, cutting nyaman, dan tidak menerawang." />
    </Head>

    <div class="min-h-screen bg-brand-cream text-brand-dark font-sans selection:bg-brand-sand selection:text-brand-dark antialiased">
        
        <!-- Luxury Sticky Navbar -->
        <HeaderNavbar 
            :whatsapp-number="contactInfo.whatsapp_number" 
            :brand-name="contactInfo.brand_name" 
        />

        <main>
            <!-- 1. Asymmetrical Editorial Hero Section -->
            <HeroSection 
                :whatsapp-number="contactInfo.whatsapp_number" 
            />

            <!-- 2. About Section (Filosofi & Serat Kain Alami) -->
            <AboutSection 
                :whatsapp-number="contactInfo.whatsapp_number" 
            />

            <!-- 3. Services Section (Keunggulan & Layanan Butik) -->
            <ServicesSection 
                :services="services" 
                :whatsapp-number="contactInfo.whatsapp_number" 
            />

            <!-- 4. Featured Catalog Section (Preview Koleksi & Pakaian Unggulan) -->
            <FeaturedCatalogSection 
                :categories="categories" 
                :featured-products="featuredProducts" 
                :whatsapp-number="contactInfo.whatsapp_number" 
            />

            <!-- 5. Portfolio Bento Section (Lookbook & Inspirasi Styling) -->
            <PortfolioBentoSection 
                :portfolios="portfolios" 
                :whatsapp-number="contactInfo.whatsapp_number" 
            />

            <!-- 6. Testimonials Section (Social Proof & Ulasan Pembeli) -->
            <TestimonialsSection 
                :testimonials="testimonials" 
            />

            <!-- 7. Article Preview Section (Journal & Tips Hijab) -->
            <ArticlePreviewSection 
                :articles="articles" 
            />

            <!-- 8. Consultation CTA & Personal Shopper Form -->
            <ConsultationCtaSection 
                :whatsapp-number="contactInfo.whatsapp_number" 
            />
        </main>

        <!-- Deep Burgundy Footer -->
        <FooterSection 
            :contact-info="contactInfo" 
        />

        <!-- Floating WhatsApp Stylist Pill -->
        <FloatingWhatsapp 
            :whatsapp-number="contactInfo.whatsapp_number" 
        />

    </div>
</template>
