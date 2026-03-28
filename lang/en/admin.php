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
        'fields' => [
            'badge' => 'Badge',
            'title_1' => 'Main Title',
            'title_2' => 'Secondary Title',
            'subtitle' => 'Subtitle',
            'image' => 'Image',
            'button_text' => 'Button Text',
            'button_url' => 'Button URL',
            'is_active' => 'Is Active',
        ],
    ],
    'abouts' => [
        'label' => 'About Us',
        'plural_label' => 'About Sections',
        'fields' => [
            'title' => 'Title',
            'content' => 'Content',
            'is_active' => 'Is Active',
            'sort_order' => 'Sort Order',
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
];
