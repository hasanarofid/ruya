<script setup>
import { ref } from 'vue';
import { Head, useForm, Link } from '@inertiajs/vue3';
import AdminLayout from '@/Layouts/AdminLayout.vue';
import { Save, ChevronLeft, Image as ImageIcon, Sparkles } from '@lucide/vue';

const props = defineProps({
  post: {
    type: Object,
    default: null
  },
  categories: {
    type: Array,
    required: true
  }
});

const isEdit = !!props.post;

const form = useForm({
  _method: isEdit ? 'PUT' : 'POST',
  category_id: props.post?.category_id || '',
  title: props.post?.title || '',
  slug: props.post?.slug || '',
  content: props.post?.content || '',
  image: null,
  status: props.post?.status || 'draft',
  is_featured: props.post?.is_featured ?? false
});

const imagePreview = ref(props.post?.image_url || null);
const isDragging = ref(false);

const handleImageChange = (e) => {
  const file = e.target.files[0];
  if (file) {
    form.image = file;
    imagePreview.value = URL.createObjectURL(file);
  }
};

const handleDrop = (e) => {
  isDragging.value = false;
  const file = e.dataTransfer.files[0];
  if (file && file.type.startsWith('image/')) {
    form.image = file;
    imagePreview.value = URL.createObjectURL(file);
  }
};

const submit = () => {
  if (isEdit) {
    form.post(route('admin.posts.update', props.post.id), {
      forceFormData: true,
      preserveScroll: true
    });
  } else {
    form.post(route('admin.posts.store'), {
      forceFormData: true
    });
  }
};
</script>

