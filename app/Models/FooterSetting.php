<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FooterSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'information_officer_name',
        'media_query_name',
        'information_officer_picture',
        'media_query_picture',
    ];
}
