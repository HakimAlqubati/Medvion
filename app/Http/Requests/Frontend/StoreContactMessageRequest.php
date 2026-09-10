<?php

namespace App\Http\Requests\Frontend;

use App\Rules\YemenPhone;
use Closure;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class StoreContactMessageRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Prepare the data for validation.
     */
    protected function prepareForValidation(): void
    {
        if ($this->has('email')) {
            $this->merge([
                'email' => Str::lower(trim($this->email)),
            ]);
        }
        if ($this->has('phone')) {
            $this->merge([
                'phone' => YemenPhone::normalize($this->phone),
            ]);
        }
        if ($this->has('name')) {
            $this->merge([
                'name' => trim(preg_replace('/\s+/', ' ', (string) $this->name)),
            ]);
        }
        if ($this->has('subject')) {
            $this->merge([
                'subject' => trim(preg_replace('/\s+/', ' ', (string) $this->subject)),
            ]);
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => [
                'required',
                'string',
                'min:3',
                'max:100',
                'not_regex:/\d/',
                'regex:/^[\p{L}\s\.\'-]+$/u',
                function (string $attribute, mixed $value, Closure $fail) {
                    if (preg_match('/(.)\1{3,}/u', (string) $value)) {
                        $fail('يرجى إدخال اسم حقيقي بدون تكرار عشوائي للأحرف.');
                    }
                },
            ],
            'email' => [
                'required',
                'string',
                'max:255',
                'email:rfc',
                'regex:/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/',
            ],
            'phone' => [
                'required',
                new YemenPhone(),
            ],
            'subject' => [
                'required',
                'string',
                'min:4',
                'max:150',
                'not_regex:/^\d+$/',
                'regex:/[\p{L}]/u',
                function (string $attribute, mixed $value, Closure $fail) {
                    if (preg_match('/(.)\1{3,}/u', (string) $value)) {
                        $fail('يرجى كتابة موضوع مفهوم بدون تكرار عشوائي للأحرف.');
                    }
                },
            ],
            'message' => [
                'required',
                'string',
                'min:10',
                'max:5000',
                'not_regex:/^\d+$/',
                'regex:/[\p{L}]/u',
                function (string $attribute, mixed $value, Closure $fail) {
                    if (preg_match('/(.)\1{4,}/u', (string) $value)) {
                        $fail('يرجى كتابة رسالة واضحة دون تكرار عشوائي للأحرف.');
                    }
                },
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required'     => 'الاسم الكامل مطلوب.',
            'name.min'          => 'يجب أن يتكون الاسم من 3 أحرف على الأقل.',
            'name.max'          => 'الاسم طويل جداً (الحد الأقصى 100 حرف).',
            'name.not_regex'    => 'الاسم يجب ألا يحتوي على أرقام.',
            'name.regex'        => 'الاسم يجب أن يحتوي على حروف فقط بدون رموز خاصة.',
            'email.required'    => 'البريد الإلكتروني مطلوب.',
            'email.email'       => 'صيغة البريد الإلكتروني غير صحيحة.',
            'email.regex'       => 'يرجى إدخال بريد إلكتروني صالح مع نطاق معتمد (مثل name@example.com).',
            'phone.required'    => 'رقم الهاتف مطلوب.',
            'subject.required'  => 'موضوع الرسالة مطلوب.',
            'subject.min'       => 'يجب ألا يقل الموضوع عن 4 أحرف.',
            'subject.max'       => 'الموضوع طويل جداً (الحد الأقصى 150 حرفاً).',
            'subject.not_regex' => 'الموضوع يجب أن يكون نصاً واضحاً وليس مجرد أرقام.',
            'subject.regex'     => 'الموضوع يجب أن يحتوي على كلمات ذات معنى.',
            'message.required'  => 'نص الرسالة مطلوب.',
            'message.min'       => 'يرجى كتابة رسالة توضيحية لا تقل عن 10 أحرف.',
            'message.max'       => 'الرسالة طويلة جداً (الحد الأقصى 5000 حرف).',
            'message.not_regex' => 'الرسالة يجب أن تحتوي على شرح واضح وليس مجرد أرقام.',
            'message.regex'     => 'الرسالة يجب أن تحتوي على نص واضح.',
        ];
    }
}
