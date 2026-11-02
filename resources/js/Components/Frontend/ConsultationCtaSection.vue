<script setup>
import { MessageSquare, Sparkles, Send } from 'lucide-vue-next';
import { ref } from 'vue';

const props = defineProps({
    whatsappNumber: {
        type: String,
        default: '6281316053870'
    }
});

const name = ref('');
const inquiryType = ref('Abaya & Dress');
const note = ref('');

const submitToWhatsApp = () => {
    const text = `Halo RÜYA Concierge,\n\nNama: ${name.value || 'Pelanggan RÜYA'}\nKategori Busana: ${inquiryType.value}\nCatatan: ${note.value || 'Ingin konsultasi katalog busana terbaru'}\n\nMohon info ketersediaan stok & ukuran. Terima kasih!`;
    const url = `https://wa.me/${props.whatsappNumber}?text=${encodeURIComponent(text)}`;
    window.open(url, '_blank');
};
</script>

<template>
    <section class="py-24 bg-brand-sand/50 border-t border-brand-dark/10">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-brand-cream rounded-3xl p-8 sm:p-12 lg:p-16 border border-brand-dark/15 shadow-xl grid grid-cols-1 lg:grid-cols-12 gap-10 items-center">
                
                <div class="lg:col-span-6 space-y-4 text-center lg:text-left">
                    <div class="inline-flex items-center gap-2 px-3.5 py-1 rounded-full bg-brand-sand text-brand-dark text-xs font-semibold">
                        <Sparkles class="w-3.5 h-3.5" />
                        <span>RÜYA Private Concierge</span>
                    </div>

                    <h2 class="font-serif text-3xl sm:text-4xl font-bold text-brand-dark leading-tight">
                        Konsultasi Busana & Pemesanan Khusus
                    </h2>

                    <p class="text-sm text-brand-dark/80 leading-relaxed">
                        Bingung menentukan ukuran, warna hijab yang cocok dengan tone kulit, atau ingin jahit custom untuk acara spesial? Tim Personal Stylist kami siap mendampingi Anda via WhatsApp.
                    </p>
                </div>

                <div class="lg:col-span-6">
                    <form @submit.prevent="submitToWhatsApp" class="space-y-4 bg-brand-sand/40 p-6 rounded-2xl border border-brand-dark/10">
                        <div>
                            <label class="block text-xs font-bold text-brand-dark uppercase tracking-wider mb-1.5">Nama Lengkap</label>
                            <input 
                                v-model="name"
                                type="text" 
                                placeholder="Contoh: Alya Nadira"
                                required
                                class="w-full px-4 py-3 rounded-xl bg-brand-cream border border-brand-dark/20 text-xs text-brand-dark focus:ring-2 focus:ring-brand-dark outline-none"
                            />
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-brand-dark uppercase tracking-wider mb-1.5">Kategori Pilihan</label>
                            <select 
                                v-model="inquiryType"
                                class="w-full px-4 py-3 rounded-xl bg-brand-cream border border-brand-dark/20 text-xs text-brand-dark focus:ring-2 focus:ring-brand-dark outline-none"
                            >
                                <option value="Signature Abaya">Signature Abaya</option>
                                <option value="Silk & Voile Hijab">Silk & Voile Hijab</option>
                                <option value="Ethereal Dresses">Ethereal Dresses</option>
                                <option value="Luxe Outerwear">Luxe Outerwear</option>
                                <option value="Custom Size S/M/L/XL">Jahit Custom Size (Bespoke)</option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-brand-dark uppercase tracking-wider mb-1.5">Catatan Tambahan (Opsional)</label>
                            <textarea 
                                v-model="note"
                                rows="3"
                                placeholder="Sebutkan detail ukuran atau warna yang Anda cari..."
                                class="w-full px-4 py-3 rounded-xl bg-brand-cream border border-brand-dark/20 text-xs text-brand-dark focus:ring-2 focus:ring-brand-dark outline-none resize-none"
                            ></textarea>
                        </div>

                        <button 
                            type="submit"
                            class="w-full inline-flex items-center justify-center gap-2 py-4 px-6 rounded-xl bg-brand-dark hover:bg-brand-primary text-brand-cream font-medium text-xs tracking-wider transition-colors shadow-md"
                        >
                            <MessageSquare class="w-4 h-4 text-brand-sand" />
                            <span>Kirim ke WhatsApp Stylist</span>
                        </button>
                    </form>
                </div>

            </div>
        </div>
    </section>
</template>
