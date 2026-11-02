<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class ArticleController extends Controller
{
    /**
     * Menampilkan editorial fashion, tips hijab & perawatan busana modest.
     */
    public function index(): Response
    {
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

        return Inertia::render('Articles/Index', [
            'articles' => $articles,
        ]);
    }

    public function show(string $slug): Response
    {
        $article = [
            'id' => 1,
            'title' => 'Rahasia Merawat Gaun Berbahan Sutra & Ceruty Agar Tetap Berkilau Abadi',
            'slug' => $slug,
            'content' => 'Busana modest berbahan sutra dan ceruty baby doll memerlukan perhatian khusus saat pembersihan. Gunakan sabun berbahan lembut, hindari memeras berlebihan, dan selalu setrika pada suhu rendah dengan pelapis kain.',
            'image_url' => '/images/products/atelier-craftsmanship.jpg',
            'category' => ['name' => 'Fashion Care'],
            'reading_time' => 3,
            'published_at' => '02 Nov 2026',
        ];

        return Inertia::render('Articles/Show', [
            'article' => $article,
            'relatedArticles' => collect([]),
        ]);
    }
}
