<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Rule;

class Calendar extends Model
{
    use HasFactory;

    protected $table = 'event_dates'; // กำหนดชื่อตารางในฐานข้อมูล
    protected $primaryKey = 'id'; // กำหนดชื่อคีย์หลัก
    public $timestamps = false; // ระบุว่าไม่มีการใช้งานฟิลด์ 'created_at' และ 'updated_at'

    // สามารถกำหนด fillable หรือ guarded ตามความเหมาะสม
    public function dateName()
    {
        return $this->belongsTo(datename::class, 'dateN_id');
    }
    protected $fillable = [
        'date', 'dateN_id', 'checkRest', 'detail',
    ];
    public static function boot()
    {
        parent::boot();

        static::saving(function ($model) {
            // ตรวจสอบว่าชื่อวันที่ซ้ำกันหรือไม่
            $duplicate = Calendar::where('date', $model->date)->exists();

            // หากมีชื่อวันที่ซ้ำกันในฐานข้อมูล ให้ยกเลิกการบันทึก
            if ($duplicate) {
                return false;
            }
        });
    }
}
