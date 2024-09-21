<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class SocialBehaviourCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
    ];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($category) {
            $category->slug = Str::slug($category->name . '-' . uniqid());
            $category->created_at = now();
        });

        static::updating(function ($category) {
            $category->slug = Str::slug($category->name . '-' . uniqid());
            $category->updated_at = now();
        });
    }

    public function socialBehaviours()
    {
        return $this->hasMany(SocialBehaviour::class);
    }
}
