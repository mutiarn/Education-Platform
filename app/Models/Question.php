<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = [
        'question',
        'option_a',
        'option_b',
        'option_c',
        'option_d',
        'correct_option',
        'quiz_id',
    ];

    // Relasi ke Quiz (jika belum ditulis)
    public function quiz()
    {
        return $this->belongsTo(Quiz::class);
    }
}
