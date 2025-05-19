<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable = [
        'firstname',
        'lastname',
        'phone',
        'firstname',
        'lastname',
        'phone',
        'email',
        'password',
        'user_type',
        'is_active',
        'session_year_id'
    ];
    function session() {
        return $this->belongsTo(CustomSession::class, 'session_year_id');
    }

    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    public function student_details(){
        return $this->hasOne(StudentDetail::class,'user_id');
    }
    public function hasRole($role){
        return $this->user_type === $role;
    }
}
