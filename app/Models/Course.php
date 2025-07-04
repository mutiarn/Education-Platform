<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
        protected $fillable = [
            'title', 'description', 'instructor', 'duration', 'level',
            'students', 'video_url', 'topics', 'price'
        ];

        protected $casts = [
            'topics' => 'array',
        ];

        public function lessons()
        {
            return $this->hasMany(Lesson::class);
        }

        public function quiz()
        {
            return $this->hasOne(Quiz::class);
        }

        public function students()
        {
            return $this->belongsToMany(User::class, 'enrollments');
        }

        public function enrollments()
        {
            return $this->hasMany(Enrollment::class);
        }

        public function quizzes()
        {
            return $this->hasMany(Quiz::class);
        }
}
