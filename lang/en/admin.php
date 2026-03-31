<?php

return [
    'id' => 'ID',
    'categories' => [
        'label' => 'Category',
        'plural_label' => 'Categories',
        'fields' => [
            'name' => 'Name',
            'role' => 'Role',
            'members' => 'Members',
        ],
        'roles' => [
            'member' => 'Member',
            'administrator' => 'Administrator',
            'owner' => 'Owner',
        ],
    ],
    'courses' => [
        'label' => 'Course',
        'plural_label' => 'Courses',
        'fields' => [
            'title' => 'Title',
            'brief' => 'Brief',
            'category' => 'Category',
            'objectives' => 'Objectives',
            'target_audience' => 'Target Audience',
            'content_modules' => 'Content Modules',
            'is_active' => 'Is Active',
            'price' => 'Price',
            'image' => 'Featured Image',
            'objective' => 'Objective',
            'audience' => 'Audience',
            'module_title' => 'Module Title',
            'module_description' => 'Module Description',
            'created_at' => 'Created At',
        ],
    ],
    'messages' => [
        'label' => 'Message',
        'plural_label' => 'Messages',
        'fields' => [
            'name' => 'Name',
            'email' => 'Email',
            'phone' => 'Phone',
            'subject' => 'Subject',
            'message' => 'Message',
            'is_read' => 'Is Read',
            'created_at' => 'Sent At',
        ],
    ],
    'users' => [
        'label' => 'User',
        'plural_label' => 'Users',
        'fields' => [
            'name' => 'Name',
            'email' => 'Email',
            'password' => 'Password',
            'email_verified_at' => 'Email Verified At',
            'created_at' => 'Created At',
        ],
    ],
    'faqs' => [
        'label' => 'FAQ',
        'plural_label' => 'FAQs',
        'fields' => [
            'question' => 'Question',
            'answer' => 'Answer',
            'is_active' => 'Is Active',
            'sort_order' => 'Sort Order',
            'created_at' => 'Created At',
        ],
    ],
    'hero_slides' => [
        'label' => 'Hero Slide',
        'plural_label' => 'Hero Slides',

        'sections' => [
            'content'             => 'Text Content',
            'content_description' => 'Text displayed to visitors on the homepage hero banner',
            'settings'            => 'Settings',
            'settings_description' => 'Background image, status, and display order',
        ],

        'fields' => [
            'badge'                => 'Badge',
            'badge_placeholder'    => 'Example: Coming Soon • Official Launch',
            'title_1'              => 'Main Title',
            'title_1_placeholder'  => 'The large heading displayed in the foreground',
            'title_2'              => 'Highlighted Title',
            'title_2_placeholder'  => 'Gradient colored text displayed below the main title',
            'subtitle'             => 'Subtitle',
            'subtitle_placeholder' => 'A brief description of what the platform offers visitors',
            'image'                => 'Background Image',
            'image_hint'           => 'Recommended aspect ratio 16:9 and max file size 5 MB',
            'sort_order'           => 'Display Order',
            'sort_order_hint'      => 'The lower the number, the earlier the slide appears',
            'is_active'            => 'Active',
            'is_active_hint'       => 'When enabled, this slide will appear on the frontend',
            'button_text'          => 'Button Text',
            'button_url'           => 'Button URL',
        ],
    ],
    'abouts' => [
        'label' => 'About Us',
        'plural_label' => 'About Sections',

        'sections' => [
            'content'             => 'Content',
            'content_description' => 'Text that appears on the About Us page',
            'settings'            => 'Settings',
            'settings_description' => 'Display order and section status',
        ],

        'fields' => [
            'title'               => 'Title',
            'title_placeholder'   => 'Example: Our Vision and Mission',
            'content'             => 'Content',
            'content_placeholder' => 'Write the details and content for this About Us section here...',
            'sort_order'          => 'Display Order',
            'sort_order_hint'     => 'The lower the number, the earlier this section appears',
            'is_active'           => 'Active',
            'is_active_hint'      => 'When enabled, this section will appear on the About Us page',
        ],
    ],
    'features' => [
        'label' => 'Feature',
        'plural_label' => 'Features',
        'fields' => [
            'title' => 'Title',
            'description' => 'Description',
            'icon' => 'Icon',
            'is_active' => 'Is Active',
        ],
    ],
    'pages' => [
        'label' => 'Page',
        'plural_label' => 'Pages',
        'fields' => [
            'title' => 'Title',
            'slug' => 'Slug',
            'content' => 'Content',
            'is_active' => 'Is Active',
        ],
    ],
    'sort_order' => 'Sort Order',
    'is_active' => 'Is Active',

    'navigation' => [
        'dashboard' => 'Dashboard',
        'groups' => [
            'content'       => 'Learning Content',
            'site'          => 'Site Management',
            'communication' => 'Communication',
            'management'    => 'Management',
        ],
    ],
];
