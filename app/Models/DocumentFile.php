<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentFile extends Model
{
    use HasFactory;

    protected $fillable = [
        'document_category_id',
        'filename',
        'file_path',
    ];

    public function documentCategory()
    {
        return $this->belongsTo(DocumentCategory::class);
    }
}
