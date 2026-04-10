<?php

namespace Database\Seeders;

use App\Models\Survey;
use Illuminate\Database\Seeder;

class SurveySeeder extends Seeder
{
    public function run(): void
    {
        $survey = Survey::create([
            'title' => 'Medvion Expert Selection Board - برنامج اختيار خبراء التدريب الصحي الرقمي',
            'description' => "هذا ليس نموذج تسجيل… بل تقييم انتقائي لاختيار خبراء Medvion\nفي Medvion، يتم اختيار الخبراء بناءً على معايير دقيقة تشمل:\nالكفاءة السريرية / الفنية\nالقدرة على نقل المعرفة بفعالية\nالتفكير التحليلي واتخاذ القرار\nالأثر المهني المتوقع\nيتم قبول نسبة محدودة من المتقدمين.\nسيتم التواصل فقط مع المرشحين المؤهلين.",
            'is_active' => true,
        ]);

        $questions = [
            // SECTION 1: البيانات الأساسية
            ['text' => 'الاسم الكامل', 'type' => 'short_text', 'required' => true],
            ['text' => 'البريد الإلكتروني', 'type' => 'email', 'required' => true],
            ['text' => 'رقم الهاتف', 'type' => 'phone', 'required' => true],
            ['text' => 'الدولة / المدينة', 'type' => 'short_text', 'required' => true],
            ['text' => 'الجنس (اختياري – لأغراض إحصائية)', 'type' => 'radio', 'required' => false, 'options' => ['ذكر', 'أنثى', 'أفضل عدم الإجابة']],
            
            // SECTION 2: الخلفية الأكاديمية والمهنية
            ['text' => 'أعلى مؤهل علمي', 'type' => 'radio', 'required' => true, 'options' => ['دكتوراه', 'ماجستير', 'بكالوريوس', 'دبلوم', 'أخرى']],
            ['text' => 'التخصص الرئيسي', 'type' => 'radio', 'required' => true, 'options' => ['الطب البشري', 'طب الأسنان', 'الصيدلة', 'التمريض', 'المختبرات الطبية', 'الأشعة والتصوير الطبي', 'العلاج الطبيعي', 'التغذية العلاجية', 'الصحة العامة', 'إدارة صحية', 'أخرى']],
            ['text' => 'التخصص الدقيق', 'type' => 'short_text', 'required' => true],
            ['text' => 'جهة العمل الحالية', 'type' => 'short_text', 'required' => true],
            ['text' => 'سنوات الخبرة', 'type' => 'radio', 'required' => true, 'options' => ['أقل من سنة', '1–3 سنوات', '3–5 سنوات', '5–10 سنوات', 'أكثر من 10 سنوات']],
            ['text' => 'هل لديك ترخيص مهني ساري؟', 'type' => 'radio', 'required' => true, 'options' => ['نعم', 'لا']],

            // SECTION 3: الخبرة العملية
            ['text' => 'صف خبرتك العملية في مجالك', 'type' => 'long_text', 'required' => true],
            ['text' => 'ما نوع بيئة عملك الحالية؟', 'type' => 'radio', 'required' => true, 'options' => ['مستشفى حكومي', 'مستشفى خاص', 'مركز صحي', 'مختبر', 'عيادة', 'جامعة / أكاديمية', 'أخرى']],
            ['text' => 'ما أكثر الحالات / المهام التي تتعامل معها؟', 'type' => 'long_text', 'required' => true],
            ['text' => 'مستوى خبرتك', 'type' => 'radio', 'required' => true, 'options' => ['مبتدئ', 'متوسط', 'متقدم', 'خبير']],

            // SECTION 4: القدرة على التعليم
            ['text' => 'هل سبق لك تقديم تدريب أو تدريس؟', 'type' => 'radio', 'required' => true, 'options' => ['نعم', 'لا']],
            ['text' => 'كيف تشرح مفهومًا معقدًا لشخص مبتدئ؟', 'type' => 'long_text', 'required' => true],
            ['text' => 'ما أسلوبك المفضل في التدريب؟', 'type' => 'radio', 'required' => true, 'options' => ['نظري', 'تطبيقي', 'تفاعلي', 'مزيج بينهم']],
            ['text' => 'كيف تتعامل مع متدرب ضعيف الفهم؟', 'type' => 'long_text', 'required' => true],

            // SECTION 5: التفكير المهني / السريري
            ['text' => 'كيف تتعامل مع حالة أو مشكلة غير واضحة؟', 'type' => 'long_text', 'required' => true],
            ['text' => 'كيف تتخذ قرارًا مهنيًا في حال تضارب المعلومات؟', 'type' => 'long_text', 'required' => true],
            ['text' => 'هل تعتمد على الأدلة العلمية (Evidence-Based Practice)؟', 'type' => 'radio', 'required' => true, 'options' => ['دائمًا', 'أحيانًا', 'نادرًا']],

            // SECTION 6: المحتوى التدريبي
            ['text' => 'المجالات التي يمكنك التدريب فيها', 'type' => 'checkboxes', 'required' => true, 'options' => ['المهارات السريرية', 'تفسير التحاليل', 'الأشعة', 'التمريض العملي', 'الطوارئ', 'مكافحة العدوى', 'الجودة وسلامة المرضى', 'المهارات الإدارية الصحية', 'البحث العلمي', 'اللغة الإنجليزية الطبية', 'مهارات التواصل', 'أخرى']],
            ['text' => 'الفئة التي تستهدفها بالتدريب', 'type' => 'checkboxes', 'required' => true, 'options' => ['طلاب', 'مبتدئين', 'متوسطين', 'محترفين']],
            ['text' => 'اذكر 3 برامج تدريبية يمكنك تقديمها', 'type' => 'long_text', 'required' => true],
            ['text' => 'هل لديك محتوى تدريبي جاهز؟', 'type' => 'radio', 'required' => true, 'options' => ['نعم', 'لا']],

            // SECTION 7: الجاهزية المهنية
            ['text' => 'كم ساعة يمكنك تخصيصها شهريًا للتدريب؟', 'type' => 'radio', 'required' => true, 'options' => ['أقل من 5 ساعات', '5–10', '10–20', 'أكثر من 20']],
            ['text' => 'هل تفضل:', 'type' => 'radio', 'required' => true, 'options' => ['التدريب المباشر', 'المسجل', 'كلاهما']],
            ['text' => 'ما الذي يميزك كمدرب؟', 'type' => 'long_text', 'required' => true],

            // SECTION 8: الملفات
            ['text' => 'السيرة الذاتية', 'type' => 'file', 'required' => true],
            ['text' => 'شهادات أو نماذج عمل', 'type' => 'file', 'required' => false],
        ];

        $order = 0;
        foreach ($questions as $q) {
            $order++;
            $survey->questions()->create([
                'question_text' => $q['text'],
                'type' => $q['type'],
                'is_required' => $q['required'],
                'options' => isset($q['options']) ? $q['options'] : null,
                'order' => $order,
            ]);
        }
    }
}
