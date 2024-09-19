<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GenderInclusion extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'image',
        'document',
        'video_url'
    ];
}
