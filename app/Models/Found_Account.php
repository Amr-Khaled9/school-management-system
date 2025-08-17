<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Found_Account extends Model
{
    protected $guarded=[];

    public function receipt()
    {
        return $this->belongsTo(Receipt_Student::class , 'receipt_id');
    }
}
