<?php

namespace App\Models\Admin\Rubric;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rubric extends Model
{
    protected $guarded = false;
    protected $table = 'rubrics';

    use HasFactory;

    protected $fillable = [
        'title',
        'url',
        'image_url',
        'description',
        'meta_title',
        'meta_keywords',
        'meta_desc',
        'sort',
        'seo_title',
        'seo_alt',
    ];
}
