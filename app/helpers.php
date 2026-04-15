<?php

use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

// ══════════════════════════════════════════════════════════════════
//  Localization & Language Helpers
// ══════════════════════════════════════════════════════════════════

if (!function_exists('is_rtl')) {
    /**
     * Check if the current locale is RTL (Arabic).
     */
    function is_rtl(): bool
    {
        return app()->getLocale() === 'ar';
    }
}

if (!function_exists('locale_dir')) {
    /**
     * Return 'rtl' or 'ltr' based on the current locale.
     */
    function locale_dir(): string
    {
        return is_rtl() ? 'rtl' : 'ltr';
    }
}

if (!function_exists('locale_flip')) {
    /**
     * Return a value based on locale direction.
     * Usage: locale_flip('left', 'right')  → 'right' in RTL, 'left' in LTR
     *
     * @param  mixed  $ltr  Value to use in LTR mode
     * @param  mixed  $rtl  Value to use in RTL mode
     */
    function locale_flip(mixed $ltr, mixed $rtl): mixed
    {
        return is_rtl() ? $rtl : $ltr;
    }
}

// ══════════════════════════════════════════════════════════════════
//  Date & Time Helpers
// ══════════════════════════════════════════════════════════════════

if (!function_exists('format_date')) {
    /**
     * Format a date using the current locale.
     * Returns Arabic date format in ar locale, English format otherwise.
     *
     * @param  string|Carbon|null  $date
     * @param  string              $format  Optional custom format
     */
    function format_date(mixed $date, string $format = ''): string
    {
        if (!$date) {
            return '—';
        }

        $carbon = $date instanceof Carbon ? $date : Carbon::parse($date);

        if ($format) {
            return $carbon->translatedFormat($format);
        }

        return is_rtl()
            ? $carbon->translatedFormat('j F Y')
            : $carbon->format('M j, Y');
    }
}

if (!function_exists('format_datetime')) {
    /**
     * Format a datetime string with date and time.
     */
    function format_datetime(mixed $date): string
    {
        if (!$date) {
            return '—';
        }

        $carbon = $date instanceof Carbon ? $date : Carbon::parse($date);

        return is_rtl()
            ? $carbon->translatedFormat('j F Y — H:i')
            : $carbon->format('M j, Y — H:i');
    }
}

if (!function_exists('time_ago')) {
    /**
     * Return a human-readable "time ago" string relative to now,
     * translated to the current locale.
     */
    function time_ago(mixed $date): string
    {
        if (!$date) {
            return '—';
        }

        $carbon = $date instanceof Carbon ? $date : Carbon::parse($date);

        return $carbon->locale(app()->getLocale())->diffForHumans();
    }
}

// ══════════════════════════════════════════════════════════════════
//  String Helpers
// ══════════════════════════════════════════════════════════════════

if (!function_exists('smart_excerpt')) {
    /**
     * Truncate a string to a given length and append an ellipsis.
     * Strips HTML tags before truncating.
     *
     * @param  string|null  $text
     * @param  int          $length   Max characters
     * @param  string       $end      Appended when truncated
     */
    function smart_excerpt(?string $text, int $length = 160, string $end = '...'): string
    {
        if (!$text) {
            return '';
        }

        $clean = strip_tags($text);

        return Str::limit($clean, $length, $end);
    }
}

if (!function_exists('initials')) {
    /**
     * Return initials from a name string.
     * 'أحمد محمد' → 'أم' | 'John Doe' → 'JD'
     */
    function initials(?string $name, int $length = 2): string
    {
        if (!$name) {
            return '??';
        }

        $words  = preg_split('/\s+/', trim($name));
        $result = '';

        foreach (array_slice($words, 0, $length) as $word) {
            $result .= mb_substr($word, 0, 1);
        }

        return mb_strtoupper($result);
    }
}

// ══════════════════════════════════════════════════════════════════
//  Number & Price Helpers
// ══════════════════════════════════════════════════════════════════

if (!function_exists('format_price')) {
    /**
     * Format a price with currency symbol.
     * Returns the translated "free" label if price is 0.
     *
     * @param  float|int|null  $amount
     * @param  bool            $showFree  Whether to return a "free" label for 0
     */
    function format_price(float|int|null $amount, bool $showFree = true): string
    {
        if (!$amount && $showFree) {
            return __('land.course_free');
        }

        return number_format((float) $amount, 2) . ' ' . __('land.currency_sar');
    }
}

if (!function_exists('compact_number')) {
    /**
     * Compact a large number into a readable short form.
     * 1500 → 1.5K | 1_000_000 → 1M
     */
    function compact_number(int|float $number): string
    {
        if ($number >= 1_000_000) {
            return number_format($number / 1_000_000, 1) . 'M';
        }

        if ($number >= 1_000) {
            return number_format($number / 1_000, 1) . 'K';
        }

        return (string) $number;
    }
}

// ══════════════════════════════════════════════════════════════════
//  File & Storage Helpers
// ══════════════════════════════════════════════════════════════════

if (!function_exists('storage_url')) {
    /**
     * Return the full public URL for a stored file.
     * Returns a fallback image URL if the path is empty.
     *
     * @param  string|null  $path       Relative storage path
     * @param  string|null  $fallback   Fallback URL
     */
    function storage_url(?string $path, ?string $fallback = null): string
    {
        if (!$path) {
            return $fallback ?? 'https://images.unsplash.com/photo-1576091160399-112ba8d25d1d?auto=format&fit=crop&w=800&q=80';
        }

        // Already a full URL
        if (Str::startsWith($path, ['http://', 'https://'])) {
            return $path;
        }

        return asset('storage/' . ltrim($path, '/'));
    }
}

// ══════════════════════════════════════════════════════════════════
//  Auth & Role Helpers
// ══════════════════════════════════════════════════════════════════

if (!function_exists('is_admin')) {
    /**
     * Check if the currently authenticated user has admin/editor access.
     */
    function is_admin(): bool
    {
        return auth()->check()
            && auth()->user()->hasAnyRole(['admin', 'super_admin', 'editor', 'moderator']);
    }
}

if (!function_exists('user_name')) {
    /**
     * Return the display name of the authenticated user, or a fallback.
     */
    function user_name(string $fallback = ''): string
    {
        return auth()->check() ? auth()->user()->name : $fallback;
    }
}

// ══════════════════════════════════════════════════════════════════
//  Miscellaneous Helpers
// ══════════════════════════════════════════════════════════════════

if (!function_exists('active_route')) {
    /**
     * Return a CSS class string if the given named route is active.
     *
     * @param  string|array  $routes    Route name(s) to check
     * @param  string        $class     Class to return when active
     * @param  string        $fallback  Class to return when inactive
     */
    function active_route(string|array $routes, string $class = 'active', string $fallback = ''): string
    {
        $routes = (array) $routes;

        foreach ($routes as $route) {
            if (
                request()->routeIs($route) ||
                (str_contains((string) request()->url(), ltrim(route($route, [], false), '/'))
                )
            ) {
                return $class;
            }
        }

        return $fallback;
    }
}

if (!function_exists('medvion_version')) {
    /**
     * Return the current platform version string.
     */
    function medvion_version(): string
    {
        return config('app.version', '1.0.0');
    }
}
if (!function_exists('is_admin')) {
    function is_admin()
    {
        return auth()->user()->hasAnyRole(['super_admin', 'editor']);
    }
}
