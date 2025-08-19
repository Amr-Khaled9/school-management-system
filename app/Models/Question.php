<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable=['answers','score','title','answers','right_answer','quizze_id'];
    public function quizze()
    {
       return  $this->belongsTo(Quizze::class,'quizze_id');
    }
}
