<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\NewsImages;

class News extends Model
{
    use HasFactory;
    
    protected $fillable = ['title', 'description', 'images'];

    protected $casts = [
        'images' => 'array'
    ];

    public function images()
    {
        return $this->hasMany(NewsImages::class);
    }
}
