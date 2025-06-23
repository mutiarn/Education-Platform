<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    protected $fillable = [
        'title',
        'duration',
        'video_url',
        'type',
        'is_free',
        'order',
    ];


    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
