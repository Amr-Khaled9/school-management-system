<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attendence extends Model
{
    protected $guarded =[];
    public function grade()
    {
        return $this->belongsTo(Grade::class,'grade_id');
    }
    public function section()
    {
        return $this->belongsTo(Section::class,'section_id');
    }
    public function classroom()
    {
        return $this->belongsTo(Classroom::class,'classroom_id');
    }
    public function teacher()
    {
        return $this->belongsTo(Teacher::class,'teacher_id');
    }
    public function student()
    {
        return $this->belongsTo(Student::class,'student_id');
    }
}
