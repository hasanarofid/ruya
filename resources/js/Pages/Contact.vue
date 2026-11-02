<script setup>
import { Head, Link } from '@inertiajs/vue3';
import { ref } from 'vue';
import HeaderNavbar from '@/Components/Frontend/HeaderNavbar.vue';
import FooterSection from '@/Components/Frontend/FooterSection.vue';
import FloatingWhatsapp from '@/Components/Frontend/FloatingWhatsapp.vue';
import { MapPin, Phone, Mail, Clock, MessageSquare, Sparkles } from 'lucide-vue-next';

const props = defineProps({
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

const name = ref('');
const email = ref('');
const message = ref('');

const sendMessage = () => {
    const text = `Halo RÜYA Concierge,\nNama: ${name.value}\nEmail: ${email.value}\nPesan: ${message.value}`;
    window.open(`https://wa.me/${props.contactInfo.whatsapp_number}?text=${encodeURIComponent(text)}`, '_blank');
};
</script>

<template>
    <Head title="Butik & Layanan Konsultasi - RÜYA" />

    <div class="min-h-screen bg-brand-cream text-brand-dark font-sans antialiased">
        <HeaderNavbar />

        <main class="pt-32 pb-24">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-16">
                
                <div class="max-w-3xl space-y-3">
                    <span class="text-xs font-bold uppercase tracking-widest text-brand-dark">
                        Butik & Konsultasi Busana
                    </span>
                    <h1 class="font-serif text-4xl sm:text-5xl font-bold text-brand-dark leading-tight">
                        Kunjungi Studio Kami atau Hubungi Personal Shopper.
                    </h1>
                    <p class="text-base text-brand-dark/80">
                        Kami siap mendengarkan preferensi busana Anda, memberikan saran ukuran jahit, dan memastikan pengalaman berbelanja terbaik.
                    </p>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-start">
                    
                    <!-- Contact Cards (5 cols) -->
                    <div class="lg:col-span-5 space-y-6">
                        <div class="p-8 rounded-3xl bg-brand-sand/60 border border-brand-dark/15 space-y-6 shadow-sm">
                            <h3 class="font-serif text-xl font-bold text-brand-dark">Studio & Jam Operasional</h3>
                            
                            <div class="space-y-4 text-xs text-brand-dark/80">
                                <div class="flex items-start gap-3">
                                    <MapPin class="w-5 h-5 text-brand-dark flex-shrink-0 mt-0.5" />
                                    <div>
                                        <div class="font-bold text-brand-dark">Alamat Butik:</div>
                                        <div>{{ contactInfo.workshop_address }}</div>
                                    </div>
                                </div>

                                <div class="flex items-start gap-3">
                                    <Clock class="w-5 h-5 text-brand-dark flex-shrink-0 mt-0.5" />
                                    <div>
                                        <div class="font-bold text-brand-dark">Jam Operasional:</div>
                                        <div>{{ contactInfo.working_hours }}</div>
                                    </div>
                                </div>

                                <div class="flex items-start gap-3">
                                    <Phone class="w-5 h-5 text-brand-dark flex-shrink-0 mt-0.5" />
                                    <div>
                                        <div class="font-bold text-brand-dark">WhatsApp Personal Shopper:</div>
                                        <div>{{ contactInfo.phone }}</div>
                                    </div>
                                </div>

                                <div class="flex items-start gap-3">
                                    <Sparkles class="w-5 h-5 text-brand-dark flex-shrink-0 mt-0.5" />
                                    <div>
                                        <div class="font-bold text-brand-dark">Domain Demo:</div>
                                        <div><a href="https://demo.hasanarofid.site" class="underline">demo.hasanarofid.site</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <a 
                            :href="`https://wa.me/${contactInfo.whatsapp_number}?text=Halo%20R%C3%9CYA,%20saya%20ingin%20berkunjung%20ke%20butik.`" 
                            target="_blank"
                            class="w-full inline-flex items-center justify-center gap-3 py-4 px-6 rounded-2xl bg-brand-dark hover:bg-brand-primary text-brand-cream font-medium text-xs tracking-wider transition-colors shadow-md"
                        >
                            <MessageSquare class="w-4 h-4 text-brand-sand" />
                            <span>Janji Temu via WhatsApp</span>
                        </a>
                    </div>

                    <!-- Direct Form (7 cols) -->
                    <div class="lg:col-span-7 p-8 sm:p-10 rounded-3xl bg-brand-cream border border-brand-dark/15 shadow-xl space-y-6">
                        <h3 class="font-serif text-2xl font-bold text-brand-dark">Kirimkan Pertanyaan</h3>
                        
                        <form @submit.prevent="sendMessage" class="space-y-4">
                            <div>
                                <label class="block text-xs font-bold text-brand-dark uppercase tracking-wider mb-1.5">Nama Anda</label>
                                <input 
                                    v-model="name"
                                    type="text" 
                                    required 
                                    placeholder="Nama Lengkap" 
                                    class="w-full px-4 py-3 rounded-xl bg-brand-sand/30 border border-brand-dark/20 text-xs text-brand-dark focus:ring-2 focus:ring-brand-dark outline-none"
                                />
                            </div>

                            <div>
                                <label class="block text-xs font-bold text-brand-dark uppercase tracking-wider mb-1.5">Email / No. HP</label>
                                <input 
                                    v-model="email"
                                    type="text" 
                                    required 
                                    placeholder="email@example.com atau 0812..." 
                                    class="w-full px-4 py-3 rounded-xl bg-brand-sand/30 border border-brand-dark/20 text-xs text-brand-dark focus:ring-2 focus:ring-brand-dark outline-none"
                                />
                            </div>

                            <div>
                                <label class="block text-xs font-bold text-brand-dark uppercase tracking-wider mb-1.5">Pesan Anda</label>
                                <textarea 
                                    v-model="message"
                                    rows="4" 
                                    required 
                                    placeholder="Tuliskan pesan atau pertanyaan seputar koleksi busana kami..." 
                                    class="w-full px-4 py-3 rounded-xl bg-brand-sand/30 border border-brand-dark/20 text-xs text-brand-dark focus:ring-2 focus:ring-brand-dark outline-none resize-none"
                                ></textarea>
                            </div>

                            <button 
                                type="submit"
                                class="w-full py-4 px-6 rounded-xl bg-brand-dark hover:bg-brand-primary text-brand-cream font-medium text-xs tracking-wider transition-colors shadow-md flex items-center justify-center gap-2"
                            >
                                <MessageSquare class="w-4 h-4 text-brand-sand" />
                                <span>Teruskan Pesan ke WhatsApp Butik</span>
                            </button>
                        </form>
                    </div>

                </div>

            </div>
        </main>

        <FooterSection />
        <FloatingWhatsapp />
    </div>
</template>
