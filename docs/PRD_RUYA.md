# PRD — RÜYA: Modern Haute Modest Fashion E-Commerce

## 1. Executive Summary & Brand Identity
- **Nama Brand:** RÜYA (Rüya — Dream & Elegance in Modest Wear)
- **Industri / Niche:** Online Shop & Brand Fashion Muslimah Modern & High-End Modest Wear.
- **Brand Palette:**
  - **Primary & Deep Burgundy (`#530A1E`, `#3D0716`):** Identitas luhur dari cap stempel logo RÜYA, mencerminkan eksklusivitas, ketegasan, dan keanggunan.
  - **Dusty Blush & Romantic Rose (`#F7E7EB`, `#F4D6DC`, `#A85165`):** Sentuhan feminin yang tenang, elegan, dan menyejukkan.
  - **Warm Ecru / Silk Cream (`#FAF7F2`):** Latar belakang kanvas yang bersih, natural, dan bernapas tanpa silau putih buatan.
  - **Metallic Gold Accent (`#D4AF37`):** Sentuhan kemewahan couture pada kancing, detail lipit, dan bordir.
- **Logo:** Stamp emblem monogram RÜYA resmi (`/images/ruya-logo.png`).
- **Hero Master Visual:** Foto model berhijab kuning pastel memegang bunga pink (`/images/hero-model.jpg`).

---

## 2. Target Pengguna & Persona
1. **The Modern Professional Muslimah (Usia 22 - 40 tahun):**
   - Menghargai kualitas bahan silk, satin, linen, dan jahitan semi-boutique.
   - Mengutamakan cutting busana syar'i namun tetap ramping, anggun, dan tidak menerawang.
2. **Kolektor Busana Khusus (Event, Hari Raya, Umrah/Haji, Pesta):**
   - Mencari abaya premium, kaftan drapery, serta pashmina silk dengan detail manset dan kancing signature.

---

## 3. Fitur Utama Platform Online Shop (Web & Mobile)
1. **Header & Navigation Interaktif:**
   - Logo stamp RÜYA responsif dengan tipografi serif elegan.
   - Menu kategori: *Abaya & Dress, Hijab & Scarf, Outerwear, Loungewear*.
   - Shortcut keranjang belanja / tas pesanan dengan counter badge dinamis.
   - Tombol "Order via WhatsApp" dengan auto-formatting salam dan daftar barang.
2. **Asymmetrical Editorial Hero Section:**
   - Menampilkan visual otentik dari materi photoshoot brand RÜYA.
   - Tagline puitis: *"Kemewahan Busana Modest dalam Setiap Helaian Mimpi"*.
   - Floating Specs Card: *100% Mulberry Silk Blend, Bespoke Tailoring, Breathable Fabric*.
3. **Katalog & Filter Produk Terintegrasi:**
   - Filter cepat berdasarkan kategori pakaian.
   - Live search pencarian nama pakaian atau bahan.
   - Kartu produk interaktif: Foto realistik internet (bukan AI generated), label harga Rupiah (IDR), badge Best Seller, dan tombol "Pesan Langsung ke WhatsApp".
4. **Editorial Story & Filosofi RÜYA:**
   - Menjelaskan standar kurasi bahan, ketahanan warna, dan etika produksi pakaian lokal berstandar global.
5. **Interactive Lookbook & Bento Showcase:**
   - Menampilkan inspirasi styling pakaian RÜYA di kehidupan nyata (pernikahan, jamuan resmi, kantor, dan travelling).
6. **Social Proof & Testimoni Pelanggan:**
   - Ulasan nyata pelanggan setia mengenai kenyamanan cutting dan keawetan bahan.
7. **Direct WhatsApp Checkout & Consultation:**
   - Memungkinkan pembeli langsung terhubung dengan Personal Shopper RÜYA untuk konsultasi ukuran (Size Chart S, M, L, XL), warna, dan pengiriman kilat.
8. **Automated Webhook Deployer (`deploy.php`):**
   - Terpasang khusus untuk hosting `demo.hasanarofid.site` dengan token verifikasi SHA-256 aman dan auto migration / caching.

---

## 4. Struktur Database & Model
- **Products:** Nama busana, slug, material (Pure Silk, Premium Ceruty Baby Doll, dsb), ukuran, deskripsi, harga per pcs, thumbnail real.
- **Categories:** Abaya & Dress, Hijab & Pashmina, Outerwear & Kimono, Tunik & Setelan.
- **Portfolios / Lookbook:** Dokumentasi pemakaian busana di berbagai edisi musiman (Ramadhan Edition, Autumn Silk, Blossom Collection).
- **Inquiries / Orders:** Data konsultasi dan pesanan calon pembeli.

---

## 5. Deployment & Production Guide
- **Production Server:** `https://demo.hasanarofid.site`
- **Deploy Endpoint:** `https://demo.hasanarofid.site/deploy.php?token=ruya_luxury_deploy_2026_xyz`
- **Build Strategy:** Aset dikompilasi di lokal dengan `npm run build` sehingga hosting shared tidak membutuhkan Node.js.
