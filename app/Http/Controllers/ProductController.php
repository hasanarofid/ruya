<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class ProductController extends Controller
{
    /**
     * Menampilkan katalog produk busana RÜYA lengkap dengan filter kategori & pencarian.
     */
    public function index(Request $request): Response
    {
        $categorySlug = $request->query('kategori');
        $search = strtolower($request->query('q', ''));

        $categories = [
            ['id' => 1, 'name' => 'Signature Abaya', 'slug' => 'signature-abaya'],
            ['id' => 2, 'name' => 'Silk & Voile Hijab', 'slug' => 'silk-voile-hijab'],
            ['id' => 3, 'name' => 'Ethereal Dresses', 'slug' => 'ethereal-dresses'],
            ['id' => 4, 'name' => 'Luxe Outerwear', 'slug' => 'luxe-outerwear'],
            ['id' => 5, 'name' => 'Burgundy Royal Series', 'slug' => 'burgundy-royal-series'],
            ['id' => 6, 'name' => 'Pashmina Cashmere Silk', 'slug' => 'pashmina-cashmere-silk'],
        ];

        $allProducts = collect([
            [
                'id' => 1,
                'name' => 'Rüya Soleil Pastel Abaya Set',
                'slug' => 'ruya-soleil-pastel-abaya-set',
                'category' => ['name' => 'Signature Abaya', 'slug' => 'signature-abaya'],
                'material' => 'Pure Crepe Silk & Golden Cuff Ring',
                'dimensions' => 'All Size (LD 110-120cm, PB 140cm)',
                'price_range' => 'Rp 689.000',
                'thumbnail' => '/images/hero-model.jpg',
                'is_featured' => true,
                'short_description' => 'Abaya kuning pastel anggun dengan manset kancing gold vintage dan aksen lipit leher V yang memesona.',
            ],
            [
                'id' => 2,
                'name' => 'Amira Raw Silk Kimono Outer',
                'slug' => 'amira-raw-silk-kimono-outer',
                'category' => ['name' => 'Luxe Outerwear', 'slug' => 'luxe-outerwear'],
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
                'category' => ['name' => 'Ethereal Dresses', 'slug' => 'ethereal-dresses'],
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
                'category' => ['name' => 'Burgundy Royal Series', 'slug' => 'burgundy-royal-series'],
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
                'category' => ['name' => 'Silk & Voile Hijab', 'slug' => 'silk-voile-hijab'],
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
                'category' => ['name' => 'Signature Abaya', 'slug' => 'signature-abaya'],
                'material' => 'Nida Supreme Jetblack Fabric',
                'dimensions' => 'Size: S, M, L, XL',
                'price_range' => 'Rp 789.000',
                'thumbnail' => '/images/products/abaya-noir-classic.jpg',
                'is_featured' => true,
                'short_description' => 'Warna hitam pekat abadi (jetblack deep) dengan jahitan semi-boutique anti pudar dan tidak tembus pandang.',
            ],
            [
                'id' => 7,
                'name' => 'Blush Voile Parisian Hijab',
                'slug' => 'blush-voile-parisian-hijab',
                'category' => ['name' => 'Silk & Voile Hijab', 'slug' => 'silk-voile-hijab'],
                'material' => 'Ultra Fine Parisian Voile',
                'dimensions' => '120 x 120 cm (Segiempat)',
                'price_range' => 'Rp 189.000',
                'thumbnail' => '/images/products/hijab-voile-blush.jpg',
                'is_featured' => false,
                'short_description' => 'Jilbab segiempat voal premium tegak di dahi dan tidak pekak di telinga, warna dusty blush yang manis.',
            ],
            [
                'id' => 8,
                'name' => 'Butter Silk Kaftan Caftan',
                'slug' => 'butter-silk-kaftan-caftan',
                'category' => ['name' => 'Signature Abaya', 'slug' => 'signature-abaya'],
                'material' => 'Butter Satin Silk',
                'dimensions' => 'Free Size (LD 130cm, PB 142cm)',
                'price_range' => 'Rp 649.000',
                'thumbnail' => '/images/products/abaya-butter-silk.jpg',
                'is_featured' => false,
                'short_description' => 'Kaftan anggun dengan aksen kerut pinggang fleksibel, sempurna untuk hari raya atau jamuan keluarga.',
            ],
        ]);

        $filtered = $allProducts->filter(function ($item) use ($categorySlug, $search) {
            $matchCat = true;
            $matchSearch = true;

            if ($categorySlug) {
                $matchCat = ($item['category']['slug'] ?? '') === $categorySlug;
            }

            if (!empty($search)) {
                $haystack = strtolower($item['name'] . ' ' . $item['material'] . ' ' . $item['short_description']);
                $matchSearch = str_contains($haystack, $search);
            }

            return $matchCat && $matchSearch;
        })->values();

        $page = (int) $request->query('page', 1);
        $perPage = 12;
        $paginated = [
            'data' => $filtered->slice(($page - 1) * $perPage, $perPage)->values(),
            'total' => $filtered->count(),
            'current_page' => $page,
            'per_page' => $perPage,
            'last_page' => max(1, (int) ceil($filtered->count() / $perPage)),
        ];

        return Inertia::render('Products/Index', [
            'categories' => $categories,
            'products' => $paginated,
            'currentCategory' => $categorySlug,
            'searchQuery' => $search,
        ]);
    }

    /**
     * Menampilkan detail spesifikasi teknis dan galeri produk.
     */
    public function show(string $slug): Response
    {
        return $this->index(request());
    }
}
