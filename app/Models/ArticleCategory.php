<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticleCategory extends Model
{
    use HasFactory;

    protected $fillable = ['category_name'];
    

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($article) {
            $article->slug = self::generateSlug($article->category_name);
        });

        static::updating(function ($article) {
            $article->slug = self::generateSlug($article->category_name);
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
    public function articles()
    {
        return $this->hasMany(Article::class, 'category_id', 'id');
    }
}
