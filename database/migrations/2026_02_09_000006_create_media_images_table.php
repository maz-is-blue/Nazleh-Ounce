<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('media_images', function (Blueprint $table) {
            $table->id();
            $table->string('key')->unique();
            $table->string('name');
            $table->string('description')->nullable();
            $table->string('location')->nullable();
            $table->text('url');
            $table->timestamps();
        });

        DB::table('media_images')->insert([
            [
                'key' => 'hero-background',
                'name' => 'Hero Background',
                'description' => 'Main hero section background image',
                'location' => 'Home Page - Hero Section',
                'url' => 'https://images.unsplash.com/photo-1610375461246-83df859d849d?w=1600&q=80',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'key' => 'about-hero',
                'name' => 'About Page Hero',
                'description' => 'About page header background',
                'location' => 'About Page - Hero Section',
                'url' => 'https://images.unsplash.com/photo-1611085583191-a3b181a88401?w=1600&q=80',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'key' => 'collection-hero',
                'name' => 'Collection Hero',
                'description' => 'Collection page header background',
                'location' => 'Collection Page - Hero Section',
                'url' => 'https://images.unsplash.com/photo-1609424307541-5848b1a3f4fe?w=1600&q=80',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'key' => 'verification-hero',
                'name' => 'Verification Hero',
                'description' => 'Verification page header background',
                'location' => 'Verification Page - Hero Section',
                'url' => 'https://images.unsplash.com/photo-1621857923687-96d48cf66bf4?w=1600&q=80',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'key' => 'contact-hero',
                'name' => 'Contact Hero',
                'description' => 'Contact page header background',
                'location' => 'Contact Page - Hero Section',
                'url' => 'https://images.unsplash.com/photo-1622547748225-3fc4abd2cca0?w=1600&q=80',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'key' => 'philosophy-section',
                'name' => 'Philosophy Section Image',
                'description' => 'Background image for philosophy section',
                'location' => 'Home Page - Philosophy Section',
                'url' => 'https://images.unsplash.com/photo-1610375461369-d613b564f6c4?w=1600&q=80',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'key' => 'verification-process',
                'name' => 'Verification Process Image',
                'description' => 'Image showing verification and authenticity',
                'location' => 'Verification Page - Process Section',
                'url' => 'https://images.unsplash.com/photo-1541721856805-0a1f36c2a9b3?w=1600&q=80',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'key' => 'craftsmanship-image',
                'name' => 'Craftsmanship Image',
                'description' => 'Detailed metalwork and craftsmanship',
                'location' => 'About Page - Craftsmanship Section',
                'url' => 'https://images.unsplash.com/photo-1567225591450-5a8b3e3a4f1a?w=1600&q=80',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'key' => 'luxury-detail-1',
                'name' => 'Luxury Detail 1',
                'description' => 'High-end luxury metal detail shot',
                'location' => 'Home Page - Feature Sections',
                'url' => 'https://images.unsplash.com/photo-1634878907856-1b60ab8e7d1e?w=1600&q=80',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'key' => 'luxury-detail-2',
                'name' => 'Luxury Detail 2',
                'description' => 'Premium metal texture closeup',
                'location' => 'Various Pages - Decorative',
                'url' => 'https://images.unsplash.com/photo-1535585209827-a15fcdbc4c2d?w=1600&q=80',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }

    public function down(): void
    {
        Schema::dropIfExists('media_images');
    }
};
