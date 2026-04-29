<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class AcademicHeader extends Model
{
    use HasFactory, HasTranslations;

    protected $fillable = [
        'title',
        'description',
        'is_active',
    ];

    public $translatable = ['title', 'description'];

    public function experts()
    {
        return $this->hasMany(AcademicExpert::class, 'header_id');
    }
}
