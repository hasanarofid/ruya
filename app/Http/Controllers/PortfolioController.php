<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class PortfolioController extends Controller
{
    /**
     * Menampilkan koleksi lookbook & edisi musiman RÜYA.
     */
    public function index(): Response
    {
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
            [
                'id' => 5,
                'title' => 'Nocturne Noir Abaya Silhouette',
                'category' => 'Classic Heritage',
                'location' => 'Urban Editorial',
                'year' => '2025',
                'image' => '/images/products/abaya-noir-classic.jpg',
                'description' => 'Keanggunan abadi abaya hitam pekat dengan detail manset berkilau lembut.'
            ],
            [
                'id' => 6,
                'title' => 'Parisian Voile & Soft Pastels',
                'category' => 'Daily Essentials',
                'location' => 'Studio Lookbook',
                'year' => '2026',
                'image' => '/images/products/hijab-voile-blush.jpg',
                'description' => 'Sentuhan warna dusty pink dan pastel yang memberikan kesegaran pada tampilan harian Anda.'
            ],
        ]);

        return Inertia::render('Portfolios/Index', [
            'portfolios' => $portfolios,
        ]);
    }

    public function show(string $slug): Response
    {
        return $this->index();
    }
}
