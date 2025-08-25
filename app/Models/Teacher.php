<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Teacher extends Authenticatable
{
    protected $guarded = [];
    protected $guard = 'teacher';
    protected $hidden = ['password', 'remember_token'];
    public function Specialization()
    {
        return $this->belongsTo(Specialization::class, 'specialization_id');
    }
    // relation many to many
    public function sections()
    {
        return $this->belongsToMany(Section::class,'teacher_section');
    }
}
