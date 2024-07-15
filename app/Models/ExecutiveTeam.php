<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExecutiveTeam extends Model
{
    use HasFactory;

    protected $fillable = [
        'designation_id',
        'image',
        'name',
        'description',
    ];

    public function designation()
    {
        return $this->belongsTo(Designation::class, 'designation_id');
    }

    public function getDesignationAttributes()
    {
        return $this->designation->designation;
    }
}
