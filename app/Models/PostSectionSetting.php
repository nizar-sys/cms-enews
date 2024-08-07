<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostSectionSetting extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description'];
}
