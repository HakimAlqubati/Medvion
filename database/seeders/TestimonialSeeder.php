<?php

namespace Database\Seeders;

use App\Enums\TestimonialStatus;
use App\Models\Testimonial;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class TestimonialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $testimonials = [
            [
                'client_name' => ['en' => 'Dr. Ahmed Yassin', 'ar' => 'د. أحمد ياسين'],
                'role' => ['en' => 'Cardiologist', 'ar' => 'استشاري أمراض القلب'],
                'content' => [
                    'en' => 'Medvion has completely transformed the way we manage professional training. The content is highly relevant and structured perfectly for busy healthcare professionals.',
                    'ar' => 'لقد غيَّرت Medvion تماماً من طريقة إدارتنا للتدريب المهني. المحتوى دقيق جداً ومنظم بطريقة مثالية للممارسين الصحيين.'
                ],
                'rating' => 5,
            ],
            [
                'client_name' => ['en' => 'Sarah Al-Qahtani', 'ar' => 'سارة القحطاني'],
                'role' => ['en' => 'Nursing Student', 'ar' => 'طالبة تمريض'],
                'content' => [
                    'en' => 'The flexibility of the courses allowed me to learn at my own pace. The interactive modules and quizzes were exceptional in testing my knowledge.',
                    'ar' => 'مرونة الدورات التدريبية سمحت لي بالتعلم بالسرعة التي تناسبني. الوحدات التفاعلية والاختبارات كانت استثنائية في تقييم معرفتي.'
                ],
                'rating' => 5,
            ],
            [
                'client_name' => ['en' => 'Dr. Khalid Al-Otaibi', 'ar' => 'د. خالد العتيبي'],
                'role' => ['en' => 'General Surgeon', 'ar' => 'جراح عام'],
                'content' => [
                    'en' => 'I highly recommend Medvion for any medical professional looking to stay updated with the latest in the medical field. Truly a premium experience.',
                    'ar' => 'أوصي بشدة بمنصة Medvion لأي ممارس صحي يبحث عن مواكبة أحدث التطورات في المجال الطبي. تجربة فاخرة بكل المقاييس.'
                ],
                'rating' => 4,
            ],
            [
                'client_name' => ['en' => 'Nora Abdullah', 'ar' => 'نورة عبدالله'],
                'role' => ['en' => 'Hospital Administrator', 'ar' => 'مديرة مستشفى'],
                'content' => [
                    'en' => 'Partnering with Medvion was the best decision for our hospital\'s continuous medical education program. The analytics and reporting are top-notch.',
                    'ar' => 'التعاون مع Medvion كان أفضل قرار اتخذناه لبرنامج التعليم الطبي المستمر في مستشفانا. التحليلات والتقارير المقدمة ممتازة.'
                ],
                'rating' => 5,
            ],
        ];

        foreach ($testimonials as $data) {
            $filename = 'testimonials/dummy-' . Str::random(8) . '.webp';
            
            // Dummy 1x1 transparent image fallback as we did in BlogSeeder
            $transparentWebP = base64_decode('UklGRhoAAABXRUJQVlA4TA0AAAAvAAAAEAcQERGIiP4HAA==');
            Storage::disk('public')->put($filename, $transparentWebP);

            Testimonial::create([
                'client_name' => $data['client_name'],
                'role' => $data['role'],
                'content' => $data['content'],
                'rating' => $data['rating'],
                'avatar_image' => $filename,
                'status' => TestimonialStatus::ACTIVE,
            ]);
        }
    }
}
