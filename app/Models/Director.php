<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Director extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'name',
        'description',
        'designation_id'
    ];

    public function designation()
    {
        return $this->belongsTo(Designation::class, 'designation_id');
    }
}
