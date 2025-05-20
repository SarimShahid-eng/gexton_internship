<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentDetail extends Model
{
    protected $fillable=[
        'user_id',
        'teacher_id',
        'group_id',
        'course_id',
        'suspend_date',
        'reason_suspend',
        'is_completed',
        'result',
        'test_countdown'
    ];
    public function course(){
        return $this->belongsTo(Course::class,'course_id');
    }
    public function teacher(){
        return $this->belongsTo(User::class,'teacher_id');
    }
    public function group(){
        return $this->belongsTo(BatchGroup::class,'group_id');
    }
}
