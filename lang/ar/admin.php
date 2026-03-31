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
        'label' => 'الرسالة',
        'plural_label' => 'الرسائل',
        'fields' => [
            'name' => 'الاسم',
            'email' => 'البريد الإلكتروني',
            'phone' => 'الهاتف',
            'subject' => 'الموضوع',
            'message' => 'الرسالة',
            'is_read' => 'مقروءة',
            'created_at' => 'تاريخ الإرسال',
        ],
    ],
    'users' => [
        'label' => 'المستخدم',
        'plural_label' => 'المستخدمين',
        'fields' => [
            'name' => 'الاسم',
            'email' => 'البريد الإلكتروني',
            'password' => 'كلمة المرور',
            'email_verified_at' => 'تاريخ التحقق من البريد',
            'created_at' => 'تاريخ الإنشاء',
        ],
    ],
    'faqs' => [
        'label' => 'سؤال شائع',
        'plural_label' => 'الأسئلة الشائعة',
        'fields' => [
            'question' => 'السؤال',
            'answer' => 'الإجابة',
            'is_active' => 'نشط',
            'sort_order' => 'الترتيب',
            'created_at' => 'تاريخ الإنشاء',
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
        'fields' => [
            'title' => 'العنوان',
            'description' => 'الوصف',
            'icon' => 'الأيقونة',
            'is_active' => 'نشط',
        ],
    ],
    'pages' => [
        'label' => 'صفحة',
        'plural_label' => 'الصفحات',
        'fields' => [
            'title' => 'العنوان',
            'slug' => 'الرابط المخصص',
            'content' => 'المحتوى',
            'is_active' => 'نشط',
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
