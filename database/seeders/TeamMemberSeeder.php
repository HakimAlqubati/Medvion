<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TeamMemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\TeamMember::truncate();

        \App\Models\TeamMember::create([
            'name' => ['ar' => 'الدكتور / مراد مفلح', 'en' => 'Dr. Murad Muflih'],
            'role' => ['ar' => 'المؤسس', 'en' => 'Founder'],
            'bio' => ['ar' => 'تهدف إدارة المنصة إلى التعاون مع نخبة من المحاضرين والمتخصصين في المجال الصحي لتقديم برامج تدريبية ذات مستوى علمي متميز.', 'en' => 'The platform\'s management aims to collaborate with elite lecturers and healthcare specialists to provide training programs of exceptional scientific caliber.'],
            'sort_order' => 1,
            'is_active' => true,
        ]);
    }
}
