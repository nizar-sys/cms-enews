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

    public function tender()
    {
        return $this->belongsTo(User::class, 'user_id', 'id')->withDefault();
    }

    public function file()
    {
        $model = app($this->downloadable_type)->find($this->downloadable_id);

        if ($model) {
            $fileAttribute = $this->getFileAttribute();

            if ($model->{$fileAttribute}) {
                return basename($model->{$fileAttribute});
            }

            return $model->file_name ?? null;
        }

        return null;
    }

    private function getFileAttribute()
    {
        $modelFileAttributes = [
            'App\Models\WaterSanitation' => 'file',
            'App\Models\TeachingLeading' => 'file',
            'App\Models\Administrative' => 'file',
            'App\Models\GeneralProcurement' => 'file_path',
            'App\Models\DocumentFile' => 'file_path',
        ];

        return $modelFileAttributes[$this->downloadable_type] ?? 'file';
    }
}
