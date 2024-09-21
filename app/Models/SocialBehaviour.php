<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class SocialBehaviour extends Model
{
    use HasFactory;

    protected $fillable = [
        'author_id',
        'category_id',
        'title',
        'slug',
        'content',
        'thumbnail',
        'status',
    ];

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function category()
    {
        return $this->belongsTo(SocialBehaviourCategory::class);
    }

    public function scopePublished($query)
    {
        return $query->where('status', 'published');
    }

    public function scopeDraft($query)
    {
        return $query->where('status', 'draft');
    }

    public static function boot()
    {
        parent::boot();

        static::creating(function ($post) {
            $post->author_id = auth()->id();
            $post->slug = Str::slug($post->title . '-' . uniqid());
            $post->created_at = now();
        });

        static::updating(function ($post) {
            $post->author_id = auth()->id();
            $post->slug = Str::slug($post->title . '-' . uniqid());
            $post->updated_at = now();
        });
    }
}
