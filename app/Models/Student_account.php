<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student_account extends Model
{
   protected $guarded=[];
    public function grade()
    {
        return $this->belongsTo(Grade::class, 'grade_id');
    }
    public function classroom()
    {
        return $this->belongsTo(Classroom::class, 'classroom_id');
    }
    public function student()
    {
        return $this->belongsTo(Student::class,'student_id');
    }
    public function receipt()
    {
        return $this->belongsTo(Receipt_Student::class,'receipt_id');
    }
    public function processing()
    {
        return $this->belongsTo(Processing_fee::class,'processing_id');
    }
}
