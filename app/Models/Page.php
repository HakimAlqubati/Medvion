<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Page extends Model
{
    use HasFactory, HasTranslations;

    protected $guarded = [];

    // 'content' will hold HTML or markdown block content which scales to any page size
    public $translatable = ['title', 'content'];

    protected $casts = [
        'is_active' => 'boolean',
    ];
}
