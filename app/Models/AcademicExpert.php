<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class AcademicExpert extends Model
{
    use HasFactory, HasTranslations;

    protected $fillable = [
        'header_id',
        'name',
        'image',
        'courses_count',
        'students_count',
    ];

    public $translatable = ['name'];

    public function header()
    {
        return $this->belongsTo(AcademicHeader::class, 'header_id');
    }
}
