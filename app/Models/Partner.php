<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Partner extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'partner_category_id',
        'name_ar',
        'name_en',
        'icon',
        'is_active',
        'created_by',
        'updated_by',
    ];

    public function category()
    {
        return $this->belongsTo(PartnerCategory::class, 'partner_category_id');
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updater()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    public function getNameAttribute()
    {
        return app()->getLocale() === 'ar' ? $this->name_ar : $this->name_en;
    }

    /**
     * Clear all cached data and component fragments for partners.
     */
    public static function clearCache(): void
    {
        $locales = ['ar', 'en'];
        $version = 'v1.0';

        foreach ($locales as $locale) {
            \Illuminate\Support\Facades\Cache::forget("frontend.partners.data.{$locale}.v1");
            \Illuminate\Support\Facades\Cache::forget("components.partners.{$locale}.{$version}");
        }
    }

    protected static function booted()
    {
        static::creating(function ($partner) {
            if (\Illuminate\Support\Facades\Auth::check()) {
                $partner->created_by = \Illuminate\Support\Facades\Auth::id();
                $partner->updated_by = \Illuminate\Support\Facades\Auth::id();
            }
        });

        static::updating(function ($partner) {
            if (\Illuminate\Support\Facades\Auth::check()) {
                $partner->updated_by = \Illuminate\Support\Facades\Auth::id();
            }
        });

        static::saved(function () {
            static::clearCache();
        });

        static::deleted(function () {
            static::clearCache();
        });

        static::restored(function () {
            static::clearCache();
        });

        static::forceDeleted(function () {
            static::clearCache();
        });
    }
}
