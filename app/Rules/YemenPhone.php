<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class YemenPhone implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $normalized = self::normalize($value);

        if (!preg_match('/^(70|71|73|77|78)\d{7}$/', $normalized)) {
            $fail(__('register.phone_invalid') ?: 'يجب أن يكون رقم جوال يمني مكون من 9 أرقام يبدأ بـ (77, 73, 78, 71, 70).');
        }
    }

    /**
     * Normalize any Yemeni phone input into 9 digits (e.g. +967771234567 -> 771234567).
     */
    public static function normalize(mixed $value): string
    {
        if (!is_string($value) && !is_numeric($value)) {
            return '';
        }

        $val = trim((string) $value);

        // Convert Eastern Arabic numerals (٠-٩)
        $val = strtr($val, [
            '٠' => '0', '١' => '1', '٢' => '2', '٣' => '3', '٤' => '4',
            '٥' => '5', '٦' => '6', '٧' => '7', '٨' => '8', '٩' => '9',
        ]);

        // Strip non-digits
        $val = preg_replace('/\D/', '', $val) ?? '';

        // Strip country code 967 if at the start
        $val = preg_replace('/^(967)/', '', $val) ?? '';

        // Strip leading zeros if length exceeds 9
        if (str_starts_with($val, '0')) {
            $val = ltrim($val, '0');
        }

        return substr($val, 0, 9);
    }
}
