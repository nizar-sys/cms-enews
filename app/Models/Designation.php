<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Designation extends Model
{
    use HasFactory;

    protected $fillable = [
        'designation'
    ];

    public function director()
    {
        return $this->hasONe(Designation::class, 'designation_id');
    }

    public function executive()
    {
        return $this->hasOne(Designation::class, 'designation_id');
    }
}
