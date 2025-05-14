<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BatchGroup extends Model
{
    protected $fillable = [
        'course_id',
        'teacher_id',
        'from',
        'to',
        'session_id',
        'group_name',
        'is_completed',
    ];

    protected $casts = [
        'from' => 'datetime:H:i',
        'to' => 'datetime:H:i',
        'is_completed' => 'boolean',
    ];
 // public function course()
    // {
    //     return $this->belongsTo(Course::class);
    // }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    // public function sessionYear()
    // {
    //     return $this->belongsTo(SessionYear::class);
    // }
}
