<script setup>
import { ref } from 'vue';
import { Head, useForm } from '@inertiajs/vue3';
import AdminLayout from '@/Layouts/AdminLayout.vue';
import { Save, Image as ImageIcon, Link as LinkIcon, Phone, FileText, Globe, Sparkles } from '@lucide/vue';

const props = defineProps({
  settings: {
    type: Object,
    required: true
  }
});

const currentTab = ref('site'); // Tab state: 'site', 'links', 'logo'

const form = useForm({
  site_name: props.settings.site_name || '',
  site_description: props.settings.site_description || '',
  whatsapp_number: props.settings.whatsapp_number || '',
  playstore_link: props.settings.playstore_link || '',
  site_logo: null
});

const logoPreview = ref(props.settings.site_logo_url || null);
const isDragging = ref(false);

const handleLogoChange = (e) => {
  const file = e.target.files[0];
  if (file) {
    form.site_logo = file;
    logoPreview.value = URL.createObjectURL(file);
  }
};

const handleDrop = (e) => {
  isDragging.value = false;
  const file = e.dataTransfer.files[0];
  if (file && file.type.startsWith('image/')) {
    form.site_logo = file;
    logoPreview.value = URL.createObjectURL(file);
  }
};

const submit = () => {
  form.post(route('admin.settings.update'), {
    forceFormData: true,
    preserveScroll: true,
    onSuccess: () => {
      form.site_logo = null;
    }
  });
};
</script>

