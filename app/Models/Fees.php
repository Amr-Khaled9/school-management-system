<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fees extends Model
{
    protected $guarded=[];

    public function grade()
    {
      return  $this->belongsTo(Grade::class,'grade_id');
    }
    public function classroom()
    {
     return   $this->belongsTo(Classroom::class,'classroom_id');
    }
}
