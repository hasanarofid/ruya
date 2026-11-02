# RÜYA — Haute Modest Fashion & Luxury Abaya Online Shop

Repositori resmi untuk **RÜYA** (`https://github.com/hasanarofid/ruya.git`), sebuah platform e-commerce dan profil butik busana muslimah kontemporer berkelas tinggi (*haute modest wear*).

---

## 🌟 Brand Identity & Visual Language
- **Brand Name:** RÜYA
- **Core Product:** Signature Abaya, Silk & Voile Scarf, Ethereal Dresses, Luxe Kimono Outerwear.
- **Color Tokens:**
  - `brand.dark` (`#530A1E`): Deep Royal Burgundy (warna emblem stempel logo RÜYA).
  - `brand.deep` (`#3D0716`): Wine Noir untuk footer dan elemen berbobot tinggi.
  - `brand.sand` (`#F7E7EB`): Soft Blush Tint untuk kartu bento & preview card.
  - `brand.cream` (`#FAF7F2`): Warm Ecru Silk background utama yang bersih dan natural.
- **Photos & Visuals:** 100% foto realistik internet berkualitas tinggi (non-AI generated slop).

---

## 🚀 Fitur Unggulan
1. **Interactive Editorial Homepage:** Asymmetrical hero section, storytelling filosofi serat kain murni, kurasi produk unggulan, bento lookbook, dan social proof.
2. **Katalog Busana Terfilter:** Pencarian nama busana, filter kategori instan (*Signature Abaya, Hijab, Dresses, Outerwear*).
3. **Pemesanan Instan via WhatsApp:** Tombol "Pesan via WhatsApp" terisi otomatis dengan nama busana, ukuran, dan harga.
4. **Detail Halaman Produk:** Spesifikasi material (Pure Crepe Silk, Chiffon Voile), ukuran, dan saran perawatan.
5. **Lookbook & Journal:** Inspirasi padu padan gaya dan tips merawat busana sutra.
6. **Shared Hosting Auto Deployer (`deploy.php`):**
   - URL: `https://demo.hasanarofid.site/deploy.php?token=ruya_luxury_deploy_2026_xyz`

---

## 🛠️ Tech Stack
- **Backend:** Laravel 11 / 12 (PHP 8.3+)
- **Frontend:** Vue 3 (Composition API), Inertia.js, Tailwind CSS
- **Icons:** Lucide Icons
- **Animation:** GSAP (GreenSock Animation Platform)

---

## 📦 Setup & Instalasi Lokal

```bash
# Clone repositori
git clone https://github.com/hasanarofid/ruya.git
cd ruya

# Install dependencies
composer install
npm install

# Setup env
cp .env.example .env
php artisan key:generate

# Build frontend assets
npm run build

# Menjalankan server lokal
php artisan serve
```

---

## 🌐 Panduan Deployment (demo.hasanarofid.site)

File [public/deploy.php](file:///home/hasanarofid/Documents/hasanarofid/ruya/ruya/public/deploy.php) telah dikonfigurasi untuk shared hosting Anda.

1. **Trigger Manual via Browser:**
   ```
   https://demo.hasanarofid.site/deploy.php?token=ruya_luxury_deploy_2026_xyz
   ```
2. **Trigger Otomatis via GitHub Webhook:**
   - Payload URL: `https://demo.hasanarofid.site/deploy.php?token=ruya_luxury_deploy_2026_xyz`
   - Content Type: `application/json`
   - Event: `Just the push event`

---

## 📄 Dokumen PRD
Lihat [docs/PRD_RUYA.md](file:///home/hasanarofid/Documents/hasanarofid/ruya/ruya/docs/PRD_RUYA.md) untuk rincian Product Requirement Document dan data dummy klien.
