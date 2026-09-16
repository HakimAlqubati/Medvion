@props([
    'title' => null,
    'description' => null,
    'keywords' => null,
    'image' => null,
    'type' => 'website',
    'canonical' => null,
    'publishedTime' => null,
    'modifiedTime' => null,
    'author' => null,
    'breadcrumbs' => null,
    'robots' => 'index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1',
])

@php
    use App\Models\Setting;
    use Illuminate\Support\Str;

    $locale = app()->getLocale();
    $ogLocale = $locale === 'ar' ? 'ar_AR' : 'en_US';
    $altOgLocale = $locale === 'ar' ? 'en_US' : 'ar_AR';

    $siteName = Setting::getSetting('site_name', config("seo.site_name.{$locale}", 'منصة Medvion'));
    $defaultTitle = Setting::getSetting('meta_title', config("seo.default_title.{$locale}", 'منصة Medvion | التدريب والتأهيل الصحي الرقمي'));
    $defaultDesc = Setting::getSetting('meta_description', config("seo.default_description.{$locale}", 'ارتقِ بمسارك المهني في الرعاية الصحية مع منصة Medvion. دورات معتمدة، شهادات موثقة، وبرامج تأهيلية وتدريبية متخصصة للكوادر الصحية.'));
    $defaultKeywords = Setting::getSetting('meta_keywords', config("seo.default_keywords.{$locale}", 'منصة Medvion, تدريب صحي, دورات طبية معتمدة, تعليم طبي مستمر, شهادات صحية, تأهيل كوادر صحية, رعاية صحية رقمية, Medvion'));

    // Compute final title
    if (!empty($title)) {
        $finalTitle = (Str::contains($title, 'Medvion') || Str::contains($title, 'منصة')) 
            ? $title 
            : "{$title} | {$siteName}";
    } else {
        $finalTitle = $defaultTitle;
    }

    // Compute description & keywords
    $finalDesc = !empty($description) ? Str::limit(strip_tags($description), 160) : $defaultDesc;
    $finalKeywords = !empty($keywords) ? $keywords : $defaultKeywords;

    // Canonical Domain & URL
    $canonicalDomain = rtrim(config('seo.canonical_domain', 'https://medvion.org'), '/');
    if (!empty($canonical)) {
        $finalCanonical = $canonical;
    } else {
        $path = request()->path();
        $finalCanonical = ($path === '/' || empty($path)) ? "{$canonicalDomain}/" : "{$canonicalDomain}/" . ltrim($path, '/');
    }

    // Image
    if (!empty($image)) {
        $finalImage = filter_var($image, FILTER_VALIDATE_URL) ? $image : url($image);
    } else {
        $customOg = Setting::getSetting('og_image');
        $finalImage = $customOg ? asset('storage/' . $customOg) : url(config('seo.default_og_image', 'images/hero-slide-1.png'));
    }

    // Verification codes
    $googleVerification = Setting::getSetting('google_site_verification', config('seo.google_site_verification'));
    $bingVerification = Setting::getSetting('bing_site_verification', config('seo.bing_site_verification'));

    if (!empty($googleVerification)) {
        if (preg_match('/content=["\']([^"\']+)["\']/i', $googleVerification, $matches)) {
            $googleVerification = $matches[1];
        } else {
            $googleVerification = trim(strip_tags($googleVerification));
        }
    }

    if (!empty($bingVerification)) {
        if (preg_match('/content=["\']([^"\']+)["\']/i', $bingVerification, $matches)) {
            $bingVerification = $matches[1];
        } else {
            $bingVerification = trim(strip_tags($bingVerification));
        }
    }

    // Social handles & contacts
    $twitterHandle = config('seo.twitter_handle', '@MedvionOrg');
    $facebookUrl = Setting::getSetting('facebook_url');
    $twitterUrl = Setting::getSetting('twitter_url');
    $instagramUrl = Setting::getSetting('instagram_url');
    $linkedinUrl = Setting::getSetting('linkedin_url');
    $contactEmail = Setting::getSetting('contact_email', 'contact@medvion.org');
    $contactPhone = Setting::getSetting('contact_phone', '+966500000000');

    $sameAs = array_values(array_filter([$facebookUrl, $twitterUrl, $instagramUrl, $linkedinUrl]));

    // Build JSON-LD Structured Data Schema
    $schemaGraph = [
        [
            '@type' => 'EducationalOrganization',
            '@id' => "{$canonicalDomain}/#organization",
            'name' => $siteName,
            'url' => $canonicalDomain,
            'logo' => [
                '@type' => 'ImageObject',
                '@id' => "{$canonicalDomain}/#logo",
                'url' => url('favicon.png'),
                'caption' => $siteName,
            ],
            'image' => $finalImage,
            'description' => $defaultDesc,
            'email' => $contactEmail,
            'telephone' => $contactPhone,
            'sameAs' => $sameAs,
        ],
        [
            '@type' => 'WebSite',
            '@id' => "{$canonicalDomain}/#website",
            'url' => $canonicalDomain,
            'name' => 'Medvion',
            'alternateName' => 'منصة Medvion',
            'publisher' => [
                '@id' => "{$canonicalDomain}/#organization",
            ],
            'inLanguage' => $locale,
        ],
    ];

    if ($type === 'article') {
        $schemaGraph[] = [
            '@type' => 'BlogPosting',
            '@id' => "{$finalCanonical}#article",
            'isPartOf' => [
                '@type' => 'WebPage',
                '@id' => $finalCanonical,
            ],
            'headline' => $finalTitle,
            'description' => $finalDesc,
            'image' => $finalImage,
            'datePublished' => !empty($publishedTime) ? (is_string($publishedTime) ? $publishedTime : $publishedTime->toIso8601String()) : now()->toIso8601String(),
            'dateModified' => !empty($modifiedTime) ? (is_string($modifiedTime) ? $modifiedTime : $modifiedTime->toIso8601String()) : now()->toIso8601String(),
            'mainEntityOfPage' => $finalCanonical,
            'author' => [
                '@type' => 'Person',
                'name' => $author ?? $siteName,
            ],
            'publisher' => [
                '@id' => "{$canonicalDomain}/#organization",
            ],
        ];
    }

    if (!empty($breadcrumbs) && is_array($breadcrumbs)) {
        $elements = [];
        foreach ($breadcrumbs as $idx => $crumb) {
            $elements[] = [
                '@type' => 'ListItem',
                'position' => $idx + 1,
                'name' => $crumb['name'] ?? '',
                'item' => $crumb['url'] ?? '',
            ];
        }
        $schemaGraph[] = [
            '@type' => 'BreadcrumbList',
            '@id' => "{$finalCanonical}#breadcrumbs",
            'itemListElement' => $elements,
        ];
    }
