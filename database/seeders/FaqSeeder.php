<?php

namespace Database\Seeders;

use App\Models\Faq;
use Illuminate\Database\Seeder;

class FaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faqs = [
            [
                'question' => [
                    'ar' => 'هل الدورات معتمدة رسمياً؟',
                    'en' => 'Are the courses officially accredited?'
                ],
                'answer' => [
                    'ar' => 'نعم، جميع الدورات المقدمة على منصة Medvion معتمدة وتصدر بها شهادات إتمام معترف بها من قِبل الجهات الطبية والأكاديمية المختصة.',
                    'en' => 'Yes, all courses offered on the Medvion platform are accredited and come with completion certificates recognised by the relevant medical and academic authorities.'
                ],
                'sort_order' => 1,
            ],
            [
                'question' => [
                    'ar' => 'هل يمكنني التعلم من أي جهاز ذكي؟',
                    'en' => 'Can I learn from any smart device?'
                ],
                'answer' => [
                    'ar' => 'بالتأكيد، المنصة مُصممة لتكون متوافقة بالكامل مع الهواتف الذكية والأجهزة اللوحية وأجهزة الكمبيوتر دون أي قيود.',
                    'en' => 'Absolutely. The platform is fully responsive and compatible with smartphones, tablets, and computers without any limitations.'
                ],
                'sort_order' => 2,
            ],
            [
                'question' => [
                    'ar' => 'كيف أحصل على شهادة الإتمام؟',
                    'en' => 'How do I receive my completion certificate?'
                ],
                'answer' => [
                    'ar' => 'بعد استكمال جميع وحدات الدورة واجتياز الاختبار النهائي بنجاح، ستحصل تلقائياً على شهادة إتمام رقمية موثقة قابلة للمشاركة والطباعة.',
                    'en' => 'After completing all course units and passing the final assessment, you will automatically receive a verified digital completion certificate that can be shared and printed.'
                ],
                'sort_order' => 3,
            ],
            [
                'question' => [
                    'ar' => 'هل هناك رسوم للتسجيل في المنصة؟',
                    'en' => 'Are there registration fees?'
                ],
                'answer' => [
                    'ar' => 'التسجيل في منصة Medvion مجاني تماماً. بعض الدورات المتخصصة قد تكون مدفوعة، في حين يتوفر عدد كبير من الدورات مجاناً للجميع.',
                    'en' => 'Registration on Medvion is completely free. Some specialised courses may be paid, while a large number of courses are available free of charge for everyone.'
                ],
                'sort_order' => 4,
            ],
            [
                'question' => [
                    'ar' => 'من يؤهل لالتحاق بالدورات؟',
                    'en' => 'Who is eligible to enrol in the courses?'
                ],
                'answer' => [
                    'ar' => 'الدورات مفتوحة لجميع العاملين في القطاع الصحي، بما في ذلك الأطباء والممرضون والصيادلة وطلاب الكليات الطبية والمهتمون بالتطوير المهني الصحي.',
                    'en' => 'Courses are open to all healthcare professionals, including doctors, nurses, pharmacists, medical students, and anyone interested in continuing professional health development.'
                ],
                'sort_order' => 5,
            ],
        ];

        foreach ($faqs as $faqData) {
            Faq::create($faqData);
        }
    }
}
