<?php

namespace Database\Seeders;

use App\Models\About;
use Illuminate\Database\Seeder;

class AboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $aboutSections = [
            // ==========================================
            // 1. Home Page Summary (Used in <x-frontend.about>)
            // ==========================================
            [
                'section_key' => 'home_summary',
                'title' => [
                    'ar' => 'نبذة عن المنصة',
                    'en' => 'About The Platform'
                ],
                'content' => [
                    'ar' => 'نحن منصة متخصصة في تأهيل وتطوير مهارات الكوادر الصحية وفق أحدث المعايير الأكاديمية والرقمية، لتكون جاهزاً لمواجهة تحديات القطاع الصحي.',
                    'en' => 'We are a specialized platform dedicated to qualifying and developing the skills of healthcare professionals according to the latest academic and digital standards, ensuring you are ready to face the challenges of the healthcare sector.'
                ],
                'sort_order' => 1,
            ],

            // ==========================================
            // 2. About Page Hero
            // ==========================================
            [
                'section_key' => 'page_hero',
                'title' => [
                    'ar' => 'نحو منظومة تدريب صحي رقمية متميزة',
                    'en' => 'Towards an Outstanding Digital Health Training Ecosystem'
                ],
                'content' => [
                    'ar' => 'منصة Medvion هي وجهتك الأولى للتدريب المهني في القطاع الصحي.',
                    'en' => 'The Medvion platform is your premier destination for professional training in the healthcare sector.'
                ],
                'sort_order' => 1,
            ],

            // ==========================================
            // 3. Platform Definition
            // ==========================================
            [
                'section_key' => 'definition',
                'title' => [
                    'ar' => 'تعريف المنصة',
                    'en' => 'Platform Definition'
                ],
                'content' => [
                    'ar' => 'منصة Medvion هي منصة تعليمية رقمية متخصصة في مجال التدريب والتأهيل الصحي، تهدف إلى رفع كفاءة الكوادر الطبية والصحية عبر برامج تدريبية عالية الجودة تتوافق مع أفضل الممارسات الدولية.',
                    'en' => 'Medvion is a digital educational platform specializing in health training and qualification, aiming to raise the efficiency of medical and health personnel through high-quality training programs aligned with best international practices.'
                ],
                'icon' => 'M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z', // Standard SVG Path from view
                'sort_order' => 2,
            ],

            // ==========================================
            // 4. Vision
            // ==========================================
            [
                'section_key' => 'vision',
                'title' => [
                    'ar' => 'رؤيتنا',
                    'en' => 'Our Vision'
                ],
                'content' => [
                    'ar' => 'أن نكون المنصة الأولى إقليمياً في تطوير وتأهيل الكوادر الصحية رقمياً، وأن نُسهم في بناء منظومة صحية احترافية قادرة على مواجهة تحديات القرن الحادي والعشرين.',
                    'en' => 'To be the leading regional platform in the digital development and qualification of healthcare professionals, contributing to building a professional healthcare ecosystem capable of addressing the challenges of the 21st century.'
                ],
                'icon' => 'M15 12a3 3 0 11-6 0 3 3 0 016 0z M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z',
                'sort_order' => 3,
            ],

            // ==========================================
            // 5. Mission
            // ==========================================
            [
                'section_key' => 'mission',
                'title' => [
                    'ar' => 'رسالتنا',
                    'en' => 'Our Mission'
                ],
                'content' => [
                    'ar' => 'تقديم محتوى تدريبي علمي معتمد ومتجدد، يُمكَّن من خلاله الأفراد في القطاع الصحي من المعرفة والمهارات اللازمة لتحسين جودة الرعاية المقدمة للمرضى.',
                    'en' => 'To provide accredited and continually updated scientific training content, empowering individuals in the healthcare sector with the necessary knowledge and skills to improve the quality of patient care.'
                ],
                'icon' => 'M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z',
                'sort_order' => 4,
            ],

            // ==========================================
            // 6. Values (Repeated Blocks)
            // ==========================================
            [
                'section_key' => 'value',
                'title' => [
                    'ar' => 'الجودة',
                    'en' => 'Quality'
                ],
                'content' => [
                    'ar' => 'الالتزام بأعلى معايير الجودة في المحتوى التدريبي والتقييم.',
                    'en' => 'Commitment to the highest quality standards in training content and assessment.'
                ],
                'icon' => 'M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z',
                'color' => 'primary',
                'sort_order' => 5,
            ],
            [
                'section_key' => 'value',
                'title' => [
                    'ar' => 'الابتكار',
                    'en' => 'Innovation'
                ],
                'content' => [
                    'ar' => 'توظيف أحدث التقنيات التعليمية لتقديم تجربة تعلّم استثنائية.',
                    'en' => 'Employing the latest educational technologies to deliver an exceptional learning experience.'
                ],
                'icon' => 'M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z',
                'color' => 'secondary',
                'sort_order' => 6,
            ],
            [
                'section_key' => 'value',
                'title' => [
                    'ar' => 'الشمولية',
                    'en' => 'Inclusiveness'
                ],
                'content' => [
                    'ar' => 'إتاحة فرص التدريب لجميع المهنيين الصحيين بصرف النظر عن موقعهم الجغرافي.',
                    'en' => 'Providing training opportunities for all healthcare professionals regardless of their geographical location.'
                ],
                'icon' => 'M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z',
                'color' => 'primary',
                'sort_order' => 7,
            ],
            [
                'section_key' => 'value',
                'title' => [
                    'ar' => 'المصداقية',
                    'en' => 'Credibility'
                ],
                'content' => [
                    'ar' => 'الشفافية والمهنية في كل ما نقدمه من برامج ومحتوى وشهادات.',
                    'en' => 'Transparency and professionalism in everything we offer, from programs and content to certificates.'
                ],
                'icon' => 'M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z',
                'color' => 'secondary',
                'sort_order' => 8,
            ],
        ];

        About::truncate();
        foreach ($aboutSections as $section) {
            About::create($section);
        }
    }
}
