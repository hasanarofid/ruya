<script setup>
import { Link } from '@inertiajs/vue3';
import { MessageSquare, Mail, MapPin, Instagram, Heart } from 'lucide-vue-next';

defineProps({
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
</script>

<template>
    <footer class="bg-brand-deep text-brand-cream border-t border-brand-dark">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 sm:py-20">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-12 gap-12 lg:gap-8">
                
                <!-- Brand Info (5 cols) -->
                <div class="lg:col-span-5 space-y-6">
                    <div class="flex items-center gap-3">
                        <div class="w-12 h-12 rounded-xl bg-brand-sand p-1 border border-brand-cream/20 flex items-center justify-center">
                            <img src="/images/ruya-logo.png" alt="RÜYA Logo" class="w-full h-full object-contain" />
                        </div>
                        <div>
                            <span class="font-serif text-3xl font-bold tracking-widest text-brand-cream">
                                RÜYA
                            </span>
                            <div class="text-[10px] tracking-[0.2em] uppercase text-brand-sand/80 font-medium">
                                Haute Modest Wear
                            </div>
                        </div>
                    </div>

                    <p class="text-xs sm:text-sm text-brand-cream/80 max-w-sm leading-relaxed">
                        Merek busana santun modern Indonesia yang memadukan filosofi keanggunan, bahan serat alam premium, dan potongan syar'i tanpa kompromi estetika.
                    </p>

                    <div class="text-xs text-brand-sand/70 space-y-1">
                        <div>Host Demo: <a href="https://demo.hasanarofid.site" class="text-brand-sand underline hover:text-white">demo.hasanarofid.site</a></div>
                        <div>WhatsApp Order: {{ contactInfo.phone }}</div>
                    </div>
                </div>

                <!-- Nav Links (2 cols) -->
                <div class="lg:col-span-2 space-y-4">
                    <h4 class="font-serif text-sm font-bold tracking-wider uppercase text-brand-sand">Koleksi</h4>
                    <ul class="space-y-2.5 text-xs text-brand-cream/80">
                        <li><Link :href="route('products.index', { kategori: 'signature-abaya' })" class="hover:text-white transition-colors">Signature Abaya</Link></li>
                        <li><Link :href="route('products.index', { kategori: 'silk-voile-hijab' })" class="hover:text-white transition-colors">Silk & Voile Hijab</Link></li>
                        <li><Link :href="route('products.index', { kategori: 'ethereal-dresses' })" class="hover:text-white transition-colors">Ethereal Dresses</Link></li>
                        <li><Link :href="route('products.index', { kategori: 'luxe-outerwear' })" class="hover:text-white transition-colors">Luxe Outerwear</Link></li>
                        <li><Link :href="route('portfolios.index')" class="hover:text-white transition-colors">Lookbook 2026</Link></li>
                    </ul>
                </div>

                <!-- Company (2 cols) -->
                <div class="lg:col-span-2 space-y-4">
                    <h4 class="font-serif text-sm font-bold tracking-wider uppercase text-brand-sand">Eksplorasi</h4>
                    <ul class="space-y-2.5 text-xs text-brand-cream/80">
                        <li><Link :href="route('home')" class="hover:text-white transition-colors">Beranda</Link></li>
                        <li><a href="#about" class="hover:text-white transition-colors">Filosofi Busana</a></li>
                        <li><Link :href="route('articles.index')" class="hover:text-white transition-colors">Journal & Styling</Link></li>
                        <li><Link :href="route('contact.index')" class="hover:text-white transition-colors">Butik & Layanan</Link></li>
                        <li><a href="/deploy.php" class="hover:text-brand-sand transition-colors font-mono text-[11px]">System Deployer</a></li>
                    </ul>
                </div>

                <!-- Contact Info (3 cols) -->
                <div class="lg:col-span-3 space-y-4">
                    <h4 class="font-serif text-sm font-bold tracking-wider uppercase text-brand-sand">Butik & Kontak</h4>
                    <div class="space-y-3 text-xs text-brand-cream/80">
                        <div class="flex items-start gap-2.5">
                            <MapPin class="w-4 h-4 text-brand-sand flex-shrink-0 mt-0.5" />
                            <span>{{ contactInfo.workshop_address }}</span>
                        </div>
                        <div class="flex items-center gap-2.5">
                            <MessageSquare class="w-4 h-4 text-brand-sand flex-shrink-0" />
                            <a :href="`https://wa.me/${contactInfo.whatsapp_number}`" target="_blank" class="hover:underline">
                                {{ contactInfo.phone }}
                            </a>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Bottom Copyright -->
            <div class="mt-16 pt-8 border-t border-brand-sand/15 flex flex-col sm:flex-row items-center justify-between gap-4 text-xs text-brand-cream/60">
                <p>© 2026 RÜYA Modest Fashion. Seluruh Hak Cipta Dilindungi.</p>
                <div class="flex items-center gap-1 text-[11px]">
                    <span>Dibuat dengan rasa cinta & estetika modest</span>
                    <Heart class="w-3.5 h-3.5 text-brand-sand" />
                </div>
            </div>
        </div>
    </footer>
</template>
