<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommunityVoice extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'slug'];
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($communityVoice) {
            $communityVoice->slug = self::generateSlug($communityVoice->title);
        });

        static::updating(function ($communityVoice) {
            $communityVoice->slug = self::generateSlug($communityVoice->title);
        });
    }


    private static function generateSlug($name)
    {
        $dictionary = [
            '&' => 'and',
            '@' => 'at',
            '%' => 'percent',
            '+' => 'plus',
        ];

        return str($name)->slug(dictionary: $dictionary);
    }
}
