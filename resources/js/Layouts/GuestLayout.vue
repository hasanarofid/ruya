<script setup>
import { Link } from '@inertiajs/vue3';
import { ArrowLeft } from '@lucide/vue';
</script>

<template>
  <div class="min-h-screen bg-brand-cream text-brand-dark font-sans antialiased relative overflow-hidden flex flex-col items-center justify-center p-6 selection:bg-brand-sand selection:text-brand-dark">
    <!-- Atmospheric Haute Glow -->
    <div class="absolute top-[-15%] left-[-10%] w-[550px] h-[550px] rounded-full bg-brand-blush/35 blur-[120px] pointer-events-none"></div>
    <div class="absolute bottom-[-10%] right-[-10%] w-[600px] h-[600px] rounded-full bg-brand-sand/60 blur-[140px] pointer-events-none"></div>

    <!-- Back to Storefront Link -->
    <div class="w-full max-w-md mb-4 flex justify-between items-center relative z-10 px-1">
      <Link 
        href="/" 
        class="inline-flex items-center gap-2 text-xs font-semibold text-brand-leaf hover:text-brand-dark transition-colors duration-200"
      >
        <ArrowLeft class="w-4 h-4" />
        Kembali ke Butik RÜYA
      </Link>
      <span class="text-[11px] font-serif tracking-widest text-brand-leaf/60 uppercase">
        Haute Modest Wear
      </span>
    </div>

    <!-- Card Container -->
    <div class="w-full sm:max-w-md bg-white/95 border border-brand-sand shadow-fashion backdrop-blur-md rounded-3xl p-8 sm:p-10 relative z-10 space-y-7">
      <!-- Branding & Monogram Stamp -->
      <div class="flex flex-col items-center gap-3">
        <Link 
          href="/" 
          class="p-2.5 bg-brand-cream border border-brand-gold/40 rounded-2xl shadow-sm hover:scale-105 hover:shadow-md transition-all duration-300"
          title="RÜYA Modest Wear"
        >
          <img 
            src="/images/ruya-logo.png" 
            alt="RÜYA Official Logo" 
            class="w-14 h-14 object-contain"
          />
        </Link>
        <div class="text-center">
          <h1 class="text-2xl font-serif font-bold text-brand-dark tracking-[0.25em] uppercase">RÜYA</h1>
          <p class="text-[11px] text-brand-leaf font-semibold uppercase tracking-widest mt-1">Atelier & Boutique Panel</p>
          <div class="w-10 h-0.5 bg-brand-gold/60 mx-auto mt-2"></div>
        </div>
      </div>

      <!-- Form Content Slot -->
      <div class="space-y-4">
        <slot />
      </div>
    </div>

    <!-- Micro Footer -->
    <div class="relative z-10 text-center mt-6">
      <p class="text-xs text-brand-leaf/70 font-medium">
        &copy; {{ new Date().getFullYear() }} RÜYA — Dream & Elegance in Modest Wear.
      </p>
    </div>
  </div>
</template>
