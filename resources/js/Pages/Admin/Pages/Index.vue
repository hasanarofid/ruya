<script setup>
import { ref } from 'vue';
import { Head, Link, useForm, router } from '@inertiajs/vue3';
import AdminLayout from '@/Layouts/AdminLayout.vue';
import DataTable from '@/Components/DataTable.vue';
import { Plus, X, Save, Sparkles } from '@lucide/vue';

const props = defineProps({
  pages: {
    type: Array,
    required: true
  }
});

const isModalOpen = ref(false);

const headers = [
  { text: 'Judul Halaman', value: 'title' },
  { text: 'Slug (URL)', value: 'slug' },
  { text: 'Jumlah Bagian (Sections)', value: 'sections_count' },
  { text: 'Status', value: 'is_active', type: 'badge' }
];

const form = useForm({
  title: '',
  slug: '',
  meta_description: ''
});

const createPage = () => {
  form.post(route('admin.pages.store'), {
    onSuccess: () => {
      isModalOpen.value = false;
      form.reset();
    }
  });
};

const handleEdit = (item) => {
  router.get(route('admin.pages.edit', item.id));
};

const handleDelete = (item) => {
  if (confirm(`Apakah Anda yakin ingin menghapus halaman "${item.title}"?`)) {
    router.delete(route('admin.pages.destroy', item.id));
  }
};
</script>

<template>
  <Head title="Kelola Halaman & Seksi — RÜYA" />

  <AdminLayout>
    <div class="space-y-8">
      <!-- Title Page -->
      <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
          <div class="flex items-center gap-2 text-xs font-semibold uppercase tracking-widest text-brand-leaf mb-1">
            <Sparkles class="w-4 h-4 text-brand-gold" />
            <span>Dynamic Layout Architecture</span>
          </div>
          <h2 class="text-3xl font-serif font-bold tracking-tight text-brand-dark">Halaman & Seksi Konten</h2>
          <p class="text-sm text-brand-leaf/80 mt-1">Kelola struktur landing page dinamis, hero banner, dan lookbook bento butik.</p>
        </div>
        <div>
          <button 
            @click="isModalOpen = true"
            class="inline-flex items-center px-5 py-2.5 bg-brand-dark hover:bg-brand-deep border border-brand-gold/30 text-xs font-semibold uppercase tracking-widest text-brand-cream rounded-xl shadow-md transition-all cursor-pointer"
          >
            <Plus class="w-4 h-4 mr-1.5 text-brand-gold" />
            Tambah Halaman
          </button>
        </div>
      </div>

      <!-- Data Table -->
      <DataTable 
        :items="pages" 
        :headers="headers" 
        search-placeholder="Cari judul halaman atau slug..."
        search-key="title"
        @edit="handleEdit"
        @delete="handleDelete"
      >
        <template #cell(sections_count)="{ item }">
          <span class="text-brand-leaf font-semibold text-xs">
            {{ item.sections_count }} bagian konten
          </span>
        </template>
      </DataTable>

      <!-- Custom Page Modal -->
      <div v-if="isModalOpen" class="fixed inset-0 z-50 flex items-center justify-center p-4">
        <div @click="isModalOpen = false" class="fixed inset-0 bg-brand-deep/70 backdrop-blur-sm"></div>
        <div class="relative bg-white border border-brand-sand rounded-3xl max-w-lg w-full overflow-hidden shadow-2xl z-10">
          <div class="flex items-center justify-between px-6 py-5 border-b border-brand-sand bg-brand-sand/20">
            <h3 class="text-base font-serif font-bold text-brand-dark">Buat Halaman Baru</h3>
            <button @click="isModalOpen = false" class="p-1.5 text-brand-leaf hover:text-brand-dark rounded-lg hover:bg-brand-sand/50 transition-colors">
              <X class="w-5 h-5" />
            </button>
          </div>
          <form @submit.prevent="createPage" class="p-6 space-y-4">
            <div class="space-y-1">
              <label for="title" class="text-xs font-bold text-brand-dark/80 uppercase tracking-wider">Judul Halaman</label>
              <input 
                id="title"
                v-model="form.title"
                type="text" 
                required
                class="w-full bg-brand-cream/70 border border-brand-sand rounded-xl px-4 py-2.5 text-sm text-brand-dark placeholder-brand-leaf/40 focus:outline-none focus:border-brand-primary focus:ring-2 focus:ring-brand-primary/15 transition-all duration-200"
                placeholder="Contoh: Ramadan Silk Collection"
                @input="form.slug = form.title.toLowerCase().replace(/[^a-z0-9]+/g, '-').replace(/(^-|-$)/g, '')"
              />
              <div v-if="form.errors.title" class="text-xs text-rose-600 font-semibold">{{ form.errors.title }}</div>
            </div>

            <div class="space-y-1">
              <label for="slug" class="text-xs font-bold text-brand-dark/80 uppercase tracking-wider">Slug (URL)</label>
              <input 
                id="slug"
                v-model="form.slug"
                type="text" 
                required
                class="w-full bg-brand-cream/70 border border-brand-sand rounded-xl px-4 py-2.5 text-sm text-brand-dark placeholder-brand-leaf/40 focus:outline-none focus:border-brand-primary focus:ring-2 focus:ring-brand-primary/15 transition-all duration-200"
                placeholder="ramadan-silk-collection"
              />
              <div v-if="form.errors.slug" class="text-xs text-rose-600 font-semibold">{{ form.errors.slug }}</div>
            </div>

            <div class="space-y-1">
              <label for="meta_description" class="text-xs font-bold text-brand-dark/80 uppercase tracking-wider">Deskripsi SEO (Meta Description)</label>
              <textarea 
                id="meta_description"
                v-model="form.meta_description"
                rows="3"
                class="w-full bg-brand-cream/70 border border-brand-sand rounded-xl px-4 py-2.5 text-sm text-brand-dark placeholder-brand-leaf/40 focus:outline-none focus:border-brand-primary focus:ring-2 focus:ring-brand-primary/15 transition-all duration-200 resize-none"
                placeholder="Tulis deskripsi meta SEO untuk mesin pencari..."
              ></textarea>
              <div v-if="form.errors.meta_description" class="text-xs text-rose-600 font-semibold">{{ form.errors.meta_description }}</div>
            </div>

            <div class="pt-4 border-t border-brand-sand flex justify-end gap-3">
              <button 
                type="button" 
                @click="isModalOpen = false" 
                class="px-4 py-2 bg-brand-sand/50 hover:bg-brand-sand text-xs font-semibold uppercase tracking-wider text-brand-dark rounded-xl transition-colors cursor-pointer"
              >
                Batal
              </button>
              <button 
                type="submit" 
                :disabled="form.processing"
                class="inline-flex items-center px-5 py-2 bg-brand-dark hover:bg-brand-deep border border-brand-gold/30 disabled:opacity-50 text-xs font-semibold uppercase tracking-widest text-brand-cream rounded-xl shadow-md transition-all cursor-pointer"
              >
                <Save class="w-4 h-4 mr-1.5 text-brand-gold" />
                Simpan Halaman
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </AdminLayout>
</template>
