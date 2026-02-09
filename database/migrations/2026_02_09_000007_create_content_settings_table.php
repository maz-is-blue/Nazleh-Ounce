<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        Schema::dropIfExists('content_settings');
        Schema::create('content_settings', function (Blueprint $table) {
            $table->id();
            $table->string('key')->unique();
            $table->json('data');
            $table->timestamps();
        });

        $content = [
            'hero' => [
                'title' => 'NAZLEH OUNCE',
                'subtitle' => 'Artisanal Precious Metal Alloys',
                'description' => 'Where heritage meets purity. Each piece crafted with precision, verified with care, and treasured for generations.',
            ],
            'about' => [
                'title' => 'About Nazleh',
                'subtitle' => 'A Legacy of Excellence',
                'description' => 'Founded on principles of authenticity and trust, Nazleh Ounce represents the pinnacle of precious metal craftsmanship.',
                'missionTitle' => 'Our Mission',
                'missionText' => 'To preserve the timeless value of precious metals through uncompromising quality and transparent verification.',
            ],
            'collection' => [
                'heroTitle' => 'Premium Alloys',
                'heroDescription' => 'Explore our curated collection of investment-grade gold and silver bullion, each piece verified and certified for authenticity.',
                'sectionLabel' => 'Collection',
                'sectionTitle' => 'Premium Precious Metals',
            ],
            'philosophy' => [
                'quote' => 'We believe in the enduring value of precious metals. Each piece we create represents not just wealth, but a legacy - crafted with precision, verified with care, and held with pride.',
                'author' => 'Nazleh Ounce Philosophy',
            ],
            'verification' => [
                'title' => 'Verification & Authenticity',
                'subtitle' => 'Trust Through Transparency',
                'description' => 'Every alloy comes with a unique serial number and QR code for instant verification.',
                'processTitle' => 'Our Verification Process',
            ],
            'contact' => [
                'title' => 'Contact Us',
                'subtitle' => 'Connect With Our Team',
                'email' => 'contact@nazlehounce.com',
                'phone' => '+1 (555) 123-4567',
                'address' => '123 Precious Metals Boulevard, New York, NY 10001',
            ],
            'footer' => [
                'tagline' => 'Handcrafted Precious Metal Alloys',
                'copyright' => '(c) 2026 Nazleh Ounce',
            ],
        ];

        DB::table('content_settings')->insert([
            'key' => 'website_content',
            'data' => json_encode($content, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    public function down(): void
    {
        Schema::dropIfExists('content_settings');
    }
};
