<?php

return [
    'id' => 'الرقم',
    'categories' => [
        'label' => 'التصنيف',
        'plural_label' => 'التصنيفات',
        'fields' => [
            'name' => 'الاسم',
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
    'sort_order' => 'الترتيب',
    'is_active' => 'نشط',

    'navigation' => [
        'dashboard' => 'الرئيسية',
        'groups' => [
            'content'       => 'المحتوى التعليمي',
            'site'          => 'إدارة الموقع',
            'communication' => 'التواصل',
            'management'    => 'الإدارة',
        ],
    ],
];
