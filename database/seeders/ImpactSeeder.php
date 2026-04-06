<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ImpactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Impact::truncate();

        $impacts = [
            ['ar' => 'رفع كفاءة الكوادر الصحية', 'en' => 'Raising the efficiency of healthcare professionals'],
            ['ar' => 'تعزيز فرص التدريب المستمر', 'en' => 'Enhancing continuous training opportunities'],
            ['ar' => 'دعم نشر المعرفة الطبية الحديثة', 'en' => 'Supporting the dissemination of modern medical knowledge'],
            ['ar' => 'المساهمة في تطوير القطاع الصحي عبر التعليم الرقمي', 'en' => 'Contributing to the development of the healthcare sector through digital education']
        ];

        foreach ($impacts as $index => $impact) {
            \App\Models\Impact::create([
                'title' => ['ar' => 'الأثر ' . ($index + 1), 'en' => 'Impact ' . ($index + 1)],
                'content' => $impact,
                'sort_order' => $index + 1,
                'is_active' => true,
            ]);
        }
    }
}
