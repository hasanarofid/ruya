<script setup>
import { ref } from 'vue';
import { Head, useForm, Link } from '@inertiajs/vue3';
import AdminLayout from '@/Layouts/AdminLayout.vue';
import { Save, ChevronLeft, Layout, Plus, Trash2, Sparkles } from '@lucide/vue';

const props = defineProps({
  page: {
    type: Object,
    required: true
  }
});

const pageForm = useForm({
  title: props.page.title,
  slug: props.page.slug,
  meta_description: props.page.meta_description || '',
  is_active: props.page.is_active
});

const activeSectionId = ref(null);
const sectionForm = useForm({
  title: '',
  content: {},
  is_active: true
});

const selectSection = (section) => {
  activeSectionId.value = section.id;
  sectionForm.title = section.title || '';
  sectionForm.is_active = section.is_active;
  // Deep clone section content
  sectionForm.content = JSON.parse(JSON.stringify(section.content || {}));
};

const updatePage = () => {
  pageForm.put(route('admin.pages.update', props.page.id));
};

const updateSection = (sectionId) => {
  sectionForm.put(route('admin.pages.sections.update', [props.page.id, sectionId]), {
    preserveScroll: true,
    onSuccess: () => {
      // Keep section open
    }
  });
};

// Helpers for features & testimonials list additions/deletions
const addFeatureItem = () => {
  if (!sectionForm.content.items) sectionForm.content.items = [];
  sectionForm.content.items.push({ title: 'Kelebihan Baru', description: 'Detail material sutra atau pengerjaan...' });
};

const removeFeatureItem = (index) => {
  sectionForm.content.items.splice(index, 1);
};

const addTestimonialItem = () => {
  if (!sectionForm.content.items) sectionForm.content.items = [];
  sectionForm.content.items.push({ name: 'Nama Pelanggan', role: 'Kolektor RÜYA', comment: 'Ulasan kenyamanan busana...' });
};

const removeTestimonialItem = (index) => {
  sectionForm.content.items.splice(index, 1);
};
</script>

