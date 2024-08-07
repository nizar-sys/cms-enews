<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhotoProjectAlbum extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function photos()
    {
        return $this->hasMany(PhotoProjectAlbum::class, 'album_id', 'id');
    }
}
