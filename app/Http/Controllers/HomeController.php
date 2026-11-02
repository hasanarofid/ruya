<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Portfolio;
use App\Models\Post;
use App\Models\Product;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class HomeController extends Controller
{
    /**
     * Menampilkan Homepage RÜYA Haute Modest Fashion dengan nuansa editorial & mewah.
     */
    public function index(): Response
    {
        // 1. Data Kategori Fashion
        $categories = collect([
            [
                'id' => 1,
                'name' => 'Signature Abaya',
                'slug' => 'signature-abaya',
                'description' => 'Siluet anggun dengan drapery mewah dan potongan syar\'i kontemporer.',
                'image' => '/images/products/abaya-cream-editorial.jpg',
                'count' => '24+ Model'
            ],
            [
                'id' => 2,
                'name' => 'Silk & Voile Hijab',
                'slug' => 'silk-voile-hijab',
                'description' => 'Pashmina dan scarf voal ultra-lembut, breathable, dan mudah dibentuk rapi.',
                'image' => '/images/products/hijab-voile-blush.jpg',
                'count' => '36+ Warna'
            ],
            [
                'id' => 3,
                'name' => 'Ethereal Dresses',
                'slug' => 'ethereal-dresses',
                'description' => 'Gaun feminin berpotongan longgar dengan sentuhan renda dan pleats halus.',
                'image' => '/images/products/dress-rose-pastel.jpg',
                'count' => '18+ Desain'
            ],
            [
                'id' => 4,
                'name' => 'Luxe Outerwear',
                'slug' => 'luxe-outerwear',
                'description' => 'Kimono abaya, kardigan tenun lembut, dan vest layering bergaya modern.',
                'image' => '/images/products/outer-kimono-linen.jpg',
                'count' => '15+ Koleksi'
            ],
            [
                'id' => 5,
                'name' => 'Burgundy Royal Series',
                'slug' => 'burgundy-royal-series',
                'description' => 'Edisi eksklusif warna anggun khas RÜYA dengan benang sutra emas pilihan.',
                'image' => '/images/products/abaya-burgundy-luxe.jpg',
                'count' => '10+ Limited'
            ],
            [
                'id' => 6,
                'name' => 'Pashmina Cashmere Silk',
                'slug' => 'pashmina-cashmere-silk',
                'description' => 'Selendang rajut sutra lembut untuk acara formal dan keseharian berkelas.',
                'image' => '/images/products/pashmina-silk-cashmere.jpg',
                'count' => '20+ Varian'
            ],
        ]);

        // 2. Koleksi Pakaian Unggulan (Featured Products)
        $featuredProducts = collect([
            [
                'id' => 1,
                'name' => 'Rüya Soleil Pastel Abaya Set',
                'slug' => 'ruya-soleil-pastel-abaya-set',
                'category' => ['name' => 'Signature Abaya'],
                'material' => 'Pure Crepe Silk & Golden Cuff Ring',
                'dimensions' => 'Ukuran All Size (LD 110-120cm, PB 140cm)',
                'price_range' => 'Rp 689.000',
                'thumbnail' => '/images/hero-model.jpg',
                'is_featured' => true,
                'short_description' => 'Abaya kuning pastel anggun dengan manset kancing gold vintage dan aksen lipit leher V yang memesona.',
            ],
            [
                'id' => 2,
                'name' => 'Amira Raw Silk Kimono Outer',
                'slug' => 'amira-raw-silk-kimono-outer',
                'category' => ['name' => 'Luxe Outerwear'],
                'material' => 'Raw Silk Blend with Soft Luster',
                'dimensions' => 'Free Size (Panjang 138cm)',
                'price_range' => 'Rp 549.000',
                'thumbnail' => '/images/products/outer-kimono-linen.jpg',
                'is_featured' => true,
                'short_description' => 'Outer beraksen drapery longgar yang memberi siluet ramping serta nyaman untuk layering pakaian pesta.',
            ],
            [
                'id' => 3,
                'name' => 'Damask Rose Pleated Dress',
                'slug' => 'damask-rose-pleated-dress',
                'category' => ['name' => 'Ethereal Dresses'],
                'material' => 'Silk Chiffon with Full Voile Furing',
                'dimensions' => 'Size: S, M, L, XL',
                'price_range' => 'Rp 729.000',
                'thumbnail' => '/images/products/dress-rose-pastel.jpg',
                'is_featured' => true,
                'short_description' => 'Gaun pesta warna dusty blush dengan lipit micro-pleat yang tidak mudah kusut serta adem dipakai seharian.',
            ],
            [
                'id' => 4,
                'name' => 'Rüya Imperial Burgundy Abaya',
                'slug' => 'ruya-imperial-burgundy-abaya',
                'category' => ['name' => 'Burgundy Royal Series'],
                'material' => 'Heavy Mulberry Silk Velvet Blend',
                'dimensions' => 'Size: M, L, Custom Length',
                'price_range' => 'Rp 899.000',
                'thumbnail' => '/images/products/abaya-burgundy-luxe.jpg',
                'is_featured' => true,
                'short_description' => 'Mahakarya warna khas logo RÜYA dengan kilau satin mewah dan sulaman benang emas di ujung lengan.',
            ],
            [
                'id' => 5,
                'name' => 'Cashmere Touch Silk Pashmina',
                'slug' => 'cashmere-touch-silk-pashmina',
                'category' => ['name' => 'Silk & Voile Hijab'],
                'material' => '100% Cashmere Silk Weave',
                'dimensions' => '200 x 75 cm',
                'price_range' => 'Rp 249.000',
                'thumbnail' => '/images/products/pashmina-silk-cashmere.jpg',
                'is_featured' => true,
                'short_description' => 'Pashmina premium yang jatuh sempurna, anti licin, dan memberikan rasa nyaman lembut di kulit leher.',
            ],
            [
                'id' => 6,
                'name' => 'Nocturne Noir French Abaya',
                'slug' => 'nocturne-noir-french-abaya',
                'category' => ['name' => 'Signature Abaya'],
                'material' => 'Nida Supreme Jetblack Fabric',
                'dimensions' => 'Size: S, M, L, XL',
                'price_range' => 'Rp 789.000',
                'thumbnail' => '/images/products/abaya-noir-classic.jpg',
                'is_featured' => true,
                'short_description' => 'Warna hitam pekat abadi (*jetblack deep*) dengan jahitan semi-boutique anti pudar dan tidak tembus pandang.',
            ],
        ]);

        // 3. Portofolio / Lookbook RÜYA (Inspirasi Styling di Lapangan)
        $portfolios = collect([
            [
                'id' => 1,
                'title' => 'The Spring Serenity Lookbook',
                'category' => 'Editorial Collection',
                'location' => 'Photoshoot Series 2026',
                'year' => '2026',
                'image' => '/images/hero-model.jpg',
                'description' => 'Kombinasi warna kuning pastel dan aksesori gold dalam nuansa interior warm minimalis.'
            ],
            [
                'id' => 2,
                'title' => 'Burgundy Royal Banquet Edition',
                'category' => 'Evening Wear',
                'location' => 'Grand Ballroom Gala',
                'year' => '2026',
                'image' => '/images/products/abaya-burgundy-luxe.jpg',
                'description' => 'Kemewahan warna wine yang memukau dalam sorotan lampu jamuan pesta resmi.'
            ],
            [
                'id' => 3,
                'title' => 'Atelier Craft & Detail Stitching',
                'category' => 'Craftsmanship',
                'location' => 'Rüya Couture Studio',
                'year' => '2026',
                'image' => '/images/products/atelier-craftsmanship.jpg',
                'description' => 'Proses kurasi bahan kain serat alami dan jahitan halus perorangan oleh penjahit ahli.'
            ],
            [
                'id' => 4,
                'title' => 'The Modern Modest Runway',
                'category' => 'Fashion Week',
                'location' => 'Jakarta Modest Showcase',
                'year' => '2025',
                'image' => '/images/products/collection-editorial-look.jpg',
                'description' => 'Penampilan koleksi kapsul RÜYA dengan drapery ringan yang memikat para penikmat busana santun.'
            ],
        ]);

        // 4. Layanan & Keunggulan Belanja di RÜYA
        $services = [
            [
                'icon' => 'Sparkles',
                'title' => 'Premium Pure Fabrics',
                'description' => 'Setiap helai kain dipilih teliti: Mulberry silk, ceruty baby doll kualitas ekspor, dan serat katun linen breathable ramah cuaca tropis.'
            ],
            [
                'icon' => 'Scissors',
                'title' => 'Custom Sizing & Hemming',
                'description' => 'Kami melayani penyesuaian panjang gamis dan lingkar dada agar busana jatuh presisi dan menyempurnakan siluet tubuh Anda.'
            ],
            [
                'icon' => 'ShieldCheck',
                'title' => '100% Modest & Non-Sheer',
                'description' => 'Jaminan bahan tidak menerawang dengan furing lembut ganda dan cutting syar\'i yang tetap tampil kekinian.'
            ],
            [
                'icon' => 'Truck',
                'title' => 'Express & Worldwide Delivery',
                'description' => 'Pengiriman kilat ke seluruh Indonesia dengan hardbox eksklusif RÜYA dan pita satin mewah, cocok untuk hadiah istimewa.'
            ],
        ];

        // 5. Testimonial Nyata Klien / Pembeli
        $testimonials = [
            [
                'quote' => 'Jatuh cinta sekali dengan Soleil Pastel Abaya! Bahannya adem banget, detail manset kancing gold-nya kelihatan mewah seperti beli di butik Dubai.',
                'author' => 'dr. Nabila Almira, Sp.A',
                'role' => 'Dokter & Modest Fashion Enthusiast',
                'project' => 'Soleil Pastel Abaya Set',
                'avatar' => '/images/products/abaya-cream-editorial.jpg',
            ],
            [
                'quote' => 'Jahitannya super rapi dan tidak ada benang sisa sama sekali. Dipakai untuk acara resepsi keluarga banyak yang menanyakan beli di mana.',
                'author' => 'Siti Farida Hanum',
                'role' => 'Notaris & Kolektor Gamis Silk',
                'project' => 'Imperial Burgundy Abaya',
                'avatar' => '/images/products/abaya-burgundy-luxe.jpg',
            ],
            [
                'quote' => 'Customer service via WhatsApp ramah dan responsif sekali membantu pilih ukuran yang pas. Pengemasan hardbox-nya wangi dan sangat berkelas!',
                'author' => 'Annisa Rahmawati',
                'role' => 'Entrepreneur',
                'project' => 'Damask Rose Dress & Voile Scarf',
                'avatar' => '/images/products/hijab-voile-blush.jpg',
            ],
        ];

        // 6. Artikel & Inspirasi Gaya Hijab (Fashion Editorial)
        $articles = collect([
            [
                'id' => 1,
                'title' => 'Rahasia Merawat Gaun Berbahan Sutra & Ceruty Agar Tetap Berkilau Abadi',
                'slug' => 'rahasia-merawat-gaun-sutra-ceruty',
                'excerpt' => 'Panduan praktis mencuci, menyetrika, dan menyimpan busana pesta berbahan sutra alami tanpa merusak serat kain.',
                'image_url' => '/images/products/atelier-craftsmanship.jpg',
                'category' => ['name' => 'Fashion Care'],
                'reading_time' => 3,
                'published_at' => '02 Nov 2026',
            ],
            [
                'id' => 2,
                'title' => 'Inspirasi Padu-Padan Warna Burgundy & Blush untuk Tampilan Pesta yang Elegan',
                'slug' => 'padu-padan-warna-burgundy-dan-blush',
                'excerpt' => 'Kombinasi warna wine mewah dan sentuhan rose lembut menghasilkan harmoni visual yang anggun dan tidak mencolok.',
                'image_url' => '/images/products/abaya-burgundy-luxe.jpg',
                'category' => ['name' => 'Styling Tips'],
                'reading_time' => 4,
                'published_at' => '28 Okt 2026',
            ],
            [
                'id' => 3,
                'title' => '5 Siluet Abaya Modern yang Nyaman Digunakan untuk Travelling & Umrah',
                'slug' => 'siluet-abaya-modern-untuk-travelling',
                'excerpt' => 'Eksplorasi cutting longgar dengan saku tersembunyi dan material ringan anti-kusut yang ramah perjalanan jauh.',
                'image_url' => '/images/products/collection-editorial-look.jpg',
                'category' => ['name' => 'Travel & Modesty'],
                'reading_time' => 5,
                'published_at' => '20 Okt 2026',
            ],
        ]);

        // 7. Pengaturan Kontak & Brand Info RÜYA
        $contactInfo = [
            'brand_name' => 'RÜYA',
            'tagline' => 'Haute Modest Fashion & Signature Abaya Couture',
            'phone' => '+62 813-1605-3870',
            'whatsapp_number' => '6281316053870',
            'whatsapp_message' => 'Halo RÜYA, saya tertarik untuk memesan busana modest koleksi terbaru.',
            'workshop_address' => 'RÜYA Boutique Studio, Jalan Kemang Raya No. 42B, Jakarta Selatan / Demo Online: demo.hasanarofid.site',
            'maps_url' => 'https://demo.hasanarofid.site',
            'working_hours' => 'Senin - Sabtu: 09.00 - 20.00 WIB',
        ];

        return Inertia::render('Homepage', [
            'categories' => $categories,
            'featuredProducts' => $featuredProducts,
            'portfolios' => $portfolios,
            'services' => $services,
            'testimonials' => $testimonials,
            'articles' => $articles,
            'contactInfo' => $contactInfo,
        ]);
    }
}
