<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fees_invoice extends Model
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
    public function fee(){
        return $this->belongsTo(Fees::class,'fee_id');

    }

}
