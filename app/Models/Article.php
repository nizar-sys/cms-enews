<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;


    protected $fillable = ['title','description', 'category_id', 'article_url'];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($article) {
            $article->created_at = now();
        });

        static::updating(function ($article) {
            $article->updated_at = now();
        });
    }

    public function category()
    {
        return $this->belongsTo(ArticleCategory::class, 'category_id', 'id');
    }
}
