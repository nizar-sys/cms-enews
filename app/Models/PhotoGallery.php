<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhotoGallery extends Model
{
    use HasFactory;

    protected $fillable = [
        'photo',
        'photo_path',
        'album_id',
    ];

    public function photoGalleryAlbum()
    {
        return $this->belongsTo(PhotoGalleryAlbum::class, 'album_id', 'id');
    }
}
