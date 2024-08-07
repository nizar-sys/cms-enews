<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhotoProject extends Model
{
    use HasFactory;

    protected $fillable = [
        'photo',
        'photo_path',
        'album_id',
    ];

    public function photoProjectAlbum()
    {
        return $this->belongsTo(PhotoProjectAlbum::class, 'album_id', 'id');
    }
}
