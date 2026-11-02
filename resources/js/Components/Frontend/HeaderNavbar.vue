<script setup>
import { ref, onMounted, onUnmounted } from 'vue';
import { Link } from '@inertiajs/vue3';
import { MessageSquare, Menu, X, ShoppingBag, Sparkles, Heart } from 'lucide-vue-next';

defineProps({
    whatsappNumber: {
        type: String,
        default: '6281316053870'
    },
    brandName: {
        type: String,
        default: 'RÜYA'
    }
});

const isScrolled = ref(false);
const mobileMenuOpen = ref(false);

const checkScroll = () => {
    isScrolled.value = window.scrollY > 30;
};

onMounted(() => {
    window.addEventListener('scroll', checkScroll, { passive: true });
});

onUnmounted(() => {
    window.removeEventListener('scroll', checkScroll);
});
</script>

<template>
    <header 
        class="fixed top-0 left-0 right-0 z-50 transition-all duration-300"
        :class="[
            isScrolled 
                ? 'bg-brand-cream/95 backdrop-blur-md shadow-sm border-b border-brand-dark/10 py-3' 
                : 'bg-brand-cream/80 backdrop-blur-sm py-4'
        ]"
    >
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between">
                
                <!-- Brand Logo & Identity with Official Stamp -->
                <Link :href="route('home')" class="group flex items-center gap-3">
                    <div class="w-12 h-12 rounded-xl bg-brand-sand border border-brand-dark/20 p-1 flex items-center justify-center shadow-sm transition-transform duration-300 group-hover:scale-105">
                        <img 
                            src="/images/ruya-logo.png" 
                            alt="Logo RÜYA" 
                            class="w-full h-full object-contain"
                        />
                    </div>
                    <div class="flex flex-col">
                        <span class="font-serif text-2xl sm:text-3xl font-bold tracking-widest text-brand-dark leading-none group-hover:text-brand-primary transition-colors">
                            RÜYA
                        </span>
                        <span class="text-[9px] sm:text-[10px] tracking-[0.25em] uppercase font-medium text-brand-dark/70 mt-1">
                            Haute Modest Wear
                        </span>
                    </div>
                </Link>

                <!-- Desktop Navigation Menu -->
                <nav class="hidden md:flex items-center gap-8">
                    <Link 
                        :href="route('home')" 
                        class="text-sm font-medium text-brand-dark hover:text-brand-primary transition-colors relative py-1 after:absolute after:bottom-0 after:left-0 after:w-0 hover:after:w-full after:h-0.5 after:bg-brand-primary after:transition-all"
                    >
                        Beranda
                    </Link>
                    <Link 
                        :href="route('products.index')" 
                        class="text-sm font-medium text-brand-dark hover:text-brand-primary transition-colors py-1 flex items-center gap-1"
                    >
                        <span>Koleksi Busana</span>
                        <span class="px-1.5 py-0.2 rounded-full text-[10px] font-bold bg-brand-sand text-brand-dark">New</span>
                    </Link>
                    <a 
                        href="#about" 
                        class="text-sm font-medium text-brand-dark hover:text-brand-primary transition-colors py-1"
                    >
                        Filosofi
                    </a>
                    <Link 
                        :href="route('portfolios.index')" 
                        class="text-sm font-medium text-brand-dark hover:text-brand-primary transition-colors py-1"
                    >
                        Lookbook
                    </Link>
                    <Link 
                        :href="route('articles.index')" 
                        class="text-sm font-medium text-brand-dark hover:text-brand-primary transition-colors py-1"
                    >
                        Journal
                    </Link>
                    <Link 
                        :href="route('contact.index')" 
                        class="text-sm font-medium text-brand-dark hover:text-brand-primary transition-colors py-1"
                    >
                        Butik & Kontak
                    </Link>
                </nav>

                <!-- Action Button Desktop -->
                <div class="hidden lg:flex items-center gap-4">
                    <a 
                        :href="`https://wa.me/${whatsappNumber}?text=Halo%20R%C3%9CYA,%20saya%20ingin%20berkonsultasi%20mengenai%20koleksi%20busana%20terbaru.`"
                        target="_blank"
                        class="group relative inline-flex items-center gap-2.5 px-5 py-2.5 rounded-full bg-brand-dark text-brand-cream hover:bg-brand-primary transition-all duration-300 shadow-md hover:shadow-lg font-medium text-xs tracking-wide"
                    >
                        <MessageSquare class="w-4 h-4 text-brand-sand transition-transform group-hover:scale-110" />
                        <span>Personal Shopper</span>
                    </a>
                </div>

                <!-- Mobile Action & Hamburger -->
                <div class="flex items-center gap-2 md:hidden">
                    <a 
                        :href="`https://wa.me/${whatsappNumber}?text=Halo%20R%C3%9CYA,%20saya%20tertarik%20dengan%20koleksi%20busana%20Anda.`"
                        target="_blank"
                        class="p-2 rounded-lg bg-brand-dark text-brand-cream font-bold text-xs"
                    >
                        <MessageSquare class="w-4 h-4" />
                    </a>
                    <button 
                        @click="mobileMenuOpen = !mobileMenuOpen"
                        type="button" 
                        class="p-2 rounded-lg text-brand-dark hover:bg-brand-sand transition-colors"
                        aria-label="Toggle Navigation"
                    >
                        <Menu v-if="!mobileMenuOpen" class="w-6 h-6" />
                        <X v-else class="w-6 h-6" />
                    </button>
                </div>
            </div>

            <!-- Mobile Drawer -->
            <transition
                enter-active-class="transition duration-200 ease-out"
                enter-from-class="opacity-0 -translate-y-2"
                enter-to-class="opacity-100 translate-y-0"
                leave-active-class="transition duration-150 ease-in"
                leave-from-class="opacity-100 translate-y-0"
                leave-to-class="opacity-0 -translate-y-2"
            >
                <div 
                    v-if="mobileMenuOpen" 
                    class="md:hidden mt-4 pt-4 pb-6 border-t border-brand-dark/10 bg-brand-sand/95 backdrop-blur-md rounded-2xl p-5 shadow-xl space-y-4"
                >
                    <nav class="flex flex-col space-y-3">
                        <Link 
                            :href="route('home')" 
                            @click="mobileMenuOpen = false"
                            class="text-base font-medium text-brand-dark hover:text-brand-primary px-2 py-1.5 rounded-md"
                        >
                            Beranda
                        </Link>
                        <Link 
                            :href="route('products.index')" 
                            @click="mobileMenuOpen = false"
                            class="text-base font-medium text-brand-dark hover:text-brand-primary px-2 py-1.5 rounded-md flex items-center justify-between"
                        >
                            <span>Koleksi Busana</span>
                            <span class="text-xs px-2 py-0.5 rounded-full bg-brand-dark text-brand-cream">Katalog</span>
                        </Link>
                        <a 
                            href="#about" 
                            @click="mobileMenuOpen = false"
                            class="text-base font-medium text-brand-dark hover:text-brand-primary px-2 py-1.5 rounded-md"
                        >
                            Filosofi & Kain
                        </a>
                        <Link 
                            :href="route('portfolios.index')" 
                            @click="mobileMenuOpen = false"
                            class="text-base font-medium text-brand-dark hover:text-brand-primary px-2 py-1.5 rounded-md"
                        >
                            Lookbook & Gaya
                        </Link>
                        <Link 
                            :href="route('articles.index')" 
                            @click="mobileMenuOpen = false"
                            class="text-base font-medium text-brand-dark hover:text-brand-primary px-2 py-1.5 rounded-md"
                        >
                            Journal & Tips
                        </Link>
                        <Link 
                            :href="route('contact.index')" 
                            @click="mobileMenuOpen = false"
                            class="text-base font-medium text-brand-dark hover:text-brand-primary px-2 py-1.5 rounded-md"
                        >
                            Butik & Konsultasi
                        </Link>
                    </nav>

                    <div class="pt-2 border-t border-brand-dark/10">
                        <a 
                            :href="`https://wa.me/${whatsappNumber}?text=Halo%20R%C3%9CYA,%20saya%20ingin%20konsultasi%20busana%20modest.`"
                            target="_blank"
                            class="w-full flex items-center justify-center gap-2 py-3 px-4 rounded-xl bg-brand-dark text-brand-cream font-medium text-sm shadow-md"
                        >
                            <MessageSquare class="w-4 h-4 text-brand-sand" />
                            <span>Pesan via WhatsApp Personal Shopper</span>
                        </a>
                    </div>
                </div>
            </transition>
        </div>
    </header>
</template>
