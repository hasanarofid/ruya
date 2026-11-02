<script setup>
import { ref } from 'vue';
import { Head, Link, useForm, router } from '@inertiajs/vue3';
import AdminLayout from '@/Layouts/AdminLayout.vue';
import DataTable from '@/Components/DataTable.vue';
import { Plus, FolderPlus, Trash2, X, Save, Sparkles } from '@lucide/vue';

const props = defineProps({
  posts: {
    type: Array,
    required: true
  },
  categories: {
    type: Array,
    required: true
  }
});

const isCategoryModalOpen = ref(false);

const headers = [
  { text: 'Judul Busana / Artikel', value: 'title' },
  { text: 'Kategori Koleksi', value: 'category_name' },
  { text: 'Status', value: 'status', type: 'badge' },
  { text: 'Tanggal Publikasi', value: 'created_at', type: 'date' }
];

// Map posts to include flat category name for table search/display
const tableItems = props.posts.map(p => ({
  ...p,
  category_name: p.category?.name || 'Koleksi Umum'
}));

const categoryForm = useForm({
  name: ''
});

const createCategory = () => {
  categoryForm.post(route('admin.categories.store'), {
    onSuccess: () => {
      isCategoryModalOpen.value = false;
      categoryForm.reset();
    }
  });
};

const deleteCategory = (cat) => {
  if (confirm(`Apakah Anda yakin ingin menghapus kategori "${cat.name}"? Ini akan menghapus semua postingan terkait.`)) {
    router.delete(route('admin.categories.destroy', cat.id));
  }
};

const handleEdit = (item) => {
  router.get(route('admin.posts.edit', item.id));
};

const handleDelete = (item) => {
  if (confirm(`Apakah Anda yakin ingin menghapus postingan "${item.title}"?`)) {
    router.delete(route('admin.posts.destroy', item.id));
  }
};
</script>

