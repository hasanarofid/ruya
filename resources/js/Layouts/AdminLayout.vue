<script setup>
import { ref } from 'vue';
import { Link, router, usePage } from '@inertiajs/vue3';
import { 
  LayoutDashboard, 
  Settings as SettingsIcon, 
  FileText, 
  Menu, 
  X, 
  LogOut, 
  Layers,
  ChevronDown,
  Search,
  ChevronLeft,
  ChevronRight,
  ExternalLink,
  Sparkles
} from '@lucide/vue';

const page = usePage();
const user = page.props.auth.user;

const isSidebarOpen = ref(false);
const isSidebarCollapsed = ref(false);
const isUserMenuOpen = ref(false);

const navigation = [
  { name: 'Dashboard', href: route('admin.dashboard'), icon: LayoutDashboard, current: route().current('admin.dashboard') },
  { name: 'Pages & Sections', href: route('admin.pages.index'), icon: Layers, current: route().current('admin.pages.*') },
  { name: 'Katalog & Posts', href: route('admin.posts.index'), icon: FileText, current: route().current('admin.posts.*') },
  { name: 'Pengaturan Butik', href: route('admin.settings.index'), icon: SettingsIcon, current: route().current('admin.settings.index') },
];

const logout = () => {
  router.post(route('logout'));
};
</script>

