<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhotoGalleryAlbum extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function photos()
    {
        return $this->hasMany(PhotoGallery::class, 'album_id', 'id');
    }
}