<template>
  <Head title="Katalog & Postingan — RÜYA" />

  <AdminLayout>
    <div class="space-y-8">
      <!-- Title Page -->
      <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
          <div class="flex items-center gap-2 text-xs font-semibold uppercase tracking-widest text-brand-leaf mb-1">
            <Sparkles class="w-4 h-4 text-brand-gold" />
            <span>Haute Couture Collection Manager</span>
          </div>
          <h2 class="text-3xl font-serif font-bold tracking-tight text-brand-dark">Katalog & Postingan</h2>
          <p class="text-sm text-brand-leaf/80 mt-1">Kelola katalog busana abaya, gaun pesta, pashmina, dan jurnal fashion RÜYA.</p>
        </div>
        <div class="flex items-center gap-3">
          <button 
            @click="isCategoryModalOpen = true"
            class="inline-flex items-center px-4 py-2.5 bg-white border border-brand-sand hover:bg-brand-sand/50 text-xs font-semibold uppercase tracking-wider text-brand-dark rounded-xl transition-all cursor-pointer shadow-sm"
          >
            <FolderPlus class="w-4 h-4 mr-1.5 text-brand-leaf" />
            Kategori Baru
          </button>
          <Link 
            :href="route('admin.posts.create')"
            class="inline-flex items-center px-5 py-2.5 bg-brand-dark hover:bg-brand-deep border border-brand-gold/30 text-xs font-semibold uppercase tracking-widest text-brand-cream rounded-xl shadow-md transition-all cursor-pointer"
          >
            <Plus class="w-4 h-4 mr-1.5 text-brand-gold" />
            Tambah Busana
          </Link>
        </div>
      </div>

      <div class="grid grid-cols-1 lg:grid-cols-4 gap-8 items-start">
        <!-- Posts List -->
        <div class="lg:col-span-3">
          <DataTable 
            :items="tableItems" 
            :headers="headers" 
            search-placeholder="Cari judul busana atau artikel..."
            search-key="title"
            @edit="handleEdit"
            @delete="handleDelete"
          />
        </div>

        <!-- Categories Sidebar Card -->
        <div class="lg:col-span-1 bg-white border border-brand-sand/80 rounded-3xl p-6 shadow-fashion space-y-4">
          <h3 class="text-xs font-bold text-brand-dark uppercase tracking-widest pb-3 border-b border-brand-sand/60">Kategori Koleksi</h3>
          <div class="space-y-2 max-h-96 overflow-y-auto pr-1">
            <div 
              v-for="cat in categories" 
              :key="cat.id"
              class="flex items-center justify-between p-3 bg-brand-cream/70 rounded-2xl border border-brand-sand group text-xs transition-colors hover:bg-brand-sand/40"
            >
              <div>
                <p class="font-bold text-brand-dark">{{ cat.name }}</p>
                <p class="text-[10px] text-brand-leaf/70 mt-0.5">{{ cat.posts_count }} item busana</p>
              </div>
              <button 
                @click="deleteCategory(cat)"
                class="p-1.5 text-brand-leaf hover:text-rose-600 hover:bg-rose-50 rounded-lg opacity-0 group-hover:opacity-100 transition-opacity cursor-pointer"
                title="Hapus Kategori"
              >
                <Trash2 class="w-4 h-4" />
              </button>
            </div>
            <div v-if="categories.length === 0" class="text-center py-6 text-brand-leaf/60 text-xs">
              Belum ada kategori koleksi.
            </div>
          </div>
        </div>
      </div>

      <!-- Category Modal -->
      <div v-if="isCategoryModalOpen" class="fixed inset-0 z-50 flex items-center justify-center p-4">
        <div @click="isCategoryModalOpen = false" class="fixed inset-0 bg-brand-deep/70 backdrop-blur-sm"></div>
        <div class="relative bg-white border border-brand-sand rounded-3xl max-w-sm w-full overflow-hidden shadow-2xl z-10">
          <div class="flex items-center justify-between px-6 py-5 border-b border-brand-sand bg-brand-sand/20">
            <h3 class="text-base font-serif font-bold text-brand-dark">Kategori Busana Baru</h3>
            <button @click="isCategoryModalOpen = false" class="p-1.5 text-brand-leaf hover:text-brand-dark rounded-lg hover:bg-brand-sand/50 transition-colors">
              <X class="w-5 h-5" />
            </button>
          </div>
          <form @submit.prevent="createCategory" class="p-6 space-y-4">
            <div class="space-y-1">
              <label for="cat_name" class="text-xs font-bold text-brand-dark/80 uppercase tracking-wider">Nama Kategori</label>
              <input 
                id="cat_name"
                v-model="categoryForm.name"
                type="text" 
                required
                class="w-full bg-brand-cream/70 border border-brand-sand rounded-xl px-4 py-2.5 text-sm text-brand-dark placeholder-brand-leaf/40 focus:outline-none focus:border-brand-primary focus:ring-2 focus:ring-brand-primary/15 transition-all duration-200"
                placeholder="Contoh: Abaya & Dress, Pashmina"
              />
              <div v-if="categoryForm.errors.name" class="text-xs text-rose-600 font-semibold">{{ categoryForm.errors.name }}</div>
            </div>

            <div class="pt-4 border-t border-brand-sand flex justify-end gap-3">
              <button 
                type="button" 
                @click="isCategoryModalOpen = false" 
                class="px-4 py-2 bg-brand-sand/50 hover:bg-brand-sand text-xs font-semibold uppercase tracking-wider text-brand-dark rounded-xl transition-colors cursor-pointer"
              >
                Batal
              </button>
              <button 
                type="submit" 
                :disabled="categoryForm.processing"
                class="inline-flex items-center px-5 py-2 bg-brand-dark hover:bg-brand-deep border border-brand-gold/30 disabled:opacity-50 text-xs font-semibold uppercase tracking-widest text-brand-cream rounded-xl shadow-md transition-all cursor-pointer"
              >
                <Save class="w-4 h-4 mr-1.5 text-brand-gold" />
                Simpan Kategori
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </AdminLayout>
</template>
