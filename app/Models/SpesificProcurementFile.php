<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpesificProcurementFile extends Model
{
    use HasFactory;

    protected $fillable = [
        'spesific_procurement_id',
        'file_name',
        'file_path',
        'category'
    ];

    public function spesificProcurement()
    {
        return $this->belongsTo(SpesificProcurement::class);
    }
}
