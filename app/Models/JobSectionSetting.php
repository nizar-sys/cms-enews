<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobSectionSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
    ];
}
