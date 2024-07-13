<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\News;

class NewsImages extends Model
{
    use HasFactory;

    protected $fillable = ['news_id', 'image_path'];

    public function news()
    {
        return $this->belongsTo(News::class);
    }
}
