<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    protected $fillable=[
            'user_id',
            'course_id',
            'session_id',
            'question_id',
            'total_questions',
            'answer',
            'correct_answer',
    ];
    protected $casts=[
        'correct_answer'=>'boolean'
    ];
    public function question(){
       return $this->belongsTo(Question::class,'question_id');
    }
}
