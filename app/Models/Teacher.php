<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $guarded = [];

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
