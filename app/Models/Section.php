<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $fillable=[
        'name',
        'status',
        'grade_id',
        'classroom_id'
    ];

        public function Grades()
    {
            return $this->belongsTo(Grade::class, 'grade_id');
    }
        public function Classrooms()
    {
            return $this->belongsTo(Classroom::class, 'classroom_id');
    }
}
