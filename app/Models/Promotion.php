<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    protected $guarded =[];

    public function student()
    {
        return $this->belongsTo(Student::class , 'student_id');
    }
    public function from_grade()
    {
        return $this->belongsTo(Grade::class , 'from_grade');
    }
    public function to_grade()
    {
        return $this->belongsTo(Grade::class , 'to_grade');
    }
    public function from_classroom()
    {
        return $this->belongsTo(Classroom::class , 'from_classroom');
    }
    public function to_classroom ()
    {
        return $this->belongsTo(Classroom::class , 'to_classroom');
    }
    public function from_section()
    {
        return $this->belongsTo(Section::class , 'from_section');
    }
    public function to_section ()
    {
        return $this->belongsTo(Section::class , 'to_section');
    }

}
