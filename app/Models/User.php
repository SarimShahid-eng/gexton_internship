<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable = [
        'firstname',
        'lastname',
        'phone',
        'email',
        'password',
        'is_active',
        'user_type',
        'session_year_id',
    ];
    function session() {
        return $this->belongsTo(CustomSession::class, 'session_year_id');
    }

    protected $hidden = [
        'password',
    ];

    public function getFullNameAttribute()
    {
        return $this->firstname . ' ' . $this->lastname;
    }
}