@endphp

{{-- Standard Meta Tags --}}
<title>{{ $finalTitle }}</title>
<meta name="description" content="{{ $finalDesc }}">
<meta name="keywords" content="{{ $finalKeywords }}">
<meta name="robots" content="{{ $robots }}">
<meta name="googlebot" content="{{ $robots }}">
<meta name="author" content="{{ $author ?? $siteName }}">
<link rel="canonical" href="{{ $finalCanonical }}">

{{-- Search Engine Site Verifications --}}
@if(!empty($googleVerification))
<meta name="google-site-verification" content="{{ $googleVerification }}">
@endif
@if(!empty($bingVerification))
<meta name="msvalidate.01" content="{{ $bingVerification }}">
@endif

{{-- Open Graph / Facebook / WhatsApp --}}
<meta property="og:site_name" content="{{ $siteName }}">
<meta property="og:title" content="{{ $finalTitle }}">
<meta property="og:description" content="{{ $finalDesc }}">
<meta property="og:url" content="{{ $finalCanonical }}">
<meta property="og:type" content="{{ $type }}">
<meta property="og:locale" content="{{ $ogLocale }}">
<meta property="og:locale:alternate" content="{{ $altOgLocale }}">
<meta property="og:image" content="{{ $finalImage }}">
<meta property="og:image:secure_url" content="{{ $finalImage }}">
<meta property="og:image:width" content="1200">
<meta property="og:image:height" content="630">
<meta property="og:image:alt" content="{{ $finalTitle }}">

{{-- Article specific Open Graph tags --}}
@if($type === 'article')
@if(!empty($publishedTime))
<meta property="article:published_time" content="{{ is_string($publishedTime) ? $publishedTime : $publishedTime->toIso8601String() }}">
@endif
@if(!empty($modifiedTime))
<meta property="article:modified_time" content="{{ is_string($modifiedTime) ? $modifiedTime : $modifiedTime->toIso8601String() }}">
@endif
<meta property="article:author" content="{{ $author ?? $siteName }}">
<meta property="article:publisher" content="{{ $canonicalDomain }}">
@endif

{{-- Twitter Card Meta Tags --}}
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:site" content="{{ $twitterHandle }}">
<meta name="twitter:creator" content="{{ $twitterHandle }}">
<meta name="twitter:title" content="{{ $finalTitle }}">
<meta name="twitter:description" content="{{ $finalDesc }}">
<meta name="twitter:image" content="{{ $finalImage }}">
<meta name="twitter:image:alt" content="{{ $finalTitle }}">

{{-- Favicons & Theme Color --}}
<link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
<link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">
<link rel="apple-touch-icon" href="{{ asset('favicon.png') }}">
<meta name="theme-color" content="#1A52CE">
<meta name="color-scheme" content="light">

{{-- Schema.org JSON-LD Structured Data --}}
<script type="application/ld+json">
{!! json_encode([
    '@context' => 'https://schema.org',
    '@graph' => $schemaGraph,
], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) !!}
</script>