<template>
  <Head :title="`Edit Halaman: ${page.title} — RÜYA`" />

  <AdminLayout>
    <div class="space-y-8 max-w-6xl">
      <!-- Header -->
      <div class="flex items-center gap-4">
        <Link 
          :href="route('admin.pages.index')" 
          class="p-2.5 bg-white border border-brand-sand hover:bg-brand-sand/50 rounded-2xl text-brand-leaf hover:text-brand-dark transition-colors shadow-sm"
        >
          <ChevronLeft class="w-5 h-5" />
        </Link>
        <div>
          <div class="flex items-center gap-2 text-xs font-semibold uppercase tracking-widest text-brand-leaf mb-0.5">
            <Sparkles class="w-3.5 h-3.5 text-brand-gold" />
            <span>Dynamic Layout Customizer</span>
          </div>
          <div class="flex items-center gap-3">
            <h2 class="text-3xl font-serif font-bold tracking-tight text-brand-dark">{{ page.title }}</h2>
            <span 
              :class="[
                page.is_active 
                  ? 'bg-emerald-50 text-emerald-800 border border-emerald-200' 
                  : 'bg-brand-sand/60 text-brand-leaf border border-brand-sand',
                'px-3 py-0.5 rounded-full text-xs font-semibold'
              ]"
            >
              {{ page.is_active ? 'Aktif' : 'Non-aktif' }}
            </span>
          </div>
          <p class="text-sm text-brand-leaf/80 mt-0.5">Kelola konfigurasi meta SEO dan susunan seksi konten editorial.</p>
        </div>
      </div>

      <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- SEO Details Panel -->
        <div class="lg:col-span-1 space-y-6">
          <form @submit.prevent="updatePage" class="bg-white border border-brand-sand/80 rounded-3xl p-6 shadow-fashion space-y-4">
            <h3 class="text-sm font-bold text-brand-dark uppercase tracking-widest pb-3 border-b border-brand-sand/60">Detail Halaman (SEO)</h3>
            
            <div class="space-y-1">
              <label for="title" class="text-xs font-bold text-brand-dark/80 uppercase tracking-wider">Judul Halaman</label>
              <input 
                id="title"
                v-model="pageForm.title"
                type="text" 
                required
                class="w-full bg-brand-cream/70 border border-brand-sand rounded-xl px-4 py-2.5 text-sm text-brand-dark focus:outline-none focus:border-brand-primary focus:ring-2 focus:ring-brand-primary/15 transition-all duration-200"
              />
            </div>

            <div class="space-y-1">
              <label for="slug" class="text-xs font-bold text-brand-dark/80 uppercase tracking-wider">Slug (URL)</label>
              <input 
                id="slug"
                v-model="pageForm.slug"
                type="text" 
                required
                class="w-full bg-brand-cream/70 border border-brand-sand rounded-xl px-4 py-2.5 text-sm text-brand-dark focus:outline-none focus:border-brand-primary focus:ring-2 focus:ring-brand-primary/15 transition-all duration-200"
              />
            </div>

            <div class="space-y-1">
              <label for="meta_description" class="text-xs font-bold text-brand-dark/80 uppercase tracking-wider">Meta Description SEO</label>
              <textarea 
                id="meta_description"
                v-model="pageForm.meta_description"
                rows="4"
                class="w-full bg-brand-cream/70 border border-brand-sand rounded-xl px-4 py-2.5 text-sm text-brand-dark focus:outline-none focus:border-brand-primary focus:ring-2 focus:ring-brand-primary/15 transition-all duration-200 resize-none"
              ></textarea>
            </div>

            <div class="flex items-center gap-2.5 py-2">
              <input 
                id="page_active"
                v-model="pageForm.is_active"
                type="checkbox" 
                class="w-4 h-4 rounded text-brand-dark bg-white border-brand-sand focus:ring-brand-primary"
              />
              <label for="page_active" class="text-xs font-semibold text-brand-dark cursor-pointer">Aktifkan Halaman Ini</label>
            </div>

            <button 
              type="submit" 
              :disabled="pageForm.processing"
              class="w-full inline-flex items-center justify-center px-5 py-2.5 bg-brand-dark hover:bg-brand-deep border border-brand-gold/30 disabled:opacity-50 text-xs font-semibold uppercase tracking-widest text-brand-cream rounded-xl shadow-md transition-all cursor-pointer"
            >
              <Save class="w-4 h-4 mr-1.5 text-brand-gold" />
              Simpan Metadata
            </button>
          </form>

          <!-- List of Sections -->
          <div class="bg-white border border-brand-sand/80 rounded-3xl p-6 shadow-fashion space-y-4">
            <h3 class="text-xs font-bold text-brand-dark uppercase tracking-widest pb-3 border-b border-brand-sand/60">Daftar Bagian Halaman</h3>
            <div class="space-y-2">
              <button 
                v-for="section in page.sections" 
                :key="section.id"
                @click="selectSection(section)"
                :class="[
                  activeSectionId === section.id 
                    ? 'bg-brand-sand/60 border-brand-primary text-brand-dark font-bold' 
                    : 'bg-brand-cream/60 border-brand-sand text-brand-dark/80 hover:bg-brand-sand/40',
                  'w-full text-left px-4 py-3 rounded-2xl border flex items-center justify-between transition-all cursor-pointer'
                ]"
              >
                <div class="flex items-center gap-2.5">
                  <Layout class="w-4 h-4 text-brand-leaf" />
                  <span class="text-xs font-semibold">{{ section.title }}</span>
                </div>
                <span class="text-[10px] px-2 py-0.5 bg-white text-brand-leaf rounded-md border border-brand-sand uppercase tracking-wider font-bold">
                  {{ section.key }}
                </span>
              </button>
              <div v-if="page.sections.length === 0" class="text-center py-6 text-brand-leaf/60 text-xs">
                Belum ada bagian di halaman ini.
              </div>
            </div>
          </div>
        </div>

        <!-- Section Content Editor Panel -->
        <div class="lg:col-span-2">
          <div v-if="activeSectionId" class="bg-white border border-brand-sand/80 rounded-3xl overflow-hidden shadow-fashion">
            <!-- Header Editor -->
            <div class="px-6 py-4.5 bg-brand-sand/20 border-b border-brand-sand flex items-center justify-between">
              <div>
                <h3 class="text-sm font-bold text-brand-dark uppercase tracking-wider">Edit Konten Bagian</h3>
                <p class="text-xs text-brand-leaf/70 mt-0.5">Sesuaikan parameter konten untuk bagian yang dipilih.</p>
              </div>
              <span class="px-3 py-1 bg-emerald-50 text-emerald-800 border border-emerald-200 rounded-full text-xs font-semibold" v-if="sectionForm.is_active">
                Aktif
              </span>
            </div>

            <!-- Content Form Editor -->
            <form @submit.prevent="updateSection(activeSectionId)" class="p-6 md:p-8 space-y-6">
              <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="space-y-1">
                  <label class="text-xs font-bold text-brand-dark/80 uppercase tracking-wider">Judul Bagian (Internal)</label>
                  <input 
                    v-model="sectionForm.title"
                    type="text" 
                    required
                    class="w-full bg-brand-cream/70 border border-brand-sand rounded-xl px-4 py-2.5 text-sm text-brand-dark focus:outline-none focus:border-brand-primary focus:ring-2 focus:ring-brand-primary/15 transition-all duration-200"
                  />
                </div>
                <div class="flex items-center gap-2.5 md:pt-6">
                  <input 
                    id="section_active"
                    v-model="sectionForm.is_active"
                    type="checkbox" 
                    class="w-4 h-4 rounded text-brand-dark bg-white border-brand-sand focus:ring-brand-primary"
                  />
                  <label for="section_active" class="text-xs font-semibold text-brand-dark cursor-pointer">Tampilkan Bagian Ini di Website</label>
                </div>
              </div>

              <!-- Dynamic form fields depending on the key -->
              <div class="border-t border-brand-sand/60 pt-6 space-y-4">
                <h4 class="text-xs font-bold text-brand-dark uppercase tracking-widest">Parameter Konten Layout</h4>

                <!-- Hero Section Editor -->
                <div v-if="page.sections.find(s => s.id === activeSectionId)?.key === 'hero'" class="space-y-4">
                  <div class="space-y-1">
                    <label class="text-xs font-bold text-brand-leaf/80 uppercase">Headline Utama</label>
                    <input 
                      v-model="sectionForm.content.headline"
                      type="text" 
                      class="w-full bg-brand-cream/70 border border-brand-sand rounded-xl px-4 py-2.5 text-sm text-brand-dark focus:outline-none focus:border-brand-primary focus:ring-2 focus:ring-brand-primary/15 transition-all duration-200"
                    />
                  </div>
                  <div class="space-y-1">
                    <label class="text-xs font-bold text-brand-leaf/80 uppercase">Sub-headline / Tagline</label>
                    <textarea 
                      v-model="sectionForm.content.subheadline"
                      rows="3"
                      class="w-full bg-brand-cream/70 border border-brand-sand rounded-xl px-4 py-2.5 text-sm text-brand-dark focus:outline-none focus:border-brand-primary focus:ring-2 focus:ring-brand-primary/15 transition-all duration-200 resize-none"
                    ></textarea>
                  </div>
                  <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="space-y-1">
                      <label class="text-xs font-bold text-brand-leaf/80 uppercase">Teks Tombol (CTA)</label>
                      <input 
                        v-model="sectionForm.content.cta_text"
                        type="text" 
                        class="w-full bg-brand-cream/70 border border-brand-sand rounded-xl px-4 py-2.5 text-sm text-brand-dark focus:outline-none focus:border-brand-primary focus:ring-2 focus:ring-brand-primary/15 transition-all duration-200"
                      />
                    </div>
                    <div class="space-y-1">
                      <label class="text-xs font-bold text-brand-leaf/80 uppercase">Tautan Tombol (URL CTA)</label>
                      <input 
                        v-model="sectionForm.content.cta_url"
                        type="text" 
                        class="w-full bg-brand-cream/70 border border-brand-sand rounded-xl px-4 py-2.5 text-sm text-brand-dark focus:outline-none focus:border-brand-primary focus:ring-2 focus:ring-brand-primary/15 transition-all duration-200"
                      />
                    </div>
                  </div>
                </div>

                <!-- Features Section Editor -->
                <div v-else-if="page.sections.find(s => s.id === activeSectionId)?.key === 'features'" class="space-y-6">
                  <div class="space-y-1">
                    <label class="text-xs font-bold text-brand-leaf/80 uppercase">Judul Blok Keunggulan</label>
                    <input 
                      v-model="sectionForm.content.title"
                      type="text" 
                      class="w-full bg-brand-cream/70 border border-brand-sand rounded-xl px-4 py-2.5 text-sm text-brand-dark focus:outline-none focus:border-brand-primary focus:ring-2 focus:ring-brand-primary/15 transition-all duration-200"
                    />
                  </div>

                  <div class="space-y-3">
                    <div class="flex items-center justify-between">
                      <label class="text-xs font-bold text-brand-dark/80 uppercase tracking-wider">Item Keunggulan Busana</label>
                      <button 
                        type="button" 
                        @click="addFeatureItem"
                        class="inline-flex items-center text-xs text-brand-primary hover:text-brand-dark font-semibold transition-colors cursor-pointer"
                      >
                        <Plus class="w-4 h-4 mr-1 text-brand-gold" /> Tambah Item
                      </button>
                    </div>

                    <div 
                      v-for="(item, idx) in sectionForm.content.items" 
                      :key="idx"
                      class="p-4 bg-brand-cream/60 rounded-2xl border border-brand-sand space-y-3 relative group"
                    >
                      <button 
                        type="button" 
                        @click="removeFeatureItem(idx)"
                        class="absolute top-2 right-2 p-1.5 text-brand-leaf hover:text-rose-600 hover:bg-rose-50 rounded-lg opacity-0 group-hover:opacity-100 transition-opacity cursor-pointer"
                        title="Hapus item"
                      >
                        <Trash2 class="w-4 h-4" />
                      </button>
                      <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="space-y-1">
                          <label class="text-xxs font-bold text-brand-leaf/80 uppercase block mb-1">Nama Keunggulan</label>
                          <input 
                            v-model="item.title"
                            type="text" 
                            class="w-full bg-white border border-brand-sand rounded-xl px-3 py-2 text-xs text-brand-dark focus:outline-none focus:border-brand-primary focus:ring-2 focus:ring-brand-primary/15 transition-all duration-200"
                          />
                        </div>
                        <div class="space-y-1">
                          <label class="text-xxs font-bold text-brand-leaf/80 uppercase block mb-1">Keterangan / Detail</label>
                          <input 
                            v-model="item.description"
                            type="text" 
                            class="w-full bg-white border border-brand-sand rounded-xl px-3 py-2 text-xs text-brand-dark focus:outline-none focus:border-brand-primary focus:ring-2 focus:ring-brand-primary/15 transition-all duration-200"
                          />
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- Testimonials Section Editor -->
                <div v-else-if="page.sections.find(s => s.id === activeSectionId)?.key === 'testimonials'" class="space-y-6">
                  <div class="space-y-1">
                    <label class="text-xs font-bold text-brand-leaf/80 uppercase">Judul Blok Testimoni</label>
                    <input 
                      v-model="sectionForm.content.title"
                      type="text" 
                      class="w-full bg-brand-cream/70 border border-brand-sand rounded-xl px-4 py-2.5 text-sm text-brand-dark focus:outline-none focus:border-brand-primary focus:ring-2 focus:ring-brand-primary/15 transition-all duration-200"
                    />
                  </div>

                  <div class="space-y-3">
                    <div class="flex items-center justify-between">
                      <label class="text-xs font-bold text-brand-dark/80 uppercase tracking-wider">Item Testimoni Pelanggan</label>
                      <button 
                        type="button" 
                        @click="addTestimonialItem"
                        class="inline-flex items-center text-xs text-brand-primary hover:text-brand-dark font-semibold transition-colors cursor-pointer"
                      >
                        <Plus class="w-4 h-4 mr-1 text-brand-gold" /> Tambah Testimoni
                      </button>
                    </div>

                    <div 
                      v-for="(item, idx) in sectionForm.content.items" 
                      :key="idx"
                      class="p-4 bg-brand-cream/60 rounded-2xl border border-brand-sand space-y-3 relative group"
                    >
                      <button 
                        type="button" 
                        @click="removeTestimonialItem(idx)"
                        class="absolute top-2 right-2 p-1.5 text-brand-leaf hover:text-rose-600 hover:bg-rose-50 rounded-lg opacity-0 group-hover:opacity-100 transition-opacity cursor-pointer"
                        title="Hapus item"
                      >
                        <Trash2 class="w-4 h-4" />
                      </button>
                      <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="space-y-1">
                          <label class="text-xxs font-bold text-brand-leaf/80 uppercase block mb-1">Nama Pelanggan</label>
                          <input 
                            v-model="item.name"
                            type="text" 
                            class="w-full bg-white border border-brand-sand rounded-xl px-3 py-2 text-xs text-brand-dark focus:outline-none focus:border-brand-primary focus:ring-2 focus:ring-brand-primary/15 transition-all duration-200"
                          />
                        </div>
                        <div class="space-y-1">
                          <label class="text-xxs font-bold text-brand-leaf/80 uppercase block mb-1">Status / Kategori</label>
                          <input 
                            v-model="item.role"
                            type="text" 
                            class="w-full bg-white border border-brand-sand rounded-xl px-3 py-2 text-xs text-brand-dark focus:outline-none focus:border-brand-primary focus:ring-2 focus:ring-brand-primary/15 transition-all duration-200"
                          />
                        </div>
                      </div>
                      <div class="space-y-1">
                        <label class="text-xxs font-bold text-brand-leaf/80 uppercase block mb-1">Komentar / Ulasan</label>
                        <textarea 
                          v-model="item.comment"
                          rows="2"
                          class="w-full bg-white border border-brand-sand rounded-xl px-3 py-2 text-xs text-brand-dark focus:outline-none focus:border-brand-primary focus:ring-2 focus:ring-brand-primary/15 transition-all duration-200 resize-none"
                        ></textarea>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- Generic JSON Editor for other keys -->
                <div v-else class="space-y-2">
                  <label class="text-xs font-bold text-brand-leaf/80 uppercase">Data Parameter (JSON Format)</label>
                  <p class="text-xs text-brand-leaf/70">Masukkan parameter data dalam format key-value JSON valid.</p>
                  <textarea 
                    :value="JSON.stringify(sectionForm.content, null, 2)"
                    @input="e => {
                      try {
                        sectionForm.content = JSON.parse(e.target.value);
                      } catch (err) {
                        // ignore syntax errors during typing
                      }
                    }"
                    rows="8"
                    class="w-full bg-brand-cream/70 border border-brand-sand rounded-xl px-4 py-2.5 text-xs text-brand-dark font-mono focus:outline-none focus:border-brand-primary focus:ring-2 focus:ring-brand-primary/15"
                  ></textarea>
                </div>
              </div>

              <!-- Action Footer -->
              <div class="pt-6 border-t border-brand-sand/60 flex justify-end">
                <button 
                  type="submit" 
                  :disabled="sectionForm.processing"
                  class="inline-flex items-center px-6 py-2.5 bg-brand-dark hover:bg-brand-deep border border-brand-gold/30 disabled:opacity-50 text-xs font-semibold uppercase tracking-widest text-brand-cream rounded-xl shadow-md transition-all cursor-pointer"
                >
                  <Save class="w-4 h-4 mr-1.5 text-brand-gold" />
                  Simpan Bagian Konten
                </button>
              </div>
            </form>
          </div>

          <!-- Empty Editor State -->
          <div v-else class="h-full bg-white border-2 border-brand-sand border-dashed rounded-3xl flex flex-col items-center justify-center p-12 text-center text-brand-leaf/60 min-h-[300px]">
            <Layout class="w-12 h-12 mb-3 text-brand-sand" />
            <h3 class="text-sm font-bold text-brand-dark">Pilih Bagian Halaman</h3>
            <p class="text-xs text-brand-leaf/70 mt-1 max-w-xs">Silakan pilih salah satu bagian di menu sebelah kiri untuk mengedit isinya secara visual.</p>
          </div>
        </div>
      </div>
    </div>
  </AdminLayout>
</template>
