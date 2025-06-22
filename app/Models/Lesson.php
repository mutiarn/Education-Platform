<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    protected $fillable = [
        'course_id', 'title', 'duration', 'type', 'is_free'
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
