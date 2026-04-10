<?php

return [
    'id' => 'ID',
    'categories' => [
        'label' => 'Category',
        'plural_label' => 'Categories',
        'fields' => [
            'name' => 'Name',
            'parent_id' => 'Parent Category',
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

        'sections' => [
            'sender'              => 'Sender Information',
            'sender_description'  => 'Details of the person who sent the message',
            'message'             => 'Message Content',
            'message_description' => 'The body of the incoming message',
            'settings'            => 'Settings',
            'settings_description' => 'Read status',
        ],

        'fields' => [
            'name'         => 'Sender Name',
            'email'        => 'Email Address',
            'phone'        => 'Phone Number',
            'subject'      => 'Subject',
            'message'      => 'Message',
            'is_read'      => 'Read',
            'is_read_hint' => 'Mark this message as read to archive it',
            'created_at'   => 'Sent At',
        ],
    ],
    'users' => [
        'label' => 'User',
        'plural_label' => 'Users',

        'sections' => [
            'personal'             => 'Personal Information',
            'personal_description' => 'The user\'s full name and email address',
            'security'             => 'Security & Password',
            'security_description' => 'Password settings and verification status',
        ],

        'fields' => [
            'name'                   => 'Full Name',
            'name_placeholder'       => 'Example: John Doe',
            'email'                  => 'Email Address',
            'email_placeholder'      => 'Example: user@example.com',
            'password'               => 'Password',
            'password_placeholder'   => 'Enter a new password or leave blank to keep current',
            'password_hint'          => 'Minimum 8 characters • Leave blank to keep the current password',
            'password_confirmation'  => 'Confirm Password',
            'email_verified_at'      => 'Email Verified At',
            'email_verified_at_hint' => 'Leave blank if not verified • Set a date to manually activate the account',
            'roles'                  => 'Roles & Permissions',
            'created_at'             => 'Created At',
        ],
    ],
    'faqs' => [
        'label' => 'FAQ',
        'plural_label' => 'FAQs',

        'sections' => [
            'content'             => 'Question & Answer',
            'content_description' => 'The question and its answer that will appear to visitors',
            'settings'            => 'Settings',
            'settings_description' => 'Display order and status',
        ],

        'fields' => [
            'question'             => 'Question',
            'question_placeholder' => 'Write the question as visitors would ask it...',
            'answer'               => 'Answer',
            'answer_placeholder'   => 'Write a clear and helpful answer...',
            'sort_order'           => 'Display Order',
            'sort_order_hint'      => 'The lower the number, the earlier this FAQ appears',
            'is_active'            => 'Active',
            'is_active_hint'       => 'When enabled, this FAQ will appear on the FAQs page',
            'created_at'           => 'Created At',
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

        'sections' => [
            'content'             => 'Content',
            'content_description' => 'Feature details visible to visitors',
            'settings'            => 'Settings',
            'settings_description' => 'Display order and status',
        ],

        'fields' => [
            'title'                   => 'Title',
            'title_placeholder'       => 'Example: Learn Anywhere, Anytime',
            'description'             => 'Description',
            'description_placeholder' => 'A brief description explaining this feature to visitors',
            'icon'                    => 'Icon',
            'icon_placeholder'        => 'Example: heroicon-o-academic-cap',
            'icon_hint'               => 'Heroicons or FontAwesome icon name',
            'sort_order'              => 'Display Order',
            'sort_order_hint'         => 'The lower the number, the earlier this feature appears',
            'is_active'               => 'Active',
            'is_active_hint'          => 'When enabled, this feature will appear on the homepage',
        ],
    ],
    'pages' => [
        'label' => 'Page',
        'plural_label' => 'Pages',

        'sections' => [
            'content'             => 'Page Content',
            'content_description' => 'Title, slug, and full content of the page',
            'settings'            => 'Settings',
            'settings_description' => 'Page publication status',
        ],

        'fields' => [
            'title'            => 'Page Title',
            'title_placeholder' => 'Example: Privacy Policy',
            'slug'             => 'Slug',
            'slug_placeholder' => 'Example: privacy-policy',
            'slug_hint'        => 'Used in the page URL — English only',
            'content'          => 'Content',
            'is_active'        => 'Published',
            'is_active_hint'   => 'When enabled, the page will be accessible to visitors',
        ],
    ],

    'goals' => [
        'label' => 'Goal',
        'plural_label' => 'Goals',
        'fields' => [
            'title' => 'Title',
            'content' => 'Content',
        ]
    ],
    'target_audiences' => [
        'label' => 'Target Audience',
        'plural_label' => 'Target Audiences',
        'fields' => [
            'title' => 'Title',
        ]
    ],
    'team_members' => [
        'label' => 'Team Member',
        'plural_label' => 'Team Members',
        'fields' => [
            'name' => 'Name',
            'role' => 'Role',
            'bio' => 'Biography',
            'image' => 'Image',
        ]
    ],
    'impacts' => [
        'label' => 'Expected Impact',
        'plural_label' => 'Expected Impacts',
        'fields' => [
            'title' => 'Title',
            'content' => 'Content',
        ]
    ],

    'sort_order' => 'Sort Order',
    'is_active' => 'Is Active',

    'navigation' => [
        'dashboard' => 'Dashboard',
        'groups' => [
            'content'       => 'Learning Content',
            'registrations' => 'Registrations',
            'site'          => 'Site Management',
            'communication' => 'Communication',
            'management'    => 'Management',
        ],
    ],

    'errors' => [
        '403' => [
            'title'     => 'Access Denied | 403 - Medvion',
            'heading'   => 'Sorry, Access Forbidden!',
            'message'   => 'It looks like you are trying to access a page or perform an action you do not have permission for in Medvion. Please contact the platform administration if you believe this is an error.',
            'back_home' => 'Back to Home',
            'go_back'   => 'Go Back',
        ],
    ],
    'course_registrations' => [
        'label' => 'Course Registration',
        'plural_label' => 'Course Registrations',
        'fields' => [
            'course' => 'Course',
            'full_name' => 'Full Name',
            'email' => 'Email',
            'phone' => 'Phone',
            'profession' => 'Profession',
            'workplace' => 'Workplace',
            'notes' => 'User Notes',
            'status' => 'Status',
            'admin_notes' => 'Admin Notes',
            'created_at' => 'Created At',
        ],
        'status' => [
            'pending' => 'Pending',
            'contacted' => 'Contacted',
            'confirmed' => 'Confirmed',
        ],
    ],

    'login' => [
        'tagline'       => 'The Integrated Medical Training Platform for Healthcare Professionals',
        'stat_courses'  => '200+',
        'stat_courses_label' => 'Courses',
        'stat_trainees' => '5K+',
        'stat_trainees_label' => 'Trainees',
        'stat_satisfaction' => '98%',
        'stat_satisfaction_label' => 'Satisfaction Rate',
        'welcome'       => 'Welcome Back 👋',
        'subtitle'      => 'Sign in to access your Medvion admin panel',
        'submit'        => 'Sign In',
        'security'      => 'Secure encrypted connection — SSL/TLS 256-bit',
        'back_to_site'  => '← Back to Website',
        'copyright'     => '© :year Medvion. All rights reserved.',
    ],
    'surveys' => [
        'label' => 'Survey',
        'plural_label' => 'Surveys',
        'sections' => [
            'content' => 'Survey Content',
            'content_description' => 'Title and general description of the survey',
            'questions' => 'Questions',
            'questions_description' => 'Manage survey questions and their types',
        ],
        'fields' => [
            'title' => 'Title',
            'description' => 'Description',
            'is_active' => 'Is Active',
            'created_by' => 'Created By',
        ],
    ],
    'survey_questions' => [
        'label' => 'Survey Question',
        'plural_label' => 'Survey Questions',
        'fields' => [
            'question_text' => 'Question Text',
            'type' => 'Question Type',
            'options' => 'Options',
            'is_required' => 'Is Required',
            'order' => 'Order',
        ],
        'types' => [
            'short_text' => 'Short Text',
            'long_text' => 'Long Text',
            'email' => 'Email',
            'phone' => 'Phone Number',
            'radio' => 'Single Choice (Radio)',
            'checkboxes' => 'Multiple Choice (Checkboxes)',
            'select' => 'Dropdown Menu',
            'file' => 'File Upload',
        ],
    ],
    'survey_submissions' => [
        'label' => 'Survey Submission',
        'plural_label' => 'Submissions / Applications',
        'sections' => [
            'info' => 'Applicant Information',
            'answers' => 'Answers',
            'evaluation' => 'Evaluation',
        ],
        'fields' => [
            'survey' => 'Survey',
            'applicant_email' => 'Email Address',
            'user' => 'User',
            'status' => 'Status',
            'score' => 'Numerical Score',
            'created_at' => 'Submission Date',
        ],
        'status' => [
            'pending' => 'Pending Review',
            'elite' => 'Elite Candidate',
            'priority' => 'Priority Candidate',
            'rejected' => 'Rejected / Not Ready',
        ],
    ],
];

