<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PartnerCategory extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name_ar',
        'name_en',
        'stat_value',
        'icon',
        'is_active',
        'created_by',
        'updated_by',
    ];

    public function partners()
    {
        return $this->hasMany(Partner::class);
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

    protected static function booted()
    {
        static::creating(function ($category) {
            if (\Illuminate\Support\Facades\Auth::check()) {
                $category->created_by = \Illuminate\Support\Facades\Auth::id();
                $category->updated_by = \Illuminate\Support\Facades\Auth::id();
            }
        });

        static::updating(function ($category) {
            if (\Illuminate\Support\Facades\Auth::check()) {
                $category->updated_by = \Illuminate\Support\Facades\Auth::id();
            }
        });

        static::saved(function () {
            Partner::clearCache();
        });

        static::deleted(function () {
            Partner::clearCache();
        });

        static::restored(function () {
            Partner::clearCache();
        });

        static::forceDeleted(function () {
            Partner::clearCache();
        });
    }
}
