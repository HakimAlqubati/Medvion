<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use Spatie\Translatable\HasTranslations;

class Faq extends Model
{
    use HasFactory, SoftDeletes, HasTranslations;

    protected $guarded = ['id'];

    // Translatable fields
    public $translatable = ['question', 'answer'];

    protected $casts = [
        'is_active' => 'boolean',
        'sort_order' => 'integer',
    ];

    /**
     * Audit relationships
     */
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updater()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    /**
     * Model booted tasks
     */
    protected static function booted()
    {
        static::creating(function ($faq) {
            if (Auth::check()) {
                $faq->created_by = Auth::id();
                $faq->updated_by = Auth::id();
            }
        });

        static::updating(function ($faq) {
            if (Auth::check()) {
                $faq->updated_by = Auth::id();
            }
        });
    }
}
