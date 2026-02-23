<?php

namespace App\Services;

use App\Models\ContentSetting;

class ContentService
{
    public const DEFAULTS = [
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
            'missionItems' => [
                [
                    'title' => 'Certified Precious Metal Alloys',
                    'description' => 'Each bar and bullion piece is meticulously crafted from the finest gold and silver alloys, meeting international purity standards. Our collection ranges from classic 24K gold to sophisticated silver compositions, each authenticated and documented.',
                ],
                [
                    'title' => 'Advanced QR Verification System',
                    'description' => 'Every piece features our proprietary QR verification technology, providing instant access to complete provenance, certification details, and authenticity documentation. This system ensures absolute transparency and peace of mind.',
                ],
                [
                    'title' => 'White Glove Service',
                    'description' => 'From private consultations to secure delivery, we provide a seamless experience for collectors and institutions. Our team offers expert guidance on portfolio diversification, market insights, and long-term wealth preservation strategies.',
                ],
                [
                    'title' => 'Legacy Investments',
                    'description' => 'Beyond transactions, we facilitate generational wealth transfer and long-term value preservation. Our precious metals are designed to be heirlooms, investments that transcend time and economic cycles.',
                ],
            ],
            'philosophySection' => [
                'label' => 'Philosophy',
                'headline' => 'Every bar tells a story of precision and permanence',
                'description' => 'We craft gold and silver alloys with an unwavering commitment to purity, authenticity, and long-term value. Each piece is handcrafted to meet the highest standards of excellence.',
                'values' => [
                    [
                        'title' => 'Craftsmanship',
                        'description' => 'Meticulous attention to every detail, ensuring each alloy meets exacting specifications.',
                    ],
                    [
                        'title' => 'Purity',
                        'description' => 'Only the finest materials, refined to investment-grade standards.',
                    ],
                    [
                        'title' => 'Trust',
                        'description' => 'Complete transparency and verification for every piece we create.',
                    ],
                ],
            ],
            'timeline' => [
                'label' => 'Our Journey',
                'title' => 'Milestones of Excellence',
                'events' => [
                    [
                        'year' => '2018',
                        'title' => 'Foundation',
                        'description' => 'NAZLEH OUNCE was founded with a vision to revolutionize precious metal authentication and trading standards.',
                    ],
                    [
                        'year' => '2019',
                        'title' => 'QR Verification System',
                        'description' => 'Launched our proprietary QR verification technology, ensuring complete traceability and transparency.',
                    ],
                    [
                        'year' => '2021',
                        'title' => 'International Expansion',
                        'description' => 'Expanded operations to serve collectors and institutions across the Middle East and Europe.',
                    ],
                    [
                        'year' => '2023',
                        'title' => 'Certification Excellence',
                        'description' => 'Achieved highest industry certifications for purity standards and sustainable sourcing practices.',
                    ],
                    [
                        'year' => '2026',
                        'title' => 'Future of Authenticity',
                        'description' => 'Leading the industry in blockchain integration and advanced metallurgical verification methods.',
                    ],
                ],
            ],
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

    public function getContent(): array
    {
        $setting = ContentSetting::firstWhere('key', 'website_content');
        $stored = $setting?->data ?? [];

        return [
            'hero' => array_merge(self::DEFAULTS['hero'], $stored['hero'] ?? []),
            'about' => $this->mergeRecursive(self::DEFAULTS['about'], $stored['about'] ?? []),
            'collection' => array_merge(self::DEFAULTS['collection'], $stored['collection'] ?? []),
            'philosophy' => array_merge(self::DEFAULTS['philosophy'], $stored['philosophy'] ?? []),
            'verification' => array_merge(self::DEFAULTS['verification'], $stored['verification'] ?? []),
            'contact' => array_merge(self::DEFAULTS['contact'], $stored['contact'] ?? []),
            'footer' => array_merge(self::DEFAULTS['footer'], $stored['footer'] ?? []),
        ];
    }

    public function saveContent(array $content): void
    {
        ContentSetting::updateOrCreate(
            ['key' => 'website_content'],
            ['data' => $content]
        );
    }

    private function mergeRecursive(array $defaults, array $stored): array
    {
        return array_replace_recursive($defaults, $stored);
    }
}
