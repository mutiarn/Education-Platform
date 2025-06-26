<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    protected $fillable = ['title', 'duration', 'course_id'];

    // Quiz.php
    public function course() {
        return $this->belongsTo(Course::class);
    }
    public function questions() {
        return $this->hasMany(Question::class);
    }

    // Question.php
    public function quiz() {
        return $this->belongsTo(Quiz::class);
    }

}
