<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Course;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class MedvionSeeder extends Seeder
{
    public function run(): void
    {
        // 1. إنشاء مستخدم إداري لتسجيل حقول التتبع (created_by)
        $admin = User::firstOrCreate(
            ['email' => 'admin@medvion.com'],
            [
                'name' => 'Dr. Admin',
                'password' => bcrypt('password123'),
                'email_verified_at' => now(),
            ]
        );

        auth()->login($admin);

        // ==========================================
        // 2. إنشاء الفئات (Categories) - ثنائية اللغة
        // ==========================================

        // الفئة الرئيسية الأولى: طب الطوارئ
        $emergencyCat = Category::create([
            'name' => [
                'ar' => 'طب الطوارئ والإنقاذ',
                'en' => 'Emergency & Rescue Medicine'
            ],
            'slug' => 'emergency-medicine',
            'icon' => 'activity', // اسم أيقونة افتراضي من مكتبة مثل Lucide
        ]);

        // فئة فرعية تابعة لطب الطوارئ
        $cprCat = Category::create([
            'parent_id' => $emergencyCat->id,
            'name' => [
                'ar' => 'الإنعاش ودعم الحياة',
                'en' => 'CPR & Life Support'
            ],
            'slug' => 'cpr-life-support',
            'icon' => 'heart-pulse',
        ]);

        // الفئة الرئيسية الثانية: الإدارة الصحية
        $managementCat = Category::create([
            'name' => [
                'ar' => 'الإدارة والقيادة الصحية',
                'en' => 'Healthcare Management & Leadership'
            ],
            'slug' => 'healthcare-management',
            'icon' => 'briefcase-medical',
        ]);

        // ==========================================
        // 3. إنشاء الدورات (Courses) - ثنائية اللغة
        // ==========================================

        $courses = [
            [
                'category_id' => $cprCat->id, // مربوطة بالفئة الفرعية
                'slug' => 'advanced-cardiovascular-life-support-acls',
                'title' => [
                    'ar' => 'دعم الحياة القلبي المتقدم (ACLS)',
                    'en' => 'Advanced Cardiovascular Life Support (ACLS)'
                ],
                'brief' => [
                    'ar' => 'دورة مكثفة تعتمد على أحدث بروتوكولات جمعية القلب الأمريكية للتعامل مع الحالات القلبية الطارئة، السكتات الدماغية، وحالات توقف القلب التنفسي.',
                    'en' => 'An intensive course based on the latest AHA protocols for managing cardiovascular emergencies, strokes, and cardiopulmonary arrest.'
                ],
                'level' => 'advanced',
                'hours' => 16,
                'students_count' => 342,
                'price' => 250.00,
                'image' => 'https://images.unsplash.com/photo-1516549655169-df83a0774514?auto=format&fit=crop&q=80',
                'video_url' => 'https://www.youtube.com/embed/dQw4w9WgXcQ',
                'objectives' => [
                    'التعرف السريع على علامات توقف القلب والتدخل الفوري.',
                    'إدارة المسالك الهوائية المتقدمة وتطبيقاتها.',
                    'قراءة وتفسير تخطيط القلب (ECG) للحالات الطارئة.',
                    'الاستخدام الصحيح للأدوية في حالات الإنعاش القلبي.'
                ],
                'target_audience' => [
                    'أطباء الطوارئ والعناية المركزة.',
                    'أطباء التخدير والقلب.',
                    'طاقم التمريض والممارسون الصحيون الميدانيون.'
                ],
                'content_modules' => [
                    ['title' => 'مقدمة في دعم الحياة المتقدم وتحديثات البروتوكول', 'duration' => '02:00:00'],
                    ['title' => 'إدارة مجرى الهواء المتقدم (Advanced Airway)', 'duration' => '03:30:00'],
                    ['title' => 'تحليل النظم القلبي والتدخل الدوائي', 'duration' => '04:15:00'],
                    ['title' => 'محاكاة الحالات السريرية (Mega Code)', 'duration' => '05:00:00'],
                ],
            ],
            [
                'category_id' => $emergencyCat->id, // مربوطة بالفئة الرئيسية
                'slug' => 'basic-first-aid-cpr',
                'title' => [
                    'ar' => 'الأساسيات الشاملة للإسعافات الأولية',
                    'en' => 'Comprehensive Basic First Aid'
                ],
                'brief' => [
                    'ar' => 'دورة أساسية مجانية تهدف إلى تزويد الكوادر الصحية والمجتمعية بالمهارات الأساسية لإنقاذ الحياة والتعامل مع الإصابات الطارئة قبل وصول الدعم الطبي المتخصص.',
                    'en' => 'A free fundamental course aimed at equipping healthcare and community personnel with essential life-saving skills for handling emergencies.'
                ],
                'level' => 'beginner',
                'hours' => 8,
                'students_count' => 1250,
                'price' => 0.00, // مجانية
                'image' => 'https://images.unsplash.com/photo-1584622650111-993a426fbf0a?auto=format&fit=crop&q=80',
                'video_url' => 'https://www.youtube.com/embed/dQw4w9WgXcQ',
                'objectives' => [
                    'التقييم المبدئي لمكان الحادث وحالة المصاب.',
                    'تطبيق الإنعاش القلبي الرئوي (CPR) للبالغين والأطفال.',
                    'السيطرة على النزيف وإدارة الصدمات.',
                    'التعامل مع حالات الاختناق والحروق والكسور.'
                ],
                'target_audience' => [
                    'جميع الكوادر الطبية المبتدئة.',
                    'طلاب الكليات الصحية.',
                    'المسعفون المتطوعون والفرق المجتمعية.'
                ],
                'content_modules' => [
                    ['title' => 'مبادئ الإسعافات الأولية والتقييم', 'duration' => '01:30:00'],
                    ['title' => 'الإنعاش القلبي الرئوي (CPR) واستخدام AED', 'duration' => '02:30:00'],
                    ['title' => 'إدارة الجروح، النزيف، والصدمات', 'duration' => '02:00:00'],
                    ['title' => 'حالات الطوارئ البيئية والكسور', 'duration' => '02:00:00'],
                ],
            ],
            [
                'category_id' => $managementCat->id,
                'slug' => 'healthcare-quality-and-patient-safety',
                'title' => [
                    'ar' => 'إدارة الجودة الشاملة وسلامة المرضى',
                    'en' => 'Total Quality Management & Patient Safety'
                ],
                'brief' => [
                    'ar' => 'تأهيل القيادات الصحية لتطبيق معايير الجودة العالمية ومؤشرات الأداء، لضمان سلامة المرضى وتحسين كفاءة المنشآت الطبية.',
                    'en' => 'Preparing healthcare leaders to implement global quality standards and KPIs to ensure patient safety and improve facility efficiency.'
                ],
                'level' => 'advanced',
                'hours' => 25,
                'students_count' => 180,
                'price' => 450.00,
                'image' => 'https://images.unsplash.com/photo-1454165833467-1359a33a7f74?auto=format&fit=crop&q=80',
                'video_url' => 'https://www.youtube.com/embed/dQw4w9WgXcQ',
                'objectives' => [
                    'فهم أبعاد الجودة في الرعاية الصحية.',
                    'تطبيق أدوات تحسين الجودة (PDCA, Six Sigma).',
                    'تطوير وتتبع مؤشرات الأداء الرئيسية (KPIs).',
                    'إدارة المخاطر وسلامة المرضى (Patient Safety).'
                ],
                'target_audience' => [
                    'مدراء المستشفيات والعيادات.',
                    'رؤساء الأقسام الطبية والتمريضية.',
                    'منسقو ومسؤولو الجودة في المنشآت الصحية.'
                ],
                'content_modules' => [
                    ['title' => 'مفاهيم الجودة وسلامة المرضى', 'duration' => '05:00:00'],
                    ['title' => 'الاعتمادات الدولية والمحلية (JCI, CBAHI)', 'duration' => '06:00:00'],
                    ['title' => 'أدوات ومنهجيات تحسين الأداء', 'duration' => '08:00:00'],
                    ['title' => 'إدارة المخاطر وتحليل الأحداث الجسيمة', 'duration' => '06:00:00'],
                ],
            ],
        ];

        foreach ($courses as $courseData) {
            Course::create($courseData);
        }

        // تسجيل الخروج بعد انتهاء الزرع
        // auth()->logout();
    }
}
