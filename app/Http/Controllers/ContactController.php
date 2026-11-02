<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class ContactController extends Controller
{
    /**
     * Menampilkan informasi butik, konsultasi busana & personal shopper RÜYA.
     */
    public function index(): Response
    {
        $contactInfo = [
            'brand_name' => 'RÜYA',
            'tagline' => 'Haute Modest Fashion & Signature Abaya Couture',
            'phone' => '+62 813-1605-3870',
            'whatsapp_number' => '6281316053870',
            'email' => 'concierge@ruya.id',
            'workshop_address' => 'RÜYA Boutique Studio, Jalan Kemang Raya No. 42B, Jakarta Selatan',
            'maps_url' => 'https://demo.hasanarofid.site',
            'working_hours' => 'Senin - Sabtu: 09.00 - 20.00 WIB',
        ];

        return Inertia::render('Contact', [
            'contactInfo' => $contactInfo,
        ]);
    }

    public function store(Request $request)
    {
        return redirect()->back()->with('success', 'Terima kasih atas pesan Anda! Tim Personal Shopper RÜYA akan segera menghubungi Anda melalui WhatsApp.');
    }
}
