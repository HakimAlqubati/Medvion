<?php

namespace Database\Seeders;

use App\Models\AcademicExpert;
use App\Models\AcademicHeader;
use Illuminate\Database\Seeder;

class AcademicExpertSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $header = AcademicHeader::create([
            'title' => [
                'ar' => 'تعلم من أفضل العقول الأكاديمية',
                'en' => 'Learn from the Best Academic Minds',
            ],
            'description' => [
                'ar' => 'نحن نشارك نخبة من الأساتذة والخبراء الشغوفين بالتدريس وتوجيه الجيل القادم من المبدعين في كافة المجالات.',
                'en' => 'We partner with a select group of professors and experts who are passionate about teaching and guiding the next generation of innovators in all fields.',
            ],
            'is_active' => true,
        ]);

        $experts = [
            [
                'name' => ['ar' => 'أ. د. أحمد محمد', 'en' => 'Prof. Ahmed Mohammed'],
                'courses_count' => 12,
                'students_count' => 1250,
                'image' => null, // Will use default placeholder
            ],
            [
                'name' => ['ar' => 'د. سارة خالد', 'en' => 'Dr. Sarah Khaled'],
                'courses_count' => 8,
                'students_count' => 850,
                'image' => null,
            ],
            [
                'name' => ['ar' => 'د. يوسف إبراهيم', 'en' => 'Dr. Youssef Ibrahim'],
                'courses_count' => 5,
                'students_count' => 420,
                'image' => null,
            ],
            [
                'name' => ['ar' => 'أ. فاطمة عبد الله', 'en' => 'Mrs. Fatima Abdullah'],
                'courses_count' => 15,
                'students_count' => 2100,
                'image' => null,
            ],
        ];

        foreach ($experts as $expert) {
            $header->experts()->create($expert);
        }
    }
}
