<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\User;
use App\Enums\BlogStatus;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\Format;

class BlogSeeder extends Seeder
{
    public function run(): void
    {
        $admin = User::first() ?? User::factory()->create();

        $blogs = [
            [
                'title' => [
                    'ar' => 'أهمية التحول الرقمي في القطاع الصحي',
                    'en' => 'The Importance of Digital Transformation in Healthcare'
                ],
                'short_description' => [
                    'ar' => 'نظرة شاملة على كيفية تحسين التقنيات الرقمية لجودة الرعاية الصحية وتسريع تقديم الخدمات للمرضى.',
                    'en' => 'A comprehensive look at how digital technologies improve the quality of healthcare and accelerate service delivery.'
                ],
                'content' => [
                    'ar' => 'يشهد القطاع الصحي تحولاً جذرياً بفضل التقنيات الحديثة مثل الذكاء الاصطناعي والتطبيب عن بعد. تسهم هذه التطورات في توفير تشخيصات أدق وتجربة رعاية أفضل للمرضى...',
                    'en' => 'The healthcare sector is undergoing a radical transformation thanks to modern technologies like AI and telemedicine. These advancements contribute to more accurate diagnoses and better patient care experiences...'
                ],
            ],
            [
                'title' => [
                    'ar' => 'كيف تطور مهاراتك كممارس صحي؟',
                    'en' => 'How to Develop Your Skills as a Health Practitioner?'
                ],
                'short_description' => [
                    'ar' => 'خطوات عملية ونصائح قيمة لتنمية قدراتك المهنية والطبية في عالم يتغير باستمرار.',
                    'en' => 'Practical steps and valuable tips to develop your professional and medical capabilities in an ever-changing world.'
                ],
                'content' => [
                    'ar' => 'في ظل التطور المتسارع في المجال الطبي، أصبح التعلم المستمر ضرورة وليس خياراً. التدريب والتأهيل واكتساب المهارات الناعمة مثل التواصل وحل المشكلات تعتبر من أسس النجاح...',
                    'en' => 'In light of the rapid development in the medical field, continuous learning has become a necessity, not a luxury. Training, qualification, and acquiring soft skills like communication are foundations of success...'
                ],
            ],
            [
                'title' => [
                    'ar' => 'أحدث التقنيات في إدارة الأمراض المزمنة',
                    'en' => 'Latest Technologies in Chronic Disease Management'
                ],
                'short_description' => [
                    'ar' => 'تعرف على التطبيقات والأجهزة الذكية التي تساعد المرضى على تتبع حالتهم الصحية يومياً.',
                    'en' => 'Learn about smart applications and devices that help patients track their health status daily.'
                ],
                'content' => [
                    'ar' => 'إدارة الأمراض المزمنة مثل السكري وضغط الدم أصبحت أكثر سهولة بفضل الأجهزة القابلة للارتداء والتطبيقات الذكية التي ترسل تقارير دورية للأطباء...',
                    'en' => 'Managing chronic diseases like diabetes and blood pressure has become much easier thanks to wearable devices and smart apps that send periodic reports to doctors...'
                ],
            ],
            [
                'title' => [
                    'ar' => 'مستقبل التعليم الطبي بعد الجائحة',
                    'en' => 'The Future of Medical Education After the Pandemic'
                ],
                'short_description' => [
                    'ar' => 'دروس مستفادة من الأزمات السابقة وكيف أصبحت المنصات الرقمية أساساً في التأهيل الصحي.',
                    'en' => 'Lessons learned from past crises and how digital platforms became a foundation in health qualification.'
                ],
                'content' => [
                    'ar' => 'لقد غيرت الجائحة طريقة تقديم التعليم الطبي. المنصات الرقمية مثل Medvion تقدم الآن محتوى تفاعلياً وشهادات معتمدة تسد الفجوة بين النظري والعملي...',
                    'en' => 'The pandemic changed the way medical education is delivered. Digital platforms like Medvion now offer interactive content and accredited certificates bridging the gap between theory and practice...'
                ],
            ]
        ];

        // Ensure storage directory exists
        Storage::disk('public')->makeDirectory('blogs');
        $manager = ImageManager::usingDriver(Driver::class);

        foreach ($blogs as $index => $blogData) {
            
            $filename = 'blogs/dummy-' . Str::random(8) . '.webp';
            
            // Generate a simple 1x1 transparent webp base64 and save it, to bypass intervention error.
            // In a real CMS, the ImageManager->read($file) and ->scaleDown() would be used.
            $transparentWebP = base64_decode('UklGRhoAAABXRUJQVlA4TA0AAAAvAAAAEAcQERGIiP4HAA==');
            Storage::disk('public')->put($filename, $transparentWebP);

            Blog::create([
                'title' => $blogData['title'],
                'short_description' => $blogData['short_description'],
                'content' => $blogData['content'],
                'main_image' => $filename,
                'created_by' => $admin->id,
                'updated_by' => $admin->id,
                'approved_by' => $admin->id,
                'read_count' => rand(100, 5000),
                'status' => BlogStatus::PUBLISHED,
                'published_at' => now()->subDays(rand(1, 30)),
            ]);
        }
    }
}
