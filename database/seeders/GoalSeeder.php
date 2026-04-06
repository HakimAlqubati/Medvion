<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GoalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Goal::truncate();

        $goals = [
            ['ar' => 'تطوير مهارات الكوادر الصحية عبر التدريب الرقمي.', 'en' => 'Developing the skills of healthcare professionals through digital training.'],
            ['ar' => 'نشر المعرفة الطبية الحديثة بين العاملين في القطاع الصحي.', 'en' => 'Spreading modern medical knowledge among healthcare workers.'],
            ['ar' => 'توفير فرص تدريب مستمر للكوادر الصحية في مختلف التخصصات.', 'en' => 'Providing continuous training opportunities for healthcare professionals in various specialties.'],
            ['ar' => 'تعزيز ثقافة التعليم الصحي المستمر.', 'en' => 'Promoting the culture of continuous health education.'],
            ['ar' => 'دعم التحول الرقمي في مجال التعليم الصحي.', 'en' => 'Supporting digital transformation in health education.']
        ];

        foreach ($goals as $index => $goal) {
            \App\Models\Goal::create([
                'title' => ['ar' => 'الهدف ' . ($index + 1), 'en' => 'Goal ' . ($index + 1)],
                'content' => $goal,
                'sort_order' => $index + 1,
                'is_active' => true,
            ]);
        }
    }
}
