<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class leavebalances extends Model
{
    use HasFactory;
    protected $table = 'leavebalances';
    public function typeleave()
    {
        return $this->belongsTo(typeleaves::class,'typeL_id','id');
    }
}