<template>
  <Head :title="isEdit ? 'Edit Busana / Postingan — RÜYA' : 'Tambah Busana Baru — RÜYA'" />

  <AdminLayout>
    <div class="space-y-8 max-w-4xl">
      <!-- Header -->
      <div class="flex items-center gap-4">
        <Link 
          :href="route('admin.posts.index')" 
          class="p-2.5 bg-white border border-brand-sand hover:bg-brand-sand/50 rounded-2xl text-brand-leaf hover:text-brand-dark transition-colors shadow-sm"
        >
          <ChevronLeft class="w-5 h-5" />
        </Link>
        <div>
          <div class="flex items-center gap-2 text-xs font-semibold uppercase tracking-widest text-brand-leaf mb-0.5">
            <Sparkles class="w-3.5 h-3.5 text-brand-gold" />
            <span>Haute Modest Wardrobe Management</span>
          </div>
          <h2 class="text-3xl font-serif font-bold tracking-tight text-brand-dark">
            {{ isEdit ? 'Edit Busana / Postingan' : 'Tambah Busana Baru' }}
          </h2>
          <p class="text-sm text-brand-leaf/80 mt-0.5">
            {{ isEdit ? 'Perbarui konten artikel, foto, atau spesifikasi busana modest Anda.' : 'Unggah busana, deskripsi material sutra/linen, atau artikel journal baru.' }}
          </p>
        </div>
      </div>

      <!-- Form Card -->
      <form @submit.prevent="submit" class="bg-white border border-brand-sand/80 rounded-3xl overflow-hidden shadow-fashion">
        <div class="p-6 md:p-8 space-y-6">
          <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Title -->
            <div class="space-y-1 md:col-span-2">
              <label for="title" class="text-xs font-bold text-brand-dark/80 uppercase tracking-wider">Nama Busana / Judul Postingan</label>
              <input 
                id="title"
                v-model="form.title"
                type="text" 
                required
                class="w-full bg-brand-cream/70 border border-brand-sand rounded-xl px-4 py-2.5 text-sm text-brand-dark placeholder-brand-leaf/40 focus:outline-none focus:border-brand-primary focus:ring-2 focus:ring-brand-primary/15 transition-all duration-200"
                placeholder="Contoh: Royal Silk Abaya with Embroidered Cuffs"
                @input="!isEdit && (form.slug = form.title.toLowerCase().replace(/[^a-z0-9]+/g, '-').replace(/(^-|-$)/g, ''))"
              />
              <div v-if="form.errors.title" class="text-xs text-rose-600 font-semibold">{{ form.errors.title }}</div>
            </div>

            <!-- Slug -->
            <div class="space-y-1">
              <label for="slug" class="text-xs font-bold text-brand-dark/80 uppercase tracking-wider">Slug (URL)</label>
              <input 
                id="slug"
                v-model="form.slug"
                type="text" 
                required
                class="w-full bg-brand-cream/70 border border-brand-sand rounded-xl px-4 py-2.5 text-sm text-brand-dark placeholder-brand-leaf/40 focus:outline-none focus:border-brand-primary focus:ring-2 focus:ring-brand-primary/15 transition-all duration-200"
                placeholder="royal-silk-abaya"
              />
              <div v-if="form.errors.slug" class="text-xs text-rose-600 font-semibold">{{ form.errors.slug }}</div>
            </div>

            <!-- Category -->
            <div class="space-y-1">
              <label for="category_id" class="text-xs font-bold text-brand-dark/80 uppercase tracking-wider">Kategori Koleksi</label>
              <select 
                id="category_id"
                v-model="form.category_id"
                required
                class="w-full bg-brand-cream/70 border border-brand-sand rounded-xl px-4 py-2.5 text-sm text-brand-dark focus:outline-none focus:border-brand-primary focus:ring-2 focus:ring-brand-primary/15 transition-all duration-200 cursor-pointer"
              >
                <option value="" disabled>Pilih Kategori...</option>
                <option v-for="cat in categories" :key="cat.id" :value="cat.id">
                  {{ cat.name }}
                </option>
              </select>
              <div v-if="form.errors.category_id" class="text-xs text-rose-600 font-semibold">{{ form.errors.category_id }}</div>
            </div>
          </div>

          <!-- Content (Textarea) -->
          <div class="space-y-1">
            <label for="content" class="text-xs font-bold text-brand-dark/80 uppercase tracking-wider">Deskripsi Material & Detail Busana</label>
            <textarea 
              id="content"
              v-model="form.content"
              rows="10"
              required
              class="w-full bg-brand-cream/70 border border-brand-sand rounded-xl px-4 py-3 text-sm text-brand-dark placeholder-brand-leaf/40 focus:outline-none focus:border-brand-primary focus:ring-2 focus:ring-brand-primary/15 transition-all duration-200 resize-none"
              placeholder="Deskripsikan material kain (Pure Silk, Baby Doll Ceruty), detail jahitan, panduan ukuran, dan saran styling..."
            ></textarea>
            <div v-if="form.errors.content" class="text-xs text-rose-600 font-semibold">{{ form.errors.content }}</div>
          </div>

          <!-- Image and Configuration Settings Grid -->
          <div class="grid grid-cols-1 md:grid-cols-3 gap-6 items-start border-t border-brand-sand/60 pt-6">
            <!-- Image Upload Preview & Selector -->
            <div class="md:col-span-2 space-y-4">
              <label class="text-xs font-bold text-brand-dark/80 uppercase tracking-wider block">Foto Busana / Cover Realistis</label>
              
              <!-- Dashed Upload Zone -->
              <div 
                @dragover.prevent="isDragging = true"
                @dragleave.prevent="isDragging = false"
                @drop.prevent="handleDrop"
                :class="[
                  isDragging ? 'border-brand-primary bg-brand-sand/40' : 'border-brand-sand bg-brand-cream/40 hover:border-brand-primary/60',
                  'border-2 border-dashed rounded-3xl p-6 flex flex-col items-center justify-center text-center cursor-pointer transition-all duration-300 relative min-h-[160px]'
                ]"
              >
                <input 
                  id="image"
                  type="file" 
                  class="absolute inset-0 w-full h-full opacity-0 cursor-pointer" 
                  accept="image/*"
                  @change="handleImageChange"
                />

                <!-- Dynamic Icon/Preview -->
                <div v-if="imagePreview" class="relative group max-w-[240px] max-h-[140px] rounded-2xl overflow-hidden p-1.5 bg-white border border-brand-sand shadow-sm">
                  <img 
                    :src="imagePreview" 
                    alt="Post Cover Preview" 
                    class="max-w-full max-h-full object-contain"
                  />
                </div>
                <div v-else class="flex flex-col items-center gap-2">
                  <div class="p-3 bg-brand-sand/60 rounded-xl text-brand-dark border border-brand-blush/60 shadow-sm">
                    <ImageIcon class="w-6 h-6 text-brand-leaf" />
                  </div>
                  <div>
                    <p class="text-xs font-semibold text-brand-dark">Drag & drop foto busana di sini</p>
                    <p class="text-[10px] text-brand-leaf/70 mt-0.5">Format JPG, PNG, WEBP (Maksimal 2 MB)</p>
                  </div>
                </div>
              </div>
              
              <div v-if="form.errors.image" class="text-xs text-rose-600 font-semibold mt-1">{{ form.errors.image }}</div>
            </div>

            <!-- Configuration / Visibility -->
            <div class="space-y-4 md:col-span-1 md:border-l border-brand-sand/60 md:pl-6">
              <label class="text-xs font-bold text-brand-dark/80 uppercase tracking-wider block">Status Publikasi</label>
              
              <!-- Status -->
              <div class="space-y-1">
                <label for="status" class="text-xxs font-bold text-brand-leaf/80 uppercase">Visibilitas</label>
                <select 
                  id="status"
                  v-model="form.status"
                  class="w-full bg-brand-cream/70 border border-brand-sand rounded-xl px-3 py-2 text-xs text-brand-dark focus:outline-none focus:border-brand-primary focus:ring-2 focus:ring-brand-primary/15 transition-all duration-200 cursor-pointer"
                >
                  <option value="draft">Draft (Simpan Internal)</option>
                  <option value="published">Published (Tampil di Butik)</option>
                </select>
              </div>

              <!-- Featured -->
              <div class="flex items-center gap-2.5 pt-2">
                <input 
                  id="is_featured"
                  v-model="form.is_featured"
                  type="checkbox" 
                  class="w-4 h-4 rounded text-brand-dark bg-white border-brand-sand focus:ring-brand-primary"
                />
                <label for="is_featured" class="text-xs font-semibold text-brand-dark cursor-pointer">Koleksi Utama (Featured)</label>
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
            {{ isEdit ? 'Perbarui Busana' : 'Simpan & Publikasikan' }}
          </button>
        </div>
      </form>
    </div>
  </AdminLayout>
</template>
