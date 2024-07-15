<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobList extends Model
{
    use HasFactory;

    protected $fillable = [
        'position',
        'filename',
        'filepath',
        'vacancy_deadline',
        'current_status',
    ];
}
