<?php

return [
    'id' => 'الرقم',
    'categories' => [
        'label' => 'التصنيف',
        'plural_label' => 'التصنيفات',
        'fields' => [
            'name' => 'الاسم',
            'parent_id' => 'التصنيف الأب',
            'role' => 'الدور',
            'members' => 'الأعضاء',
        ],
        'roles' => [
            'member' => 'عضو',
            'administrator' => 'مسؤول',
            'owner' => 'مالك',
        ],
    ],
    'courses' => [
        'label' => 'الدورة',
        'plural_label' => 'الدورات',
        'fields' => [
            'title' => 'العنوان',
            'brief' => 'نبذة مختصرة',
            'category' => 'التصنيف',
            'objectives' => 'الأهداف',
            'target_audience' => 'الجمهور المستهدف',
            'content_modules' => 'محاور الدورة',
            'is_active' => 'نشط',
            'price' => 'السعر',
            'image' => 'الصورة البارزة',
            'objective' => 'الهدف',
            'audience' => 'الجمهور المستهدف',
            'module_title' => 'عنوان المحور',
            'module_description' => 'وصف المحور',
            'created_at' => 'تاريخ الإضافة',
        ],
    ],
    'messages' => [
        'label' => 'رسالة',
        'plural_label' => 'الرسائل',

        'sections' => [
            'sender'             => 'بيانات المرسل',
            'sender_description' => 'معلومات الشخص الذي أرسل الرسالة',
            'message'            => 'محتوى الرسالة',
            'message_description' => 'نص الرسالة الواردة',
            'settings'           => 'الإعدادات',
            'settings_description' => 'حالة القراءة',
        ],

        'fields' => [
            'name'       => 'اسم المرسل',
            'email'      => 'البريد الإلكتروني',
            'phone'      => 'رقم الهاتف',
            'subject'    => 'الموضوع',
            'message'    => 'الرسالة',
            'is_read'    => 'تمت القراءة',
            'is_read_hint' => 'علّم على هذه الرسالة كمقروءة لأرشفتها',
            'created_at' => 'تاريخ الإرسال',
        ],
    ],
    'users' => [
        'label' => 'مستخدم',
        'plural_label' => 'المستخدمين',

        'sections' => [
            'personal'             => 'المعلومات الشخصية',
            'personal_description' => 'الاسم وعنوان البريد الإلكتروني للمستخدم',
            'security'             => 'الأمان وكلمة المرور',
            'security_description' => 'إعدادات كلمة المرور وحالة التحقق',
        ],

        'fields' => [
            'name'                      => 'الاسم الكامل',
            'name_placeholder'          => 'مثال: أحمد محمد',
            'email'                     => 'البريد الإلكتروني',
            'email_placeholder'         => 'مثال: user@example.com',
            'password'                  => 'كلمة المرور',
            'password_placeholder'      => 'ادخل كلمة مرور جديدة أو اتركها فارغة للإبقاء',
            'password_hint'             => 'بحد أدنى 8 أحرف • اتركها فارغة لعدم تغيير كلمة المرور الحالية',
            'password_confirmation'     => 'تأكيد كلمة المرور',
            'email_verified_at'         => 'تاريخ التحقق من البريد',
            'email_verified_at_hint'    => 'اتركها فارغة إذا لم يتم التحقق • اضبط تاريخًا لتفعيل الحساب يدويًا',
            'roles'                     => 'الأدوار والصلاحيات',
            'created_at'                => 'تاريخ الإنشاء',
        ],
    ],
    'faqs' => [
        'label' => 'سؤال شائع',
        'plural_label' => 'الأسئلة الشائعة',

        'sections' => [
            'content'             => 'السؤال والإجابة',
            'content_description' => 'السؤال وإجابته التي ستظهر للزوار',
            'settings'            => 'الإعدادات',
            'settings_description' => 'الترتيب والحالة',
        ],

        'fields' => [
            'question'             => 'السؤال',
            'question_placeholder' => 'اكتب السؤال كما يطرحه الزوار...',
            'answer'               => 'الإجابة',
            'answer_placeholder'   => 'اكتب إجابة واضحة ومفيدة...',
            'sort_order'           => 'ترتيب العرض',
            'sort_order_hint'      => 'الرقم الأصغر يعني ظهور هذا السؤال أولاً',
            'is_active'            => 'نشط',
            'is_active_hint'       => 'عند التفعيل سيظهر هذا السؤال في صفحة الأسئلة الشائعة',
            'created_at'           => 'تاريخ الإنشاء',
        ],
    ],
    'hero_slides' => [
        'label' => 'شريحة رئيسية',
        'plural_label' => 'شرائح الواجهة',

        'sections' => [
            'content'             => 'المحتوى النصي',
            'content_description' => 'النصوص التي تظهر للزوار في الواجهة الرئيسية',
            'settings'            => 'الإعدادات',
            'settings_description' => 'الصورة والحالة وترتيب العرض',
        ],

        'fields' => [
            'badge'                => 'الشارة',
            'badge_placeholder'    => 'مثال: قريبًا • الإطلاق الرسمي',
            'title_1'              => 'العنوان الرئيسي',
            'title_1_placeholder'  => 'العنوان الكبير الذي يظهر في المقدمة',
            'title_2'              => 'العنوان المميز',
            'title_2_placeholder'  => 'النص المتدرج الملون أسفل العنوان',
            'subtitle'             => 'الوصف',
            'subtitle_placeholder' => 'وصف موجز يوضح ما تقدمه المنصة للزوار',
            'image'                => 'صورة الخلفية',
            'image_hint'           => 'يُفضَّل استخدام صورة بنسبة 16:9 وحجم لا يتجاوز 5 ميغابايت',
            'sort_order'           => 'ترتيب العرض',
            'sort_order_hint'      => 'كلما كان الرقم أصغر ظهرت الشريحة أولاً',
            'is_active'            => 'نشطة',
            'is_active_hint'       => 'عند التفعيل ستظهر هذه الشريحة في الواجهة',
            'button_text'          => 'نص الزر',
            'button_url'           => 'رابط الزر',
        ],
    ],
    'abouts' => [
        'label' => 'من نحن',
        'plural_label' => 'أقسام من نحن',

        'sections' => [
            'content'             => 'المحتوى',
            'content_description' => 'النصوص التي تظهر في صفحة من نحن',
            'settings'            => 'الإعدادات',
            'settings_description' => 'ترتيب العرض وحالة القسم',
        ],

        'fields' => [
            'title'            => 'العنوان',
            'title_placeholder' => 'مثال: رؤيتنا ومهمتنا',
            'content'          => 'المحتوى',
            'content_placeholder' => 'اكتب هنا تفاصيل خطواتنا ومتحتوى صفحة من نحن...',
            'sort_order'       => 'ترتيب العرض',
            'sort_order_hint'  => 'الرقم الأصغر يعني ظهور هذا القسم أولاً',
            'is_active'        => 'نشط',
            'is_active_hint'   => 'عند التفعيل سيظهر هذا القسم في صفحة من نحن',
        ],
    ],
    'features' => [
        'label' => 'ميزة',
        'plural_label' => 'المميزات',

        'sections' => [
            'content'             => 'المحتوى',
            'content_description' => 'تفاصيل الميزة التي ستظهر للزوار',
            'settings'            => 'الإعدادات',
            'settings_description' => 'الترتيب والحالة',
        ],

        'fields' => [
            'title'                => 'العنوان',
            'title_placeholder'    => 'مثال: تعلم في أي وقت ومكان',
            'description'          => 'الوصف',
            'description_placeholder' => 'وصف مختصر يوضح هذه الميزة للزوار',
            'icon'                 => 'الأيقونة',
            'icon_placeholder'     => 'مثال: heroicon-o-academic-cap',
            'icon_hint'            => 'اسم أيقونة Heroicons أو FontAwesome',
            'sort_order'           => 'ترتيب العرض',
            'sort_order_hint'      => 'الرقم الأصغر يعني ظهور هذه الميزة أولاً',
            'is_active'            => 'نشطة',
            'is_active_hint'       => 'عند التفعيل ستظهر هذه الميزة في الصفحة الرئيسية',
        ],
    ],
    'pages' => [
        'label' => 'صفحة',
        'plural_label' => 'الصفحات',

        'sections' => [
            'content'             => 'محتوى الصفحة',
            'content_description' => 'العنوان والرابط والمحتوى الكامل للصفحة',
            'settings'            => 'الإعدادات',
            'settings_description' => 'حالة نشر الصفحة',
        ],

        'fields' => [
            'title'            => 'عنوان الصفحة',
            'title_placeholder' => 'مثال: سياسة الخصوصية',
            'slug'             => 'الرابط المخصص',
            'slug_placeholder' => 'مثال: privacy-policy',
            'slug_hint'        => 'يُستخدم في رابط الصفحة - باللغة الإنجليزية فقط',
            'content'          => 'المحتوى',
            'is_active'        => 'منشورة',
            'is_active_hint'   => 'عند التفعيل ستكون الصفحة متاحة للزوار',
        ],
    ],

    'goals' => [
        'label' => 'هدف',
        'plural_label' => 'أهداف المنصة',
        'fields' => [
            'title' => 'عنوان الهدف',
            'content' => 'التفاصيل',
        ]
    ],
    'target_audiences' => [
        'label' => 'فئة مستهدفة',
        'plural_label' => 'الفئة المستهدفة',
        'fields' => [
            'title' => 'المسمى',
        ]
    ],
    'team_members' => [
        'label' => 'عضو إداري',
        'plural_label' => 'إدارة المنصة',
        'fields' => [
            'name' => 'الاسم',
            'role' => 'المنصب / الدور',
            'bio' => 'نبذة تعريفية',
            'image' => 'الصورة',
        ]
    ],
    'impacts' => [
        'label' => 'أثر متوقع',
        'plural_label' => 'الأثر المتوقع',
        'fields' => [
            'title' => 'العنوان',
            'content' => 'الوصف',
        ]
    ],

    'sort_order' => 'الترتيب',
    'is_active' => 'نشط',

    'navigation' => [
        'dashboard' => 'الرئيسية',
        'groups' => [
            'content'       => 'المحتوى التعليمي',
            'registrations' => 'التسجيلات والطلبات',
            'site'          => 'إدارة الموقع',
            'communication' => 'التواصل',
            'surveys'       => 'إدارة الاستبيانات',
            'blog'          => 'إدارة المدونة',
            'management'    => 'الإدارة',
        ],
    ],

    'errors' => [
        '403' => [
            'title'     => 'ممنوع الوصول | 403 - Medvion',
            'heading'   => 'عذراً، محظور الوصول!',
            'message'   => 'يبدو أنك تحاول الوصول إلى صفحة أو تنفيذ إجراء غير مصرح لك به في منصة Medvion. الرجاء التواصل مع إدارة المنصة إذا كنت تعتقد أن هذه الرسالة ظهرت بالخطأ.',
            'back_home' => 'العودة للرئيسية',
            'go_back'   => 'للخلف',
        ],
    ],
    'course_registrations' => [
        'label' => 'طلب تقديم',
        'plural_label' => 'طلبات الدورات',
        'fields' => [
            'course' => 'الدورة',
            'full_name' => 'الاسم الرباعي',
            'email' => 'البريد الإلكتروني',
            'phone' => 'رقم الهاتف',
            'profession' => 'التخصص / المهنة',
            'workplace' => 'جهة العمل',
            'notes' => 'ملاحظات المسجل',
            'status' => 'حالة الطلب',
            'admin_notes' => 'ملاحظات الإدارة',
            'created_at' => 'تاريخ التسجيل',
        ],
        'status' => [
            'pending' => 'قيد الانتظار',
            'contacted' => 'تم التواصل',
            'confirmed' => 'مؤكد',
        ],
    ],

    'login' => [
        'tagline'              => 'منصة الرعاية الصحية والتدريب الطبي المتكاملة',
        'welcome'              => 'مرحباً بعودتك',
        'subtitle'             => 'سجّل دخولك للوصول إلى لوحة إدارة Medvion',
        'submit'               => 'تسجيل الدخول',
        'security'             => 'اتصال آمن ومحمي بالكامل',
        'back_to_site'         => 'العودة إلى الموقع الرئيسي',
        'copyright'            => '© :year Medvion. جميع الحقوق محفوظة.',
        // Platform feature cards (replace stats)
        'feature_1_title'      => 'محتوى طبي معتمد',
        'feature_1_desc'       => 'دورات تدريبية متخصصة وفق أعلى المعايير',
        'feature_2_title'      => 'شهادات موثّقة',
        'feature_2_desc'       => 'شهادات إتمام معترف بها مهنياً',
        'feature_3_title'      => 'تعلّم مرن',
        'feature_3_desc'       => 'وصول فوري في أي وقت ومن أي مكان',
    ],
    'surveys' => [
        'label' => 'استبيان',
        'plural_label' => 'الاستبيانات',
        'sections' => [
            'content' => 'محتوى الاستبيان',
            'content_description' => 'العنوان والوصف العام للاستبيان',
            'questions' => 'الأسئلة',
            'questions_description' => 'إدارة أسئلة الاستبيان وأنواعها',
        ],
        'fields' => [
            'title' => 'العنوان',
            'description' => 'الوصف',
            'is_active' => 'نشط',
            'created_by' => 'أنشئ بواسطة',
        ],
    ],
    'survey_questions' => [
        'label' => 'سؤال استبيان',
        'plural_label' => 'أسئلة الاستبيانات',
        'fields' => [
            'question_text' => 'نص السؤال',
            'type' => 'نوع السؤال',
            'options' => 'الخيارات',
            'is_required' => 'مطلوب',
            'order' => 'الترتيب',
        ],
        'types' => [
            'short_text' => 'نص قصير',
            'long_text' => 'نص طويل',
            'email' => 'بريد إلكتروني',
            'phone' => 'رقم هاتف',
            'radio' => 'خيار واحد (Radio)',
            'checkboxes' => 'خيارات متعددة (Checkboxes)',
            'select' => 'قائمة منسدلة',
            'file' => 'رفع ملف',
        ],
    ],
    'survey_submissions' => [
        'label' => 'مشاركة في استبيان',
        'plural_label' => 'المشاركات / التقديمات',
        'sections' => [
            'info' => 'معلومات المتقدم',
            'answers' => 'الإجابات',
            'evaluation' => 'التقييم',
        ],
        'fields' => [
            'survey' => 'الاستبيان',
            'applicant_email' => 'البريد الإلكتروني',
            'user' => 'المستخدم',
            'status' => 'الحالة',
            'score' => 'التقييم الرقمي',
            'created_at' => 'تاريخ التقديم',
        ],
        'status' => [
            'pending' => 'في انتظار المراجعة',
            'elite' => 'مرشح نخبوي',
            'priority' => 'مرشح ذو أولوية',
            'rejected' => 'مرفوض / غير جاهز',
        ],
    ],
    'partners' => [
        'label' => 'فئة الشركاء',
        'plural_label' => 'الشركاء',
        'sections' => [
            'category_info' => 'معلومات الفئة',
            'children' => 'الشركاء (الأبناء)',
        ],
        'fields' => [
            'name_ar' => 'الاسم (عربي)',
            'name_en' => 'الاسم (إنجليزي)',
            'stat_value' => 'القيمة الإحصائية',
            'icon' => 'رمز الأيقونة',
            'is_active' => 'مفعل',
            'partners_count' => 'عدد الشركاء',
        ],
    ],
    'blogs' => [
        'label' => 'مقال',
        'plural_label' => 'المدونة',
        'sections' => [
            'content' => 'محتوى المقال',
            'content_description' => 'العنوان والوصف والمحتوى الأساسي للمقال',
            'settings' => 'الإعدادات',
            'settings_description' => 'الصورة، الحالة، والنشر',
        ],
        'fields' => [
            'title' => 'العنوان',
            'title_placeholder' => 'مثال: أهمية التحول الرقمي...',
            'short_description' => 'وصف مختصر',
            'short_description_placeholder' => 'وصف يظهر في بطاقات المدونة...',
            'content' => 'المحتوى',
            'content_placeholder' => 'اكتب محتوى المقال هنا...',
            'main_image' => 'الصورة الرئيسية',
            'main_image_hint' => 'يُفضل حجم لا يتجاوز 5 ميغابايت (سيتم ضغطها وتصغيرها إلى 1200 بكسل كحد أقصى)',
            'status' => 'الحالة',
            'published_at' => 'تاريخ النشر',
            'read_count' => 'عدد القراءات',
            'created_by' => 'أنشئ بواسطة',
        ],
    ],
    'testimonials' => [
        'label' => 'رأي عميل',
        'plural_label' => 'آراء العملاء',
        'sections' => [
            'content' => 'محتوى التقييم',
            'content_description' => 'بيانات العميل ونَص التقييم الخاص به',
            'settings' => 'الإعدادات',
            'settings_description' => 'الصورة الشخصية، حالة النشر، والتقييم',
        ],
        'fields' => [
            'client_name' => 'اسم العميل',
            'client_name_placeholder' => 'مثال: د. محمد عبدالله',
            'role' => 'المسمى / الصفة',
            'role_placeholder' => 'مثال: طبيب عام أو متدرب',
            'content' => 'التقييم',
            'content_placeholder' => 'اكتب هنا ما قاله العميل عن المنصة...',
            'rating' => 'التقييم (عدد النجوم)',
            'rating_hint' => 'من 1 إلى 5 نجوم',
            'avatar_image' => 'صورة العميل',
            'avatar_image_hint' => 'يُفضل صورة مربعة صغيرة، سيتم ضغطها تلقائياً',
            'status' => 'حالة الظهور',
        ],
        'status_active' => 'ظاهر',
        'status_hidden' => 'مخفي',
    ],
];
