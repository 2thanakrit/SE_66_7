<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Rule;

class datename extends Model
{
    use HasFactory;
    protected $table = 'date_names';
    protected $fillable = [
        'name',
    ];
    public $timestamps = false;
    use HasFactory;
    public function eventDates()
{
    return $this->hasMany(Calendar::class, 'dateN_id', 'id');
}
public static function boot()
    {
        parent::boot();

        // กำหนดเหตุการณ์ก่อนการบันทึกข้อมูล
        static::saving(function ($datename) {
            // ตรวจสอบว่าชื่อวันที่มีอยู่ในฐานข้อมูลแล้วหรือไม่
            $existingDate = datename::where('name', $datename->name)->exists();

            // ถ้ามีชื่อวันที่ซ้ำอยู่ในฐานข้อมูล
            if ($existingDate) {
                // ส่งกลับค่า false เพื่อยกเลิกการบันทึกข้อมูล
                return false;
            }
        });
    }
}