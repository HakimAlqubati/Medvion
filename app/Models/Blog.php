<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Spatie\Translatable\HasTranslations;
use App\Enums\BlogStatus;

class Blog extends Model
{
    use HasFactory, SoftDeletes, HasTranslations;

    protected $guarded = ['id'];

    public $translatable = ['title', 'short_description', 'content'];

    protected $casts = [
        'status' => BlogStatus::class,
        'published_at' => 'datetime',
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

    public function approver()
    {
        return $this->belongsTo(User::class, 'approved_by');
    }

    /**
     * Model booted tasks
     */
    protected static function booted()
    {
        static::creating(function ($blog) {
            if (empty($blog->slug)) {
                // If the title is an array (translations), use the english title or fallback to arabic for slug
                $title = is_array($blog->title) 
                    ? ($blog->title['en'] ?? $blog->title['ar'] ?? '') 
                    : $blog->title;
                    
                $blog->slug = Str::slug($title);
                
                // Ensure uniqueness
                $originalSlug = $blog->slug;
                $count = 1;
                while (static::where('slug', $blog->slug)->exists()) {
                    $blog->slug = "{$originalSlug}-" . $count++;
                }
            }

            if (Auth::check()) {
                $blog->created_by = Auth::id();
                $blog->updated_by = Auth::id();
            }
        });

        static::updating(function ($blog) {
            if (Auth::check()) {
                $blog->updated_by = Auth::id();
            }
        });
    }
}
