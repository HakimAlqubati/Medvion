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

        // ==========================================
        // 6. إنشاء الصفحات القانونية (Pages)
        // ==========================================
        $this->command->info('Creating Dynamic Legal Pages...');
        \App\Models\Page::truncate();
        
        \App\Models\Page::create([
            'slug' => 'privacy',
            'title' => [
                'ar' => 'سياسة الخصوصية الشاملة',
                'en' => 'Comprehensive Privacy Policy',
            ],
            'content' => [
                'ar' => '
<div>
    <h2>مقدمة ونطاق سياسة الخصوصية</h2>
    <p>مرحباً بكم في منصة <strong>Medvion</strong> الرائدة في مجال التعليم الطبي المستمر. نحن نعتبر حماية بياناتكم الشخصية والمهنية أولوية قصوى وجزءاً لا يتجزأ من قيمنا المؤسسية. توضح هذه الوثيقة التفصيلية الآلية الكاملة والشفافة التي نتبعها في جمع، معالجة، تخزين، وحماية معلوماتك في جميع تعاملاتك مع منصتنا سواء عبر الموقع الإلكتروني أو التطبيق.</p>
    
    <h2>1. البيانات التي نقوم بجمعها</h2>
    <p>يتطلب تقديم خدمات تعليمية طبية متميزة جمع تفاصيل دقيقة وتحديثها بشكل مستمر لضمان تطابقها مع المتطلبات المعتمدة للممارسين الصحيين، وتشمل هذه البيانات:</p>
    <ul>
        <li><strong>المعلومات الشخصية الأساسية:</strong> وتتضمن الاسم الرباعي (كما هو في الهوية/الإقامة)، تاريخ الميلاد، الجنس، الجنسية، وعنوان الإقامة الحالي.</li>
        <li><strong>المعلومات المهنية والأكاديمية:</strong> التخصص الطبي الدقيق، درجة الممارسة، تاريخ التخرج، رقم التصنيف المهني (مثل رقم الهيئة السعودية للتخصصات الصحية SCFHS)، والجهة الطبية التي تعمل بها.</li>
        <li><strong>بيانات الاتصال والتواصل:</strong> البريد الإلكتروني الأساسي والبديل، أرقام الهواتف المحمولة وتطبيقات المراسلة مثل الواتساب.</li>
        <li><strong>بيانات الاستخدام والتصفح:</strong> عنوان الـ IP الخاص بجهازك، نوع ونظام المتصفح، الصفحات التي قمت بزيارتها، مدة بقائك في كل مسار تعليمي، إلى جانب الإجابات ونتائج التقييمات الطبية.</li>
        <li><strong>بيانات الدفع المالي:</strong> عند شراء أي دورة أو خدمة، نقوم بمعالجة المعاملة بشكل مشفر بالكامل ولا نحتفظ بمعلومات البطاقات الائتمانية، حيث تتم معالجتها من قِبل بوابة الدفع المعتمدة وفقاً لمعايير PCI DSS.</li>
    </ul>

    <h2>2. كيف ولماذا نستخدم بياناتك؟</h2>
    <p>تُستخدم البيانات التي يتم تجميعها في الأمور التقنية والشرعية وتلبية الجودة فقط وتتلخص في النقاط الآتية:</p>
    <ul>
        <li>تخصيص المسارات التعليمية الطبية بما يتناسب مع تخصصك ودرجتك العلمية.</li>
        <li>إصدار الشهادات الأكاديمية بدقة بالغة واعتمادها إلكترونياً بالتنسيق مع الجهات والهيئات الطبية المحلية والدولية.</li>
        <li>إرسال الإشعارات التقنية وتحديثات السياسات الهامة والتنبيهات عند إطلاق مؤتمرات ودورات جديدة تناسب تخصصك.</li>
        <li>تحليل أداء النظام وتخفيف أعباء السيرفرات ومعرفة المشكلات التقنية لضمان خلو المنصة من الأعطال المستقبلية.</li>
        <li>حل النزاعات المحتملة وتقديم خدمة دعم فني استراتيجية وسريعة.</li>
    </ul>

    <h2>3. مشاركة البيانات والإفصاح للجهات الخارجية</h2>
    <p>لا تقوم <strong>Medvion</strong> ببيع، أو تأجير، أو استثمار بياناتكم الخاصة لأغراض تجارية، إلا أنه قد يُطلب منا مشاركة بيانات محددة لحالات شرعية وهي:</p>
    <ul>
        <li>الهيئات والمجالس الطبية المحلية لتسجيل وتوثيق ساعات التعليم الطبي المستمر (CME) لحسابك.</li>
        <li>الامتثال للقوانين واللوائح الرسمية، وفي حالة طلب السلطات القضائية أو الحكومية بيانات محددة بعد استيفاء الشروط القانونية الصارمة.</li>
        <li>الشركات التقنية الحليفة التي تساعدنا في تقديم الخدمة (مثل مزودي خدمات الرفع السحابي وبوابات الدفع)، وتكون هذه الشركات ملزمة بموجب اتفاقيات صارمة بعدم استخدام هذه البيانات لأغراض أخرى.</li>
    </ul>

    <h2>4. معايير حماية البيانات التقنية (Security)</h2>
    <p>تطبق Medvion بنية تحتية آمنة لحماية معلوماتكم عبر التقنيات التالية:</p>
    <ul>
        <li>تشفير جميع قنوات الاتصال بروتوكولات <strong>TLS/SSL</strong> القوية (معيار الحماية البنكية).</li>
        <li>استخدام تقنيات التشفير المتطورة <strong>AES-256 bit</strong> في قواعد بياناتنا السحابية لحماية الكلمات المرورية والأرقام التعريفية.</li>
        <li>الاستعانة بأنظمة الحماية والجدران النارية <strong>WAF</strong> لمنع محاولات الاختراق وهجمات الحرمان من الخدمة (DDoS).</li>
        <li>إجراء اختبارات اختراق واختبارات هشاشة (Pentesting) دورية للبنية التحتية من قبل طرف ثالث موثوق.</li>
    </ul>

    <h2>5. استخدام ملفات تتبع مسار الاستخدام (Cookies)</h2>
    <p>تستخدم منصتنا ملفات الارتباط (Cookies) المؤقتة والدائمة لتحسين أداء سرعة الوصول وتوفير تسجيل الدخول السريع وتذكر تفضيلات اللغة الخاص بك. يمكنك التحكم فيها عن طريق إعدادات متصفحك بشكل كامل، ولكن نود التنبيه إلى تعطيلها قد يؤثر على تجربة سير الدورات التفاعلية.</p>

    <h2>6. مدة الاحتفاظ بالبيانات</h2>
    <p>نحتفظ ببياناتك ومعلومات شهاداتك طوال فترة بقاء حسابك فعالاً لمساعدتك على استخراجها مجدداً في أي وقت كأرشيف سحابي آمن. في حال طلبك حذف الحساب، سيتم إتلاف بياناتك بشكل تدريجي من أنظمتنا الحية وفقاً للوائح وامتثال الهيئات المنظمة لمدة لا تتجاوز 90 يوماً.</p>

    <h2>7. التعديلات على الوثيقة وحقوقك</h2>
    <p>نراجع ونحدّث هذه الوثيقة بانتظام لتعكس التطورات التشريعية أو الخدمات الإضافية، وسيتم إخطار جميع الممارسين الصحيين لدينا عبر البريد قبل أي تعديل جوهري. كمستخدم لـ Medvion يحق لك الكامل طلب تعديل بياناتك أو تجميد حسابك أو تنزيل نسخة بصيغة إلكترونية للملفات الخاصة بك.</p>
</div>',
                'en' => '
<div>
    <h2>Introduction and Scope of Privacy Policy</h2>
    <p>Welcome to <strong>Medvion</strong>, a leading platform in Continuing Medical Education (CME). We consider the protection of your personal and professional data a top priority and an integral part of our corporate values. This detailed document explains our transparent mechanisms for collecting, processing, storing, and protecting your information across all your interactions with our platform.</p>
    
    <h2>1. Data We Collect</h2>
    <p>Providing exceptional medical education services requires collecting accurate details and continuously updating them to ensure compliance with approved practitioner requirements. This data includes:</p>
    <ul>
        <li><strong>Basic Personal Information:</strong> Full name (as on ID/Passport), date of birth, gender, nationality, and current residential address.</li>
        <li><strong>Professional and Academic Information:</strong> Specific medical specialty, degree level, graduation date, professional classification number (e.g., SCFHS), and workplace institution.</li>
        <li><strong>Contact Information:</strong> Primary and alternative email addresses, mobile numbers, and messaging apps such as WhatsApp.</li>
        <li><strong>Usage and Browsing Data:</strong> Your device IP address, browser type and OS, pages visited, time spent on educational tracks, alongside exam answers and assessment results.</li>
        <li><strong>Financial Payment Data:</strong> Upon purchasing a service, the transaction is fully encrypted. We do not store credit card details; they are processed by an authorized PCI-DSS compliant payment gateway.</li>
    </ul>

    <h2>2. How and Why Do We Use Your Data?</h2>
    <p>The collected data is strictly utilized for technical, compliance, and quality enhancement purposes, mainly:</p>
    <ul>
        <li>Customizing medical educational tracks that specifically align with your specialty and academic degree.</li>
        <li>Accurately issuing academic certificates and electronically verifying them with local and international medical authorities.</li>
        <li>Sending technical notifications, crucial policy updates, and alerts when new medical conferences relevant to your field are launched.</li>
        <li>Analyzing system performance, load balancing, and predicting technical anomalies to ensure a bug-free future environment.</li>
        <li>Resolving potential disputes and providing swift strategic technical support.</li>
    </ul>

    <h2>3. Data Sharing and Third-Party External Disclosures</h2>
    <p><strong>Medvion</strong> does not sell, rent, or invest your private data for commercial purposes. However, we may be obligated to share specific data in strictly legal and operational cases:</p>
    <ul>
        <li>Local medical councils and boards for registering and documenting your CME hours directly to your professional account.</li>
        <li>Compliance with official laws and regulations, in the event judicial or governmental authorities formally request data upon meeting strict legal constraints.</li>
        <li>Allied technology vendors who assist us in providing the service (such as cloud hosting and payment gateways), bound by strict agreements limiting arbitrary data usage.</li>
    </ul>

    <h2>4. Technical Data Protection Standards (Security)</h2>
    <p>Medvion applies a highly secured infrastructure to protect your information through the following technologies:</p>
    <ul>
        <li>Encrypting all communication channels via strong <strong>TLS/SSL</strong> protocols (Banking/Military grade standards).</li>
        <li>Deploying advanced <strong>AES-256 bit</strong> encryption on our cloud databases to protect passwords and identification hashes.</li>
        <li>Using Web Application Firewalls (<strong>WAF</strong>) to prevent intrusion attempts and Distributed Denial of Service (DDoS) attacks.</li>
        <li>Conducting routine penetration and vulnerability testing (Pentesting) of the underlying infrastructure by trusted third-party auditing firms.</li>
    </ul>

    <h2>5. Usage Tracking Files (Cookies)</h2>
    <p>Our platform utilizes temporary and permanent Cookies to optimize landing speed, enable swift logins, and remember language preferences. You can completely configure them through your browser settings, though disabling them initially might degrade the interactive coursework experience.</p>

    <h2>6. Data Retention Period</h2>
    <p>We preserve your data and certificate logs robustly for as long as your account is active, helping you retrieve them at any time as a secure cloud archive. Upon account deletion request, your data will systematically be purged from live systems subject to organizational compliance logs mapping no more than 90 days.</p>

    <h2>7. Modifications to the Policy and Your Rights</h2>
    <p>We routinely review and update this document reflecting legislative evolution or supplementary services, with profound notification sent exclusively to all medical practitioners dynamically. As a Medvion user, you encompass absolute rights to modify, freeze, or digitally download an exact copy of your files anytime.</p>
</div>',
            ],
        ]);

        \App\Models\Page::create([
            'slug' => 'terms',
            'title' => [
                'ar' => 'الشروط والأحكام الكاملة للاستخدام',
                'en' => 'Comprehensive Terms of Use',
            ],
            'content' => [
                'ar' => '
<div>
    <h2>1. الإقرار والقبول بالشروط</h2>
    <p>تهدف منصة <strong>Medvion</strong> إلى تقديم محتوى طبي وتدريبي بمعايير عالمية. إن ولوجك وتصفحك للمنصة وتسجيلك كمتدرب يعني موافقتك الصريحة والإلزامية بالقراءة والالتزام التام بكافة بنود هذه الشروط والأحكام، ويعد هذا بمثابة اتفاقية عقدية بينك وبين المنصة، وفي حال عدم الموافقة يجب عليك الامتناع عن استخدام خدماتنا بشكل فوري.</p>
    
    <h2>2. أهلية المستخدم والشروط المهنية</h2>
    <p>يجب على مستخدمي المنصة المتقدمين لبرامج الدورات المعتمدة بساعات التطوير المهني (CME) أن يكونوا ممارسين صحيين مرخصين، أو طلاباً في كليات صحية معتمدة. يحتفظ موقع Medvion بالحق في طلب إثبات الهوية أو الترخيص المهني للتأكد من الموثوقية. استخدام المنصة ببيانات منتحلة أو كاذبة يُعرض حسابك للإلغاء المباشر دون المبالغ المستردة مع إمكانية الملاحقة القانونية.</p>

    <h2>3. ضوابط الأمان لحساب المستخدم</h2>
    <ul>
        <li>يُمنع منعاً قاطعاً مشاركة بيانات تسجيل الدخول أو إعارة الحساب لشخص آخر حيث يعتبر حسابك التعليمي سجلًا مهنيًا شخصيًا.</li>
        <li>النظام التقني مزود بآليات رصد عناوين الـ IP وجلسات الدخول المزامنة (Session tracking). في حال اكتشاف مشاركة الحساب سيتم تعليقه فوراً لمنع التزوير في إصدار الشهادات.</li>
    </ul>

    <h2>4. سياسة الملكية الفكرية وسرية المناهج</h2>
    <p>جميع المواد المرفوعة في المنصة حصراً لبرنامج Medvion: الفيديوهات التفاعلية، الاختبارات، ملفات الكتيبات (PDF)، الرسوم التوضيحية الطبية وتصاميم الهوية هي ملك وحقوق طبع ونشر للمنصة وللأطباء المحاضرين.</p>
    <ul>
        <li>لا يُسمح بتسجيل الشاشة باستخدام برامج تسجيل مرئية، أو تحميل الفيديوهات، أو إعادة بيع محتوى المنصة.</li>
        <li>استخدام الكود أو الشعار لأغراض تجارية دون إذن كتابي موثق يعد انتهاكاً لحقوق الملكية التي يعاقب عليها القانون.</li>
    </ul>

    <h2>5. سياسة الاسترجاع المالي وإلغاء الاشتراك (ركن محوري)</h2>
    <p>نحن نلتزم بالشفافية الكاملة بناءً على أنظمة حماية المستهلك للمواد الرقمية:</p>
    <ul>
        <li><strong>حق الاسترجاع المبكر:</strong> يحق للمشترك طلب استرداد المبلغ بالكامل خلال (3 أيام / 72 ساعة) من تاريخ ووقت الشراء الفعلي.</li>
        <li><strong>شرط الجدية:</strong> يُشترط للموافقة على الاسترجاع ألا يكون المتدرب قد استكمل أكثر من (10%) من إجمالي مشاهدة الدورة أو قام بتحميل المرفقات العلمية الحصرية للدورة.</li>
        <li>لا يتم استرجاع الأموال نهائياً في حال قام النظام التقني بإصدار الشهادة الأكاديمية للدورة، حيث تعد الدورة في هذه الحالة مباعة ومنتهية بنجاح للطرف المستفيد.</li>
        <li>تستغرق عملية استرداد المبالغ بعد القبول مدة تتراوح بين 5 إلى 14 يوم عمل حسب سياسات البنوك المصدرة للبطاقة.</li>
    </ul>

    <h2>6. إخلاء المسؤولية الجنائية والسريرية الطبية</h2>
    <p>محتوى منصة Medvion يهدف حصرياً للتطوير المهني والتعليم المنهجي. لا نضمن أو نتعهد بأي مسؤولية شرعية أو جنائية إثر قرارات سريرية أو طبية فعلية يتخذها الممارس وتلحق ضرراً بالمرضى في المستشفيات. يجب على الطبيب والمتدرب الاعتماد الكلي على البرتوكولات الوطنية المحلية في بلده أثناء العلاج واعتبار المنصة رافد تعليمي للمعلومات المتقدمة فقط.</p>

    <h2>7. القوة القاهرة وانقطاع الخدمات التقنية</h2>
    <p>تسعى إدارة المنصة لوصول مستمر لا ينقطع (99.9% Uptime) للمستخدمين، إلا أنه لا نتحمل المسؤولية في حالة تعطل الخوادم لأسباب تتعلق بالكوارث، حجب المزودات الدولية، الصيانة الطارئة للأمن السيبراني، أو بطء شبكة مزود الإنترنت الخاص بالمتدرب.</p>

    <h2>8. الاختصاص القضائي وفض النزاعات</h2>
    <p>تخضع هذه الاتفاقية بكافة بنودها وتفسيرها للأنظمة والقوانين المتبعة في المملكة العربية السعودية. وفي حال حدوث أي نزاع، يلتزم الطرفان بمحاولة الحل الودي أولاً عبر خدمة التقاضي والمراسلات لمدة 30 يوماً، قبیل التوجه للمحاكم المعنية والمختصة قانونياً.</p>
</div>',
                'en' => '
<div>
    <h2>1. Declaration and Acceptance of Terms</h2>
    <p>The <strong>Medvion</strong> platform is designed to provide world-class medical and training content. Your access, browsing, and registration mark your explicit and strict acceptance of adhering to all clauses of these terms and conditions. This establishes a legal contract between you and the platform. Disagreement bounds you to cease using our services fundamentally.</p>
    
    <h2>2. User Eligibility and Professional Demands</h2>
    <p>Users applying to CME accredited courses must formally be licensed healthcare providers or verified students in accredited health colleges. Medvion retains absolute clearance to request validation (IDs/licenses) confirming genuineness. Utilizing fabricated inputs puts your educational portfolio into irreversible termination minus refunds along with probable prosecution.</p>

    <h2>3. Security Directives for Accounts</h2>
    <ul>
        <li>Sharing your portal credentials or temporarily lending out your account is drastically prohibited, perceiving your academic profile as entirely personal and ethically guarded.</li>
        <li>The internal subsystem operates active session overlaps and dynamic IP monitors. Should deliberate credential harvesting map out, instant systemic suspension resolves automatically pre-empting fraudulent certification processing.</li>
    </ul>

    <h2>4. Copyright Protocols & Curriculum Secrecy</h2>
    <p>All multimedia resources compiled throughout Medvion (interactive modules, quizzes, localized PDFs, precise medical illustrations, interface layout vectors) are restricted intellectual assets dedicated strictly to Medvion and the lecturer.</p>
    <ul>
        <li>Running screen-recording infrastructures, extracting videos algorithmically, or illegally reproducing the digital payload commercializes a fundamental breach.</li>
        <li>Usurping brand logos alongside underlying source code provokes legal infringement boundaries immediately prosecutable.</li>
    </ul>

    <h2>5. Broad Refund Policy Framework</h2>
    <p>Consumer integrity constitutes our prime focus modeled effectively via transparent regulatory policies:</p>
    <ul>
        <li><strong>Early Withdraw Criterion:</strong> Validly request a standardized 100% refund executing within exactly (3 Days / 72 hours) tracking exclusively from transactional timestamps.</li>
        <li><strong>Utilization Restrictions:</strong> Validation limits depend rigidly on total watch completion failing to bypass the strict (10%) percentile or avoiding premium scientific resource downloads.</li>
        <li>Under zero circumstances are refunds deployed if an active systemic certification generation succeeds. Generated certificates inherently close out the fiscal trade.</li>
        <li>Banking cycle restitutions generally conclude within 5 to 14 business days subject to regional issuing bank paradigms.</li>
    </ul>

    <h2>6. Medical Disclaimers and Clinical Liability Absolving</h2>
    <p>Content published extensively across Medvion bridges theoretical and professional modernization selectively. No criminal or legislative reliance pledges exist defending any adverse clinical or definitive surgical decisions taken independently trailing our courses. Real-world practitioners remain exclusively guided by local national mandates prioritizing safety overall relying on Medvion simply as a supplementary continuum.</p>

    <h2>7. Force Majeure and Technical Infrastructure</h2>
    <p>Engineers persistently chase uncompromising server availabilities tracking (99.9% SLA). Medvion indemnifies themselves regarding arbitrary disasters scaling ISP bans, severe cyber-attacks inciting unplanned outrages, physical data-center fires, and primarily client-side bandwidth chokeholds directly impacting streams.</p>

    <h2>8. Governing Body and Legal Jurisdiction</h2>
    <p>These comprehensively tailored provisions act universally dictated and bound by the supreme laws and legislation mapped within the Kingdom of Saudi Arabia. Before cascading into a court layout over eventual disputes, diplomatic written negotiations through core compliance ticketing persist for 30 consecutive days.</p>
</div>',
            ],
        ]);

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
