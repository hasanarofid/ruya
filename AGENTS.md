# RÜYA — Haute Modest Fashion System Rules

Rujuk file dokumentasi lengkap di [PRD_RUYA.md](file:///home/hasanarofid/Documents/hasanarofid/ruya/ruya/docs/PRD_RUYA.md) dan [.cursorrules](file:///home/hasanarofid/Documents/hasanarofid/ruya/ruya/.cursorrules).

## Prinsip Utama
1. **Identitas Brand:** RÜYA (Haute Modest Wear & Muslimah Fashion).
2. **Palet Warna Wajib:**
   - Deep Royal Burgundy: `#530A1E`, `#3D0716` (`brand-dark`, `brand-deep`)
   - Warm Ecru / Silk Cream: `#FAF7F2` (`brand-cream`)
   - Dusty Blush & Romantic Rose: `#F7E7EB`, `#F4D6DC`, `#A85165` (`brand-sand`, `brand-blush`, `brand-leaf`)
   - Metallic Gold: `#D4AF37` (`brand-gold`)
3. **Logo:** Stamp emblem monogram RÜYA (`/images/ruya-logo.png`).
4. **UI/UX Admin & Auth:** Seluruh halaman Admin dan Auth (`/login`, `/register`, `/admin/*`) wajib mengadopsi estetika couture RÜYA yang harmonis dengan frontend, bukan generic boilerplate slate/indigo.
5. **Akses Admin:** Route `/admin` langsung menuju `/admin/dashboard` (dengan middleware auth).