<template>
  <Head title="Pengaturan Butik — RÜYA" />

  <AdminLayout>
    <div class="space-y-8 max-w-4xl">
      <!-- Title -->
      <div>
        <div class="flex items-center gap-2 text-xs font-semibold uppercase tracking-widest text-brand-leaf mb-1">
          <Sparkles class="w-4 h-4 text-brand-gold" />
          <span>Atelier Brand Configuration</span>
        </div>
        <h2 class="text-3xl font-serif font-bold tracking-tight text-brand-dark">Pengaturan Butik & Sistem</h2>
        <p class="text-sm text-brand-leaf/80 mt-1">Kelola identitas resmi RÜYA, nomor WhatsApp pemesanan, dan aset visual.</p>
      </div>

      <!-- Navigation Tabs (Haute Style) -->
      <div class="flex border-b border-brand-sand">
        <button 
          @click="currentTab = 'site'"
          :class="[
            currentTab === 'site' 
              ? 'border-brand-dark text-brand-dark bg-brand-sand/30 font-bold' 
              : 'border-transparent text-brand-leaf/70 hover:text-brand-dark hover:border-brand-sand font-medium',
            'px-6 py-3.5 border-b-2 text-xs uppercase tracking-wider transition-all duration-200 cursor-pointer rounded-t-xl'
          ]"
        >
          <span class="flex items-center gap-2">
            <Globe class="w-4 h-4" />
            Identitas Brand
          </span>
        </button>
        <button 
          @click="currentTab = 'links'"
          :class="[
            currentTab === 'links' 
              ? 'border-brand-dark text-brand-dark bg-brand-sand/30 font-bold' 
              : 'border-transparent text-brand-leaf/70 hover:text-brand-dark hover:border-brand-sand font-medium',
            'px-6 py-3.5 border-b-2 text-xs uppercase tracking-wider transition-all duration-200 cursor-pointer rounded-t-xl'
          ]"
        >
          <span class="flex items-center gap-2">
            <LinkIcon class="w-4 h-4" />
            WhatsApp & Kontak
          </span>
        </button>
        <button 
          @click="currentTab = 'logo'"
          :class="[
            currentTab === 'logo' 
              ? 'border-brand-dark text-brand-dark bg-brand-sand/30 font-bold' 
              : 'border-transparent text-brand-leaf/70 hover:text-brand-dark hover:border-brand-sand font-medium',
            'px-6 py-3.5 border-b-2 text-xs uppercase tracking-wider transition-all duration-200 cursor-pointer rounded-t-xl'
          ]"
        >
          <span class="flex items-center gap-2">
            <ImageIcon class="w-4 h-4" />
            Logo Monogram
          </span>
        </button>
      </div>

      <!-- Settings Card -->
      <form @submit.prevent="submit" class="bg-white border border-brand-sand/80 rounded-3xl overflow-hidden shadow-fashion">
        <div class="p-6 md:p-8">
          
          <!-- Tab 1: Identitas Brand -->
          <div v-if="currentTab === 'site'" class="space-y-6 animate-fadeIn">
            <!-- Site Name -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 items-center">
              <label for="site_name" class="text-xs font-bold text-brand-dark/80 uppercase tracking-wider">Nama Brand / Website</label>
              <div class="md:col-span-2 relative">
                <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-brand-leaf/60">
                  <FileText class="w-4 h-4" />
                </span>
                <input 
                  id="site_name"
                  v-model="form.site_name"
                  type="text" 
                  class="w-full bg-brand-cream/70 border border-brand-sand rounded-xl pl-10 pr-4 py-2.5 text-sm text-brand-dark placeholder-brand-leaf/40 focus:outline-none focus:border-brand-primary focus:ring-2 focus:ring-brand-primary/15 transition-all duration-200"
                  placeholder="Contoh: RÜYA Modest Wear"
                />
                <div v-if="form.errors.site_name" class="text-xs text-rose-600 font-semibold mt-1">
                  {{ form.errors.site_name }}
                </div>
              </div>
            </div>

            <!-- Site Description -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 items-start">
              <div>
                <label for="site_description" class="text-xs font-bold text-brand-dark/80 uppercase tracking-wider">Filosofi & Deskripsi Singkat</label>
                <p class="text-xxs text-brand-leaf/70 mt-1">Teks editorial yang tampil di footer dan meta informasi brand RÜYA.</p>
              </div>
              <div class="md:col-span-2">
                <textarea 
                  id="site_description"
                  v-model="form.site_description"
                  rows="5"
                  class="w-full bg-brand-cream/70 border border-brand-sand rounded-xl px-4 py-2.5 text-sm text-brand-dark placeholder-brand-leaf/40 focus:outline-none focus:border-brand-primary focus:ring-2 focus:ring-brand-primary/15 transition-all duration-200 resize-none"
                  placeholder="Tulis deskripsi atau filosofi brand..."
                ></textarea>
                <div v-if="form.errors.site_description" class="text-xs text-rose-600 font-semibold mt-1">
                  {{ form.errors.site_description }}
                </div>
              </div>
            </div>
          </div>

          <!-- Tab 2: WhatsApp & Kontak -->
          <div v-if="currentTab === 'links'" class="space-y-6 animate-fadeIn">
            <!-- Whatsapp Number -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 items-center">
              <div>
                <label for="whatsapp_number" class="text-xs font-bold text-brand-dark/80 uppercase tracking-wider">WhatsApp Personal Shopper</label>
                <p class="text-xxs text-brand-leaf/70 mt-1">Gunakan format internasional tanpa spasi atau tanda plus, contoh: 6281316053870</p>
              </div>
              <div class="md:col-span-2 relative">
                <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-brand-leaf/60">
                  <Phone class="w-4 h-4" />
                </span>
                <input 
                  id="whatsapp_number"
                  v-model="form.whatsapp_number"
                  type="text" 
                  class="w-full bg-brand-cream/70 border border-brand-sand rounded-xl pl-10 pr-4 py-2.5 text-sm text-brand-dark placeholder-brand-leaf/40 focus:outline-none focus:border-brand-primary focus:ring-2 focus:ring-brand-primary/15 transition-all duration-200"
                  placeholder="6281316053870"
                />
                <div v-if="form.errors.whatsapp_number" class="text-xs text-rose-600 font-semibold mt-1">
                  {{ form.errors.whatsapp_number }}
                </div>
              </div>
            </div>

            <!-- Play Store or Catalog Link -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 items-center">
              <div>
                <label for="playstore_link" class="text-xs font-bold text-brand-dark/80 uppercase tracking-wider">Tautan Lookbook Eksternal</label>
                <p class="text-xxs text-brand-leaf/70 mt-1">URL tautan Instagram, e-katalog, atau link pendukung lainnya.</p>
              </div>
              <div class="md:col-span-2 relative">
                <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-brand-leaf/60">
                  <LinkIcon class="w-4 h-4" />
                </span>
                <input 
                  id="playstore_link"
                  v-model="form.playstore_link"
                  type="url" 
                  class="w-full bg-brand-cream/70 border border-brand-sand rounded-xl pl-10 pr-4 py-2.5 text-sm text-brand-dark placeholder-brand-leaf/40 focus:outline-none focus:border-brand-primary focus:ring-2 focus:ring-brand-primary/15 transition-all duration-200"
                  placeholder="https://instagram.com/ruya.couture"
                />
                <div v-if="form.errors.playstore_link" class="text-xs text-rose-600 font-semibold mt-1">
                  {{ form.errors.playstore_link }}
                </div>
              </div>
            </div>
          </div>

          <!-- Tab 3: Logo Monogram -->
          <div v-if="currentTab === 'logo'" class="space-y-6 animate-fadeIn">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 items-start">
              <div>
                <h3 class="text-xs font-bold text-brand-dark/80 uppercase tracking-wider">Monogram & Stamp Resmi</h3>
                <p class="text-xxs text-brand-leaf/70 mt-1">Logo resmi brand RÜYA. Format yang disarankan adalah PNG dengan latar belakang transparan beresolusi tinggi.</p>
              </div>

              <div class="md:col-span-2 space-y-6">
                <!-- Advanced Dashed Drag-and-Drop Area -->
                <div 
                  @dragover.prevent="isDragging = true"
                  @dragleave.prevent="isDragging = false"
                  @drop.prevent="handleDrop"
                  :class="[
                    isDragging ? 'border-brand-primary bg-brand-sand/40' : 'border-brand-sand bg-brand-cream/40 hover:border-brand-primary/60',
                    'border-2 border-dashed rounded-3xl p-8 flex flex-col items-center justify-center text-center cursor-pointer transition-all duration-300 relative min-h-[220px]'
                  ]"
                >
                  <input 
                    id="site_logo"
                    type="file" 
                    class="absolute inset-0 w-full h-full opacity-0 cursor-pointer" 
                    accept="image/*"
                    @change="handleLogoChange"
                  />

                  <!-- Dynamic Icon/Preview -->
                  <div v-if="logoPreview" class="relative group max-w-[200px] max-h-[140px] rounded-2xl overflow-hidden p-2 bg-white border border-brand-sand shadow-sm">
                    <img 
                      :src="logoPreview" 
                      alt="Site Logo Preview" 
                      class="max-w-full max-h-full object-contain"
                    />
                  </div>
                  <div v-else class="flex flex-col items-center gap-3">
                    <div class="p-4 bg-brand-sand/60 rounded-2xl text-brand-dark border border-brand-blush/60 shadow-sm">
                      <ImageIcon class="w-8 h-8 text-brand-leaf" />
                    </div>
                    <div>
                      <p class="text-sm font-semibold text-brand-dark">Drag & drop logo stempel RÜYA di sini</p>
                      <p class="text-xs text-brand-leaf/70 mt-1">atau klik untuk memilih dari penyimpanan komputer</p>
                    </div>
                  </div>
                </div>

                <p class="text-xxs text-brand-leaf/60">Maksimal ukuran berkas 2 MB (Format disarankan: PNG transparan)</p>
                <div v-if="form.errors.site_logo" class="text-xs text-rose-600 font-semibold mt-1">
                  {{ form.errors.site_logo }}
                </div>
              </div>
            </div>
          </div>

        </div>

        <!-- Footer Action -->
        <div class="px-6 md:px-8 py-4 bg-brand-sand/20 border-t border-brand-sand flex justify-end">
          <button 
            type="submit" 
            :disabled="form.processing"
            class="inline-flex items-center px-6 py-2.5 bg-brand-dark hover:bg-brand-deep border border-brand-gold/30 disabled:opacity-50 text-xs font-semibold uppercase tracking-widest text-brand-cream rounded-xl shadow-md transition-all duration-200 cursor-pointer"
          >
            <Save class="w-4 h-4 mr-2 text-brand-gold" />
            Simpan Perubahan
          </button>
        </div>
      </form>
    </div>
  </AdminLayout>
</template>

<style scoped>
.animate-fadeIn {
  animation: fadeIn 0.25s ease-out forwards;
}

@keyframes fadeIn {
  from {
    opacity: 0;
    transform: translateY(4px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}
</style>
