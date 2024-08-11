<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DownloadLog extends Model
{
    protected $fillable = ['user_id', 'downloadable_type', 'downloadable_id'];

    public function downloadable()
    {
        return $this->morphTo();
    }
}
