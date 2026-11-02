<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue';
import { Head, Link } from '@inertiajs/vue3';
import { Users, FileText, Layers, Settings, ArrowRight, Sparkles, ShoppingBag, Eye } from '@lucide/vue';

const props = defineProps({
  stats: {
    type: Object,
    required: true
  },
  recent_posts: {
    type: Array,
    required: true
  }
});
</script>

<template>
  <Head title="Atelier Dashboard — RÜYA" />

  <AdminLayout>
    <div class="space-y-8">
      <!-- Title Page -->
      <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
        <div>
          <div class="flex items-center gap-2 text-xs font-semibold uppercase tracking-widest text-brand-leaf mb-1">
            <Sparkles class="w-4 h-4 text-brand-gold" />
            <span>Executive Atelier Management</span>
          </div>
          <h2 class="text-3xl font-serif font-bold tracking-tight text-brand-dark">Dashboard Overview</h2>
          <p class="text-sm text-brand-leaf/80 mt-1">Selamat datang kembali di pusat pengelolaan koleksi dan busana RÜYA.</p>
        </div>

        <div class="flex items-center gap-3">
          <a 
            href="/" 
            target="_blank"
            class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl border border-brand-sand bg-white hover:bg-brand-sand/50 text-brand-dark text-xs font-semibold uppercase tracking-wider shadow-sm transition-all"
          >
            <Eye class="w-4 h-4 text-brand-leaf" />
            Lihat Halaman Depan
          </a>
          <Link 
            :href="route('admin.posts.create')"
            class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl border border-brand-gold/30 bg-brand-dark hover:bg-brand-deep text-brand-cream text-xs font-semibold uppercase tracking-wider shadow-md transition-all cursor-pointer"
          >
            <ShoppingBag class="w-4 h-4 text-brand-gold" />
            Tambah Busana / Artikel
          </Link>
        </div>
      </div>

      <!-- Stats Grid -->
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <!-- Users count card -->
        <div class="bg-white border border-brand-sand/80 rounded-3xl p-6 relative overflow-hidden shadow-fashion hover:shadow-card-hover transition-all duration-300 group">
          <div class="flex items-center justify-between">
            <div class="space-y-2">
              <span class="text-xs font-bold text-brand-leaf/70 uppercase tracking-widest">Pengguna & Tim</span>
              <h3 class="text-3xl font-serif font-black text-brand-dark">{{ stats.users_count }}</h3>
              <p class="text-[11px] text-brand-leaf/60">Administrator & Stylist</p>
            </div>
            <div class="p-3.5 bg-brand-sand/60 text-brand-dark rounded-2xl border border-brand-blush/60 shadow-sm">
              <Users class="w-6 h-6" />
            </div>
          </div>
        </div>

        <!-- Pages count card -->
        <div class="bg-white border border-brand-sand/80 rounded-3xl p-6 relative overflow-hidden shadow-fashion hover:shadow-card-hover transition-all duration-300 group">
          <div class="flex items-center justify-between">
            <div class="space-y-2">
              <span class="text-xs font-bold text-brand-leaf/70 uppercase tracking-widest">Halaman & Seksi</span>
              <h3 class="text-3xl font-serif font-black text-brand-dark">{{ stats.pages_count }}</h3>
              <p class="text-[11px] text-brand-leaf/60">Landing & Lookbook</p>
            </div>
            <div class="p-3.5 bg-brand-sand/60 text-brand-dark rounded-2xl border border-brand-blush/60 shadow-sm">
              <Layers class="w-6 h-6" />
            </div>
          </div>
        </div>

        <!-- Posts count card -->
        <div class="bg-white border border-brand-sand/80 rounded-3xl p-6 relative overflow-hidden shadow-fashion hover:shadow-card-hover transition-all duration-300 group">
          <div class="flex items-center justify-between">
            <div class="space-y-2">
              <span class="text-xs font-bold text-brand-leaf/70 uppercase tracking-widest">Total Post / Busana</span>
              <h3 class="text-3xl font-serif font-black text-brand-dark">{{ stats.posts_count }}</h3>
              <p class="text-[11px] text-brand-leaf/60">Koleksi & Journal</p>
            </div>
            <div class="p-3.5 bg-brand-sand/60 text-brand-dark rounded-2xl border border-brand-blush/60 shadow-sm">
              <FileText class="w-6 h-6" />
            </div>
          </div>
        </div>

        <!-- Settings count card -->
        <div class="bg-white border border-brand-sand/80 rounded-3xl p-6 relative overflow-hidden shadow-fashion hover:shadow-card-hover transition-all duration-300 group">
          <div class="flex items-center justify-between">
            <div class="space-y-2">
              <span class="text-xs font-bold text-brand-leaf/70 uppercase tracking-widest">Konfigurasi Butik</span>
              <h3 class="text-3xl font-serif font-black text-brand-dark">{{ stats.settings_count }}</h3>
              <p class="text-[11px] text-brand-leaf/60">Kontak, WhatsApp, Info</p>
            </div>
            <div class="p-3.5 bg-brand-sand/60 text-brand-dark rounded-2xl border border-brand-blush/60 shadow-sm">
              <Settings class="w-6 h-6" />
            </div>
          </div>
        </div>
      </div>

      <!-- Quick Actions and Recent posts -->
      <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Recent posts list -->
        <div class="lg:col-span-2 bg-white border border-brand-sand/80 rounded-3xl p-6 md:p-8 shadow-fashion space-y-6">
          <div class="flex items-center justify-between border-b border-brand-sand/60 pb-4">
            <div>
              <h3 class="text-lg font-serif font-bold text-brand-dark">Koleksi & Postingan Terbaru</h3>
              <p class="text-xs text-brand-leaf/70 mt-0.5">Daftar busana atau artikel jurnal yang baru diterbitkan.</p>
            </div>
            <Link :href="route('admin.posts.index')" class="text-xs text-brand-leaf hover:text-brand-dark font-semibold flex items-center gap-1 transition-colors">
              Lihat semua <ArrowRight class="w-3.5 h-3.5" />
            </Link>
          </div>

          <div class="divide-y divide-brand-sand/60">
            <div 
              v-for="post in recent_posts" 
              :key="post.id"
              class="py-4 first:pt-0 last:pb-0 flex items-center justify-between gap-4"
            >
              <div class="min-w-0 space-y-1">
                <span class="text-[11px] font-semibold text-brand-dark px-2.5 py-0.5 bg-brand-sand/60 rounded-full border border-brand-blush/60">
                  {{ post.category?.name || 'Koleksi Umum' }}
                </span>
                <h4 class="text-sm font-semibold text-brand-dark truncate mt-1">{{ post.title }}</h4>
                <p class="text-xs text-brand-leaf/60">{{ new Date(post.created_at).toLocaleDateString('id-ID', { day: 'numeric', month: 'long', year: 'numeric' }) }}</p>
              </div>

              <div>
                <span 
                  :class="[
                    post.status === 'published' 
                      ? 'bg-emerald-50 text-emerald-700 border border-emerald-200' 
                      : 'bg-brand-sand/60 text-brand-leaf border border-brand-sand',
                    'px-3 py-1 rounded-full text-xs font-semibold'
                  ]"
                >
                  {{ post.status === 'published' ? 'Published' : 'Draft' }}
                </span>
              </div>
            </div>
            <div v-if="recent_posts.length === 0" class="py-12 text-center text-brand-leaf/60 text-sm">
              Belum ada postingan atau busana terdaftar.
            </div>
          </div>
        </div>

        <!-- Quick actions / PRD Guide Panel -->
        <div class="bg-white border border-brand-sand/80 rounded-3xl p-6 md:p-8 shadow-fashion space-y-6">
          <div class="border-b border-brand-sand/60 pb-4">
            <h3 class="text-lg font-serif font-bold text-brand-dark">Panduan Atelier RÜYA</h3>
            <p class="text-xs text-brand-leaf/70 mt-0.5">Ringkasan tata kelola platform butik Anda.</p>
          </div>

          <div class="space-y-4 text-xs text-brand-dark/80">
            <div class="p-4 bg-brand-cream/70 rounded-2xl border border-brand-sand">
              <h4 class="font-bold text-brand-dark text-xs uppercase tracking-wider mb-1 flex items-center gap-1.5">
                <span class="w-1.5 h-1.5 rounded-full bg-brand-gold"></span>
                Pengaturan Butik & WhatsApp
              </h4>
              <p class="text-brand-leaf/80 leading-relaxed">Kelola nomor WhatsApp pemesanan, alamat boutique studio, dan nama brand di menu <strong>Pengaturan Butik</strong>.</p>
            </div>
            <div class="p-4 bg-brand-cream/70 rounded-2xl border border-brand-sand">
              <h4 class="font-bold text-brand-dark text-xs uppercase tracking-wider mb-1 flex items-center gap-1.5">
                <span class="w-1.5 h-1.5 rounded-full bg-brand-gold"></span>
                Katalog & Koleksi Busana
              </h4>
              <p class="text-brand-leaf/80 leading-relaxed">Tambah atau perbarui koleksi Abaya & Dress, Hijab & Pashmina, Outerwear, serta Journal pada menu <strong>Katalog & Posts</strong>.</p>
            </div>
            <div class="p-4 bg-brand-cream/70 rounded-2xl border border-brand-sand">
              <h4 class="font-bold text-brand-dark text-xs uppercase tracking-wider mb-1 flex items-center gap-1.5">
                <span class="w-1.5 h-1.5 rounded-full bg-brand-gold"></span>
                Visual Landing Page
              </h4>
              <p class="text-brand-leaf/80 leading-relaxed">Susun Hero Section, Filosofi RÜYA, dan Lookbook Bento secara dinamis melalui menu <strong>Pages & Sections</strong>.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </AdminLayout>
</template>
