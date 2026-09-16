<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Primary Domain
    |--------------------------------------------------------------------------
    | The official canonical domain of the platform. All canonical tags,
    | sitemaps, and search engine directives will point here.
    */
    'canonical_domain' => env('PRIMARY_DOMAIN', 'https://medvion.org'),

    /*
    |--------------------------------------------------------------------------
    | Default Meta Information
    |--------------------------------------------------------------------------
    */
    'site_name' => [
        'ar' => 'منصة Medvion',
        'en' => 'Medvion Platform',
    ],

    'default_title' => [
        'ar' => 'منصة Medvion | التدريب والتأهيل الصحي الرقمي',
        'en' => 'Medvion Platform | Digital Health Training & Rehabilitation',
    ],

    'default_description' => [
        'ar' => 'ارتقِ بمسارك المهني في الرعاية الصحية مع منصة Medvion. دورات معتمدة، شهادات موثقة، وبرامج تأهيلية وتدريبية متخصصة للكوادر الصحية.',
        'en' => 'Advance your healthcare career with Medvion Platform. Accredited courses, verified certificates, and specialized training programs for healthcare professionals.',
    ],

    'default_keywords' => [
        'ar' => 'منصة Medvion, تدريب صحي, دورات طبية معتمدة, تعليم طبي مستمر, شهادات صحية, تأهيل كوادر صحية, رعاية صحية رقمية, Medvion, برامج طبية',
        'en' => 'Medvion Platform, digital health training, accredited medical courses, CME, health professionals rehabilitation, digital healthcare, Medvion',
    ],

    /*
    |--------------------------------------------------------------------------
    | Social & Open Graph
    |--------------------------------------------------------------------------
    */
    'default_og_image' => 'images/hero-slide-1.png',
    'twitter_handle'   => '@MedvionOrg',

    /*
    |--------------------------------------------------------------------------
    | Search Engine Verifications
    |--------------------------------------------------------------------------
    */
    'google_site_verification' => env('GOOGLE_SITE_VERIFICATION', null),
    'bing_site_verification'   => env('BING_SITE_VERIFICATION', null),
];
