<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',              // gunakan ini jika hanya satu kolom nama
        'name',
        'email',
        'password',
        'phone',
        'avatar',
        'role_id',
        'is_active'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Relasi: User punya satu Role
     */
    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    /**
     * Relasi: User punya satu UserProfile
     */
    public function profile()
    {
        return $this->hasOne(UserProfile::class);
    }

    /**
     * Relasi: Jika user adalah student dan enroll course
     */
    public function enrolledCourses()
    {
        return $this->belongsToMany(Course::class, 'enrollments', 'student_id', 'course_id');
    }

    public function quizResults()
    {
        return $this->hasMany(QuizResult::class);
    }

    public function enrollments()
    {
        return $this->hasMany(Enrollment::class);
    }

}
