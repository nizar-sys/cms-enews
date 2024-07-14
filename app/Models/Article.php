<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    
    protected $fillable = ['title','description', 'category_id', 'article_url'];

    public function category()
    {
        return $this->belongsTo(ArticleCategory::class, 'category_id', 'id');
    }
}
