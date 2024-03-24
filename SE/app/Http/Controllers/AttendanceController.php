<?php

namespace App\Http\Controllers;

use App\Models\Atten;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AttendanceController extends Controller
{
    // แสดงผลข้อมูล
    public function showAllatten(Request $request)
    {
        $user = Auth::user();
        $all_atten = Atten::with('user')->where('u_id', $user->id)->get();

        return view('Attendance', compact('all_atten'));
    }


    public function search(Request $request)
    {
        $search = $request->get('search');
        $user = Auth::user();
    
        $all_atten = Atten::where('u_id', $user->id)
            ->where(function ($query) use ($search) {
                $query->where('date', 'like', '%' . $search . '%')
                      ->orWhere('time', 'like', '%' . $search . '%');
            })
            ->get();
    
        // ส่งค่ากลับไปยัง view พร้อมกับตัวแปร all_atten และ keyword
        return view('Attendance', compact('all_atten', 'search'));
    }
    


    public function addAttendance(Request $request)
    {
        $user = Auth::user();

        // ตรวจสอบว่าผู้ใช้มีการลงเวลาเข้างานในวันนี้หรือยัง
        $todayAttendance = Atten::where('u_id', $user->id)->whereDate('date', now()->format('Y-m-d'))->first();

        // ถ้ามีการลงเวลาในวันนี้แล้ว, ไม่อนุญาตให้บันทึก
        if ($todayAttendance) {
            return back()->with('error', 'You have already recorded your attendance today.');
        }

        $attendance = new Atten;
        $attendance->u_id = $user->id;
        $attendance->date = now()->format('Y-m-d');
        $attendance->time = now()->format('H:i:s');
        $attendance->save();

        return back()->with('success', 'Attendance recorded successfully!');
    }
}
