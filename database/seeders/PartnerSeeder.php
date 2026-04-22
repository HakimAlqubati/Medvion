<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PartnerCategory;
use App\Models\Partner;

class PartnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name_ar' => 'شريك استراتيجي',
                'name_en' => 'Strategic Partner',
                'stat_value' => '+40',
                'icon' => null, // default
            ],
            [
                'name_ar' => 'هيئة اعتماد',
                'name_en' => 'Accreditation',
                'stat_value' => '+12',
                'icon' => 'cert',
            ],
            [
                'name_ar' => 'مستشفى',
                'name_en' => 'Hospital',
                'stat_value' => '+8',
                'icon' => 'hosp',
            ],
            [
                'name_ar' => 'جامعة',
                'name_en' => 'University',
                'stat_value' => '+5',
                'icon' => 'edu',
            ],
            [
                'name_ar' => 'جهة حكومية',
                'name_en' => 'Government',
                'stat_value' => null,
                'icon' => 'gov',
            ],
            [
                'name_ar' => 'تقنية',
                'name_en' => 'Technology',
                'stat_value' => null,
                'icon' => 'tech',
            ],
            [
                'name_ar' => 'رابطة',
                'name_en' => 'Association',
                'stat_value' => null,
                'icon' => 'assoc',
            ]
        ];

        $createdCategories = [];
        foreach ($categories as $cat) {
            $createdCategories[$cat['name_en']] = PartnerCategory::create($cat);
        }

        $partners = [
            ['name_ar' => 'وزارة الصحة', 'name_en' => 'Ministry of Health', 'category' => 'Government', 'icon' => 'gov'],
            ['name_ar' => 'هيئة التخصصات', 'name_en' => 'Saudi Commission', 'category' => 'Accreditation', 'icon' => 'cert'],
            ['name_ar' => 'مستشفى الملك فهد', 'name_en' => 'King Fahad Hospital', 'category' => 'Hospital', 'icon' => 'hosp'],
            ['name_ar' => 'جامعة الملك سعود', 'name_en' => 'King Saud University', 'category' => 'University', 'icon' => 'edu'],
            ['name_ar' => 'المجلس الصحي', 'name_en' => 'Health Council', 'category' => 'Government', 'icon' => 'gov'],
            ['name_ar' => 'كلية الطب', 'name_en' => 'College of Medicine', 'category' => 'University', 'icon' => 'edu'],
            ['name_ar' => 'مركز الابتكار', 'name_en' => 'Innovation Center', 'category' => 'Technology', 'icon' => 'tech'],
            ['name_ar' => 'رابطة الممارسين', 'name_en' => 'Practitioners Union', 'category' => 'Association', 'icon' => 'assoc'],
        ];

        foreach ($partners as $p) {
            Partner::create([
                'partner_category_id' => $createdCategories[$p['category']]->id,
                'name_ar' => $p['name_ar'],
                'name_en' => $p['name_en'],
                'icon' => $p['icon'],
            ]);
        }
    }
}
