<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubmitedTask extends Model
{
    protected $fillable = [
        'user_id',
        'task_id',
        'description',
        'attachment_link',
        'obtain_marks',
        'status',
    ];

    // Relationships
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function task()
    {
        return $this->belongsTo(Task::class);
    }
}
