<?php



namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Atten extends Model
{
    use HasFactory;

    protected $table = 'attendances'; 

    public function user(){
        return $this->belongsTo(User::class,'u_id','id');}
}