<template>
  <div class="min-h-screen bg-brand-cream text-brand-dark font-sans antialiased relative overflow-hidden selection:bg-brand-sand selection:text-brand-dark">
    <!-- Mobile Sidebar Backdrop -->
    <div 
      v-if="isSidebarOpen" 
      @click="isSidebarOpen = false" 
      class="fixed inset-0 z-40 bg-brand-deep/70 backdrop-blur-sm lg:hidden transition-opacity"
    ></div>

    <!-- Sidebar for Mobile and Desktop -->
    <aside 
      :class="[
        isSidebarOpen ? 'translate-x-0' : '-translate-x-full lg:translate-x-0',
        isSidebarCollapsed ? 'lg:w-20' : 'lg:w-72',
        'fixed top-0 bottom-0 left-0 z-50 w-72 bg-brand-deep border-r border-brand-dark/40 shadow-2xl transition-all duration-300 ease-in-out lg:fixed flex flex-col justify-between'
      ]"
    >
      <div>
        <!-- Sidebar Header / RÜYA Monogram Logo -->
        <div :class="[isSidebarCollapsed ? 'lg:px-0 lg:justify-center' : 'px-6 justify-between', 'flex items-center h-20 border-b border-brand-dark/50 bg-brand-deep/90']">
          <Link :href="route('admin.dashboard')" class="flex items-center gap-3">
            <div class="w-11 h-11 p-1 bg-brand-cream/10 border border-brand-gold/40 rounded-xl shadow-inner shrink-0 flex items-center justify-center">
              <img 
                src="/images/ruya-logo.png" 
                alt="RÜYA" 
                class="w-full h-full object-contain"
              />
            </div>
            <div :class="[isSidebarCollapsed ? 'lg:hidden' : 'block', 'transition-opacity duration-300']">
              <h1 class="text-base font-serif font-bold tracking-[0.2em] text-white uppercase leading-none">RÜYA</h1>
              <p class="text-[10px] text-brand-gold font-semibold tracking-widest uppercase mt-1">Haute Modest Atelier</p>
            </div>
          </Link>
          <button 
            @click="isSidebarOpen = false" 
            class="p-2 text-brand-sand/70 rounded-lg hover:bg-brand-dark hover:text-white lg:hidden"
          >
            <X class="w-5 h-5" />
          </button>
        </div>

        <!-- Navigation Links -->
        <nav class="px-3 py-6 space-y-1.5 overflow-y-auto">
          <Link 
            v-for="item in navigation" 
            :key="item.name" 
            :href="item.href"
            :class="[
              item.current 
                ? 'bg-brand-dark text-white border-l-4 border-brand-gold shadow-sm font-semibold' 
                : 'text-brand-sand/75 hover:bg-brand-dark/40 hover:text-white border-l-4 border-transparent',
              isSidebarCollapsed ? 'lg:justify-center lg:px-0' : 'px-4',
              'group flex items-center py-3.5 text-xs uppercase tracking-wider rounded-r-xl transition-all duration-200'
            ]"
            :title="isSidebarCollapsed ? item.name : ''"
          >
            <component 
              :is="item.icon" 
              :class="[
                item.current ? 'text-brand-gold' : 'text-brand-sand/60 group-hover:text-brand-gold/80',
                isSidebarCollapsed ? 'lg:mr-0' : 'mr-3',
                'h-5 w-5 flex-shrink-0 transition-transform duration-200 group-hover:scale-105'
              ]" 
            />
            <span :class="[isSidebarCollapsed ? 'lg:hidden' : 'block', 'whitespace-nowrap']">{{ item.name }}</span>
          </Link>
        </nav>
      </div>

      <!-- Sidebar Footer / Template Info & Profile -->
      <div :class="[isSidebarCollapsed ? 'lg:p-2' : 'p-4', 'border-t border-brand-dark/50 bg-brand-deep/80']">
        <!-- Collapse Toggle Row -->
        <div :class="[isSidebarCollapsed ? 'lg:px-0 lg:justify-center' : 'px-2 justify-between', 'mb-3 flex items-center text-[11px] text-brand-sand/60 font-semibold uppercase tracking-wider transition-opacity duration-300']">
          <div v-if="!isSidebarCollapsed" class="flex items-center gap-1.5">
            <Sparkles class="w-3.5 h-3.5 text-brand-gold" />
            <span class="text-brand-sand/80 font-serif tracking-widest text-xs">RÜYA Atelier</span>
          </div>
          <!-- Collapse Toggle for Desktop -->
          <div class="hidden lg:block">
            <button 
              @click="isSidebarCollapsed = !isSidebarCollapsed"
              class="p-1.5 bg-brand-dark hover:bg-brand-dark/80 border border-brand-sand/20 rounded-lg text-brand-sand/70 hover:text-white transition-colors cursor-pointer"
              title="Persempit / Perlebar Menu"
            >
              <ChevronLeft v-if="!isSidebarCollapsed" class="w-4 h-4" />
              <ChevronRight v-else class="w-4 h-4" />
            </button>
          </div>
        </div>

        <!-- User profile widget -->
        <div :class="[isSidebarCollapsed ? 'lg:px-0 lg:justify-center' : 'px-2 gap-3', 'flex items-center pt-3 border-t border-brand-dark/50']">
          <div class="w-10 h-10 rounded-full bg-brand-dark text-brand-gold font-serif font-bold text-sm border border-brand-gold/40 flex items-center justify-center shrink-0 shadow-sm">
            {{ user.name.charAt(0).toUpperCase() }}
          </div>
          <div :class="[isSidebarCollapsed ? 'lg:hidden' : 'block', 'flex-1 min-w-0 transition-opacity duration-300']">
            <p class="text-xs font-bold text-white truncate">{{ user.name }}</p>
            <p class="text-[11px] text-brand-sand/60 truncate">{{ user.email }}</p>
          </div>
          <button 
            :class="[isSidebarCollapsed ? 'lg:hidden' : 'block']"
            @click="logout" 
            title="Keluar dari Panel Admin"
            class="p-2 text-brand-sand/70 rounded-lg hover:bg-brand-dark hover:text-brand-blush transition-colors cursor-pointer"
          >
            <LogOut class="w-4.5 h-4.5" />
          </button>
        </div>
      </div>
    </aside>

    <!-- Main Content Wrapper -->
    <div 
      :class="[
        isSidebarCollapsed ? 'lg:pl-20' : 'lg:pl-72',
        'flex flex-col min-h-screen transition-all duration-300 ease-in-out'
      ]"
    >
      <!-- Top header bar (Sticky Luxury Silk) -->
      <header class="flex items-center justify-between h-20 px-6 md:px-8 border-b border-brand-sand/80 bg-white/90 backdrop-blur-md sticky top-0 z-30 shadow-sm">
        <div class="flex items-center gap-6 flex-1 max-w-md">
          <button 
            @click="isSidebarOpen = true" 
            class="p-2 text-brand-dark/70 rounded-lg hover:bg-brand-sand/40 hover:text-brand-dark lg:hidden"
          >
            <Menu class="w-6 h-6" />
          </button>
          
          <!-- Floating search bar -->
          <div class="relative w-full hidden sm:block">
            <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-brand-leaf/60">
              <Search class="w-4 h-4" />
            </span>
            <input 
              type="text" 
              placeholder="Cari busana, halaman, atau pengaturan..."
              class="w-full bg-brand-cream/70 border border-brand-sand rounded-xl pl-10 pr-4 py-2.5 text-xs text-brand-dark placeholder-brand-leaf/50 focus:outline-none focus:border-brand-primary focus:ring-1 focus:ring-brand-primary/20 transition-colors"
            />
          </div>
        </div>

        <!-- Right Header Elements -->
        <div class="flex items-center gap-4 sm:gap-6">
          <!-- View Live Storefront Button -->
          <a 
            href="/" 
            target="_blank" 
            class="hidden md:inline-flex items-center gap-2 px-3.5 py-1.5 rounded-xl border border-brand-sand bg-brand-sand/40 hover:bg-brand-sand/70 text-brand-dark text-xs font-semibold tracking-wide transition-colors"
            title="Buka Website Frontend RÜYA"
          >
            <ExternalLink class="w-3.5 h-3.5 text-brand-leaf" />
            Lihat Butik
          </a>

          <!-- Studio Status Indicator -->
          <div class="flex items-center gap-2 px-3 py-1.5 bg-brand-sand/50 border border-brand-blush/60 rounded-full text-[10px] font-bold text-brand-dark uppercase tracking-wider">
            <span class="w-1.5 h-1.5 bg-emerald-600 rounded-full animate-ping"></span>
            Atelier: Online
          </div>

          <!-- Profile dropdown -->
          <div class="relative">
            <button 
              @click="isUserMenuOpen = !isUserMenuOpen"
              class="flex items-center gap-2.5 px-3 py-2 rounded-xl hover:bg-brand-sand/40 border border-transparent hover:border-brand-sand transition-all text-brand-dark cursor-pointer"
            >
              <div class="w-8 h-8 rounded-xl bg-brand-dark text-brand-gold font-serif font-bold flex items-center justify-center text-xs shadow-sm">
                {{ user.name.charAt(0).toUpperCase() }}
              </div>
              <span class="text-xs font-semibold hidden md:inline-block">{{ user.name }}</span>
              <ChevronDown class="w-4 h-4 text-brand-leaf transition-transform duration-200" :class="{ 'rotate-180': isUserMenuOpen }" />
            </button>
            <div 
              v-if="isUserMenuOpen" 
              @click="isUserMenuOpen = false" 
              class="fixed inset-0 z-10"
            ></div>
            <div 
              v-if="isUserMenuOpen" 
              class="absolute right-0 mt-2 w-52 rounded-2xl bg-white border border-brand-sand shadow-fashion py-2 z-20 overflow-hidden transform origin-top-right transition-all"
            >
              <div class="px-4 py-2 border-b border-brand-sand/60">
                <p class="text-xs font-bold text-brand-dark truncate">{{ user.name }}</p>
                <p class="text-[10px] text-brand-leaf truncate">{{ user.email }}</p>
              </div>
              <Link 
                :href="route('profile.edit')" 
                class="block px-4 py-2.5 text-xs font-medium text-brand-dark hover:bg-brand-sand/30 transition-colors"
              >
                Pengaturan Akun & Profil
              </Link>
              <a 
                href="/" 
                target="_blank"
                class="block px-4 py-2.5 text-xs font-medium text-brand-dark hover:bg-brand-sand/30 transition-colors md:hidden"
              >
                Buka Butik RÜYA
              </a>
              <button 
                @click="logout" 
                class="w-full text-left block px-4 py-2.5 text-xs font-bold text-rose-700 hover:bg-rose-50 transition-colors border-t border-brand-sand/60 cursor-pointer"
              >
                Keluar (Sign Out)
              </button>
            </div>
          </div>
        </div>
      </header>

      <!-- Main Panel Page -->
      <main class="flex-1 p-6 md:p-8 bg-brand-cream">
        <!-- Toast Notification Alert if session contains flash success/error -->
        <div v-if="$page.props.flash?.success" class="mb-6 p-4 bg-emerald-50 border border-emerald-200 text-emerald-800 rounded-2xl flex items-center justify-between shadow-sm">
          <div class="flex items-center gap-2.5">
            <span class="w-2 h-2 rounded-full bg-emerald-600"></span>
            <span class="text-sm font-medium">{{ $page.props.flash.success }}</span>
          </div>
        </div>
        <div v-if="$page.props.flash?.error" class="mb-6 p-4 bg-rose-50 border border-rose-200 text-rose-800 rounded-2xl flex items-center justify-between shadow-sm">
          <div class="flex items-center gap-2.5">
            <span class="w-2 h-2 rounded-full bg-rose-600"></span>
            <span class="text-sm font-medium">{{ $page.props.flash.error }}</span>
          </div>
        </div>

        <slot />
      </main>
    </div>
  </div>
</template>
