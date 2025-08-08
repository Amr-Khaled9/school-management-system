<?php

namespace App\Models;

use App\Models\MyPerent;
use Illuminate\Database\Eloquent\Model;

class PerentAttachment extends Model
{
    protected $guarded =[];

    public function perents()  {
        $this->belongsTo(MyPerent::class ,'perent_id');
    }
}
