<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = ['subject', 'question', 'option_a', 'option_b', 'option_c', 'option_d', 'correct_option'];

    public function userAnswers()
    {
        return $this->hasMany(UserAnswer::class);
    }
}
