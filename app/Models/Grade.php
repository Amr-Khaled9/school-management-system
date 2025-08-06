<?php

namespace App\Models;

use App\Models\Section;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model 
{

    protected $table = 'grades';
    public $timestamps = true;

    protected $fillable=[
        'name',
        'notes'
    ];
    public function Sections(){
        return $this->hasMany(Section::class,'grade_id');
    }


}