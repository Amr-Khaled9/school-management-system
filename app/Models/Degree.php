<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Student;
class Degree extends Model
{
    protected $guarded = [];

    public function student()
    {
        return $this->belongsTo(Student::class , 'student_id');
    }
}
