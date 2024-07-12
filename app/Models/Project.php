<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($project) {
            $project->slug = self::generateSlug($project->name);
        });

        static::updating(function ($project) {
            $project->slug = self::generateSlug($project->name);
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

    protected $fillable = [
        'category_id',
        'name',
        'slug',
        'description',
        'image',
    ];

    public function category()
    {
        return $this->belongsTo(ProjectCategory::class, 'category_id', 'id');
    }
}
