<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $guarded = [];
    public function nationalitie()
    {
        return $this->belongsTo(Nationalitie::class, 'nationalitie_id');
    }
    public function blood()
    {
        return $this->belongsTo(Type_Blood::class, 'blood_id');
    }

    public function grade()
    {
        return $this->belongsTo(Grade::class, 'grade_id');
    }
    public function classroom()
    {
        return $this->belongsTo(Classroom::class, 'classroom_id');
    }
    public function  section()
    {
        return $this->belongsTo(Section::class, 'section_id');
    }
    public function parent()
    {
        return $this->belongsTo(MyPerent::class, 'parent_id');
    }
}
