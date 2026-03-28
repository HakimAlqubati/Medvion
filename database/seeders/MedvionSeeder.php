<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Course;
use App\Models\User;
use Illuminate\Database\Seeder;

class MedvionSeeder extends Seeder
{
    public function run(): void
    {
        // 1. إنشاء مستخدم إداري
        $admin = User::firstOrCreate(
            ['email' => 'admin@medvion.com'],
            [
                'name' => 'Dr. Admin',
                'password' => bcrypt('password123'),
                'email_verified_at' => now(),
            ]
        );
        // ==========================================
        // 5. إنشاء قسم المميزات (Features)
        // ==========================================
        $this->command->info('Creating Dynamic Features...');
        \App\Models\Feature::truncate();
        
        $features = [
            [
                'title' => [
                    'ar' => 'برامج معتمدة عالمياً',
                    'en' => 'Internationally Accredited Programs',
                ],
                'description' => [
                    'ar' => 'شهادات معتمدة دولياً ومحلياً تضمن لك التميز في مسارك المهني.',
                    'en' => 'Internationally and locally accredited certificates ensuring excellence in your career path.',
                ],
                'icon' => '<svg class="w-7 h-7 {colorClass}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" /></svg>',
                'sort_order' => 1,
            ],
            [
                'title' => [
                    'ar' => 'أفضل الخبراء',
                    'en' => 'Top Elite Experts',
                ],
                'description' => [
                    'ar' => 'نخبة من الأطباء والمتخصصين لنقل المعرفة بأحدث الوسائل التعليمية.',
                    'en' => 'An elite group of doctors and specialists transferring knowledge using the latest educational methods.',
                ],
                'icon' => '<svg class="w-7 h-7 {colorClass}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" /></svg>',
                'sort_order' => 2,
            ],
            [
                'title' => [
                    'ar' => 'بيئة تفاعلية حديثة',
                    'en' => 'Modern Interactive Environment',
                ],
                'description' => [
                    'ar' => 'منصات تعليمية ذكية وورش عمل افتراضية تواكب مستقبل الرعاية الصحية.',
                    'en' => 'Smart educational platforms and virtual workshops keeping pace with the future of healthcare.',
                ],
                'icon' => '<svg class="w-7 h-7 {colorClass}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" /></svg>',
                'sort_order' => 3,
            ]
        ];

        foreach ($features as $feature) {
            \App\Models\Feature::create($feature);
        }

        // Finished Feature seeding
        \Illuminate\Support\Facades\Schema::disableForeignKeyConstraints();
        Category::truncate();
        Course::truncate();
        \Illuminate\Support\Facades\Schema::enableForeignKeyConstraints();
        // 2. إنشاء 20 فئة (10 رئيسية و 10 فرعية)
        // ==========================================
        $categoriesData = [
            'emergency' => ['ar' => 'طب الطوارئ والإنقاذ', 'en' => 'Emergency Medicine', 'icon' => 'activity'],
            'management' => ['ar' => 'الإدارة والقيادة الصحية', 'en' => 'Healthcare Management', 'icon' => 'briefcase-medical'],
            'surgery' => ['ar' => 'الجراحة العامة والدقيقة', 'en' => 'Surgery', 'icon' => 'scissors'],
            'pediatrics' => ['ar' => 'طب الأطفال وحديثي الولادة', 'en' => 'Pediatrics', 'icon' => 'baby'],
            'internal' => ['ar' => 'الأمراض الباطنية', 'en' => 'Internal Medicine', 'icon' => 'stethoscope'],
            'radiology' => ['ar' => 'الأشعة والتصوير الطبي', 'en' => 'Radiology', 'icon' => 'microscope'],
            'pharmacy' => ['ar' => 'الصيدلة السريرية', 'en' => 'Clinical Pharmacy', 'icon' => 'pills'],
            'nursing' => ['ar' => 'علوم التمريض', 'en' => 'Nursing Sciences', 'icon' => 'user-nurse'],
            'dentistry' => ['ar' => 'طب وجراحة الفم والأسنان', 'en' => 'Dentistry', 'icon' => 'tooth'],
            'public_health' => ['ar' => 'الصحة العامة والأوبئة', 'en' => 'Public Health', 'icon' => 'globe'],
        ];

        $categories = []; // لتخزين الكائنات المنشأة

        foreach ($categoriesData as $key => $data) {
            // إنشاء الفئة الرئيسية
            $parent = Category::create([
                'name' => ['ar' => $data['ar'], 'en' => $data['en']],
                'slug' => str_replace(' ', '-', strtolower($data['en'])),
                'icon' => $data['icon'],
            ]);
            $categories[$key . '_parent'] = $parent;

            // إنشاء فئة فرعية تابعة لها (مثال ديناميكي)
            $subData = [
                'emergency' => ['ar' => 'دعم الحياة والإنعاش', 'en' => 'Life Support & CPR'],
                'management' => ['ar' => 'الجودة وسلامة المرضى', 'en' => 'Quality & Patient Safety'],
                'surgery' => ['ar' => 'جراحة المناظير', 'en' => 'Laparoscopic Surgery'],
                'pediatrics' => ['ar' => 'العناية المركزة لحديثي الولادة (NICU)', 'en' => 'NICU'],
                'internal' => ['ar' => 'أمراض القلب والأوعية الدموية', 'en' => 'Cardiology'],
                'radiology' => ['ar' => 'التصوير بالرنين المغناطيسي (MRI)', 'en' => 'MRI Techniques'],
                'pharmacy' => ['ar' => 'اقتصاديات الدواء', 'en' => 'Pharmacoeconomics'],
                'nursing' => ['ar' => 'تمريض العناية المركزة', 'en' => 'ICU Nursing'],
                'dentistry' => ['ar' => 'زراعة الأسنان', 'en' => 'Dental Implants'],
                'public_health' => ['ar' => 'مكافحة العدوى', 'en' => 'Infection Control'],
            ];

            $categories[$key . '_sub'] = Category::create([
                'parent_id' => $parent->id,
                'name' => ['ar' => $subData[$key]['ar'], 'en' => $subData[$key]['en']],
                'slug' => str_replace(' ', '-', strtolower($subData[$key]['en'])) . '-' . rand(10, 99),
                'icon' => $data['icon'],
            ]);
        }

        // ==========================================
        // 3. إنشاء الدورات الطبية (متنوعة وواقعية)
        // ==========================================
        $courses = [
            // --- دورات الطوارئ والإنعاش ---
            [
                'category_id' => $categories['emergency_sub']->id,
                'slug' => 'acls-advanced-cardiovascular',
                'title' => ['ar' => 'دعم الحياة القلبي المتقدم (ACLS)', 'en' => 'Advanced Cardiovascular Life Support (ACLS)'],
                'brief' => [
                    'ar' => 'دورة مكثفة تعتمد على بروتوكولات AHA للتعامل مع الحالات القلبية الطارئة.',
                    'en' => 'Intensive course based on AHA protocols for managing cardiovascular emergencies.'
                ],
                'level' => 'advanced',
                'hours' => 16,
                'students_count' => 342,
                'price' => 250.00,
                'image' => 'https://images.unsplash.com/photo-1516549655169-df83a0774514?auto=format&fit=crop&q=80',
                'video_url' => 'https://www.youtube.com/embed/dQw4w9WgXcQ',
                'objectives' => ['التعرف السريع على توقف القلب', 'إدارة المسالك الهوائية', 'قراءة الـ ECG', 'استخدام الأدوية في الطوارئ'],
                'target_audience' => ['أطباء الطوارئ', 'التمريض', 'المسعفون'],
                'content_modules' => [['title' => 'مقدمة وبروتوكولات', 'duration' => '02:00:00'], ['title' => 'الـ Mega Code', 'duration' => '04:00:00']],
            ],
            [
                'category_id' => $categories['emergency_parent']->id,
                'slug' => 'basic-first-aid',
                'title' => ['ar' => 'الأساسيات الشاملة للإسعافات الأولية', 'en' => 'Comprehensive Basic First Aid'],
                'brief' => [
                    'ar' => 'المهارات الأساسية لإنقاذ الحياة والتعامل مع الإصابات الطارئة قبل وصول الدعم الطبي.',
                    'en' => 'Essential life-saving skills for handling emergencies before medical support arrives.'
                ],
                'level' => 'beginner',
                'hours' => 8,
                'students_count' => 1250,
                'price' => 0.00,
                'image' => 'https://images.unsplash.com/photo-1584622650111-993a426fbf0a?auto=format&fit=crop&q=80',
                'video_url' => 'https://www.youtube.com/embed/dQw4w9WgXcQ',
                'objectives' => ['تطبيق الـ CPR', 'السيطرة على النزيف', 'التعامل مع الاختناق'],
                'target_audience' => ['الكوادر المبتدئة', 'المجتمع', 'الطلاب'],
                'content_modules' => [['title' => 'مبادئ الإسعاف', 'duration' => '01:30:00'], ['title' => 'الكسور والحروق', 'duration' => '02:00:00']],
            ],

            // --- دورات الإدارة والجودة ---
            [
                'category_id' => $categories['management_sub']->id,
                'slug' => 'total-quality-management',
                'title' => ['ar' => 'إدارة الجودة الشاملة في الرعاية الصحية', 'en' => 'Total Quality Management in Healthcare'],
                'brief' => [
                    'ar' => 'تأهيل القيادات الصحية لتطبيق معايير الجودة العالمية ومؤشرات الأداء.',
                    'en' => 'Preparing healthcare leaders to implement global quality standards and KPIs.'
                ],
                'level' => 'advanced',
                'hours' => 25,
                'students_count' => 180,
                'price' => 450.00,
                'image' => 'https://images.unsplash.com/photo-1454165833467-1359a33a7f74?auto=format&fit=crop&q=80',
                'video_url' => 'https://www.youtube.com/embed/dQw4w9WgXcQ',
                'objectives' => ['تطبيق Six Sigma', 'تطوير KPIs', 'إدارة المخاطر'],
                'target_audience' => ['مدراء المستشفيات', 'مسؤولو الجودة', 'رؤساء الأقسام'],
                'content_modules' => [['title' => 'مفاهيم الجودة', 'duration' => '05:00:00'], ['title' => 'الاعتمادات JCI', 'duration' => '06:00:00']],
            ],

            // --- دورات الباطنية والقلب ---
            [
                'category_id' => $categories['internal_sub']->id,
                'slug' => 'ecg-interpretation-masterclass',
                'title' => ['ar' => 'احتراف قراءة تخطيط القلب (ECG)', 'en' => 'ECG Interpretation Masterclass'],
                'brief' => [
                    'ar' => 'دورة عملية مبسطة لقراءة تخطيط القلب الكهربائي وتمييز الحالات المرضية.',
                    'en' => 'A practical course on reading ECGs and identifying pathological conditions.'
                ],
                'level' => 'inter',
                'hours' => 12,
                'students_count' => 520,
                'price' => 120.00,
                'image' => 'https://images.unsplash.com/photo-1579684385127-1ef15d508118?auto=format&fit=crop&q=80',
                'video_url' => 'https://www.youtube.com/embed/dQw4w9WgXcQ',
                'objectives' => ['تحديد المحور القلبي', 'تشخيص الـ MI', 'اضطرابات النظم'],
                'target_audience' => ['الأطباء المقيمون', 'طلاب الطب', 'تمريض العناية'],
                'content_modules' => [['title' => 'الفيزيولوجيا الكهربائية', 'duration' => '02:00:00'], ['title' => 'احتشاء العضلة', 'duration' => '03:00:00']],
            ],

            // --- دورات الجراحة ---
            [
                'category_id' => $categories['surgery_sub']->id,
                'slug' => 'basic-laparoscopic-skills',
                'title' => ['ar' => 'المهارات الأساسية لجراحة المناظير', 'en' => 'Basic Laparoscopic Skills'],
                'brief' => [
                    'ar' => 'تدريب عملي على استخدام المناظير الجراحية والتعامل مع الأنسجة.',
                    'en' => 'Practical training on using surgical laparoscopes and tissue handling.'
                ],
                'level' => 'inter',
                'hours' => 30,
                'students_count' => 95,
                'price' => 600.00,
                'image' => 'https://images.unsplash.com/photo-1551076805-e1869033e561?auto=format&fit=crop&q=80',
                'video_url' => 'https://www.youtube.com/embed/dQw4w9WgXcQ',
                'objectives' => ['استخدام الكاميرا', 'الخياطة بالمنظار', 'السلامة الجراحية'],
                'target_audience' => ['جراحو المستقبل', 'الأطباء المقيمون'],
                'content_modules' => [['title' => 'إعداد غرفة العمليات', 'duration' => '04:00:00'], ['title' => 'التدريب على المحاكي', 'duration' => '10:00:00']],
            ],

            // --- دورات الأطفال ---
            [
                'category_id' => $categories['pediatrics_sub']->id,
                'slug' => 'neonatal-resuscitation-nrp',
                'title' => ['ar' => 'إنعاش حديثي الولادة (NRP)', 'en' => 'Neonatal Resuscitation Program (NRP)'],
                'brief' => [
                    'ar' => 'برنامج تدريبي للتعامل مع حالات الاختناق وصعوبة التنفس عند حديثي الولادة في غرف الولادة.',
                    'en' => 'Training program for handling asphyxia and breathing difficulties in newborns.'
                ],
                'level' => 'advanced',
                'hours' => 14,
                'students_count' => 210,
                'price' => 180.00,
                'image' => 'https://images.unsplash.com/photo-1519494026892-80bbd2d6fd0d?auto=format&fit=crop&q=80',
                'video_url' => 'https://www.youtube.com/embed/dQw4w9WgXcQ',
                'objectives' => ['التقييم الأولي للوليد', 'استخدام ضغط المجرى الهوائي الإيجابي', 'التدليك القلبي للرضع'],
                'target_audience' => ['أطباء الأطفال', 'أطباء التوليد', 'القابلات'],
                'content_modules' => [['title' => 'الخطوات الأولى للإنعاش', 'duration' => '03:00:00'], ['title' => 'التهوية المساعدة', 'duration' => '04:00:00']],
            ],

            // --- دورات التمريض ---
            [
                'category_id' => $categories['nursing_sub']->id,
                'slug' => 'icu-nursing-essentials',
                'title' => ['ar' => 'أساسيات تمريض العناية المركزة', 'en' => 'ICU Nursing Essentials'],
                'brief' => [
                    'ar' => 'تأهيل طاقم التمريض للتعامل مع المرضى ذوي الحالات الحرجة وأجهزة التنفس الصناعي.',
                    'en' => 'Qualifying nursing staff to handle critical patients and mechanical ventilators.'
                ],
                'level' => 'inter',
                'hours' => 40,
                'students_count' => 600,
                'price' => 300.00,
                'image' => 'https://images.unsplash.com/photo-1581056771107-24ca5f033842?auto=format&fit=crop&q=80',
                'video_url' => 'https://www.youtube.com/embed/dQw4w9WgXcQ',
                'objectives' => ['مراقبة العلامات الحيوية المتقدمة', 'التعامل مع التنفس الصناعي', 'إدارة الأدوية الوريدية الحرجة'],
                'target_audience' => ['الممرضون المسجلون', 'طلاب الامتياز في التمريض'],
                'content_modules' => [['title' => 'أجهزة المراقبة', 'duration' => '05:00:00'], ['title' => 'أجهزة التنفس الصناعي', 'duration' => '08:00:00']],
            ],

            // --- دورات الصيدلة ---
            [
                'category_id' => $categories['pharmacy_parent']->id,
                'slug' => 'antimicrobial-stewardship',
                'title' => ['ar' => 'برنامج الإشراف على المضادات الحيوية', 'en' => 'Antimicrobial Stewardship Program'],
                'brief' => [
                    'ar' => 'دورة متخصصة لترشيد استخدام المضادات الحيوية والحد من مقاومة الميكروبات في المستشفيات.',
                    'en' => 'Specialized course for rationalizing antibiotics use and reducing microbial resistance.'
                ],
                'level' => 'advanced',
                'hours' => 20,
                'students_count' => 150,
                'price' => 200.00,
                'image' => 'https://images.unsplash.com/photo-1587854692152-cbe660dbde88?auto=format&fit=crop&q=80',
                'video_url' => 'https://www.youtube.com/embed/dQw4w9WgXcQ',
                'objectives' => ['فهم آليات مقاومة البكتيريا', 'تطبيق سياسات التقييد', 'تحليل البيانات الميكروبيولوجية'],
                'target_audience' => ['الصيادلة السريريون', 'أطباء الباطنة والأمراض المعدية'],
                'content_modules' => [['title' => 'مقدمة في المقاومة البكتيرية', 'duration' => '04:00:00'], ['title' => 'استراتيجيات الترشيد', 'duration' => '06:00:00']],
            ],

            // --- دورات الأشعة ---
            [
                'category_id' => $categories['radiology_sub']->id,
                'slug' => 'mri-safety-and-protocols',
                'title' => ['ar' => 'سلامة وبروتوكولات الرنين المغناطيسي', 'en' => 'MRI Safety and Protocols'],
                'brief' => [
                    'ar' => 'التدريب على معايير السلامة العالمية داخل غرف الرنين المغناطيسي وبروتوكولات التصوير المتقدمة.',
                    'en' => 'Training on global safety standards inside MRI rooms and advanced imaging protocols.'
                ],
                'level' => 'inter',
                'hours' => 15,
                'students_count' => 80,
                'price' => 150.00,
                'image' => 'https://images.unsplash.com/photo-1516549655169-df83a0774514?auto=format&fit=crop&q=80', // Placeholder
                'video_url' => 'https://www.youtube.com/embed/dQw4w9WgXcQ',
                'objectives' => ['فهم المناطق الأربعة للرنين', 'التعامل مع الطوارئ داخل الغرفة', 'تحسين جودة الصورة'],
                'target_audience' => ['فنيو الأشعة', 'أطباء الأشعة', 'مهندسو الأجهزة الطبية'],
                'content_modules' => [['title' => 'فيزياء الرنين المبسطة', 'duration' => '03:00:00'], ['title' => 'معايير السلامة', 'duration' => '05:00:00']],
            ],

            // --- دورات الصحة العامة ---
            [
                'category_id' => $categories['public_health_sub']->id,
                'slug' => 'infection-control-basics',
                'title' => ['ar' => 'أساسيات مكافحة العدوى في المنشآت', 'en' => 'Infection Control Basics in Facilities'],
                'brief' => [
                    'ar' => 'برنامج أساسي لمنع انتقال الأمراض وتطبيق احتياطات العزل والنظافة القياسية.',
                    'en' => 'A fundamental program to prevent disease transmission and apply standard isolation precautions.'
                ],
                'level' => 'beginner',
                'hours' => 10,
                'students_count' => 2000,
                'price' => 0.00,
                'image' => 'https://images.unsplash.com/photo-1584622650111-993a426fbf0a?auto=format&fit=crop&q=80',
                'video_url' => 'https://www.youtube.com/embed/dQw4w9WgXcQ',
                'objectives' => ['غسيل الأيدي الجراحي والطبي', 'استخدام معدات الحماية (PPE)', 'إدارة النفايات الطبية'],
                'target_audience' => ['كل العاملين في القطاع الصحي', 'عمال النظافة الطبية'],
                'content_modules' => [['title' => 'سلسلة العدوى', 'duration' => '02:00:00'], ['title' => 'التعقيم والتطهير', 'duration' => '03:00:00']],
            ],

            // --- دورات طب الأسنان ---
            [
                'category_id' => $categories['dentistry_sub']->id,
                'slug' => 'dental-implants-fundamentals',
                'title' => ['ar' => 'أساسيات زراعة الأسنان', 'en' => 'Fundamentals of Dental Implants'],
                'brief' => [
                    'ar' => 'دورة تأهيلية لأطباء الأسنان للبدء في إجراءات الزراعة السنية من التشخيص إلى التركيب.',
                    'en' => 'Qualifying course for dentists to start dental implant procedures from diagnosis to placement.'
                ],
                'level' => 'advanced',
                'hours' => 35,
                'students_count' => 120,
                'price' => 800.00,
                'image' => 'https://images.unsplash.com/photo-1606811841689-23dfddce3e95?auto=format&fit=crop&q=80',
                'video_url' => 'https://www.youtube.com/embed/dQw4w9WgXcQ',
                'objectives' => ['قراءة الأشعة المقطعية (CBCT)', 'اختيار المريض المناسب', 'التقنيات الجراحية الأساسية'],
                'target_audience' => ['أطباء الأسنان العامون', 'أخصائيو جراحة الفم'],
                'content_modules' => [['title' => 'التشخيص والتخطيط', 'duration' => '05:00:00'], ['title' => 'الخطوات الجراحية', 'duration' => '10:00:00']],
            ],
        ];

        // 4. مضاعفة البيانات برمجياً (للوصول لعدد كبير جداً دون كتابة مكررة)
        // سنقوم بإنشاء النسخ المكتوبة أعلاه أولاً
        foreach ($courses as $courseData) {
            Course::create($courseData);
        }

        // 5. زرع دورات إضافية أوتوماتيكياً (لتصل لـ 40 دورة كما طلبت)
        $levels = ['beginner', 'inter', 'advanced'];
        $categoriesKeys = array_keys($categories);

        for ($i = 1; $i <= 29; $i++) {
            $randomCat = $categories[$categoriesKeys[array_rand($categoriesKeys)]];
            Course::create([
                'category_id' => $randomCat->id,
                'slug' => 'medical-course-auto-generated-' . $i,
                'title' => [
                    'ar' => 'دورة طبية متقدمة رقم ' . $i,
                    'en' => 'Advanced Medical Course Vol ' . $i
                ],
                'brief' => [
                    'ar' => 'هذه الدورة تم توليدها لتعبئة النظام بالبيانات واختبار التصميم والأداء في منصة Medvion.',
                    'en' => 'This course was generated to populate the system for design and performance testing on Medvion.'
                ],
                'level' => $levels[array_rand($levels)],
                'hours' => rand(5, 50),
                'students_count' => rand(10, 1000),
                'price' => rand(0, 500),
                'image' => 'https://images.unsplash.com/photo-1576091160550-2173ff9e5eb3?auto=format&fit=crop&q=80',
                'video_url' => 'https://www.youtube.com/embed/dQw4w9WgXcQ',
                'objectives' => ['فهم المفاهيم الأساسية', 'التطبيق العملي السريري', 'اجتياز الاختبار النهائي'],
                'target_audience' => ['طلاب الطب', 'الأطباء المقيمون', 'الممارسون الصحيون'],
                'content_modules' => [
                    ['title' => 'مقدمة الدورة', 'duration' => '01:00:00'],
                    ['title' => 'المحور الأول', 'duration' => '03:00:00'],
                    ['title' => 'المحور الثاني والتطبيق', 'duration' => '02:30:00'],
                ],
            ]);
        }

        auth()->logout();
        $this->command->info('Database seeding completed successfully!');
    }
}
