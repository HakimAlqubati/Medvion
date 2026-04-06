<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TargetAudienceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\TargetAudience::truncate();

        $audiences = [
            ['ar' => 'الأطباء', 'en' => 'Doctors'],
            ['ar' => 'طلاب كليات الطب', 'en' => 'Medical Students'],
            ['ar' => 'فنيي المختبرات الطبية', 'en' => 'Medical Laboratory Technicians'],
            ['ar' => 'فنيي الاشعة', 'en' => 'Radiology Technicians'],
            ['ar' => 'فنيي الصيدلة', 'en' => 'Pharmacy Technicians'],
            ['ar' => 'الممرضين والممرضات', 'en' => 'Nurses'],
            ['ar' => 'مساعدي الاطباء', 'en' => 'Physician Assistants'],
            ['ar' => 'العاملين في المجال الصحي', 'en' => 'Healthcare Workers']
        ];

        foreach ($audiences as $index => $audience) {
            \App\Models\TargetAudience::create([
                'title' => $audience,
                'sort_order' => $index + 1,
                'is_active' => true,
            ]);
        }
    }
}
