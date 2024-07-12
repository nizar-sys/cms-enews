<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentCategory extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug'];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($documentCategory) {
            $documentCategory->slug = self::generateSlug($documentCategory->name);
        });

        static::updating(function ($documentCategory) {
            $documentCategory->slug = self::generateSlug($documentCategory->name);
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

    public function documentFiles()
    {
        return $this->hasMany(DocumentFile::class);
    }
}
