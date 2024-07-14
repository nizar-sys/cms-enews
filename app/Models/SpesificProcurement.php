<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpesificProcurement extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'date_of_publication',
        'status',
    ];

    public function files()
    {
        return $this->hasMany(SpesificProcurementFile::class);
    }
}
